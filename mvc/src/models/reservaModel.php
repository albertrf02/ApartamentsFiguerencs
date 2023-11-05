<?php

namespace Daw;

class UploadReserva
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function registerReserva($idUser,$idApartament,$data,$dataInici,$dataFi,$preu,$idTemporada) {
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
        // Execute the INSERT statement
        return $stmt->execute();

        

        // $sql = "INSERT INTO `disponiblitat` (`data`, `idReserva`)
        //         VALUES (:data, :idReserva)";
        
    }

    public function isEmailExists($email)
    {
        // Prepare a SQL query to check if the email exists in the database
        $sql = "SELECT COUNT(*) FROM Usuari WHERE CorreuElectronic = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        // If count is greater than 0, the email already exists
        return $count > 0;
    }
}