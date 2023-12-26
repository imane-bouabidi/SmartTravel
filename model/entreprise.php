<?php

class Entreprise {
    private $idEntreprise;
    private $name;
    private $shortName;
    private $image;

    // Constructor
    public function __construct($idEntreprise, $name, $shortName, $image) {
        $this->idEntreprise = $idEntreprise;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->image = $image;
    }

    // Getter and Setter methods for each property

    public function getIdEntreprise() {
        return $this->idEntreprise;
    }

    public function setIdEntreprise($idEntreprise) {
        $this->idEntreprise = $idEntreprise;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getShortName() {
        return $this->shortName;
    }

    public function setShortName($shortName) {
        $this->shortName = $shortName;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }
}



?>