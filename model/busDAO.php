<?php
include_once 'model/config/connexion.php';
include_once 'model/bus.php';
    class busDAO{
        private $pdo;

        public function __construct(){
            $this->pdo = Database::getInstance()->getConnection(); 
        }

        public function addBus($numBus, $immat, $idEntre, $capacity){
            $insert = "INSERT INTO bus VALUES(0,'$numBus', '$immat', '$idEntre','$capacity')";
            $stmt = $this->pdo->prepare($insert);
            $stmt->execute();
        }
        
        
        public function getAllBus(){
            $selectAll = "SELECT * from bus";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $BusDATA = array();
            $AllBus = $stmt->fetchAll();
            foreach($AllBus as $bus){
                $BusDATA[] = new Bus($bus['idBus'],$bus['Num_Bus'],$bus['immatricule'],$bus['idEntreprise'],$bus['capacite']);
            }
            return $BusDATA;
        }
        
        
        public function UpdateBus($idBus,$numBus, $immat, $idEntre, $capacity){
            $UpdateBus = "UPDATE bus set NumBus = $numBus, immatricule = $immat,idEntreprise = $idEntre,capacite = $capacity where idBus=$idBus";
            $stmt = $this->pdo->prepare($UpdateBus);
            $stmt->execute();
        }
        
        
        public function DeleteBus($idBus){
            $DeleteBus = "DELETE from bus where idBus=$idBus";
            $stmt = $this->pdo->prepare($DeleteBus);
            $stmt->execute();
        }
    }
?>