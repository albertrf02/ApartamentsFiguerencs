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



    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];

        error_log($action);

        if ($action === "updateuser") {
            error_log($_POST['delete']);
            if (isset($_POST['delete'])) {
                $usersModel->deleteUser($userIdToEdit);
                $response->redirect("Location: index.php?r=adminpanel");
            } elseif (isset($_POST['CorreuElectronic']) && isset($_POST['Contrasenya']) && isset($_POST['Nom']) && isset($_POST['Cognoms']) && isset($_POST['Telefon']) && isset($_POST['NumTargetaCredit']) && isset($_POST['Rol'])) {
                if (empty($_POST['Nom']) || empty($_POST['Cognoms']) || empty($_POST['CorreuElectronic']) || empty($_POST['Contrasenya']) || empty($_POST['Rol'])) {
                    $response->set("error", "Falten camps per omplir");
                } else {
                    $nom = $_POST['Nom'];
                    $cognom = $_POST['Cognoms'];
                    $email = $_POST['CorreuElectronic'];
                    $password = $_POST['Contrasenya'];
                    $telefon = empty($_POST['Telefon']) ? null : $_POST['Telefon'];
                    $numTargeta = empty($_POST['NumTargetaCredit']) ? null : $_POST['NumTargetaCredit'];
                    $rol = $_POST['Rol'];
                    $updateUser = $usersModel->updateUser($userIdToEdit, $nom, $cognom, $email, $password, $telefon, $numTargeta, $rol);
                }
            }
        } elseif ($action === "deletereserva") {
            error_log("Borrare la reseerva " . $_POST['Id']);
            $reservaModel = $container->reserva();
            $reservaId = $_POST['Id'];
            $reservaModel->deleteReservaById($reservaId);
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

    $reservaModel = $container->reserva();
    $userReserves = $reservaModel->getReservesByUserId($userIdToEdit);

    $response->set("userReserves", $userReserves);
    return $response;
}

