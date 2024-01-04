<?php
include_once 'model/config/connexion.php';
include_once 'model/horaire.php';
include_once 'model/searchClass.php';
    class horaireDAO{
        private $pdo;

        public function __construct(){
            $this->pdo = Database::getInstance()->getConnection(); 
        }

        public function addHoraire($idRoute, $idBus, $date_, $heure_depart, $heure_arrivee, $sieges_dispo,$price){
            $insert = "INSERT INTO horaire VALUES(0,'$idRoute', '$idBus', '$date_','$heure_depart','$heure_arrivee','$sieges_dispo','$price')";
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
                $HoraireDATA[] = new Horaire($horaire['idHoraire'],$horaire['idRout'],$horaire['idBus'],$horaire['date_'],$horaire['heur_depart'],$horaire['heur_arrivee'],$horaire['sieges_dispo'],$horaire['price']);
            }
            return $HoraireDATA;
        }
        public function getHoraireById($id){
            $selectAll = "SELECT * from horaire where idHoraire='$id'";
            $stmt = $this->pdo->prepare($selectAll);
            $stmt->execute();
            $horaire = $stmt->fetch();
                $HoraireDATA = new Horaire($horaire['idHoraire'],$horaire['idRout'],$horaire['idBus'],$horaire['date_'],$horaire['heur_depart'],$horaire['heur_arrivee'],$horaire['sieges_dispo'],$horaire['price']);
            return $HoraireDATA;
        }
        public function searchHoraires($vDepart, $vArrivee, $date, $sieges, $minPrice, $maxPrice,$selectedCompanies){
            // Construisez la requête SQL en fonction des filtres fournis
            $selectQuery = "SELECT 
                horaire.idHoraire,
                ville.ville_name AS ville_depart,
                ville_arrivee.ville_name AS ville_arrivee,
                horaire.date_,
                horaire.heur_depart,
                horaire.heur_arrivee,
                horaire.sieges_dispo,
                horaire.price,
                entreprise.name AS company_name,
                entreprise.idEntreprise AS company_idEntreprise,
                entreprise.image AS company_image,
                routee.duree
            FROM horaire 
            INNER JOIN routee ON horaire.idRout = routee.idRout 
            INNER JOIN ville ON routee.ville_departID = ville.idVille
            INNER JOIN ville AS ville_arrivee ON routee.ville_arriveeID = ville_arrivee.idVille
            INNER JOIN bus ON horaire.idBus = bus.idBus
            INNER JOIN entreprise ON bus.idEntreprise = entreprise.idEntreprise
            WHERE routee.ville_departID = :vDepart
                AND routee.ville_arriveeID = :vArrivee
                AND horaire.date_ >= :date
                AND horaire.sieges_dispo >= :sieges";
        
            // Ajoutez les conditions des filtres optionnels
            if (!empty($selectedCompanies)) {
                echo $selectedCompanies[0];
                $selectQuery .= " AND entreprise.idEntreprise IN (" . implode(",", $selectedCompanies) . ")";
        }
            if (!empty($minPrice)) {
                $selectQuery .= " AND horaire.price >= :minPrice";
            }
        
            if (!empty($maxPrice)) {
                $selectQuery .= " AND horaire.price <= :maxPrice";
            }
        
            // Groupez par ID pour éviter les doublons
            // $selectQuery .= " GROUP BY horaire.idHoraire";
        
            // Préparez la requête
            $stmt = $this->pdo->prepare($selectQuery);
        
            // Liez les paramètres
            $stmt->bindParam(':vDepart', $vDepart);
            $stmt->bindParam(':vArrivee', $vArrivee);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':sieges', $sieges);
        
            // Liez les paramètres des filtres optionnels
            if (!empty($minPrice)) {
                $stmt->bindParam(':minPrice', $minPrice);
            }
        
            if (!empty($maxPrice)) {
                $stmt->bindParam(':maxPrice', $maxPrice);
            }
            // echo $selectQuery;
            // Exécutez la requête
            $stmt->execute();
        
            // Traitez les résultats comme auparavant
            $HoraireDATA = array();
            $villesDATA = array();
            $AllHoraire = $stmt->fetchAll();
            foreach($AllHoraire as $horaire){
                $HoraireDATA[] = new Search($horaire['idHoraire'],$horaire['ville_depart'],$horaire['ville_arrivee'],$horaire['date_'],$horaire['heur_depart'],$horaire['heur_arrivee'],$horaire['sieges_dispo'],$horaire['price'],$horaire['company_name'],$horaire['company_image'],$horaire['duree']);
                $entreprisesDATA[] = new Entreprise($horaire['company_idEntreprise'],$horaire['company_name'],"","");
            }
        
            return ['HoraireDATA' => $HoraireDATA, 'entreprisesDATA' => $entreprisesDATA];
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