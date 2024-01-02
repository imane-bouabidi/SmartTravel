<?php

class Search {
    private $idHoraire;
    private $ville_depart;
    private $ville_arrivee;
    private $date_;
    private $heure_depart;
    private $heure_arrivee;
    private $sieges_dispo;
    private $company_name;
    private $company_image;
    private $duree;

    public function __construct($idHoraire, $ville_depart, $ville_arrivee, $date_, $heure_depart, $heure_arrivee, $sieges_dispo, $company_name, $company_image, $duree) {
        $this->idHoraire = $idHoraire;
        $this->ville_depart = $ville_depart;
        $this->ville_arrivee = $ville_arrivee;
        $this->date_ = $date_;
        $this->heure_depart = $heure_depart;
        $this->heure_arrivee = $heure_arrivee;
        $this->sieges_dispo = $sieges_dispo;
        $this->company_name = $company_name;
        $this->company_image = $company_image;
        $this->duree = $duree;
    }

    // Getters
    public function getIdHoraire() {
        return $this->idHoraire;
    }

    public function getVilleDepart() {
        return $this->ville_depart;
    }

    public function getVilleArrivee() {
        return $this->ville_arrivee;
    }

    public function getDate() {
        return $this->date_;
    }

    public function getHeureDepart() {
        return $this->heure_depart;
    }

    public function getHeureArrivee() {
        return $this->heure_arrivee;
    }

    public function getSiegesDispo() {
        return $this->sieges_dispo;
    }

    public function getCompanyName() {
        return $this->company_name;
    }

    public function getCompanyImage() {
        return $this->company_image;
    }

    public function getDuree() {
        return $this->duree;
    }
}



?>