<?php

    class TipoHabitacion
    {
        private $idTipo;
        private $tipo;
        
        
        
        public function setIdTipo($idTipo){
            $this->idTipo = $idTipo;
        }
        
        public function getIdTipo(){
            return $this->idTipo;
        }
        
        
        
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
        
        public function getTipo(){
            return $this->tipo;
        }
        
        public function reinicioCampos(){
            $this->idTipo = "";
            $this->tipo = "";
        }
    }
?>