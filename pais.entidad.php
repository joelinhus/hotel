<?php

class Pais{

    private $idPais;
    private $nombrePais;
    private $abrev;

    public function getIdPais()
    {
        return $this->idPais;
    }

    public function setIdPais($idPais)
    {
        $this->idPais = $idPais;
    }


    public function getNombrePais(){
        return $this->nombrePais;
    }

    public function setNombrePais($nombrePais){
        $this->nombrePais = $nombrePais;
    }

    public function getAbrev(){
        return $this->abrev;
    }

    public function setAbrev($abrev){
        $this->abrev = $abrev;
    }

}

?>