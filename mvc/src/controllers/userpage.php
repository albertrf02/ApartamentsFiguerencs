<?php
function ctrlUserPage($request, $response, $container)
{
    $response->setTemplate("userpage.php");
    $usersModel = $container->users();

    $userId = '';
    if (isset($_REQUEST["Id"])) { // TODOL CHeck if user is admin
        $userId = $_REQUEST["Id"];
    } else {
        $userId = $_SESSION['user']['Id'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // update user in the database
        if (isset($_POST['CorreuElectronic']) && isset($_POST['Contrasenya']) && isset($_POST['Nom']) && isset($_POST['Cognoms']) && isset($_POST['Telefon']) && isset($_POST['NumTargetaCredit'])) {
            if (empty($_POST['Nom']) || empty($_POST['Cognoms']) || empty($_POST['CorreuElectronic']) || empty($_POST['Contrasenya'])) {
                $response->set("error", "Falten camps per omplir");
            } else {
                $nom = $_POST['Nom'];
                $cognom = $_POST['Cognoms'];
                $email = $_POST['CorreuElectronic'];
                $password = $_POST['Contrasenya'];
                $telefon = empty($_POST['Telefon']) ? null : $_POST['Telefon'];
                $numTargeta = empty($_POST['NumTargetaCredit']) ? null : $_POST['NumTargetaCredit'];
                $updateUser = $usersModel->updateUser($userId, $nom, $cognom, $email, $password, $telefon, $numTargeta);
            }
        }
    }

    if (isset($_SESSION['user'])) {
        $userDb = $usersModel->getById($userId);
        $response->set("userDb", $userDb);
    }

    return $response;
}

