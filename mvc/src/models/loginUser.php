<?php
class loginModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function loginUser($email, $password)
    {
        // Prepare the SQL INSERT statement
        $sql = "SELECT * FROM Usuari WHERE CorreuElectronic = :email AND Contrasenya = :password";
        $stmt = $this->pdo->prepare($sql);

        // Bind the user input to the prepared statement
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Execute the INSERT statement
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
