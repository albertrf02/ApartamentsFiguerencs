<?php

$config = array();


require_once "../src/Emeset/Request.php";
require_once "../src/Emeset/Response.php";
require_once "../src/Emeset/Container.php";


/* configuració de connexió a la base dades */
$config["db"] = array();
$config["db"]["user"] = 'root';
$config["db"]["pass"] = '1234';
$config["db"]["db"] = 'apartaments_figuerencs';
$config["db"]["host"] = 'localhost';