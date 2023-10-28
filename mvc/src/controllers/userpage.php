<?php
function ctrlUserPage($request, $response, $container)
{
    $response->setTemplate("userpage.php");

    return $response;
}

