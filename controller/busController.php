<?php
include_once 'model/busDAO.php';

class BusController{

    function getAllBus(){
        $busDATA = new busDAO();
        $buses = $busDATA->getAllBus();

        include 'view/bus.php';
    }
    
    function updateForm(){
        $id = $_GET['id'];
        $busDATA = new busDAO();
        $bus = $busDATA->getBusById($id);
        $companies = $busDATA->getAllCompanies();
        include 'view/updateBus.php';
    }

    function showAddBus(){
        $busDATA = new busDAO();
        $companies = $busDATA->getAllCompanies();
        include 'view\addBus.php';
    }
    
    
    function addBus(){
        $busNum = $_POST["busNum"] ; 
        $immat = $_POST["immat"] ; 
        $company = $_POST["company"] ; 
        $capacity = $_POST["capacity"] ; 
        $bus = new busDAO();
        $addBus = $bus->addBus($busNum,$immat,$company,$capacity);
        include 'view/bus.php';
    }
    
    function updateBus(){
        $id = $_GET['id'];
        // $busId = $_POST["busId"] ; 
        $busNum = $_POST["busNum"] ; 
        $immat = $_POST["immat"] ; 
        $company = $_POST["company"] ; 
        $capacity = $_POST["capacity"] ; 
        $bus = new busDAO();
        $UpdateBus = $bus->UpdateBus($id,$busNum,$immat,$company,$capacity);
        include 'view/updateBus.php';
    }

    function delete_bus(){
        $id = $_GET['id'];
        $bus = new busDAO();
        $bus->DeleteBus($id);
    }
}

?>