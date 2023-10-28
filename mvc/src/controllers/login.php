<?php
function ctrlLogin($request, $response, $container)
{
    $response->setTemplate("login.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // Get user input
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Create an instance of the model
            $LoginModel = $container->loginUser();

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
    return $response;
}

