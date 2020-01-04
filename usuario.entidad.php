<?php 

	class Usuario{

		private $idUsuario;
		private $nombre;
		private $apellido;
		private $usuario;
		private $contrasena;
		private $idCargo;
		private $dni;

        
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
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



    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }



    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }



    public function getIdCargo()
    {
        return $this->idCargo;
    }

    public function setIdCargo($idCargo)
    {
        $this->idCargo = $idCargo;
    }





    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function reinicioCampos(){
    	$this->idUsuario = "";
    	$this->nombre = "";
    	$this->apellido = "";
    	$this->usuario = "";
    	$this->contrasena = "";
    	$this->idCargo = "";
    	$this->dni = "";
    }

    
}

?>
