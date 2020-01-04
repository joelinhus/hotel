<?php
class Cliente
{
    private $idCliente;
    private $nombre;
    private $apellido;
    private $email;
    private $dni;
    private $contrasena;
    private $pais;
    private $direccion;
    private $telefono;




    
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }





    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }





    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }





    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }





    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }




    
    public function getContrasena()
    {
        return $this->contrasena;
    }

    
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }





    public function getPais()
    {
        return $this->pais;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
    }





    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }





    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    

    public function reinicioCampos()
    {
        $this->idCliente = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->email = "";
        $this->dni = "";
        $this->contrasena = "";
        $this->pais = "";
        $this->direccion = "";
        $this->telefono = "";
    }

}
