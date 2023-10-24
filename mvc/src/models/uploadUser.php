<?php
class UserModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function registerUser($name, $surname, $email, $password, $telefon, $num_targeta)
    {
        // Prepare the SQL INSERT statement
        $sql = "INSERT INTO Usuari (Nom, Cognoms, CorreuElectronic, Contrasenya, Telefon, NumTargetaCredit) 
                VALUES (:name, :surname, :email, :password, :telefon, :num_targeta)";
        $stmt = $this->pdo->prepare($sql);

        // Bind the user input to the prepared statement
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':telefon', $telefon, PDO::PARAM_STR);
        $stmt->bindParam(':num_targeta', $num_targeta, PDO::PARAM_STR);

        // Execute the INSERT statement
        return $stmt->execute();
    }
} catch (PDOException $e) {
    die('Ha fallat la connexió: ' . $e->getMessage());
}
