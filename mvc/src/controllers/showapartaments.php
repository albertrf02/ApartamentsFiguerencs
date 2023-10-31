<?php
function showApartaments($request, $response, $container){
    $apartaments = $container->$apartaments()->getAllApartaments($datepicker, $datepicker2, $numPersones);
    $response->set("apartaments", $apartaments);
    return $response;

};


