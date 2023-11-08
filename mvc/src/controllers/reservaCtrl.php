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

    


    return $response;
}

