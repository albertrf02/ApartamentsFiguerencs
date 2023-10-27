<?php
function ctrlLogin($request, $response, $container)
{
    $response->setTemplate("login.php");
    return $response;
}

include '../src/models/loginUser.php';

require_once '../src/models/Db.php'; // Include the file containing the Db class

// Database connection parameters
$dbUser = 'root';
$dbPass = '';
$dbName = 'apartaments_figuerencs';
$dbHost = 'localhost';

// Create an instance of the Db class to get a PDO connection
$database = new \Daw\Db($dbUser, $dbPass, $dbName, $dbHost);
$pdo = $database->getConnection();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Get user input
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Create an instance of the model
        $LoginModel = new LoginModel($pdo);

        // Call the loginUser method from the model
        $result = $LoginModel->loginUser($email, $password);

        if ($result) {
            $_SESSION['user'] = $result;
            header('Location: index.php');
        } else {
            echo "Usuari o contrasenya incorrectes";
        }
    }
}