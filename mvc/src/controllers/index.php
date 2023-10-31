<?php


function ctrlIndex($request, $response, $container)
{
    $response->setTemplate("index.php");

    // Function that converts DD/MM/YYYY to YYYY-MM-DD
    function convertDate($date){
        $date = explode("/", $date);
        $date = array_reverse($date);
        $date = implode("-", $date);
        return $date;
    }

    $datepicker = $request->get(INPUT_GET, "datepicker") ?? "01/01/1970";
    $datepicker2 = $request->get(INPUT_GET, "datepicker2") ?? "01/01/1970";
    $numPersones = $request->get(INPUT_GET, "numPersones") ?? 0;

    $convertedDatepicker = convertDate($datepicker);
    $convertedDatepicker2 = convertDate($datepicker2);



    $apartaments = $container->apartaments()->getAll($convertedDatepicker, $convertedDatepicker2, $numPersones);
    $response->set("apartaments", $apartaments);
    $response->set("datepicker", $datepicker);
    $response->set("datepicker2", $datepicker2);
    $response->set("numPersones", $numPersones);
    return $response;
}

