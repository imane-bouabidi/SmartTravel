<?php
include_once 'model/config/connexion.php';
include_once 'model/horaire.php';
include_once 'model/searchClass.php';
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
            $selectAll = "SELECT 
            horaire.idHoraire,
            ville.ville_name AS ville_depart,
            ville_arrivee.ville_name AS ville_arrivee,
            horaire.date_,
            horaire.heur_depart,
            horaire.heur_arrivee,
            horaire.sieges_dispo,
            entreprise.name AS company_name,
            entreprise.image AS company_image,
            routee.duree
        FROM horaire 
        INNER JOIN routee ON horaire.idRout = routee.idRout 
        INNER JOIN ville ON routee.ville_departID = ville.idVille
        INNER JOIN ville AS ville_arrivee ON routee.ville_arriveeID = ville_arrivee.idVille
        INNER JOIN bus ON horaire.idBus = bus.idBus
        INNER JOIN entreprise ON bus.idEntreprise = entreprise.idEntreprise
        WHERE routee.ville_departID = '$vDepart' 
            AND routee.ville_arriveeID = '$vArrivee' 
            AND horaire.date_ >= '$date' 
            AND horaire.sieges_dispo >= '$sieges'
        GROUP BY horaire.idHoraire;
        ";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $HoraireDATA = array();
            $AllHoraire = $stmt->fetchAll();
            foreach($AllHoraire as $horaire){
                $HoraireDATA[] = new Search($horaire['idHoraire'],$horaire['ville_depart'],$horaire['ville_arrivee'],$horaire['date_'],$horaire['heur_depart'],$horaire['heur_arrivee'],$horaire['sieges_dispo'],$horaire['company_name'],$horaire['company_image'],$horaire['duree']);
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