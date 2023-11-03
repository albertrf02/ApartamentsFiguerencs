<?php
function ctrlAdminPanel($request, $response, $container)
{
    $response->setTemplate("adminPanelView.php");

    $usersModel = $container->users();
    $users = $usersModel->getAllUsers();

    $apartamentsModel = $container->uploadApartaments();
    $apartaments = $apartamentsModel->getAllApartaments();

    $response->set("users", $users);
    $response->set("apartaments", $apartaments);


    return $response;
}

