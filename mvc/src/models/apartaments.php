<?php
namespace Daw;

class uploadApartaments
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function uploadApartament($titol, $adreca, $longitud, $latitud, $descripcio, $metresQuadrats, $numHabitacions, $preuDiaTemporadaBaixa, $preuDiaTemporadaAlta, $numPersones){
        
        //TO DO

        // Check if a file was uploaded
        if (isset($_FILES['imatge']) && $_FILES['imatge']['error'] === 0) {
            $imagePath = '..\..\public\img' . $_FILES['imatge']['name'];
    
            // Move the uploaded image to a designated folder
            if (move_uploaded_file($_FILES['imatge']['tmp_name'], $imagePath)) {
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
                    $imageStmt->bindParam(':enlace', $imagePath);
                    $imageStmt->bindParam(':idApartament', $this->pdo->lastInsertId()); // Get the ID of the last inserted apartment
                    $imageStmt->execute();
                    return true;
                }
            }
        }
    }




    public function getAll($datepicker, $datepicker2, $numPersones)
    {
        $stm = $this->pdo->prepare("SELECT Apartament.*, Imatges.Enlace
        FROM Apartament
        JOIN Imatges ON Imatges.IdApartament = Apartament.Id
        WHERE :numPersones <= Apartament.numPersones
        and Apartament.Id NOT IN (
            SELECT IdApartament
            FROM Reserva
            WHERE dataEntrada BETWEEN :datepicker AND :datepicker2
            or dataSortida BETWEEN :datepicker AND :datepicker2
            or :datepicker BETWEEN DataEntrada AND DataSortida
            or :datepicker2 BETWEEN DataEntrada AND DataSortida
        );
        ");
        $stm->bindParam(':datepicker', $datepicker);
        $stm->bindParam(':datepicker2', $datepicker2);
        $stm->bindParam(':numPersones', $numPersones);
        $stm->execute();

        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
    }
};