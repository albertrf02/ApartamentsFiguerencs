<?php
function showApartaments($request, $response, $container){
    $apartaments = $apartamentModel->getAllApartaments();
    $response->set("apartaments", $apartaments);
    return $response;

};


