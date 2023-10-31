<?php



error_reporting(E_ERROR | E_WARNING | E_PARSE);
require "../src/config.php";
include "../src/models/Db.php";
include "../src/models/apartaments.php";

// include "../src/config.php";

// include "../src/controllers/save.php";
// include "../src/controllers/login.php";
// include "../src/controllers/index.php";
// include "../src/controllers/error.php";
// include "../src/controllers/about.php";
// include "../src/controllers/exemple.php";
include "../src/controllers/index.php";
include "../src/controllers/login.php";
include "../src/controllers/registre.php";
include "../src/controllers/apartament.php";

include "../src/middleware/middleAdmin.php";

$r = '';
if (isset($_REQUEST["r"])) {
  $r = $_REQUEST["r"];
}


/* Creem els diferents models */
$container = new Emeset\Container($config);
$response = new Emeset\Response();
$request = new Emeset\Request();


// /* Creem els diferents models */
// $session = new Daw\Session();
// $images = new Daw\Images();



if ($r === "login") {
        $response = ctrlLogin($request, $response, $container);

} elseif ($r === "registre") {
    $response = ctrlRegistre($request, $response, $container);
} elseif ($r == "apartament") {
    $response = ctrlApartament($request, $response, $container);
} elseif ($r == "s") {
    ctrlExemple($images);
} elseif ($r == "") {
    $response = ctrlIndex($request, $response, $container);
} else {
    $response = ctrlIndex($request, $response, $container);
}

$response->response();