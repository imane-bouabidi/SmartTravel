<?php

 class Bus{
    private $idBus;
    private $NumBus;
    private $immat;
    private $idEntre;
    private $capacity;

    public function __construct($idBus, $numBus, $immat, $idEntre, $capacity) {
        $this->idBus = $idBus;
        $this->NumBus = $numBus;
        $this->immat = $immat;
        $this->idEntre = $idEntre;
        $this->capacity = $capacity;
    }


    /**
     * Get the value of idBus
     */
    public function getIdBus()
    {
        return $this->idBus;
    }

    /**
     * Get the value of NumBus
     */
    public function getNumBus()
    {
        return $this->NumBus;
    }

    /**
     * Get the value of immat
     */
    public function getImmat()
    {
        return $this->immat;
    }

    /**
     * Get the value of idEntre
     */
    public function getIdEntre()
    {
        return $this->idEntre;
    }

    /**
     * Get the value of capacity
     */
    public function getCapacity()
    {
        return $this->capacity;
    }
}

?>