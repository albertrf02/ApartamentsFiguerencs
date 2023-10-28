<?php


function ctrlIndex($request, $response, $container)
{
    $response->setTemplate("index.php");


    if (isset($_SESSION['user'])) {
        $userId = $_SESSION['user']['Id'];

        $usersModel = $container->users();
        $userDb = $usersModel->getById($userId);

        // User is logged in, retrieve their name
        $loginName = $userDb['Nom'];
        $loginValid = true;

        $response->set("userDb", $userDb);
        $response->set("loginValid", $loginValid);
        $response->set("loginName", $loginName);
    }
    return $response;
}

