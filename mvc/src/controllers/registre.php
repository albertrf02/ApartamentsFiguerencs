<?php
function ctrlRegistre($request, $response, $container)
{
    $response->setTemplate("registre.php");
    return $response;
}

require_once '../src/models/uploadUser.php'; // Include the UserModel

require_once '../src/models/Db.php'; // Include the file containing the Db class

// Database connection parameters (replace with your actual credentials)
$dbUser = 'root';
$dbPass = '';
$dbName = 'apartaments_figuerencs';
$dbHost = 'localhost';

// Create an instance of the Db class to get a PDO connection
$database = new \Daw\Db($dbUser, $dbPass, $dbName, $dbHost);
$sql = $database->getConnection();

$RegisterModel = new RegisterModel($sql); // Create an instance of UserModel

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        if ($RegisterModel->isEmailExists($email)) {
            echo "Correu ja en ús, introdueix un altre.";
        } else {
            // Other optional fields (telefon and num_targeta) set to null
            $telefon = null;
            $num_targeta = null;

            // Proceed with registration
            $result = $RegisterModel->registerUser($name, $surname, $email, $password, $telefon, $num_targeta);

            if ($result) {
                // Registration successful
                echo "Registration successful!";
            } else {
                // Registration failed
                echo "Registration failed.";
            }
        }
    }
}