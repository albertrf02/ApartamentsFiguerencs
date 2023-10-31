<?php

namespace Daw;

class UploadUser
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function registerUser($name, $surname, $email, $password, $telefon, $num_targeta, $rol)
    {
        // Prepare the SQL INSERT statement
        $sql = "INSERT INTO Usuari (Nom, Cognoms, CorreuElectronic, Contrasenya, Telefon, NumTargetaCredit, Rol) 
                VALUES (:name, :surname, :email, :password, :telefon, :num_targeta, :rol)";
        $stmt = $this->pdo->prepare($sql);

        // Bind the user input to the prepared statement
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':telefon', $telefon, \PDO::PARAM_STR);
        $stmt->bindParam(':num_targeta', $num_targeta, \PDO::PARAM_STR);
        $stmt->bindParam(':rol', $rol);

        // Execute the INSERT statement
        return $stmt->execute();
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
