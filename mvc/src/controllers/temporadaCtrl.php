<?php
function ctrlTemporada($request, $response, $container)
{
    $response->setTemplate("temporadaView.php");
    
    // Call the model to update the season dates
    $apartamentModel = $container->apartaments();
    $seasonDates = $apartamentModel->getSeasons();
    $response->set("seasonDates", $seasonDates);

    

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['high_season_start']) && isset($_POST['high_season_end']) && isset($_POST['low_season_start']) && isset($_POST['low_season_end']) ) {
        $highSeasonStart = $_POST['high_season_start'];
        $highSeasonEnd = $_POST['high_season_end'];
        $lowSeasonStart = $_POST['low_season_start'];
        $lowSeasonEnd = $_POST['low_season_end'];

        $result = $apartamentModel->updateSeasonDates(
            $highSeasonStart,
            $highSeasonEnd,
            $lowSeasonStart,
            $lowSeasonEnd
        );


        if ($result) {
            echo "Season dates updated successfully!";
        } else {
            echo "Failed to update season dates.";
        }
    }

    if (isset($_REQUEST["action"]) && $_REQUEST["action"] === "crearReserva") {
        $idUser = $_SESSION['user']['Id'];
        $idApartament = $_POST['idApartament'];
        $dataInici = $_POST['dataInici'];
        $dataFi = $_POST['dataFi'];
        $numUsuaris = $_POST['numUsuaris'];
        $preu = $_POST['preu'];
        $idTemporada = $_POST['idTemporada'];
        error_log ("preu: " . $preu);

        $reservaModel = $container->reserva();
        $isBooked = $reservaModel->isBooked($idApartament,$dataInici,$dataFi);
        if (!$isBooked){
            $result = $reservaModel->uploadReserva($idUser,$idApartament,$dataInici,$dataFi,0,1, $numUsuaris);
        }
    }

    return $response;
}
