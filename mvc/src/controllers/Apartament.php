<?php
function ctrlApartament($request, $response, $container){
    
    $response->setTemplate("Apartament.php");
    
    return $response;
}