<?php
class Reserva{
	
	private $idReserva;
	private $idCliente;
	private $idHabitacion;
	private $cantPersonas;
	private $checkin;
	private $checkout;


	public function getIdReserva(){
		return $this->idReserva;
	}

	public function setIdReserva($idReserva){
		$this->idReserva = $idReserva;
	}


    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }



    public function getIdHabitacion()
    {
        return $this->idHabitacion;
    }

    public function setIdHabitacion($idHabitacion)
    {
        $this->idHabitacion = $idHabitacion;
    }



    public function getCantPersonas()
    {
        return $this->cantPersonas;
    }

    public function setCantPersonas($cantPersonas)
    {
        $this->cantPersonas = $cantPersonas;
    }



    public function getCheckin()
    {
        return $this->checkin;
    }

    public function setCheckin($checkin)
    {
        $this->checkin = $checkin;
    }



    public function getCheckout()
    {
        return $this->checkout;
    }

    public function setCheckout($checkout)
    {
        $this->checkout = $checkout;
    }

    public function reinicioCampos(){
        $this->idReserva="";
        $this->idCliente="";
        $this->idHabitacion="";
        $this->cantPersonas="";
        $this->checkin="";
        $this->checkout="";
    }
}
?>