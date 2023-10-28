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


/**
 * Example function - Exemple d'estructura d'una funció middleware.
 *
 * @param \Emeset\Request $request
 * @param \Emeset\Response $response
 * @param \Emeset\Container $container
 * @param callable $next
 * @return \Emeset\Response
 */
function isLogged($request, $response, $container, $next)
{

    // Aquí va el codi del middleware
    $logged = $request->get("SESSION", "logged");

    if (!$logged) {
        $response->redirect("location: index.php?r=login");
        return $response;
    }

    $response->set("user", $request->get("SESSION", "user"));

    $response = $next($request, $response, $container);


    return $response;

}