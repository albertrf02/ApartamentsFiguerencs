<?php
function ctrlIndex($request, $response, $container)
{
    $response->setTemplate("index.php");
    return $response;

    if (isset($_SESSION['user'])) {
        // User is logged in, retrieve their name
        $user = $_SESSION['user'];
        $name = $user['Nom']; // Assuming 'Nom' is the user's name field

        // Set the name to be displayed in the view
        $response->setData('userName', $name);
    } else {
        // User is not logged in
        $response->setData('userName', null);
    }

    // Set the template to the home page
    $response->setTemplate("index.php");

    return $response;
}

