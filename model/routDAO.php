<?php
include_once 'model/config/connexion.php';
include_once 'model/route.php';
    class RouteDAO{
        private $pdo;

        public function __construct(){
            $this->pdo = Database::getInstance()->getConnection(); 
        }

        public function addRoute($ville_departID,$ville_arriveeID,$duree,$distance){
            $insert = "INSERT INTO routee VALUES(0,'$ville_departID', '$ville_arriveeID','$duree','$distance')";
            $stmt = $this->pdo->prepare($insert);
            $stmt->execute();
            header('Location:index.php?action=routes');
        }
        
        
        public function getAllRoute(){
            $selectAll = "SELECT * from routee";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $RouteDATA = array();
            $AllRoute = $stmt->fetchAll();
            foreach($AllRoute as $Route){
                $RouteDATA[] = new Route($Route['idRout'],$Route['ville_departID'],$Route['ville_arriveeID'],$Route['duree'],$Route['distance']);
            }
            return $RouteDATA;
        }
        public function getRouteById($id){
            $selectAll = "SELECT * from routee where idRout = '$id'";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $Route = $stmt->fetch();
            $RouteDATA = new Route($Route['idRout'],$Route['ville_departID'],$Route['ville_arriveeID'],$Route['duree'],$Route['distance']);
            return $RouteDATA;
        }

        
        
        public function UpdateRoute($idRout, $ville_departID, $ville_arriveeID, $duree, $distance){
            $updateRoute = "UPDATE routee SET ville_departID = :ville_departID, ville_arriveeID = :ville_arriveeID, duree = :duree, distance = :distance WHERE idRout = :idRout";
            $stmt = $this->pdo->prepare($updateRoute);
            $stmt->bindParam(':ville_departID', $ville_departID);
            $stmt->bindParam(':ville_arriveeID', $ville_arriveeID);
            $stmt->bindParam(':duree', $duree);
            $stmt->bindParam(':distance', $distance);
            $stmt->bindParam(':idRout', $idRout);
            $stmt->execute();
            header('Location:index.php?action=routes');
        }
        
        
        
        public function DeleteRoute($idRout){
            $DeleteRoute = "DELETE from routee where idRout=$idRout";
            $stmt = $this->pdo->prepare($DeleteRoute);
            $stmt->execute();
            header('Location:index.php?action=routes');
        }
    }
?>