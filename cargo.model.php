<?php  

	require_once("conexion.php");

	class CargoModel
	{
		private $pdo;

		public function __construct(){
			$con = new Conexion();
			$this->pdo = $con->getConexion();
		}

		public function listar(){
			try{$result = array();
				$stm = $this->pdo->prepare("SELECT * from cargos");
				$stm->execute();
				foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
					$crg = new Cargo();

					$crg->setIdCargo($r->idCargo);
					$crg->setNombreCargo($r->nombreCargo);
					$crg->setSuperior($r->superior);

					$result[] = $crg;
				}
				return $result;
			}catch(Exception $e){
				die($e->getMessage());
			}
		}
	}

?>