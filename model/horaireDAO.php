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
            header('Location:index.php?action=horaires');
        }
        
        
        public function getAllHoraires(){
            $selectAll = "SELECT * from horaire";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $HoraireDATA = array();
            $AllBHoraire = $stmt->fetchAll();
            foreach($AllBHoraire as $horaire){
                $HoraireDATA[] = new Horaire($horaire['idHoraire'],$horaire['idRout'],$horaire['idBus'],$horaire['date_'],$horaire['heur_depart'],$horaire['heur_arrivee'],$horaire['sieges_dispo']);
            }
            return $HoraireDATA;
        }
        public function getHoraireById($id){
            $selectAll = "SELECT * from horaire where idHoraire='$id'";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $horaire = $stmt->fetch();
                $HoraireDATA = new Horaire($horaire['idHoraire'],$horaire['idRout'],$horaire['idBus'],$horaire['date_'],$horaire['heur_depart'],$horaire['heur_arrivee'],$horaire['sieges_dispo']);
            return $HoraireDATA;
        }
        public function searchHoraires($vDepart,$vArrivee,$date,$sieges){
            $selectAll = "SELECT * FROM horaire inner join routee r on horaire.idRout=r.idRout where  r.ville_departID = '$vDepart' and r.ville_arriveeID = '$vArrivee'  and date_ >= '$date' AND sieges_dispo >= '$sieges' GROUP by horaire.idHoraire;";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $HoraireDATA = array();
            $AllHoraire = $stmt->fetchAll();
            foreach($AllHoraire as $horaire){
                $HoraireDATA[] = new Horaire($horaire['idHoraire'],$horaire['idRout'],$horaire['idBus'],$horaire['date_'],$horaire['heur_depart'],$horaire['heur_arrivee'],$horaire['sieges_dispo']);
            }
            return $HoraireDATA;
        }
        
        
        public function UpdateHoraire($idHoraire,$idRoute, $idBus, $date_, $heure_depart, $heure_arrivee, $sieges_dispo){
            $UpdateHoraire = "UPDATE horaire set idRout = '$idRoute', idBus = '$idBus',date_ = '$date_',heur_depart = '$heure_depart',heur_arrivee = '$heure_arrivee',sieges_dispo = '$sieges_dispo' where idHoraire='$idHoraire'";
            $stmt = $this->pdo->prepare($UpdateHoraire);
            $stmt->execute();
            header('Location:index.php?action=horaires');
        }
        
        
        public function DeleteHoraire($idHoraire){
            $DeleteHoraire = "DELETE from horaire where idHoraire=$idHoraire";
            $stmt = $this->pdo->prepare($DeleteHoraire);
            $stmt->execute();
            header('Location:index.php?action=horaires');
        }
    }
?>