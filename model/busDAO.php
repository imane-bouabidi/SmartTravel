<?php
include_once 'model/config/connexion.php';
include_once 'model/bus.php';
include_once 'model/entreprise.php';
    class busDAO{
        private $pdo;

        public function __construct(){
            $this->pdo = Database::getInstance()->getConnection(); 
        }

        public function addBus($numBus, $immat, $idEntre, $capacity){
            $insert = "INSERT INTO bus VALUES(0,'$numBus', '$immat', '$idEntre','$capacity')";
            $stmt = $this->pdo->prepare($insert);
            $stmt->execute();
            header('Location:index.php');
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
        
        
        public function getAllCompanies(){
            $selectAll = "SELECT * from entreprise";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $CompaniesDATA = array();
            $AllCompanies = $stmt->fetchAll();
            foreach($AllCompanies as $comp){
                $CompaniesDATA[] = new Entreprise($comp['idEntreprise'],$comp['name'],$comp['short_name'],$comp['image']);
            }
            return $CompaniesDATA;
        }
        
        public function getBusById($id){
            $selectAll = "SELECT * from bus where idBus = '$id'";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $bus = $stmt->fetch();
            $BusDATA = new Bus($bus['idBus'], $bus['Num_Bus'], $bus['immatricule'], $bus['idEntreprise'], $bus['capacite']);
            return $BusDATA;
        }
        
        
        public function UpdateBus($idBus,$numBus, $immat, $idEntre, $capacity){
            $UpdateBus = "UPDATE bus set Num_Bus = '$numBus', immatricule = '$immat',idEntreprise = '$idEntre',capacite = '$capacity' where idBus='$idBus'";
            $stmt = $this->pdo->prepare($UpdateBus);
            $stmt->execute();
            header('Location:index.php');
        }
        
        
        public function DeleteBus($idBus){
            $DeleteBus = "DELETE from bus where idBus='$idBus'";
            $stmt = $this->pdo->prepare($DeleteBus);
            $stmt->execute();
            header('Location:index.php');
        }
    }
?>