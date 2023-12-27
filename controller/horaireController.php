<?php
include_once 'model\horaireDAO.php';

class HoraireController{

    function getAllHoraires(){
        $horaires = new horaireDAO();
        $horairesDATA = $horaires->getAllHoraires();
        include 'view\horaireView.php';
    }
}
?>