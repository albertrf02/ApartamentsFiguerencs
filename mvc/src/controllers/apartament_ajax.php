<?php
function ctrlApartamentAjax($request, $response, $container)
{
    // $nom = $request->get(INPUT_GET, "Titol"??"hola");
    $apartamentModal = $container->uploadApartaments()->getModal();
    $response->setJson();
    // $response->set("nom", $nom);
    echo $apartamentModal['Titol'];
    // echo $apartamentModal['Adreca'];
    // echo $apartamentModal['Descripcio'];
    // echo $apartamentModal['MetresQuadrats'];
    // echo $apartamentModal['Numhabitacions'];
    // echo $apartamentModal['NumPersones'];
    // echo $apartamentModal;
    return $response;
}