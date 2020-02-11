<?php 

    require_once "conexion.php";

class HabitacionModel{
    
    private $pdo;
    
    public function __construct(){
        $con = new Conexion();
        $this->pdo = $con->getConexion();
    }



    public function cambiarestado($idHabitacion,$estadoActual){
        try{

            if($estadoActual=="1"){
                $estadoActual="0";
            }else{
                $estadoActual="1";
            }

            $stm = $this->pdo->prepare("UPDATE habitaciones SET status= ? WHERE idHabitacion= ?");
            $stm->execute(array($estadoActual,$idHabitacion));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function listar(){
        try{
            $result = array();
            
            $stm = $this->pdo->prepare("SELECT * FROM habitaciones");
            $stm->execute();
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                
                $hab = new Habitacion();
                
                $hab->setidHabitacion($r->idHabitacion);
                $hab->setIdTipoHabitacion($r->idTipoHabitacion);
                $hab->setNroHabitacion($r->nroHabitacion);
                $hab->setPiso($r->piso);
                $hab->setDescripcion($r->descripcion);
                $hab->setStatus($r->status);

                $result[] = $hab;
            }
            return $result;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function listarxpiso($piso){
        try{
            $result = array();
            
            $stm = $this->pdo->prepare("SELECT * FROM habitaciones WHERE piso= ?");
            $stm->execute(array($piso));
            
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                
                $hab = new Habitacion();
                
                $hab->setidHabitacion($r->idHabitacion);
                $hab->setIdTipoHabitacion($r->idTipoHabitacion);
                $hab->setNroHabitacion($r->nroHabitacion);
                $hab->setPiso($r->piso);
                $hab->setDescripcion($r->descripcion);
                $hab->setStatus($r->status);
                
                $result[] = $hab;
            }
            return $result;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function registrar(Habitacion $data){
        try{
            $sql = "INSERT INTO habitaciones (idTipoHabitacion,nroHabitacion,piso,descripcion,status) VALUES (?,?,?,?,?)";
            
            $this->pdo->prepare($sql)->execute(
                array(
                    $data->getIdTipoHabitacion(),
                    $data->getNroHabitacion(),
                    $data->getPiso(),
                    $data->getDescripcion(),
                    $data->getStatus()
                )
            );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function actualizar (Habitacion $data){
        try{
            $sql = "UPDATE habitaciones SET 
                            idTipoHabitacion= ?,
                            nroHabitacion= ?,
                            piso= ?,
                            descripcion= ?,
                            status= ? 
                    WHERE idHabitacion= ?";
            
            $this->pdo->prepare($sql)->execute(
                array(
                    $data->getIdTipoHabitacion(),
                    $data->getNroHabitacion(),
                    $data->getPiso(),
                    $data->getDescripcion(),
                    $data->getStatus(),
                    $data->getIdHabitacion()
                    
                )
            );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function eliminar($idHabitacion){
        try{
            $sql = "DELETE FROM habitaciones WHERE idHabitacion= ?";
            $this->pdo->prepare($sql)->execute(array($idHabitacion));
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function obtener($idHabitacion){
        try{
            $sql = "SELECT * FROM habitaciones WHERE idHabitacion= ?";
            
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($idHabitacion));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            
            $hab = new Habitacion();
            
            $hab->setIdHabitacion($r->idHabitacion);
            $hab->setIdTipoHabitacion($r->idTipoHabitacion);
            $hab->setNroHabitacion($r->nroHabitacion);
            $hab->setPiso($r->piso);
            $hab->setDescripcion($r->descripcion);
            $hab->setStatus($r->status);

            return $hab;
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
    


}

?>