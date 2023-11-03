<?php
function ctrlGestorPanel($request, $response, $container)
{
    $response->setTemplate("gestorPanelView.php");

    $usersModel = $container->users();
    $users = $usersModel->getAllUsers();

    $response->set("users", $users);


    return $response;
}

