<?php
function ctrlLogin($request, $response, $container)
{
    $error = $request->get("SESSION", "error");
    $response->set("error", $error);

    $name = $request->get("SESSION", "nom");
    $surname = $request->get("SESSION", "surname");
    if (!isset($name)) {
        $name = "";
    }
    if (!isset($surname)) {
        $surname = "";
    }

    $response->set("nom", $name);
    $response->set("surname", $surname);

    $response->SetTemplate("login.php");
    
    return $response;
}