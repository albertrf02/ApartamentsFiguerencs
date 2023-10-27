<?php
function ctrlLogin($request, $response, $container)
{
    $response->setTemplate("login.php");
    return $response;    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // Get user input
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Create an instance of the model
            $LoginUser = new LoginUser($pdo);
    
            // Call the loginUser method from the model
            $result = $LoginUser->loginUser($email, $password);
    
            if ($result) {
                $_SESSION['user'] = $result;
                header('Location: index.php');
            } else {
                echo "Usuari o contrasenya incorrectes";
            }
        }
    }
}
