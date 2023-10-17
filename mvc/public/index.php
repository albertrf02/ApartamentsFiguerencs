<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
$r = $_REQUEST["r"];

// /* Creem els diferents models */
// $session = new Daw\Session();
// $images = new Daw\Images();

if ($r === "login") {
    ctrlLogin();
} elseif ($r === "registre") {
    ctrlRegistre();
} elseif ($r == "about") {
    ctrlAbout();
} elseif ($r == "exemple") {
    ctrlExemple($images);
} elseif ($r == "") {
    ctrlIndex();
} else {
    ctrlIndex();
}