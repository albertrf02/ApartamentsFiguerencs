<?php

namespace Daw;

class Db
{

    public $sql;

    public function __construct($user, $pass, $db, $host)
    {

        $dsn = "mysql:dbname={apartaments_figuerencs};host={localhost}";
        try {
            $this->sql = new \PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->sql;
    }
}