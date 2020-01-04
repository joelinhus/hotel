<?php

require_once "conexion.php";

class PaisModel{

    private $pdo;

    public function __construct(){
        $con = new Conexion();
        $this->pdo = $con->getConexion();
    }

    public function listar(){
        try{
            $result= array();
            $stm = $this->pdo->prepare("SELECT * FROM paises ORDER BY nombre ASC");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $p = new Pais();

                $p->setIdPais($r->idPais);
                $p->setNombrePais($r->nombre);
                $p->setAbrev($r->abrev);

                $result[] = $p;
            }
            return $result;
        }catch(Exception $e){
            die($e->getMessage());
        }
        

    }
}

?>
