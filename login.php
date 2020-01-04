<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <form action="index.php" method="POST">
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