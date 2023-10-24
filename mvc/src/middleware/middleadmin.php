<?php

/**
 * Middleware que controla si l'usuari està identificat.
 * Exemple per a M07.
 *
 * @author: Dani Prados dprados@cendrassos.net
 **/

/**
 * middleAdmin: Middleware que controla si l'usuari està identificat.
 *
 * @param $request  contingut de la petició
 *                  http.
 * @param $response contingut de la response http.
 * @param $next     controlador que s'ha d'executar si l'usuari està
 *                  identificat.
 **/
function middleAdmin($request, $response, $container, $next)
{
    $name = $request->get("SESSION", "name");
    $surname = $request->get("SESSION", "surname");
    $missatge = $request->get("SESSION", "missatge");
    $response->set("missatge", $missatge);


    /* Validem que name i surname estan definits */
    if ($name == "" || $surname == "") {
        $response->setSession("error", "Has intentat accedir a la pàgina sense identificar-te!!!!!!\n");
        $response->redirect("Location:index.php?r=login");
    } else {
        $response = $next($request, $response, $container);
    }


    return $response;
}