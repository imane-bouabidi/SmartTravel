<?php
include_once 'model\horaireDAO.php';
include_once 'model\busDAO.php';
include_once 'model\routDAO.php';
class HoraireController
{

    function getAllHoraires()
    {
        $horaires = new horaireDAO();
        $horairesDATA = $horaires->getAllHoraires();
        include 'view\horaireView.php';
    }

    function addHoraire()
    {
        $idRout = $_POST["idRout"];
        $idBus = $_POST["idBus"];
        $date_ = $_POST["date_"];
        $heur_depart = $_POST["heur_depart"];
        $heur_arrivee = $_POST["heur_arrivee"];
        $sieges_dispo = $_POST["sieges_dispo"];
        $price = $_POST["price"];
        $horaires = new horaireDAO();
        $horairesDATA = $horaires->addHoraire($idRout, $idBus, $date_, $heur_depart, $heur_arrivee, $sieges_dispo, $price);
        include('view/addHoraire.php');
    }

    function ShowAddHoraire()
    {
        $busDAO = new busDAO();
        $busesDATA = $busDAO->getAllBus();
        $routeDAO = new RouteDAO();
        $routeDATA = $routeDAO->getAllRoute();
        include('view/addHoraire.php');
    }

    function updateForm()
    {
        $id = $_GET['id'];
        $busDAO = new busDAO();
        $busesDATA = $busDAO->getAllBus();
        $routeDAO = new RouteDAO();
        $routeDATA = $routeDAO->getAllRoute();
        $horaire = new horaireDAO();
        $horaireDATA = $horaire->getHoraireById($id);
        include 'view/updateHoraire.php';
    }

    function updateHoraire()
    {
        $id = $_GET['id'];
        $idRout = $_POST["idRout"];
        $idBus = $_POST["idBus"];
        $date_ = $_POST["date_"];
        $heur_depart = $_POST["heur_depart"];
        $heur_arrivee = $_POST["heur_arrivee"];
        $sieges_dispo = $_POST["sieges_dispo"];
        $horaire = new horaireDAO();
        $horaireDATA = $horaire->UpdateHoraire($id, $idRout, $idBus, $date_, $heur_depart, $heur_arrivee, $sieges_dispo);
        include 'view/updateRoute.php';
    }
    function searchHoraire()
    {
        $vDepart = $_POST["vDepart"];
        $vArrivee = $_POST["vArrivee"];
        $date = $_POST["date"];
        $NumCustom = $_POST["NumCustom"];

        if (isset($_POST["vDepart"])) $_SESSION["vDepart"] = $_POST["vDepart"];
        if (isset($_POST["vArrivee"])) $_SESSION["vArrivee"] = $_POST["vArrivee"];
        if (isset($_POST["date"])) $_SESSION["date"] = $_POST["date"];
        if (isset($_POST["NumCustom"])) $_SESSION["NumCustom"] = $_POST["NumCustom"];

        $minPrice = isset($_POST["minPrice"]) ? $_POST["minPrice"] : null;
        $maxPrice = isset($_POST["maxPrice"]) ? $_POST["maxPrice"] : null;
        $selectedCompanies = isset($_POST["selectedCompanies"]) ? $_POST["selectedCompanies"] : array();
        $selectedTimes = isset($_POST["selectedTimes"]) ? $_POST["selectedTimes"] : array();
        $ville = new VilleDAO();
        $villesDATA = $ville->getAllVilles();
        $horaire = new horaireDAO();
        $HorairesDATA = $horaire->searchHoraires($vDepart, $vArrivee, $date, $NumCustom, $minPrice, $maxPrice, $selectedCompanies, $selectedTimes);
        $horaireDATA = $HorairesDATA['HoraireDATA'];
        $entreprisesDATA = $HorairesDATA['entreprisesDATA'];
        include_once 'view/homeUser.php';
    }


    function filtreHoraire()
    {

        $vDepart = isset($_SESSION["vDepart"]) ? $_SESSION["vDepart"] : null;
        $vArrivee = isset($_SESSION["vArrivee"]) ? $_SESSION["vArrivee"] : null;
        $date = isset($_SESSION["date"]) ? $_SESSION["date"] : null;
        $NumCustom = isset($_SESSION["NumCustom"]) ? $_SESSION["NumCustom"] : null;

        $minPrice = isset($_POST["minPrice"]) ? $_POST["minPrice"] : null;
        $maxPrice = isset($_POST["maxPrice"]) ? $_POST["maxPrice"] : null;
        $selectedCompanies = isset($_POST["selectedCompanies"]) ? $_POST["selectedCompanies"] : array();
        $selectedTimes = isset($_POST["selectedTimes"]) ? $_POST["selectedTimes"] : array();
        $ville = new VilleDAO();
        $villesDATA = $ville->getAllVilles();
        $horaire = new horaireDAO();

        $HorairesDATA = $horaire->searchHoraires($vDepart, $vArrivee, $date, $NumCustom, $minPrice, $maxPrice, $selectedCompanies, $selectedTimes);
        $horaireDATA = $HorairesDATA['HoraireDATA'];
        $entreprisesDATA = $HorairesDATA['entreprisesDATA'];
        include_once 'view/filtragePage.php';
    }


    function delete_Horaire()
    {
        $id = $_GET['id'];
        $horaire = new horaireDAO();
        $horaire->DeleteHoraire($id);
    }
}
