<?php
function ctrlUserPage($request, $response, $container)
{
    $response->setTemplate("userpage.php");
    $usersModel = $container->users();

    $userIdToEdit = '';
    $sessionUserId = $userIdToEdit = $_SESSION['user']['Id'];
    if (isset($_REQUEST["Id"])) { // TODOL CHeck if user is admin
        $userIdToEdit = $_REQUEST["Id"];
    } elseif (isset($_POST['Id'])) {
        $userIdToEdit = $_POST['Id'];
    } else {
        $userIdToEdit = $sessionUserId;
    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        error_log($_POST['delete']);
        if (isset($_POST['delete'])) {
            $usersModel->deleteUser($userIdToEdit);
            $response->redirect("Location: index.php?r=adminpanel");
        } elseif (isset($_POST['CorreuElectronic']) && isset($_POST['Contrasenya']) && isset($_POST['Nom']) && isset($_POST['Cognoms']) && isset($_POST['Telefon']) && isset($_POST['NumTargetaCredit'])) {
            if (empty($_POST['Nom']) || empty($_POST['Cognoms']) || empty($_POST['CorreuElectronic']) || empty($_POST['Contrasenya'])) {
                $response->set("error", "Falten camps per omplir");
            } else {
                $nom = $_POST['Nom'];
                $cognom = $_POST['Cognoms'];
                $email = $_POST['CorreuElectronic'];
                $password = $_POST['Contrasenya'];
                $telefon = empty($_POST['Telefon']) ? null : $_POST['Telefon'];
                $numTargeta = empty($_POST['NumTargetaCredit']) ? null : $_POST['NumTargetaCredit'];
                $updateUser = $usersModel->updateUser($userIdToEdit, $nom, $cognom, $email, $password, $telefon, $numTargeta);
            }
        }
    }




    $currentUserDb = $usersModel->getById($sessionUserId);
    $userToEdit = null;
    if ($sessionUserId == $userIdToEdit) {
        $userToEdit = $currentUserDb;
    } else {
        $userToEdit = $usersModel->getById($userIdToEdit);
    }


    if ($currentUserDb['Rol'] === 'Administrador') {
        $response->set("admin", true);
    }

    $response->set("userToEdit", $userToEdit);

    return $response;
}

