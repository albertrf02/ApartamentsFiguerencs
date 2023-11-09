<?php
function ctrlApartament($request, $response, $container)
{

    $seasonDates = $container->apartaments()->getSeasons();
    $currentDate = date('Y-m-d');
    $lowSeasonStart = $seasonDates['DataIniciTemporadaBaixa'];
    $lowSeasonEnd = $seasonDates['DataFinalitzacioTemporadaBaixa'];
    $apartmentModel = $container->apartaments();
    $currentSeason = ($currentDate >= $lowSeasonStart && $currentDate <= $lowSeasonEnd) ? "Temporada baixa" : "Temporada alta";
    ;

    if (isset($_REQUEST["action"]) && $_REQUEST["action"] === "crearReserva") {
        $idUser = $_SESSION['user']['Id'];
        $idApartament = $_POST['idApartament'];
        $dataInici = $_POST['dataInici'];
        $dataFi = $_POST['dataFi'];
        $numUsuaris = $_POST['numUsuaris'];
        $preu = $apartmentModel->getApartmentPrice($idApartament, $currentSeason);
        $preuTotal = $preu * $numUsuaris;
        $idTemporada = $_POST['idTemporada'];
        $reservaModel = $container->reserva();
        $isBooked = $reservaModel->isBooked($idApartament, $dataInici, $dataFi);
        if (!$isBooked) {
            $result = $reservaModel->uploadReserva($idUser, $idApartament, $dataInici, $dataFi, $preuTotal, 1, $numUsuaris);
        }
    }

    $response->setTemplate("Apartament.php");
    // Get the season dates from the model
    $seasonModel = $container->apartaments();
    $seasonDates = $seasonModel->getSeasons();

    // Determine the current season
    $currentDate = date('Y-m-d');
    $lowSeasonStart = $seasonDates['DataIniciTemporadaBaixa'];
    $lowSeasonEnd = $seasonDates['DataFinalitzacioTemporadaBaixa'];

    $currentSeason = ($currentDate >= $lowSeasonStart && $currentDate <= $lowSeasonEnd) ? "Temporada baixa" : "Temporada alta";

    // Get the price of an apartment for the current season

    $apartmentId = $_REQUEST['idApartament'];
    $apartmentModel = $container->apartaments();
    $apartmentPrice = $apartmentModel->getApartmentPrice($apartmentId, $currentSeason);

    $response->set('apartmentId', $apartmentId);
    $response->set('currentSeason', $currentSeason);
    $response->set('apartmentPrice', $apartmentPrice);
    $response->set('seasonDates', $seasonDates);

    // Set the template for rendering
    $response->setTemplate("Apartament.php");

    return $response;
}


