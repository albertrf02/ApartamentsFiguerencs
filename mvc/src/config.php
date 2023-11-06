<?php

$config = [
    "db" => [
        "user" => "root",
        "pass" => "",
        "db" => "apartaments_figuerencs",
        "host" => "localhost"
    ],
];




include '../src/models/Db.php';
include '../src/models/LoginUser.php';
include '../src/models/UploadUser.php';
include '../src/models/Users.php';
include '../src/models/apartaments.php';
