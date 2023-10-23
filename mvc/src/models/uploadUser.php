<?php
$dsn = 'mysql:dbname=apartaments_figuerencs;host=localhost';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve user input from the form
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telefon = !empty($_POST['telefon']) ? $_POST['telefon'] : null;
        $num_targeta = !empty($_POST['num_targeta']) ? $_POST['num_targeta'] : null;

        // Prepare the SQL INSERT statement
        $sql = "INSERT INTO users (name, surname, email, password, telefon, num_targeta) 
                VALUES (:name, :surname, :email, :password, :telefon, :num_targeta)";
        $stmt = $pdo->prepare($sql);

        // Bind the user input to the prepared statement
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':telefon', $telefon, PDO::PARAM_STR); // Assuming 'telefon' is a string field
        $stmt->bindParam(':num_targeta', $num_targeta, PDO::PARAM_STR); // Assuming 'num_targeta' is a string field

        // Execute the INSERT statement
        $stmt->execute();

        // Optionally, you can provide feedback to the user that the registration was successful.
        echo "Registration successful!";
    }
} catch (PDOException $e) {
    die('Ha fallat la connexió: ' . $e->getMessage());
}