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

    if (isset($_SESSION['user'])) {
        $response = getUserData($request, $response, $container, $next);
    } else {
        $response->redirect("location: index.php?r=login");
    }

    return $response;

}

function getUserData($request, $response, $container, $next)
{
    $response = $next($request, $response, $container);

    if (isset($_SESSION['user'])) {
        $userId = $_SESSION['user']['Id'];

        $usersModel = $container->users();
        $userDb = $usersModel->getById($userId);

        // User is logged in, retrieve their name
        $loginName = $userDb['Nom'];
        $loginValid = true;

        $response->set("loginValid", $loginValid);
        $response->set("loginName", $loginName);
    }
    return $response;
}
