<?php

include "controller/busController.php" ;
include "controller/horaireController.php" ;
$contoller_Bus = new BusController() ;
$contoller_horaire = new HoraireController() ;


// $contoller_horaire->getAllHoraires();


if(isset($_GET['action'])) {
    $action = $_GET['action'] ;
    switch($action) {
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


    }
}else{
    $contoller_Bus->getAllBus();
}
?>