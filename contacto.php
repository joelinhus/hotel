<?php 

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Hotel</title>
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<link rel ="icon" type="image/png" href="img/icono-hotel.ico">
	<link href="https://fonts.googleapis.com/css?family=Cairo|Merriweather+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<a class="engranaje" href="panel.php"><img src="img/engranaje.png" height="25" width="25" /></a>
	
	<a class="title" href="index.php"><h1>HOTEL</h1></a>
	<div id="header">
		<div id="nav">
			<ul><li><a href="habitaciones.php">Habitaciones</a></li>
				<li><a href="reserva.php">Reserva</a></li>
				<li><a href="registro.php">Registro</a></li>
				<li><a href="contacto.php">Contacto</a></li>
			</ul>
		</div>
	</div>

	<div id="body">
		<h2>Contacto </h2>
		<div id="contacto">
            <h3>Nuestro e-mail</h3>
            <p>hotel@hotel.com</p>
            <h3>Telefono:</h3>
            <p>4427175 o (+54)2995938151</p>
            <h3>Dirección:</h3>
            <p>Carlos H. Rodriguez 1600</p>
        </div>
        <form id="comentario">
            <legend>Deja un comentario</legend>
            <textarea rows="10" cols="70" name="comentario" maxlength="500">

            </textarea>
            <input type="submit" value="Subir"/>
        </form>
	</div>

	<div id="foot">
		Joel Jeckeln © 2019
	</div>
</body>
</html>