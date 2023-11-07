<?php
namespace Daw;

class apartaments
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function uploadApartament($titol, $adreca, $longitud, $latitud, $descripcio, $metresQuadrats, $numHabitacions, $preuDiaTemporadaBaixa, $preuDiaTemporadaAlta, $numPersones)
    {

        //TO DO

        // Check if a file was uploaded
        if (isset($_FILES['imatges']) && $_FILES['imatges']['error'] === 0) {
            $imagePath = 'img/' . $_FILES['imatges']['name'];

            // Move the uploaded image to a designated folder
            if (move_uploaded_file($_FILES['imatges']['tmp_name'], $imagePath)) {
                // Image uploaded successfully, proceed to insert apartment data
                $sql = "INSERT INTO apartament (Titol, Adreca, Longitud, Latitud, Descripcio, MetresQuadrats, NumHabitacions, PreuDiaTemporadaBaixa, PreuDiaTemporadaAlta, NumPersones) 
                        VALUES (:titol, :adreca, :longitud, :latitud, :descripcio, :metresQuadrats, :numHabitacions, :preuDiaTemporadaBaixa, :preuDiaTemporadaAlta, :numPersones)";
                $stmt = $this->pdo->prepare($sql);

                // Bind the user input to the prepared statement
                $stmt->bindParam(':titol', $titol);
                $stmt->bindParam(':adreca', $adreca);
                $stmt->bindParam(':longitud', $longitud);
                $stmt->bindParam(':latitud', $latitud);
                $stmt->bindParam(':descripcio', $descripcio);
                $stmt->bindParam(':metresQuadrats', $metresQuadrats);
                $stmt->bindParam(':numHabitacions', $numHabitacions);
                $stmt->bindParam(':preuDiaTemporadaBaixa', $preuDiaTemporadaBaixa);
                $stmt->bindParam(':preuDiaTemporadaAlta', $preuDiaTemporadaAlta);
                $stmt->bindParam(':numPersones', $numPersones);

                // Execute the INSERT statement for apartment data
                if ($stmt->execute()) {
                    // Insert the image link into a separate table
                    $imageSql = "INSERT INTO imatges (Enlace, idApartament) VALUES (:enlace, :idApartament)";
                    $imageStmt = $this->pdo->prepare($imageSql);
                    $imageStmt->bindParam(':enlace', $_FILES['imatges']['name']);
                    $imageStmt->bindParam(':idApartament', $this->pdo->lastInsertId()); // Get the ID of the last inserted apartment
                    $imageStmt->execute();
                    return true;
                }
            }
        }
    }




    public function getAll($datepicker, $datepicker2, $numPersones)
    {
        $stm = $this->pdo->prepare("SELECT 
        a.*,
        MIN(i.Enlace) AS Enlace
    FROM 
        Apartament a
    LEFT JOIN 
        Disponibilitat d ON a.Id = d.IdApartament AND d.Data BETWEEN :dataInici AND :dataFi
    LEFT JOIN 
        Imatges i ON a.Id = i.IdApartament
    WHERE 
        d.Id IS NULL
    GROUP BY 
        a.Id;
        ");
        $stm->bindParam(':dataInici', $datepicker);
        $stm->bindParam(':dataFi', $datepicker2);
        error_log("query: " . $datepicker . " " . $datepicker2 . " " . $numPersones);
        // $stm->bindParam(':numPersones', $numPersones);
        $stm->execute();

        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
    }

    public function getAllApartaments()
    {
        $stm = $this->pdo->prepare("SELECT Apartament.*, Imatges.Enlace
        FROM Apartament
        JOIN Imatges ON Imatges.IdApartament = Apartament.Id
        ");
        $stm->execute();

        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
    }

    // public function getModal($id)
    // {
    //     $stm = $this->db->prepare("SELECT Apartament.*, Imatges.Enlace
    //     FROM Apartament
    //     JOIN Imatges ON Imatges.IdApartament = Apartament.Id
    //     WHERE Apartament.Id = :id
    //     ");
    //     $stm->bindParam(':id', $_GET['id']);
    //     echo $_GET['id'];
    //     $stm->execute();
    //     $tasks = array();
    //     while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
    //         $tasks[] = $task;
    //     }
    //     return $tasks;
    // }
    public function getModal($id)
    {
        $stm = $this->pdo->prepare("SELECT Apartament.*, Imatges.Enlace
        FROM Apartament
        JOIN Imatges ON Imatges.IdApartament = Apartament.Id
        WHERE Apartament.Id = :id
        ");
        // echo $_GET['id'];
        // echo $nom;
        $stm->execute([':id' => $id]);
        $array_ = $stm->fetch(\PDO::FETCH_ASSOC);
        return $array_;

    }
    // public function get($id)
    // {
    //     $query = 'select id, title, url_image as url from gallery where id=:id;';
    //     $stm = $this->sql->prepare($query);
    //     $result = $stm->execute([':id' => $id]);

    //     if ($stm->errorCode() !== '00000') {
    //         $err = $stm->errorInfo();
    //         $code = $stm->errorCode();
    //         die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
    //     }

    //     return $stm->fetch(\PDO::FETCH_ASSOC);
    // }

    public function getApartmentPrice($apartmentId, $currentSeason)
{
    // Define the column to retrieve based on the current season
    $columnToRetrieve = ($currentSeason === "Temporada baixa") ? "PreuDiaTemporadaBaixa" : "PreuDiaTemporadaAlta";

    // Query the database to get the price based on the current season
    $sql = "SELECT $columnToRetrieve AS preu FROM apartament WHERE Id = :apartmentId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':apartmentId', $apartmentId, \PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch();
    $price = $result['preu'];

    return $price;
}


    
    public function getSeasons()
{
    try {
        $sql = "SELECT *
                FROM Temporada";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $seasonData = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($seasonData) {
            return $seasonData;
        } else {
            return [
                'DataIniciTemporadaBaixa' => '2023-01-01',
                'DataFinalitzacioTemporadaBaixa' => '2023-06-30',
                'DataIniciTemporadaAlta' => '2023-07-01',
                'DataFinalitzacioTemporadaAlta' => '2023-12-31',
            ];
        }

    } catch (\PDOException $e) {
        // Handle any database connection errors here
        // You can log the error or return an appropriate response
        die("Database error: " . $e->getMessage());
    }
}

public function updateSeasonDates($highSeasonStart, $highSeasonEnd, $lowSeasonStart, $lowSeasonEnd)
    {
        $sql = "UPDATE Temporada SET
            DataIniciTemporadaAlta = :highSeasonStart,
            DataFinalitzacioTemporadaAlta = :highSeasonEnd,
            DataIniciTemporadaBaixa = :lowSeasonStart,
            DataFinalitzacioTemporadaBaixa = :lowSeasonEnd
            WHERE Id = 1"; // Assuming you want to update the row with Id = 1

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':lowSeasonStart', $lowSeasonStart);
        $stmt->bindParam(':lowSeasonEnd', $lowSeasonEnd);
        $stmt->bindParam(':highSeasonStart', $highSeasonStart);
        $stmt->bindParam(':highSeasonEnd', $highSeasonEnd);

        return $stmt->execute();
    }




}
