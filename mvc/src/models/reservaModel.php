<?php

namespace Daw;

class UploadReserva
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function uploadReserva($idUser, $idApartament, $data, $dataInici, $dataFi, $preu, $idTemporada)
    {
        // Prepare the SQL INSERT statement
        $sql = "INSERT INTO `reserva` (`Preu`, `DataReserva`, `IdUsuari`, `IdApartament`, `IdTemporada`)
                VALUES (:preu, :data, :idUser, :idApartament, :idTemporada)";
        $stmt = $this->pdo->prepare($sql);

        // Bind the user input to the prepared statement
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':idApartament', $idApartament);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':preu', $preu);
        $stmt->bindParam(':idTemporada', $idTemporada);

        // Execute the INSERT statement for apartment data
        if ($stmt->execute()) {

            $begin = new \DateTime($dataInici);
            $end = new \DateTime($dataFi);

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            $idReserva = $this->pdo->lastInsertId();
            foreach ($period as $dt) {
                error_log($dt->format("Y-m-d"));
                $disponiblitatSql = "INSERT INTO Disponibilitat (Data, idReserva, idApartament) VALUES (:data, :idReserva, :idApartament)";
                $disponiblitatStmt = $this->pdo->prepare($disponiblitatSql);
                $disponiblitatStmt->bindParam(':data', $dt->format("Y-m-d"));
                $disponiblitatStmt->bindParam(':idReserva', $idReserva); // Get the ID of the last inserted apartment
                $disponiblitatStmt->bindParam(':idApartament', $idApartament);
                $disponiblitatStmt->execute();
            }
            return true;
        }

    }

    public function isBooked($idApartament, $dataInici, $dataFi)
    {
        $sql = "SELECT COUNT(*) FROM Disponibilitat WHERE idApartament = :idApartament AND Data BETWEEN :dataInici AND :dataFi";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idApartament', $idApartament);
        $stmt->bindParam(':dataInici', $dataInici);
        $stmt->bindParam(':dataFi', $dataFi);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        // If count is greater than 0, the email already exists
        return $count > 0;
    }

    public function getReservesByUserId($idUser)
    {
        $stm = $this->pdo->prepare("SELECT
        r.Id, 
        r.IdApartament,
        a.Titol,
        MIN(d.Data) as StartDate,
        MAX(d.Data) as EndDate
      FROM 
        Reserva r
      JOIN 
        Apartament a ON r.IdApartament = a.Id
      JOIN 
        Disponibilitat d ON r.Id = d.IdReserva
      WHERE 
        r.IdUsuari = :idUser -- Replace specificUserId with the actual user ID
      GROUP BY 
        r.IdUsuari, r.IdApartament, a.Titol
      HAVING 
        EndDate > CURDATE()
      ORDER BY 
        StartDate;
        ");
        $stm->bindParam(':idUser', $idUser);
        $stm->execute();

        $reserves = array();
        while ($reserva = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $reserves[] = $reserva;
        }
        return $reserves;
    }

    public function deleteReservaById($id){
        $stm = $this->pdo->prepare('delete from Disponibilitat where idReserva=:id;');
        $result = $stm->execute([':id' => $id]);

        $stm = $this->pdo->prepare('delete from Reserva where id=:id;');
        $result = $stm->execute([':id' => $id]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
        

}
