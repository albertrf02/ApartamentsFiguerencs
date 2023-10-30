<?php
function ctrlAdminPanel($request, $response, $container)
{
    $response->setTemplate("adminPanelView.php");

    $usersModel = $container->users();
    $users = $usersModel->getAllUsers();

    $response->set("users", $users);


    return $response;
}

