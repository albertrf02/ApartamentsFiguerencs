<?php
function ctrlRegistreAdmin($request, $response, $container)
{
    $response->setTemplate("registre.php");

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rol'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $rol = $_POST['rol'];


            // $rolsAllowed = ['Usuari', 'Gestor', 'Administrador'];
            // if (!in_array($rol, $rolsAllowed)) {
            //     echo "Rol no permès.";
            //     return $response;
            // }

            // Check if the current user is an admin
            $currentUserDb = $container->users()->getById($_SESSION['user']['Id']);
            if ($currentUserDb['Rol'] === 'Administrador') {
                // Admin user, allow user creation
                $RegisterModel = $container->uploadUser();

                if ($RegisterModel->isEmailExists($email)) {
                    echo "Correu ja en ús, introdueix un altre.";
                } else {
                    // Other optional fields (telefon and num_targeta) set to null
                    $telefon = null;
                    $num_targeta = null;

                    // Proceed with registration
                    $result = $RegisterModel->registerUser($name, $surname, $email, $password, $telefon, $num_targeta, $rol);

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
    }
    return $response;
}
