<?php

    //Inicializar la sesión
    session_start();
    if (isset($_SESSION['usuario'])) {
        //asignar a variable
        $username = $_SESSION['usuario'];    

    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Panel</title>
	<link rel="stylesheet" type="text/css" href="CSS/styles.css"><link rel ="icon" type="image/png" href="img/icono-hotel-panel.ico">
    <link rel ="icon" type="image/png" href="img/icono-hotel-panel.ico">
</head>
<body  style="background-color:#ffb25e">
    <div id="sidenav">
        <a href="index.php">Inicio</a>
        <a href="usuarios.php" target="contenedor">Usuarios</a>
        <a href="clientes.php" target="contenedor">Clientes</a>
        <a href="habitaciones.php" target="contenedor">Habitaciones</a>
        <a href="reservas.php" target="contenedor">Reservas</a>
        <a href="logout.php">Cerrar sesión</a>
        <p class="user">Bienvenido/a <?php echo $username ?></p>
    </div>

    <iframe style="margin-left:150px;" name="contenedor" frameborder="0" width="1199" height="680"> </iframe>

</body>    
</html>