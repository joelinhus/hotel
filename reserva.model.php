<?php 
require_once "conexion.php";

/*
	private $idCliente;
	private $idHabitacion;
	private $cantPersonas;
	private $checkin;
	private $checkout;
*/
class ReservaModel
{

		private $pdo;

		public function __construct(){
			$con = new Conexion();
			$this->pdo = $con->getConexion();
		}

		
		public function listarxcliente($idCliente){
	        try{
	            $result = array();

	            $stm = $this->pdo->prepare('SELECT * FROM reservas WHERE idCliente=?');
	            $stm->execute(array($idCliente));

	            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
	            	$res = new Reserva();
	            	
					$res->setIdReserva($r->idReserva);
					$res->setIdCliente($r->idCliente);
					$res->setIdHabitacion($r->idHabitacion);
					$res->setCantPersonas($r->cantPersonas);
					$res->setCheckIn($r->checkin);
					$res->setCheckOut($r->checkout);

					$result[] = $res;

	            }
	            return $result;
	        }catch(Exception $e){
	            die($e->getMessage());
	        }
	    }


		public function listar(){
			try{
				$result = array();
				$stm = $this->pdo->prepare("SELECT * from reservas");
				$stm->execute();
				foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
					$res = new Reserva();

					$res->setIdReserva($r->idReserva);
					$res->setIdCliente($r->idCliente);
					$res->setIdHabitacion($r->idHabitacion);
					$res->setCantPersonas($r->cantPersonas);
					$res->setCheckIn($r->checkin);
					$res->setCheckOut($r->checkout);

					$result[] = $res;
				}
				return $result;
			}catch(Exception $e){
				die($e->getMessage());
			}
		}




		public function actualizar(Reserva $data){
			try{
				$sql = "UPDATE reservas SET 
									idCliente=?,
									idHabitacion=?,
									cantPersonas=?,
									checkin=?,
									checkout=?
								WHERE idReserva=?
						";
				$this->pdo->prepare($sql)
				->execute(
					array(
						$data->getIdCliente(),
						$data->getIdHabitacion(),
						$data->getCantPersonas(),
						$data->getCheckIn(),
						$data->getCheckOut(),
						$data->getIdReserva()
					)
				);
			}catch(Exception $e){
				die($e->getMessage());
			}
		}

		public function eliminar($idReserva){
			try{
				$sql = "DELETE FROM reservas WHERE idReserva=?";
				$this->pdo->prepare($sql)->execute(array($idReserva));
			}catch(Exception $e){
				die($e->getMessage());
			}
		}

		public function registrar(Reserva $data){
			try{
				$sql = "INSERT INTO reservas (idCliente,idHabitacion,cantPersonas,checkin,checkout) VALUES (?,?,?,?,?)";
				$this->pdo->prepare($sql)
					->execute(
						array(
							$data->getIdCliente(),
							$data->getIdHabitacion(),
							$data->getCantPersonas(),
							$data->getCheckIn(),
							$data->getCheckOut()
						)
					);
			}catch (Exception $e) {
            	die($e->getMessage());
        	}
		}

		public function obtener($idReserva){
			try{
				$sql = "SELECT * FROM reservas WHERE idReserva=?";
				$stm = $this->pdo->prepare($sql);
				$stm->execute(array($idReserva));
				$r = $stm->fetch(PDO::FETCH_OBJ);

				$res = new Reserva();

				$res->setIdReserva($r->idReserva);
				$res->setIdCliente($r->idCliente);
				$res->setIdHabitacion($r->idHabitacion);
				$res->setCantPersonas($r->cantPersonas);
				$res->setCheckIn($r->checkin);
				$res->setCheckOut($r->checkout);

				return $res;
			}catch (Exception $e) {
            	die($e->getMessage());
        	}
		}

		public function obtenerxfecha($inicio,$fin){

		}
	}
?>