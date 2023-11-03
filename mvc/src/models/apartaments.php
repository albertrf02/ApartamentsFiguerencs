<?php
namespace Daw;

class Apartaments
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll($datepicker, $datepicker2, $numPersones)
    {
        $stm = $this->db->prepare("SELECT Apartament.*, Imatges.Enlace
        FROM Apartament
        JOIN Imatges ON Imatges.IdApartament = Apartament.Id
        WHERE :numPersones <= Apartament.numPersones
        and Apartament.Id NOT IN (
            SELECT IdApartament
            FROM Reserva
            WHERE dataEntrada BETWEEN :datepicker AND :datepicker2
            or dataSortida BETWEEN :datepicker AND :datepicker2
            or :datepicker BETWEEN DataEntrada AND DataSortida
            or :datepicker2 BETWEEN DataEntrada AND DataSortida
        );
        ");
        $stm->bindParam(':datepicker', $datepicker);
        $stm->bindParam(':datepicker2', $datepicker2);
        $stm->bindParam(':numPersones', $numPersones);
        $stm->execute();

        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
    }
    // public function getModal($id)
    // {
    //     $stm = $this->db->prepare("SELECT Apartament.*, Imatges.Enlace
    //     FROM Apartament
    //     JOIN Imatges ON Imatges.IdApartament = Apartament.Id
    //     WHERE Apartament.Id = :id
    //     ");
    //     $stm->bindParam(':id', $_GET['id']);
    //     echo $_GET['id'];
    //     $stm->execute();
    //     $tasks = array();
    //     while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
    //         $tasks[] = $task;
    //     }
    //     return $tasks;
    // }
    public function getModal()
    {
        $stm = $this->db->prepare("SELECT Apartament.*, Imatges.Enlace
        FROM Apartament
        JOIN Imatges ON Imatges.IdApartament = Apartament.Id
        WHERE Apartament.Id = :id
        ");
        $stm->bindParam(':id', $_GET['id']);
        // echo $_GET['id'];
        // echo $nom;
        $stm->execute();
        return $stm->fetch(\PDO::FETCH_ASSOC);

    }
    // public function get($id)
    // {
    //     $query = 'select id, title, url_image as url from gallery where id=:id;';
    //     $stm = $this->sql->prepare($query);
    //     $result = $stm->execute([':id' => $id]);

    //     if ($stm->errorCode() !== '00000') {
    //         $err = $stm->errorInfo();
    //         $code = $stm->errorCode();
    //         die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
    //     }
        
    //     return $stm->fetch(\PDO::FETCH_ASSOC);
    // }

};