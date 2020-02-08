<?php 

require_once "reserva.model.php";
require_once "reserva.entidad.php";


$model = new ReservaModel();
$res = new Reserva();

if(isset($_POST['operacion'])){
	$res->setIdCliente($_POST['idCliente']);
	$res->setIdHabitacion($_POST['idHabitacion']); 
	$res->setCantPersonas($_POST['cantPersonas']);//this
	$res->setCheckIn($_POST['checkin']);
	$res->setCheckOut($_POST['checkout']);

	$model->registrar($res);

	$res->reinicioCampos();
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Hotel - Reservas</title>
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<link rel ="icon" type="image/png" href="img/icono-hotel.ico">
	<link href="https://fonts.googleapis.com/css?family=Cairo|Merriweather+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<a class="engranaje" href="panel.php"><img src="img/engranaje.png" height="25" width="25" /></a>
	<a class="icono-login" href="loginClientes.php"><img src="img/login.jfif" height="25" width="25" /></a>
	<a class="title" href="index.php"><h1>HOTEL</h1></a>
    
	<div id="header">
		<div id="nav">
			<ul><li><a href="habitacionesIndex.php">Habitaciones</a></li>
				<li><a href="reservasIndex.php">Reserva</a></li>
				<li><a href="registro.php">Registro</a></li>
				<li><a href="contacto.php">Contacto</a></li>
			</ul>
		</div>
	</div>

	<div id="body">
		


















	</div>

	<div id="foot">
		Joel Jeckeln © 2019
	</div>
</body>
</html>