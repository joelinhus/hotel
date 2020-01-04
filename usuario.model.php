<?php

require_once "conexion.php";

class UsuarioModel
{

    private $pdo;

    public function __construct()
    {
        $con = new Conexion();
        $this->pdo = $con->getConexion();
    }
    
    public function existe($usuario, $contrasena){
        $stm = $this->pdo->prepare('SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?')->execute(array($usuario,$contrasena));
            
        if($stm->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    
    public function listar()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM usuarios");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $usu = new Usuario();

                $usu->setIdUsuario($r->idUsuario);
                $usu->setNombre($r->nombre);
                $usu->setApellido($r->apellido);
                $usu->setUsuario($r->usuario);
                $usu->setContrasena($r->contrasena);
                $usu->setIdCargo($r->idCargo);
                $usu->setDni($r->dni);

                $result[] = $usu;
            }
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarxcargo($idCargo)
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE idCargo= ?");
            $stm->execute(array($idCargo));

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $usu = new Usuario();

                $usu->setIdUsuario($r->idUsuario);
                $usu->setNombre($r->nombre);
                $usu->setApellido($r->apellido);
                $usu->setUsuario($r->usuario);
                $usu->setContrasena($r->contrasena);
                $usu->setIdCargo($r->idCargo);
                $usu->setDni($r->dni);

                $result[] = $usu;
            }
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(Usuario $data)
    {
        try {
            $sql = "INSERT INTO usuarios (nombre, apellido, usuario, contrasena, idCargo, dni) VALUES (?,?,?,?,?,?)";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->getNombre(),
                        $data->getApellido(),
                        $data->getUsuario(),
                        $data->getContrasena(),
                        $data->getIdCargo(),
                        $data->getDni(),
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar(Usuario $data)
    {
        try
        {
            if ($data->getContrasena() == "" || $data->getContrasena() == null) {
                $sql = "UPDATE usuarios SET
							nombre= ?,
							apellido= ?,
							idCargo= ?,
							dni= ?,
							usuario= ?
						WHERE idUsuario= ?";

                $this->pdo->prepare($sql)
                    ->execute(
                        array(
                            $data->getNombre(),
                            $data->getApellido(),
                            $data->getIdCargo(),
                            $data->getDni(),
                            $data->getUsuario(),
                            $data->getIdUsuario(),
                        )
                    );
            } else {
                $sql = "UPDATE usuarios SET
							nombre= ?,
							apellido= ?,
							idCargo= ?,
							dni= ?,
							usuario= ?,
							contrasena= ?
						WHERE idUsuario= ?";
                $this->pdo->prepare($sql)
                    ->execute(
                        array(
                            $data->getNombre(),
                            $data->getApellido(),
                            $data->getIdCargo(),
                            $data->getDni(),
                            $data->getUsuario(),
                            $data->getContrasena(),
                            $data->getIdUsuario(),
                        )
                    );
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($idUsuario)
    {
        try
        {
            $sql = "DELETE FROM usuarios WHERE idUsuario=?";
            $this->pdo->prepare($sql)->execute(array($idUsuario));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($idUsuario)
    {
        try
        {
            $sql = "SELECT * FROM usuarios WHERE idUsuario= ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($idUsuario));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $usuario = new Usuario();
            $usuario->setIdUsuario($r->idUsuario);
            $usuario->setNombre($r->nombre);
            $usuario->setIdCargo($r->idCargo);
            $usuario->setApellido($r->apellido);
            $usuario->setDni($r->dni);
            $usuario->setUsuario($r->usuario);
            $usuario->setContrasena($r->contrasena);

            return $usuario;
            //}

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /*
private $nombre;
private $apellido;
private $usuario;
private $contrasena;
private $idCargo;
private $dni;
 */

}
