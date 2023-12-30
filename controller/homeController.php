<?php
class HomeController
{

    public function showHome(){
        $ville = new VilleDAO();
        $villesDATA = $ville->getAllVilles();
        include 'view/homeUser.php';
    }
    public function getScheduelByEndCityStartCity($endCity,$StartCity,$date,$places){
        
        $query = "SELECT * FROM Schedule inner join route r on Schedule.routeID=r.routeID  WHERE date >= :date AND availableSeats >= :places AND r.startCityID = :startCity and r.endCityID = :endCity";
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