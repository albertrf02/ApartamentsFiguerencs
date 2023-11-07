<?php
function ctrlReserva($request, $response, $container)
{
    if (isset($_REQUEST["action"]) && $_REQUEST["action"] === "descarregarPDF" && isset($_REQUEST["Id"])) {
        $id = $_REQUEST["Id"];
        $response->setTemplate("descarregarPDF.php");
        $response->set("id", $id);
        error_log("Descarregant PDF de la reserva " . $id);
        return $response;
    }
    
    $response->setTemplate("userpage.php");
    
    $idUser = 3;
    $idApartament = 2;
    $data = '2023-05-11';
    $dataInici = '2026-05-11';
    $dataFi = '2026-05-14';   
    $preu = 100;
    $idTemporada = 1;

    $reservaModel = $container->reserva();
    $isBooked = $reservaModel->isBooked($idApartament,$dataInici,$dataFi);
    if (!$isBooked){
        $result = $reservaModel->uploadReserva($idUser,$idApartament,$data,$dataInici,$dataFi,$preu,$idTemporada);
    }

    return $response;
}

