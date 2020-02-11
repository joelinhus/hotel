<?php 
	session_start();

    if(isset($_SESSION['nombre'])){
        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
    }

    require_once "reserva.entidad.php";
    require_once "reserva.model.php";

    $model = new ReservaModel();
    $res = new Reserva();

if (isset($_POST['operacion'])) {
    switch ($_POST['operacion']) {
    	case 'eliminar':
            $model->eliminar($_POST['idcliente']);
        break;
    }
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Hotel - Mis reservas</title>
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<link rel ="icon" type="image/png" href="img/icono-hotel.ico">
	<link href="https://fonts.googleapis.com/css?family=Cairo|Merriweather+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<?php 
	if(isset($_SESSION['nombre'])){ ?>
		<ul class="dropdown">
			<li>
				<a><img style="display:inline;margin-right:1%;" height="16" width="16" src="img/user.png"><?php echo "$nombre $apellido" ?></a>
				<ul>
					<li><a href="reservasCliente.php">Mis reservas</a></li>
					<li><a href="perfil.php">Mi perfil</a></li>
					<li><a href="logout.php">Cerrar sesión</a></li>
				</ul>
			</li>
		</ul>
		<?php
	}
	?>

	<a class="engranaje" style="display: <?php if(isset($_SESSION['nombre'])){ echo "none"; } ?> " href="loginEmpleados.php"><img src="img/engranaje.png" height="25" width="25" /></a>

	<a class="icono-login" style="display: <?php if(isset($_SESSION['nombre']) || isset($_SESSION['usuario'])){ echo "none"; } ?> " href="loginClientes.php"><img src="img/login.jfif" height="25" width="25" /></a>

	<a class="title" href="index.php"><h1>HOTEL</h1></a>
    
	<div id="header">
		<div id="nav">
			<ul><li><a href="habitacionesIndex.php">Habitaciones</a></li>
				<li><a href="reservasIndex.php">Reservas</a></li>
				<li><a href="registro.php">Registro</a></li>
				<li><a href="contacto.php">Contacto</a></li>
			</ul>
		</div>
	</div>
	<div id="body">
		


<h2>Mis reservas</h2>

		<table class="misReservas">
			<thead>
				<tr>
					<td>Id Reserva</td>
					<td>Check-In</td>
					<td>Check-Out</td>
					<td>Cancelar</td>
				</tr>
			</thead>
			<tbody>
            <?php

    foreach ($model->listarxcliente($_SESSION['idCliente']) as $r) {?>
				<tr>
					<td><?php echo $r->getIdReserva(); ?></td>
					<td><?php echo $r->getCheckIn(); ?></td>
					<td><?php echo $r->getCheckOut(); ?></td>
					<td>
						<form action="reservasCliente.php" method="post" class="encasedForm">
	                        <input type="hidden" name="idcliente" value="<?php echo $r->getIdReserva(); ?>" />
	                        <input type="hidden" name="operacion" value="eliminar" />
	                        <input type="submit" value="X" />
	                    </form>
					</td>
				</tr>
	<?php } ?>
			</tbody>
		</table>




		
	</div>

	<div id="foot">
		Joel Jeckeln © 2020
	</div>
</body>
</html>