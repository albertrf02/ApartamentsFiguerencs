<?php
function ctrlApartament($request, $response, $container)
{
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
    $apartmentId = 1;
    $apartmentModel = $container->apartaments();
    $apartmentPrice = $apartmentModel->getApartmentPrice($apartmentId, $currentSeason);

    $response->set('currentSeason', $currentSeason);
    $response->set('apartmentPrice', $apartmentPrice);
    $response->set('seasonDates', $seasonDates);

    // Set the template for rendering
    $response->setTemplate("Apartament.php");

    return $response;
}


