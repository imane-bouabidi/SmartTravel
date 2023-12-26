<?php
include_once 'model/busDAO.php';

class BusController{

    function getAllBus(){
        $busDATA = new busDAO();
        $buses = $busDATA->getAllBus();

        include 'view/bus.php';
    }
}

?>