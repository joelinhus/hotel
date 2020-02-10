<?php

require_once "cliente.model.php";
require_once "cliente.entidad.php";
require_once "pais.entidad.php";
require_once "pais.model.php";


$model = new ClienteModel();
$cli = new Cliente();

$p = new Pais;
$pModel = new PaisModel;

if (isset($_POST['operacion'])) {
    switch ($_POST['operacion']) {
		case 'actualizar':
            $cli->setNombre($_POST['nombre']);
            $cli->setApellido($_POST['apellido']);
            $cli->setEmail($_POST['email']);
            $cli->setDni($_POST['dni']);
            $cli->setPais($_POST['pais']);
            $cli->setDireccion($_POST['direccion']);
			$cli->setTelefono($_POST['telefono']);
			$cli->setIdCliente($_POST['idCliente']);

            if ($_POST['contrasena'] != '' || $_POST['contrasena'] != null) {
                $contrasena = md5($_POST['contrasena']);
                $cli->setContrasena($contrasena);
            } else {
                $cli->setContrasena($_POST['contrasena']);
            }

            $model->actualizar($cli);

            $cli->reinicioCampos();
        break;
        case 'registrar':
        	$cli->setIdCliente($_POST['idCliente']);
            $cli->setNombre($_POST['nombre']);
            $cli->setApellido($_POST['apellido']);
            $cli->setEmail($_POST['email']);
            $cli->setDni($_POST['dni']);
            $contrasena = md5($_POST['contrasena']);
            $cli->setContrasena($contrasena);
            $cli->setPais($_POST['pais']);
            $cli->setDireccion($_POST['direccion']);
            $cli->setTelefono($_POST['telefono']);

            $model->registrar($cli);

            $cli->reinicioCampos();
        break;

        case 'eliminar':
            $model->eliminar($_POST['idcliente']);
        break;

        case 'editar':
            $cli = $model->obtener($_POST['idcliente']);
        break;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Administracion clientes</title>
    <meta charset="utf-8">
    <link href="CSS/styles.css" type="text/css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="img/icono-hotel-panel.ico">
</head>

<body style="background-color:#ffb25e">

    <h1>Clientes</h1>

    <!-- Formulario de ingreso de datos -->
    <form action="clientes.php" method="POST">

        <input type="hidden" name="idCliente" value="<?php echo $cli->getIdCliente() ?>" />
        <input type="hidden" name="operacion" value="<?php echo $cli->getIdCliente() > 0 ? 'actualizar' : 'registrar' ?>" />
        
        
        <label>Nombre</label> <input type="text" name="nombre" length="25" value="<?php echo $cli->getNombre(); ?>" />
        <label>Apellido</label> <input type="text" name="apellido" length="25" value="<?php echo $cli->getApellido(); ?>" />
        <label>Email</label> <input type="text" name="email" length="35" value="<?php echo $cli->getEmail(); ?>" />
        <label>Contraseña</label> <input type="password" name="contrasena" length="25" />
        <label>DNI</label> <input type="number" name="dni" length="8" value="<?php echo $cli->getDni(); ?>" />
        <label>Pais</label>










        <!-- Lista desplegable auto-completable Paises -->
        <select name="pais">

            <option selected value="0">--Seleccione--</option>
            <?php foreach($pModel->listar() as $r){?>

            <option value="<?php echo $r->getAbrev(); ?>">
                <?php echo $r->getNombrePais(); ?>
            </option>
            <?php } ?>
        </select>

        <label>Direccion</label><input type="text" name="direccion" length="25" value="<?php echo $cli->getDireccion(); ?>" />
        <label>Telefono</label><input type="text" name="telefono" length="15" value="<?php echo $cli->getTelefono(); ?>" />

        <input type="submit" value="Guardar">

    </form>










    <!-- Tabla de datos -->
    <table border="1">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Email</td>
                <td>DNI</td>
                <td>Pais</td>
                <td>Direccion</td>
                <td>Telefono</td>
                <td>Editar</td>
                <td>Borrar</td>
            </tr>
        </thead>
        <tbody>
            <?php

    foreach ($model->listar() as $r) {?>
            <tr>
                <td><?php echo $r->getNombre(); ?></td>
                <td><?php echo $r->getApellido(); ?></td>
                <td><?php echo $r->getEmail(); ?></td>
                <td><?php echo $r->getDni(); ?></td>
                <td><?php echo $r->getPais(); ?></td>
                <td><?php echo $r->getDireccion(); ?></td>
                <td><?php echo $r->getTelefono(); ?></td>
                <td>
                    <form action="clientes.php" method="post" class="encasedForm">
                        <input type="hidden" name="idcliente" value="<?php echo $r->getIdCliente(); ?>" />
                        <input type="hidden" name="operacion" value="editar" />
                        <input type="submit" value="Edit" />
                    </form>
                </td>
                <td>
                    <form action="clientes.php" method="post" class="encasedForm">
                        <input type="hidden" name="idcliente" value="<?php echo $r->getIdCliente(); ?>" />
                        <input type="hidden" name="operacion" value="eliminar" />
                        <input type="submit" value="X" />
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
