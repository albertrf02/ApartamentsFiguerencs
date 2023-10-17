<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../src/config.php";

include "../src/controllers/save.php";
include "../src/controllers/login.php";
include "../src/controllers/index.php";
include "../src/controllers/error.php";
include "../src/controllers/about.php";
include "../src/controllers/exemple.php";

$r = $_REQUEST["r"];

/* Creem els diferents models */
$session = new Daw\Session();
$images = new Daw\Images();

if ($r === "login") {
    ctrlLogin($_GET, $session);
} elseif ($r === "save") {
    ctrlSave($_POST, $session);
} elseif ($r == "about") {
    ctrlAbout($_GET, $_COOKIE, $session);
} elseif ($r == "exemple") {
    ctrlExemple($images);
} elseif ($r == "") {
    ctrlIndex($_GET, $_COOKIE, $session, $images);
} else {
    ctrlError($_GET, $session);
}