<?php

 class Route{
    private $idRoute;
    private $ville_departID;
    private $ville_arriveeID;
    private $duree;
    private $distance;

    public function __construct($idRoute, $ville_departID, $ville_arriveeID, $duree, $distance) {
        $this->idRoute = $idRoute;
        $this->ville_departID = $ville_departID;
        $this->ville_arriveeID = $ville_arriveeID;
        $this->duree = $duree;
        $this->distance = $distance;
    }



    /**
     * Get the value of idRoute
     */ 
    public function getIdRoute()
    {
        return $this->idRoute;
    }

    /**
     * Get the value of ville_departID
     */ 
    public function getVille_departID()
    {
        return $this->ville_departID;
    }

    /**
     * Get the value of ville_arriveeID
     */ 
    public function getVille_arriveeID()
    {
        return $this->ville_arriveeID;
    }

    /**
     * Get the value of duree
     */ 
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Get the value of distance
     */ 
    public function getDistance()
    {
        return $this->distance;
    }
}

?>