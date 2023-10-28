<?php



error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../src/config.php";


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
include "../src/controllers/Apartament.php";
include "../src/controllers/logout.php";


$request = new \Emeset\Request();
$response = new \Emeset\Response();
$container = new \Emeset\Container($config);

$r = '';
if (isset($_REQUEST["r"])) {
    $r = $_REQUEST["r"];
}


if ($r === "login") {
    $response = ctrlLogin($request, $response, $container);
} elseif ($r === "registre") {
    $response = ctrlRegistre($request, $response, $container);
} elseif ($r == "apartament") {
    $response = ctrlApartament($request, $response, $container);
} elseif ($r == "logout") {
    $response = ctrlLogout($request, $response, $container);
} elseif ($r == "") {
    $response = ctrlIndex($request, $response, $container);
} else {
    $response = ctrlIndex($request, $response, $container);
}

$response->response();