<?php
function ctrlBuscarReserva($request, $response, $container)
{

    $response->setTemplate("buscarReserva.php");
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the date from the form
        $date = $_POST['data'];

        // Check if the date is valid (you may want to add more validation)
        if ($date) {
            // Assuming you have an instance of your model
            $modelReserves = $container->apartaments();

            // Call the getReservesByDate function to retrieve data
            $reserves = $modelReserves->getReservesByDate($date);
            error_log ("reserves: " . $reserves);

            // Pass the retrieved data to the view
            if ($reserves) {
                $response->set('reserves', $reserves);
            } else {
                $response->set('error', 'No hi ha reserves per aquesta data');
            }

        }
    }

    return $response;
}


