<?php
include_once 'model/config/connexion.php';
include_once 'model/ville.php';
    class VilleDAO{
        private $pdo;

        public function __construct(){
            $this->pdo = Database::getInstance()->getConnection(); 
        }

        // public function addRoute($idRout,$ville_departID,$ville_arriveeID,$duree,$distance){
        //     $insert = "INSERT INTO routee VALUES(0,'$ville_departID', '$ville_arriveeID','$duree','$distance')";
        //     $stmt = $this->pdo->prepare($insert);
        //     $stmt->execute();
        // }
        
        
        public function getAllVilles(){
            $selectAll = "SELECT * from ville";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $VilleDATA = array();
            $AllVille = $stmt->fetchAll();
            foreach($AllVille as $Ville){
                $VilleDATA[] = new Ville($Ville['idVille'],$Ville['ville_name']);
            }
            return $VilleDATA;
        }
        
        
        // public function UpdateRoute($idRout,$ville_departID,$ville_arriveeID,$duree,$distance){
        //     $UpdateRoute = "UPDATE routee set ville_departID = $ville_departID,ville_arriveeID = $ville_arriveeID,duree = $duree,distance = $distance where idRoute=$idRoute";
        //     $stmt = $this->pdo->prepare($UpdateHoraire);
        //     $stmt->execute();
        // }
        
        
        // public function DeleteRoute($idRout){
        //     $DeleteRoute = "DELETE from routee where idRout=$idRout";
        //     $stmt = $this->pdo->prepare($DeleteRoute);
        //     $stmt->execute();
        // }
    }
?>