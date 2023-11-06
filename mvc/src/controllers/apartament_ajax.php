<?php
function ctrlApartamentAjax($request, $response, $container)
{
    // $nom = $request->get(INPUT_GET, "Titol"??"hola");
    $apartamentModal = $container->uploadApartaments()->getModal($_POST["id"]);
    //$response->setJson();
    // $response->set("nom", $nom);
    echo json_encode($apartamentModal);
    //  echo $apartamentModal['Adreca'];
    // echo $apartamentModal['Descripcio'];
    // echo $apartamentModal['MetresQuadrats'];
    // echo $apartamentModal['Numhabitacions'];
    // echo $apartamentModal['NumPersones'];
    // echo $apartamentModal;
    //return $response;
}