<?php
function ctrlIndex($request, $response, $container){
    $response->setTemplate("index.php");
    $apartaments = $container->apartaments();
    $apartaments = $apartaments->getAll();
    $response->set("apartaments", $apartaments);
    return $response;
}