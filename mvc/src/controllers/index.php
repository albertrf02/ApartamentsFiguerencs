<?php


function ctrlIndex($request, $response, $container)
{
    $response->setTemplate("index.php");


    if (isset($_SESSION['user'])) {
        // User is logged in, retrieve their name
        $loginName = $_SESSION['user']['Nom'];
        $loginValid = true;

        $response->set("loginValid", $loginValid);
        $response->set("loginName", $loginName);
    }
    return $response;
}

