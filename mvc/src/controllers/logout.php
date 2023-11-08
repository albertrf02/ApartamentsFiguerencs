<?php
function ctrlLogout($request, $response, $container)
{
    $response->redirect("location: index.php?r=login");

    session_destroy();

    return $response;
}

