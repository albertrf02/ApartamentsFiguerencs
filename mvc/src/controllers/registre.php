<?php
function ctrlRegistre($request, $response, $container)
{
    $response->setTemplate("registre.php");
    return $response;
}

// Include error reporting and init.php for database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../pdo/init.php'); // Include the init.php file for database connection
include('../src/models/uploadUser.php'); // Include the UserModel

$RegisterModel = new RegisterModel($sql); // Create an instance of UserModel

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Other optional fields (telefon and num_targeta) set to null
    $telefon = null;
    $num_targeta = null;

    $result = $RegisterModel->registerUser($name, $surname, $email, $password, $telefon, $num_targeta);

    if ($result) {
        // Registration successful
        echo "Registration successful!";
    } else {
        // Registration failed
        echo "Registration failed.";
    }
}
