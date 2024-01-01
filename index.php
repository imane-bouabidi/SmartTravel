<?php

include "controller/busController.php" ;
include "controller/horaireController.php" ;
include "controller/routeController.php" ;
include "controller/homeController.php" ;
$contoller_Bus = new BusController() ;
$contoller_horaire = new HoraireController() ;
$contoller_route = new RouteController() ;
$contoller_home = new HomeController() ;


// $contoller_horaire->getAllHoraires();


if(isset($_GET['action'])) {
    $action = $_GET['action'] ;
    switch($action) {
        case 'home':
            $contoller_home->showHome();
            break;
        case 'buses':
            $contoller_Bus->getAllBus();
            break;
        case 'add_bus':
            $contoller_Bus->showAddBus();
            break;
        case 'addBus':
            $contoller_Bus->addBus();
            break;
        case 'updateBus':
            $contoller_Bus->updateForm();
            break;
        case 'updateBusSubmit':
            $contoller_Bus->updateBus();
            break;
        case 'delete_bus':
            $contoller_Bus->delete_bus();
            break;
        case 'horaires':
            $contoller_horaire->getAllHoraires();
            break;
        case 'routes':
            $contoller_route->getAllRoutes();
            break;
        case 'add_route':
            $contoller_route->ShowAddRoute();
            break;
        case 'addRoute':
            $contoller_route->addRoutes();
            break;
        case 'updateroute':
            $contoller_route->updateForm();
            break;
        case 'updateRouteSubmit':
            $contoller_route->updateRoute();
            break;
        case 'delete_route':
            $contoller_route->delete_Route();
            break;
        case 'ShowAddHoraire':
            $contoller_horaire->ShowAddHoraire();
            break;
        case 'addHoraire':
            $contoller_horaire->addHoraire();
            break;
        case 'showUpdateHoraire':
            $contoller_horaire->updateForm();
            break;
        case 'UpdateHoraire':
            $contoller_horaire->updateHoraire();
            break;
        case 'deleteHoraire':
            $contoller_horaire->delete_Horaire();
            break;
        case 'search':
            $contoller_horaire->searchHoraire();
            break;


    }
}else{
    $contoller_home->showHome();
}
?>