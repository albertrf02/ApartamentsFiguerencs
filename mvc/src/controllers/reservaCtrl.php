<?php
function ctrlReserva($request, $response, $container)
{
    if (isset($_REQUEST["action"]) && $_REQUEST["action"] === "descarregarPDF" && isset($_REQUEST["Id"])) {
        $id = $_REQUEST["Id"];
        $nom = $_SESSION["user"]["Nom"];
        $cognom = $_SESSION["user"]["Cognoms"];
        $email = $_SESSION["user"]["CorreuElectronic"];
        $response->setTemplate("descarregarPDF.php");
        $response->set("id", $id);
        $response->set("nom", $nom);
        $response->set("cognom", $cognom);
        $response->set("email", $email);
        error_log("Descarregant PDF de la reserva " . $id);
        return $response;
    }




    return $response;
}

