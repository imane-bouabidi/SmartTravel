<?php

class Horaire {
    private $idHoraire;
    private $idRoute;
    private $idBus;
    private $date_;
    private $heure_depart;
    private $heure_arrivee;
    private $sieges_dispo;
    private $price;

    // Constructor
    public function __construct($idHoraire, $idRoute, $idBus, $date_, $heure_depart, $heure_arrivee, $sieges_dispo,$price) {
        $this->idHoraire = $idHoraire;
        $this->idRoute = $idRoute;
        $this->idBus = $idBus;
        $this->date_ = $date_;
        $this->heure_depart = $heure_depart;
        $this->heure_arrivee = $heure_arrivee;
        $this->sieges_dispo = $sieges_dispo;
        $this->price = $price;
    }

    // Getter and Setter methods for each property

    public function getIdHoraire() {
        return $this->idHoraire;
    }

    public function setIdHoraire($idHoraire) {
        $this->idHoraire = $idHoraire;
    }

    public function getIdRoute() {
        return $this->idRoute;
    }

    public function setIdRoute($idRoute) {
        $this->idRoute = $idRoute;
    }

    public function getIdBus() {
        return $this->idBus;
    }

    public function setIdBus($idBus) {
        $this->idBus = $idBus;
    }

    public function getDate() {
        return $this->date_;
    }

    public function setDate($date_) {
        $this->date_ = $date_;
    }

    public function getHeureDepart() {
        return $this->heure_depart;
    }

    public function setHeureDepart($heure_depart) {
        $this->heure_depart = $heure_depart;
    }

    public function getHeureArrivee() {
        return $this->heure_arrivee;
    }

    public function setHeureArrivee($heure_arrivee) {
        $this->heure_arrivee = $heure_arrivee;
    }

    public function getSiegesDispo() {
        return $this->sieges_dispo;
    }

    public function setSiegesDispo($sieges_dispo) {
        $this->sieges_dispo = $sieges_dispo;
    }

    public function getPrice()
    {
        return $this->price;
    }
}


?>