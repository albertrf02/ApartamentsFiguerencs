<?php
function ctrlReserva($request, $response, $container)
{
    $response->setTemplate("userpage.php");

    error_log ("Reserva");
    $idUser = 3;
    $idApartament = 1;
    $data = '2023-05-11';
    $dataInici = '2023-05-11';
    $dataFi = '2023-05-14';   
    $preu = 100;
    $idTemporada = 1;

    $reservaModel = $container->reserva();
    $result = $reservaModel->uploadReserva($idUser,$idApartament,$data,$dataInici,$dataFi,$preu,$idTemporada);

    return $response;
}

