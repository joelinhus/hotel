<?php  

	class Cargo
	{
		private $idCargo;
		private $superior;
		private $nombreCargo;



		public function setIdCargo($idCargo){
			$this->idCargo = $idCargo;
		}

		public function getIdCargo(){
			return $this->idCargo;
		}




		public function setSuperior($superior){
			$this->superior = $superior;
		}

		public function getSuperior(){
			return $this->superior;
		}




		public function setNombreCargo($nombreCargo){
			$this->nombreCargo = $nombreCargo;
		}

		public function getNombreCargo(){
			return $this->nombreCargo;
		}




		public function reinicioCampos(){
			$this->superior = "";
			$this->nombreCargo = "";
			$this->idCargo = "";
		}

	}

?>