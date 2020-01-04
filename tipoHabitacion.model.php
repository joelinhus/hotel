<?php 

require_once("conexion.php");

class TipoHabitacionModel
{
    private $pdo;
    
    public function __construct(){
        $con = new Conexion();
        $this->pdo = $con->getConexion();
    }
    
    public function listar(){
        try{
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM tiposhabitacion");
            $stm->execute();
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $th = new TipoHabitacion();
                
                $th->setidTipo($r->idTipo);
                $th->setTipo($r->tipo);
                
                $result[] = $th;
            }
            return $result;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function obtener($idTipo){
        try{
            $sql = "SELECT * FROM tiposhabitacion WHERE idTipo= ?";
            
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($idTipo));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            
            $th = new TipoHabitacion();
            
            $th->setIdTipo($r->idTipo);
            $th->setTipo($r->tipo);
            
            return $th;
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    
}

?>