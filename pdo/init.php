<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

//include "config.php";

$examples = array();

$dsn = 'mysql:dbname=apartaments_figuerencs;host=localhost';
$user = 'root';
$password = '';
try {
    $sql = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die('Ha fallat la connexió: ' . $e->getMessage());
}

// print_r($sql);

// die();