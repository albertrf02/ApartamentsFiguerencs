<?php

namespace Daw;

class Users
{

    public $sql;

    public function __construct($sql)
    {
        $this->sql = $sql;
    }

    public function getAll()
    {
        $tasks = array();
        $query = "select id, user, pass from users;";
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $task) {
            $tasks[] = $task;
        }

        return $tasks;
    }

    // public function add($task) {
    //     $stm = $this->sql->prepare('insert into tasks (task,deleted) values (:task, 0);');
    //     $result = $stm->execute([':task' => $task]);
    // }


    public function login($user, $pass)
    {
        $stm = $this->sql->prepare('select id, user, pass from users where user=:user;');
        $stm->execute([':user' => $user]);
        $result = $stm->fetch(\PDO::FETCH_ASSOC);
        if (is_array($result) && $result["pass"] == $pass) {
            return $result;
        } else {
            return false;
        }
    }

    public function getById($id)
    {
        $stm = $this->sql->prepare('select * from usuari where id=:id;');
        $stm->execute([':id' => $id]);
        $result = $stm->fetch(\PDO::FETCH_ASSOC);
        if (is_array($result)) {
            return $result;
        } else {
            return false;
        }
    }

    public function updateUser($id, $nom, $cognoms, $correuelectronic, $contrasenya, $telefon, $numTargetaCredit)
    {

        $stm = $this->sql->prepare('update usuari set Nom=:Nom, Cognoms=:Cognoms, CorreuElectronic=:CorreuElectronic, Contrasenya=:Contrasenya, Telefon=:Telefon, NumTargetaCredit=:NumTargetaCredit where id=:id;');
        $result = $stm->execute([':id' => $id, ':Nom' => $nom, ':Cognoms' => $cognoms, ':CorreuElectronic' => $correuelectronic, ':Contrasenya' => $contrasenya, ':Telefon' => $telefon, ':NumTargetaCredit' => $numTargetaCredit]);



        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllUsers()
    {
        $users = array();
        $query = "select * from usuari;";
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $user) {
            $users[] = $user;
        }

        return $users;
    }


}