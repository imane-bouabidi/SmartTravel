<?php
include_once 'model/config/connexion.php';
include_once 'model/horaire.php';
    class horaireDAO{
        private $pdo;

        public function __construct(){
            $this->pdo = Database::getInstance()->getConnection(); 
        }

        public function addHoraire($idRoute, $idBus, $date_, $heure_depart, $heure_arrivee, $sieges_dispo){
            $insert = "INSERT INTO horaire VALUES(0,'$idRoute', '$idBus', '$date_','$heure_depart','$heure_arrivee','$sieges_dispo')";
            $stmt = $this->pdo->prepare($insert);
            $stmt->execute();
        }
        
        
        public function getAllHoraires(){
            $selectAll = "SELECT * from horaire";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $HoraireDATA = array();
            $AllBHoraire = $stmt->fetchAll();
            foreach($AllBHoraire as $horaire){
                $HoraireDATA[] = new Horaire($horaire['idHoraire'],$horaire['idRoute'],$horaire['idBus'],$horaire['date_'],$horaire['heur_depart'],$horaire['heur_arrivee'],$horaire['sieges_dispo']);
            }
            return $HoraireDATA;
        }
        
        
        public function UpdateHoraire($idHoraire,$idRoute, $idBus, $date_, $heure_depart, $heure_arrivee, $sieges_dispo){
            $UpdateHoraire = "UPDATE horaire set idRoute = $idRoute, idBus = $idBus,date_ = $date_,heure_depart = $heure_depart,heure_arrivee = $heure_arrivee,sieges_dispo = $sieges_dispo where idHoraire=$idHoraire";
            $stmt = $this->pdo->prepare($UpdateHoraire);
            $stmt->execute();
        }
        
        
        public function DeleteHoraire($idHoraire){
            $DeleteHoraire = "DELETE from horaire where idHoraire=$idHoraire";
            $stmt = $this->pdo->prepare($DeleteHoraire);
            $stmt->execute();
        }
    }
?>