<?php
function ctrlReserva($request, $response, $container)
{
    $response->setTemplate("userpage.php");

    error_log ("Reserva");
    $idUser = 3;
    $idApartament = 2;
    $data = '2023-05-11';
    $dataInici = '2023-05-11';
    $dataFi = '2023-05-14';   
    $preu = 100;
    $idTemporada = 1;

    $reservaModel = $container->reserva();
    $isBooked = $reservaModel->isBooked($idApartament,$dataInici,$dataFi);
    if (!$isBooked){
        $result = $reservaModel->uploadReserva($idUser,$idApartament,$data,$dataInici,$dataFi,$preu,$idTemporada);
    }
    return $response;
}

