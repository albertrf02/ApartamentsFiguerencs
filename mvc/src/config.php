<?php

$config = [
    "db" => [
        "user" => "root",
        "pass" => "1234",
        "db" => "apartaments_figuerencs",
        "host" => "localhost"
    ],
];




include '../src/models/Db.php';
include '../src/models/LoginUser.php';
include '../src/models/UploadUser.php';
include '../src/models/Users.php';
include '../src/models/apartaments.php';
include '../src/models/reservaModel.php';