<?php 

require_once "reserva.model.php";
require_once "reserva.entidad.php";
require_once "habitacion.model.php";
require_once "habitacion.entidad.php";
require_once "cliente.model.php";
require_once "cliente.entidad.php";


//check cantPersonas and calculate what tipoHabitacion is needed

$model = new ReservaModel();
$res = new Reserva();

$habitacionModel = new HabitacionModel();
$hab = new Habitacion();

$clienteModel = new ClienteModel();
$cli = new Cliente();

if(isset($_POST['operacion'])){
	switch($_POST['operacion']){
		case 'actualizar':
			echo $_POST['idReserva'];
			$res->setIdReserva($_POST['idReserva']);
	        $res->setIdCliente($_POST['idCliente']);
	        $res->setIdHabitacion($_POST['idHabitacion']); 
	        $res->setCantPersonas($_POST['cantPersonas']);//this
	        $res->setCheckIn($_POST['checkin']);
	        $res->setCheckOut($_POST['checkout']);

	        $model->actualizar($res);

	        $res->reinicioCampos();

	        break;
	    case 'registrar':
	        $res->setIdCliente($_POST['idCliente']);
	        $res->setIdHabitacion($_POST['idHabitacion']); 
	        $res->setCantPersonas($_POST['cantPersonas']);//this
	        $res->setCheckIn($_POST['checkin']);
	        $res->setCheckOut($_POST['checkout']);

	    	$model->registrar($res);

	    	$res->reinicioCampos();

	    	break;
	    case 'eliminar':
	    	$model->eliminar($_POST['idReserva']);
	    	break;
	    case 'editar':
	    	$res = $model->obtener($_POST['idReserva']);
	    	break;
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <title>Administracion habitaciones</title>
    <link href="CSS/styles.css" type="text/css" rel="stylesheet" />
</head>

<body style="background-color:#ffb25e">
    <h1>Habitaciones</h1>


    <form action="reservas.php" method="POST" class="listaDesplegable">
    	<label>Cliente</label>
    	<select name="idCliente" onchange="this.form.submit();">
    		<option selected value="0">--Seleccione--</option>
    		<?php foreach($clienteModel->listar() as $r){
    		?>
    		<option value="<?php echo $r->getIdCliente(); ?>">
    			<?php echo $r->getApellido(),", ",$r->getNombre(); ?>
    		</option>
    		<?php if (isset($_POST['idCliente']) && $_POST['idCliente'] == $r->getIdCliente()){
    			echo "SELECTED = SELECTED";
    			}
			}
    		?>
    	</select>
    </form>



    <form action="reservas.php" method="POST">

		<input type="hidden" name="idReserva" value="<?php echo $res->getIdReserva() ?>" />
	     <input type="hidden" name="operacion" value="<?php echo $res->getIdReserva() > 0 ? 'actualizar' : 'registrar' ?>" />
	     <label>Check In</label><input type="date" name="checkin" value="<?php echo $res->getCheckIn(); ?>"/>
	     <label>Check Out</label><input type="date" name="checkout" value="<?php echo $res->getCheckOut(); ?>"/>





	     <label>Habitacion</label>
	     <select name="idHabitacion">

            <option selected value="0">--Seleccione--</option>
            <?php foreach($habitacionModel->listar() as $r){?>

            <option value="<?php echo $r->getIdHabitacion(); //change if error ?>"> 
                <?php echo "Habitacion N° ",$r->getNroHabitacion(); ?>
            </option>
            <?php } ?>
        </select>




        <label>Cant. Personas</label>
        <input max="5" type="number" name="cantPersonas" value="<?php echo $res->getCantPersonas(); ?>"/>
        <?php if(isset($_POST['idCliente'])){ ?>

        <input type="submit" value="Guardar"/>
        <input type="hidden" name="idCliente" value="<?php echo $_POST['idCliente'] ?>" />
    	<?php } ?>
    </form>




    
    <table border="1">
    	<thead>
			<tr>
				<td>Nro. Habitacion</td>
				<td>Check-In</td>
				<td>Check-Out</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>
			<?php

			if(isset($_POST['idCliente'])){
				foreach($model->listarxcliente($_POST['idCliente']) as $r){ 
			
			?>
			<tr>
				<td>
					<?php 
						$hm = $habitacionModel->obtener($r->getIdHabitacion());
						echo $hm->getNroHabitacion(); 
					?>
					
				</td>
				<td><?php echo $r->getCheckIn(); ?></td>
				<td><?php echo $r->getCheckOut(); ?></td>
				<td>
                    <form action="reservas.php" method="post" class="encasedForm">
                        <input type="hidden" name="idReserva" value="<?php echo $r->getIdReserva(); ?>" />
                        <input type="hidden" name="idCliente" value="<?php echo $_POST['idCliente'] ?>" />
                        <input type="hidden" name="operacion" value="editar" />
                        <input type="submit" value="Edit" />
                    </form>
                </td>
                <td>
                    <form action="reservas.php" method="post" class="encasedForm">
                        <input type="hidden" name="idReserva" value="<?php echo $r->getIdReserva(); ?>" />
                        <input type="hidden" name="idCliente" value="<?php echo $_POST['idCliente'] ?>" />
                        <input type="hidden" name="operacion" value="eliminar" />
                        <input type="submit" value="X" />
                    </form>
                </td>
			</tr>
			<?php
				}

			} ?>
		</tbody>
    </table>
</body>