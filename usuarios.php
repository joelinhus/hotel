<?php

require_once "usuario.model.php";
require_once "usuario.entidad.php";
require_once "cargo.model.php";
require_once "cargo.entidad.php";

$model = new UsuarioModel();
$usu = new Usuario();

$modelCargo = new CargoModel();
$cargo = new Cargo();

//echo $usu->getNombre();

if (isset($_POST['operacion'])) {
    switch ($_POST['operacion']) {
        case 'actualizar':
            $usu->setIdUsuario($_POST['idUsuario']);
            $usu->setNombre($_POST['nombre']);
            $usu->setApellido($_POST['apellido']);
            $usu->setUsuario($_POST['usuario']);
            $usu->setIdCargo($_POST['idCargo']);
            $usu->setDni($_POST['dni']);
            if ($_POST['contrasena'] != '' || $_POST['contrasena'] != null) {
                $contrasena = md5($_POST['contrasena']);
                $usu->setContrasena($contrasena);
            } else {
                $usu->setContrasena($_POST['contrasena']);
            }

            $model->actualizar($usu);

            $usu->reinicioCampos();
            break;
        case 'registrar':
            $usu->setNombre($_POST['nombre']);
            $usu->setApellido($_POST['apellido']);
            $usu->setUsuario($_POST['usuario']);
            $contrasena = md5($_POST['contrasena']);
            $usu->setContrasena($contrasena);
            $usu->setIdCargo($_POST['idCargo']);
            $usu->setDni($_POST['dni']);

            $model->registrar($usu);

            $usu->reinicioCampos();
            break;

        case 'eliminar':
            $model->eliminar($_POST['idUsuario']);
            break;

        case 'editar':
            $usu = $model->obtener($_POST['idUsuario']);
            break;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Administracion usuarios</title>
    <link href="CSS/styles.css" type="text/css" rel="stylesheet" />
</head>

<body style="background-color:#ffb25e">
    <h1>Usuarios</h1>










    


    <form action="usuarios.php" method="POST" class="listaDesplegable">

        <!-- Lista desplegable auto-completable Cargos -->

        <label>Cargo</label>
        <select name="idCargo" onchange="this.form.submit();">
            <option selected value="0">--Seleccione--</option>
            <?php foreach ($modelCargo->listar() as $r) {?>
            <option value="<?php echo $r->getIdCargo(); ?>">
                <?php echo $r->getNombreCargo(); ?>
            </option>
            <?php   if (isset($_POST['idCargo']) && $_POST['idCargo'] == $r->getIdCargo()) {
                        echo "SELECTED = SELECTED ";
                    }
             }?>
        </select>
    </form>










    <!-- Formulario de ingreso de datos -->
    <form action="usuarios.php" method="POST">

        <input type="hidden" name="idUsuario" value="<?php echo $usu->getIdUsuario() ?>" />

        <input type="hidden" name="operacion" value="<?php echo $usu->getIdUsuario() > 0 ? 'actualizar' : 'registrar' ?>" />

        <label>Nombre</label> <input type="text" name="nombre" length="25" value="<?php echo $usu->getNombre(); ?>" />

        <label>Apellido</label> <input type="text" name="apellido" length="25" value="<?php echo $usu->getApellido(); ?>" />

        <label>Usuario</label> <input type="text" name="usuario" length="25" value="<?php echo $usu->getUsuario(); ?>" />

        <label>Contraseña</label> <input type="password" name="contrasena" length="25" />

        <label>DNI</label> <input type="number" name="dni" length="8" value="<?php echo $usu->getDni(); ?>" />
        
        <?php if (isset($_POST['idCargo'])) {?>

        <input type="submit" value="Guardar">
        <input type="hidden" name="idCargo" value="<?php echo $_POST['idCargo'] ?>" />
        <?php }?>
    </form>


    <!-- Tabla de datos -->
    <table border="1">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Usuario</td>
                <td>DNI</td>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php
				if (isset($_POST['idCargo'])) {
    				foreach ($model->listarxcargo($_POST['idCargo']) as $r) {?>
            <tr>
                <td><?php echo $r->getNombre(); ?></td>
                <td><?php echo $r->getApellido(); ?></td>
                <td><?php echo $r->getUsuario(); ?></td>
                <td><?php echo $r->getDni(); ?></td>
                <td>
                    <form action="usuarios.php" method="post" class="encasedForm">
                        <input type="hidden" name="idUsuario" value="<?php echo $r->getIdUsuario(); ?>" />
                        <input type="hidden" name="idCargo" value="<?php echo $_POST['idCargo'] ?>" />
                        <input type="hidden" name="operacion" value="editar" />
                        <input type="submit" value="Edit" />
                    </form>
                </td>
                <td>
                    <form action="usuarios.php" method="post" class="encasedForm">
                        <input type="hidden" name="idUsuario" value="<?php echo $r->getIdUsuario(); ?>" />
                        <input type="hidden" name="idCargo" value="<?php echo $_POST['idCargo'] ?>" />
                        <input type="hidden" name="operacion" value="eliminar" />
                        <input type="submit" value="X" />
                    </form>
                </td>
            </tr>
            <?php }
}?>
        </tbody>
    </table>
</body>

</html>
