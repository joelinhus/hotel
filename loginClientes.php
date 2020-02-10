<?php 
    
    require('conexion.php');
    require('cliente.entidad.php');
    require('cliente.model.php');

    $cli = new Cliente();
    $model = new ClienteModel();

    session_start();

    if(isset($_SESSION['usuario'])){
        header('Location: panel.php');
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $mail = $_POST['mail'];
        $contrasena = $_POST['password'];

        $resultado = $model->existe($mail,$contrasena);


        
        $nombre = $resultado->getNombre();
        $apellido = $resultado->getApellido();
        $idCliente = $resultado->getIdCliente();
        


        if($resultado!==false){
            $_SESSION['nombre']=$nombre;
            $_SESSION['apellido']=$apellido;
            $_SESSION['idCliente']=$idCliente;
            header('Location: index.php');  

        }else{
            header('Location: index.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>Login Clientes</h1>
    <a class="flecha" href="index.php">
        <img title="Volver al inicio" src="img/back_arrow.png" width="40" height="40">
</a>
    <form action="loginClientes.php" method="POST" class="login">
        <?php 
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
        <h2>Iniciar sesión</h2>
        <p>
            Correo electrónico: <br>
            <input type="text" name="mail"/>
        </p>
        <p>
            Contraseña: <br>
            <input type="password" name="password"/>
        </p>
        <p><input type="submit" value="Iniciar Sesión"/></p>
    </form>
</body>
</html>