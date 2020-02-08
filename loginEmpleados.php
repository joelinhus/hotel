<?php 
    
    require('conexion.php');
    require('usuario.entidad.php');
    require('usuario.model.php');

    $usu = new Usuario();
    $model = new UsuarioModel();

    session_start();

    if(isset($_SESSION['usuario'])){
        header('Location: panel.php');
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $usuario = $_POST['username'];
        $contrasena = $_POST['password'];

        
        $resultado = $model->existe($usuario,$contrasena);

        if($resultado!==false){
            $_SESSION['usuario']=$usuario;
            header('Location: panel.php');
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
    <h2>Login Empleados</h2>
    <a class="flecha" href="index.php">
        <img title="Volver al inicio" src="img/back_arrow.png" width="40" height="40">
</a>
    <form action="loginEmpleados.php" method="POST" class="login">
        <?php 
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
        <h2>Iniciar sesión</h2>
        <p>
            Nombre de usuario: <br>
            <input type="text" name="username"/>
        </p>
        <p>
            Contraseña: <br>
            <input type="password" name="password"/>
        </p>
        <p><input type="submit" value="Iniciar Sesión"/></p>
    </form>
</body>
</html>