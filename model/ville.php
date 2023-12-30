<?php

 class Ville{
    private $idVille;
    private $ville_name;


    public function __construct($idVille, $ville_name) {
        $this->idVille = $idVille;
        $this->ville_name = $ville_name;
    }

    /**
     * Get the value of idVille
     */ 
    public function getIdVille()
    {
        return $this->idVille;
    }

    /**
     * Get the value of ville_name
     */ 
    public function getVille_name()
    {
        return $this->ville_name;
    }
}

?>