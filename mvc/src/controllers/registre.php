<?php
function ctrlRegistre($request, $response, $container){
    $response->setTemplate("registre.php");
    return $response;
}