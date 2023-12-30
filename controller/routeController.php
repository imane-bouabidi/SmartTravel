<?php
include_once 'model/routDAO.php';
include_once 'model/villeDAO.php';

class RouteController{

    function getAllRoutes(){
        $routes = new RouteDAO();
        $routesDATA = $routes->getAllRoute();
        include 'view/showRoutes.php';
    }
    
    function addRoutes(){
        $ville_departID = $_POST["ville_departID"] ; 
        $ville_arriveeID = $_POST["ville_arriveeID"] ; 
        $duree = $_POST["duree"] ; 
        $distance = $_POST["distance"] ; 
        $routes = new RouteDAO();
        $routesDATA = $routes->addRoute($ville_departID,$ville_arriveeID,$duree,$distance);
        include('view/addRoute.php');
    }
    
    function ShowAddRoute(){
        $villes = new VilleDAO();
        $villesDATA =  $villes->getAllVilles();
        include('view/addRoute.php');
    }

    function updateForm(){
        $id = $_GET['id'];
        $RouteDATA = new RouteDAO();
        $CitiesDATA = new VilleDAO();
        $route = $RouteDATA->getRouteById($id);
        $villesDATA = $CitiesDATA->getAllVilles();
        include 'view/updateRoute.php';
    }

    function updateRoute(){
        $id = $_GET['id'];
        // $busId = $_POST["busId"] ; 
        $ville_departID = $_POST["ville_departID"] ; 
        $ville_arriveeID = $_POST["ville_arriveeID"] ; 
        $duree = $_POST["duree"] ; 
        $distance = $_POST["distance"] ; 
        $route = new RouteDAO();
        $updateRoute = $route->UpdateRoute($id,$ville_departID,$ville_arriveeID,$duree,$distance);
        include 'view/updateRoute.php';
    }

    function delete_Route(){
        $id = $_GET['id'];
        $bus = new RouteDAO();
        $bus->DeleteRoute($id);
    }
}
?>