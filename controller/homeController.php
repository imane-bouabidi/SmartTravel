<?php
class HomeController
{

    public function showHome(){
        $ville = new VilleDAO();
        $villesDATA = $ville->getAllVilles();
        include 'view/homeUser.php';
    }
}