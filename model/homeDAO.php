<?php

include_once 'DatabaseDAO.php';
include_once 'RouteDAO.php';
include_once 'BusDAO.php';
include_once 'Schedule.php';

class HomeDAO{
    private $pdo;

        public function __construct(){
            $this->pdo = Database::getInstance()->getConnection(); 
        }
    public function getScheduelByEndCityStartCity($endCity,$StartCity,$date,$places){
        
        $query = "SELECT * FROM horaire inner join routee r on horaire.idRout=r.idRout  WHERE date_ >= :date AND sieges_dispo >= :places AND r.ville_departID = :startCity and r.ville_arriveeID = :endCity";
        $params = [
            ':date' => $date,
            ':endCity' => $endCity,
            ':startCity' => $StartCity,
            ':places'=>$places
        ];
        $result= $this->fetch($query, $params);
        $BusDao=new BusDao();
        $RouteDao=new RouteDao();
        $bus=$BusDao->getBusById($result['busID']);
        $route=$RouteDao->getRouteById($result['routeID']);
        return new Schedule($result['scheduleID'],$result['date'],$result['departureTime'],$result['arrivalTime'],$result['availableSeats'],$bus,$route); // Return null if schedule with given ID is not found
    }
}