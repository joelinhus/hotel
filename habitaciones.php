<?php
    
    
    require_once "habitacion.model.php";
    require_once "habitacion.entidad.php";
    require_once "tipoHabitacion.entidad.php";
    require_once "tipoHabitacion.model.php";

    $model = new HabitacionModel();
    $hab = new Habitacion();

    $tipoModel = new TipoHabitacionModel();
    $tipo = new TipoHabitacion();

    if (isset($_POST['operacion'])){
        switch($_POST['operacion']){
            case 'actualizar':
                $hab->setIdHabitacion($_POST['idHabitacion']);
                $hab->setIdTipoHabitacion($_POST['idTipoHabitacion']);
                $hab->setNroHabitacion($_POST['nroHabitacion']);
                $hab->setPiso($_POST['piso']);
                $hab->setDescripcion($_POST['descripcion']);
                $hab->setStatus($_POST['estado']);

                $model->actualizar($hab);
                
                $hab->reinicioCampos();
                
                break;
            case 'registrar':
                $hab->setIdHabitacion($_POST['idHabitacion']);
                $hab->setIdTipoHabitacion($_POST['idTipoHabitacion']);
                $hab->setNroHabitacion($_POST['nroHabitacion']);
                $hab->setPiso($_POST['piso']);
                $hab->setDescripcion($_POST['descripcion']);
                $hab->setStatus($_POST['estado']);

                $model->registrar($hab);
                
                $hab->reinicioCampos();
                break;
            case 'eliminar':
                $model->eliminar($_POST['idHabitacion']);
                break;
            case 'editar':
                $hab = $model->obtener($_POST['idHabitacion']);
                break;
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Administracion habitaciones</title>
    <link href="CSS/styles.css" type="text/css" rel="stylesheet" />
</head>

<body style="background-color:#ffb25e">
    <h1>Habitaciones</h1>
    
    <!-- Formulario de ingreso de datos -->
    <form action="habitaciones.php" method="POST">
        <input type="hidden" name="idHabitacion" value="<?php echo $hab->getIdHabitacion() ?>" />
        <input type="hidden" name="operacion" value="<?php echo $hab->getIdHabitacion() > 0 ? 'actualizar' : 'registrar' ?>" />
        
        <!-- Lista desplegable auto-completable Tipo de habitacion -->
        <label>Tipo</label>
        <select name="idTipoHabitacion">

            <option selected value="0">--Seleccione--</option>
            <?php foreach($tipoModel->listar() as $r){?>

            <option value="<?php echo $r->getIdTipo(); ?>"><?php echo $r->getTipo(); ?></option>
            <?php } ?>
        </select>

        <!-- Formulario de ingreso de datos -->
        <label>Número de habitación</label>
        <input type="number" name="nroHabitacion" length="2" value="<?php echo $hab->getNroHabitacion(); ?>"/>
        <label>Piso</label><input type="number" name="piso" length="2" value="<?php echo $hab->getPiso(); ?>"/>

        <label>Estado</label>
        <select name="estado">

            <option selected value="0">Desocupado</option>
            <option value="1">Ocupado</option>
        </select>

        <label>Descripcion</label><br><textarea name="descripcion" style="margin-left:20px;" cols="40" rows="10"><?php echo $hab->getDescripcion(); ?></textarea>
        
        <input type="submit" value="Guardar"> 
    </form>
    
    <!-- Tabla de datos -->
    <table border="1">
        <thead>
            <tr>
                <td>Tipo</td>
                <td>N°</td>
                <td>Piso</td>
                <td>Descripcion</td>
                <td>Estado</td>
                <td>Editar</td>
                <td>Borrar</td>
            </tr>
        </thead>
        <tbody>
  <?php foreach($model->listar() as $r){ ?>
            <tr>
                <td><?php echo $tipoModel->obtener($r->getIdTipoHabitacion())->getTipo(); ?></td>
                <td><?php echo $r->getNroHabitacion(); ?></td>
                <td><?php echo $r->getPiso(); ?></td>
                <td><?php echo $r->getDescripcion(); ?></td>
                <td><?php if($r->getStatus()==0){
                    echo "Desocupado";
                }else{
                    echo "Ocupado";
                } ?></td>
                <td>
                    <form action="habitaciones.php" method="POST" class="encasedForm">
                        <input type="hidden" name="idHabitacion" value="<?php echo $r->getIdHabitacion(); ?>" />
                        <input type="hidden" name="operacion" value="editar" />
                        <input type="submit" value="Edit" />
                    </form>
                </td>
                <td>
                    <form action="habitaciones.php" method="POST" class="encasedForm">
                        <input type="hidden" name="idHabitacion" value="<?php echo $r->getIdHabitacion(); ?>" />
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