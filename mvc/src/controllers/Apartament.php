<?php
function ctrlApartament($request, $response, $container)
{
    $response->setTemplate("Apartament.php");

    // Move the season date variables to the model for a cleaner separation of concerns
    $apartamentModel = $container->apartaments();

    // Check if the user wants to update the season dates
    if (isset($_POST['update_season'])) {
        $lowSeasonStart = $_POST['low_season_start'];
        $lowSeasonEnd = $_POST['low_season_end'];
        $highSeasonStart = $_POST['high_season_start'];
        $highSeasonEnd = $_POST['high_season_end'];
    }

    // Calculate the price based on the current season using the model method
    $apartmentId = 3; // Replace with the actual apartment ID you want to display
    $price = $apartamentModel->getApartmentPrice($apartmentId);

    // Get the current date
    $currentDate = date('m-d');

    // Determine the current season
    if ($currentDate >= $lowSeasonStart && $currentDate <= $lowSeasonEnd) {
        $currentSeason = "Temporada baixa";
    } else {
        $currentSeason = "Temporada alta";
    }

    // Pass the price and current season to the view
    $response->set("price", $price);
    $response->set("currentSeason", $currentSeason);

    return $response;
}
