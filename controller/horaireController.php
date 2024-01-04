<?php
include_once 'model\horaireDAO.php';
include_once 'model\busDAO.php';
include_once 'model\routDAO.php';

class HoraireController{

    function getAllHoraires(){
        $horaires = new horaireDAO();
        $horairesDATA = $horaires->getAllHoraires();
        include 'view\horaireView.php';
    }

    function addHoraire(){
        $idRout = $_POST["idRout"] ; 
        $idBus = $_POST["idBus"] ; 
        $date_ = $_POST["date_"] ; 
        $heur_depart = $_POST["heur_depart"] ; 
        $heur_arrivee = $_POST["heur_arrivee"] ; 
        $sieges_dispo = $_POST["sieges_dispo"] ; 
        $horaires = new horaireDAO();
        $horairesDATA = $horaires->addHoraire($idRout,$idBus,$date_,$heur_depart,$heur_arrivee,$sieges_dispo);
        include('view/addHoraire.php');
    }
    
    function ShowAddHoraire(){
        $busDAO = new busDAO();
        $busesDATA = $busDAO->getAllBus();
        $routeDAO = new RouteDAO();
        $routeDATA = $routeDAO->getAllRoute();
        include('view/addHoraire.php');
    }

    function updateForm(){
        $id = $_GET['id'];
        $busDAO = new busDAO();
        $busesDATA = $busDAO->getAllBus();
        $routeDAO = new RouteDAO();
        $routeDATA = $routeDAO->getAllRoute();
        $horaire = new horaireDAO();
        $horaireDATA = $horaire->getHoraireById($id);
        include 'view/updateHoraire.php';
    }

    function updateHoraire(){
        $id = $_GET['id'];
        $idRout = $_POST["idRout"] ; 
        $idBus = $_POST["idBus"] ; 
        $date_ = $_POST["date_"] ; 
        $heur_depart = $_POST["heur_depart"] ; 
        $heur_arrivee = $_POST["heur_arrivee"] ; 
        $sieges_dispo = $_POST["sieges_dispo"] ; 
        $horaire = new horaireDAO();
        $horaireDATA = $horaire->UpdateHoraire($id,$idRout,$idBus,$date_,$heur_depart,$heur_arrivee,$sieges_dispo);
        include 'view/updateRoute.php';
    }
    function searchHoraire(){
        $vDepart = $_POST["vDepart"] ; 
        $vArrivee = $_POST["vArrivee"] ; 
        $date = $_POST["date"] ; 
        $NumCustom = $_POST["NumCustom"] ; 
        $ville = new VilleDAO();
        $villesDATA = $ville->getAllVilles();
        $horaire = new horaireDAO();
        $HorairesDATA = $horaire->searchHoraires($vDepart,$vArrivee,$date,$NumCustom);
        $horaireDATA = $HorairesDATA['HoraireDATA'];
        $entreprisesDATA = $HorairesDATA['entreprisesDATA'];
        include 'view/homeUser.php';
    }

    function delete_Horaire(){
        $id = $_GET['id'];
        $horaire = new horaireDAO();
        $horaire->DeleteHoraire($id);
    }
}
?>