<?php
function middleAdmin($request, $response, $container, $next)
{
    $name = $request->get("SESSION", "name");
    $surname = $request->get("SESSION", "surname");
    $missatge = $request->get("SESSION", "missatge");
    $response->set("missatge", $missatge);
   

    /* Validem que name i surname estan definits */
    if ($name == "" || $surname == "") {
        $response->setSession("error", "Has intentat accedir a la pàgina sense identificar-te!!!!!!\n");
        $response->redirect("Location:index.php?r=identificar");
    } else {
        $response = $next($request, $response, $container);
    }


    return $response;
}