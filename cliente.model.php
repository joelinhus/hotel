<?php
require_once "conexion.php";
class ClienteModel
{
    
    private $pdo;
    
    public function __construct()
    {
        $con = new Conexion();
        $this->pdo = $con->getConexion();
    }


    public function existe($mail, $contrasena){
        try {

            $contrasena = md5($contrasena);

            $result = array();
            $stm = $this->pdo->prepare('SELECT * FROM clientes WHERE email = ? AND contrasena = ?');
            $stm->execute(array($mail,$contrasena));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $cli = new Cliente();

            $cli->setIdCliente($r->idCliente);
            $cli->setNombre($r->nombre);
            $cli->setApellido($r->apellido);
            $cli->setEmail($r->email);
            $cli->setDni($r->dni);
            $cli->setContrasena($r->contrasena);
            $cli->setPais($r->pais);
            $cli->setDireccion($r->direccion);
            $cli->setTelefono($r->telefono);

            return $cli;
        } catch (Exception $e) {
            die($e->getMessage());
        }


        
        /*
            
        $resultado = $stm->fetch();

        if($resultado!==false){
            return true;
        }else{
            return false;
        }
        */

    }


    public function listar()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM clientes ORDER BY apellido ASC");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $cli = new Cliente();

                $cli->setIdCliente($r->idCliente);
                $cli->setNombre($r->nombre);
                $cli->setApellido($r->apellido);
                $cli->setEmail($r->email);
                $cli->setDni($r->dni);
                $cli->setContrasena($r->contrasena);
                $cli->setPais($r->pais);
                $cli->setDireccion($r->direccion);
                $cli->setTelefono($r->telefono);

                $result[] = $cli;
            }
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar(Cliente $data)
    {
        try
        {
            if ($data->getContrasena() == "" || $data->getContrasena() == null) {
                $sql = "UPDATE clientes SET
							nombre= ?,
							apellido= ?,
							email= ?,
							dni= ?,
							pais= ?,
                            direccion= ?,
                            telefono= ?
						WHERE idCliente= ?";

                $this->pdo->prepare($sql)
                    ->execute(
                        array(
                            $data->getNombre(),
                            $data->getApellido(),
                            $data->getEmail(),
                            $data->getDni(),
                            $data->getPais(),
                            $data->getDireccion(),
                            $data->getTelefono(),
                            $data->getIdCliente()
                        )
                    );
            } else {
                $sql = "UPDATE clientes SET
							nombre= ?,
							apellido= ?,
							email= ?,
							dni= ?,
							contrasena= ?,
							pais= ?,
                            direccion= ?,
                            telefono= ?
						WHERE idCliente= ?";
                $this->pdo->prepare($sql)
                    ->execute(
                        array(
                            $data->getNombre(),
                            $data->getApellido(),
                            $data->getEmail(),
                            $data->getDni(),
                            $data->getContrasena(),
                            $data->getPais(),
                            $data->getDireccion(),
                            $data->getTelefono(),
                            $data->getIdCliente()
                        )
                    );
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($idCliente)
    {
        try
        {
            $sql = "DELETE FROM clientes WHERE idCliente=?";
            $this->pdo->prepare($sql)->execute(array($idCliente));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Cliente $data)
    {
        try {
            $sql = "INSERT INTO clientes (nombre, apellido, email, dni, contrasena, pais, direccion, telefono) VALUES (?,?,?,?,?,?,?,?)";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->getNombre(),
                        $data->getApellido(),
                        $data->getEmail(),
                        $data->getDni(),
                        $data->getContrasena(),
                        $data->getPais(),
                        $data->getDireccion(),
                        $data->getTelefono()
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($idCliente)
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM clientes WHERE idCliente=?");
            $stm->execute(array($idCliente));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $cli = new Cliente();

            $cli->setIdCliente($r->idCliente);
            $cli->setNombre($r->nombre);
            $cli->setApellido($r->apellido);
            $cli->setEmail($r->email);
            $cli->setDni($r->dni);
            $cli->setContrasena($r->contrasena);
            $cli->setPais($r->pais);
            $cli->setDireccion($r->direccion);
            $cli->setTelefono($r->telefono);

            return $cli;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
