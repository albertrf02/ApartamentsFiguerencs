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
// include "../src/controllers/registre.php";
include "../src/controllers/index.php";
include "../src/controllers/login.php";
include "../src/controllers/registre.php";
include "../src/controllers/registreAdmin.php";
include "../src/controllers/registreGestor.php";
include "../src/controllers/Apartament.php";
include "../src/controllers/logout.php";
include "../src/controllers/userpage.php";
include "../src/controllers/userpageGestor.php";
include "../src/controllers/adminPanelCtrl.php";
include "../src/controllers/gestorPanelCtrl.php";
include "../src/controllers/uploadApartament.php";
include "../src/controllers/apartament_ajax.php";
include "../src/middleware/middleAdmin.php";



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
} elseif ($r == "adminpanel") {
    $response = isGestorAdmin($request, $response, $container, "ctrlAdminPanel");
} elseif ($r == "userpage") {
    $response = isLogged($request, $response, $container, "ctrlUserpage");
} elseif ($r == "registreadmin") {
    $response = isAdmin($request, $response, $container, "ctrlRegistreAdmin");
} elseif ($r == "registregestor") {
    $response = isGestor($request, $response, $container, "ctrlRegistreGestor");
} elseif ($r == "uploadapartament") {
    $response = isGestorAdmin($request, $response, $container, "ctrlUploadApartament");
} elseif ($r == "apartament_ajax") {
    $response = ctrlApartamentAjax($request, $response, $container);
} elseif ($r == "userpagegestor") {
    $response = isGestor($request, $response, $container, "ctrlUserPageGestor");
} else {
    $response = getUserData($request, $response, $container, "ctrlIndex");
}

$response->response();