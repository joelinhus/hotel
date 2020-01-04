<?php

    class Habitacion
    {
        private $idHabitacion;
        private $idTipoHabitacion;
        private $nroHabitacion;
        private $piso;
        private $descripcion;
        private $status;
        
        public function getIdHabitacion(){
		return $this->idHabitacion;
	   }

        public function setIdHabitacion($idHabitacion){
            $this->idHabitacion = $idHabitacion;
        }

        
        
        public function getIdTipoHabitacion(){
            return $this->idTipoHabitacion;
        }

        public function setIdTipoHabitacion($idTipoHabitacion){
            $this->idTipoHabitacion = $idTipoHabitacion;
        }

        
        
        public function getNroHabitacion(){
            return $this->nroHabitacion;
        }

        public function setNroHabitacion($nroHabitacion){
            $this->nroHabitacion = $nroHabitacion;
        }

        
        
        public function getPiso(){
            return $this->piso;
        }

        public function setPiso($piso){
            $this->piso = $piso;
        }

        
        
        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        
        public function getStatus(){
            return $this->status;
        }

        public function setStatus($status){
            $this->status = $status;
        }
        
        public function reinicioCampos(){
            $this->idHabitacion = "";
            $this->idTipoHabitacion = "";
            $this->nroHabitacion = "";
            $this->piso = "";
            $this->descripcion = "";
        }
    }