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
        JOIN Imatges ON Imatges.Id_Apartament = Apartament.Id
        WHERE :numPersones <= Apartament.numPersones
        and Apartament.Id NOT IN (
            SELECT Id
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
}
;