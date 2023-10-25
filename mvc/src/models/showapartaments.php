<?php 
namespace Daw;
class Showapartaments {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll(){
        $stm = $this->db->prepare("select Apartament.Titol,Apartament.NumHabitacions, Imatges.Enlace from Apartament 
        join Imatges on Imatges.Id_Apartament = Apartament.Id_Apartament;");
        $stm->execute([]);
        
        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
    }
}
