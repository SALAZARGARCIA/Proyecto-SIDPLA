<?php
require_once '../CONTROLADOR/Estado_dom.control.php';
require_once '../MODELO/Estado_dom.model.php';
require_once '../MODELO/database.php';
//logica
$Estado_dom = new EstadoDom();
$model = new EstadoDomModel();
$db = database::conectar();

if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']) {
		case 'actualizar':
			$Estado_dom->__SET('Estado_dom2', 	    $_REQUEST['Estado_dom2']);
			$Estado_dom->__SET('estado_e_dom', 	    $_REQUEST['estado_e_dom']);			
			$Estado_dom->__SET('Estado_dom', 		$_REQUEST['Estado_dom']);

			$model->Actualizar_Estado_domicilio($Estado_dom);
			print "<script>alert(\"Registro Actualizado exitosamente.\");window.location='Estado_dom.vista.php';</script>";
			break;

		case 'registrar':
			$Estado_dom->__SET('Estado_dom', 		$_REQUEST['Estado_dom']);
			$Estado_dom->__SET('estado_e_dom', 		$_REQUEST['estado_e_dom']);
			

			$model->Registrar_Estado_domicilio($Estado_dom);
			print "<script>alert(\"Registro Agregado exitosamente.\");window.location='Estado_dom.vista.php';</script>";
			break;

//  		Instancia la clase a eliminar que se encuentra al final de cada registro//

		case 'eliminar':
			$model->Eliminar_Estado_domicilio($_REQUEST['Estado_dom']);
			print "<script>alert(\"Registro Eliminado exitosamente.\");window.location='Estado_dom.vista.php';</script>";
			break;

//  		Instancia la clase editar que se encuentra al final de cada registro//	


		case 'editar':
			$Estado_dom = $model->Obtener_Estado_domicilio($_REQUEST['Estado_dom']);
			break;

	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
			<title>CRUD Estado_dom</title>
	<link rel="stylesheet" href="../css/style_form.css">

	</head>
	<body>

<!-- FORMULARIO NUEVO REGISTRO -->

<br><a href="?action=ver&m=1">NUEVO REGISTRO</a><br><br>

<div id="div_form">
<?php if( !empty($_GET['m']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

	<label for="tipo prod">Estado domicilio</label>
	<input type="text" name="Estado_dom" placeholder="Tipo Documento" required>


	<br><br><label for="Estado Documento">Estado e domicilio</label>
	<input type="number" name="estado_e_dom" placeholder="Estado Documento" required>

	

	<br><br><input type="submit" value= "Guardar" onclick = "this.form.action = '?action=registrar';" />
</form>
</div>

<?php } ?>

<div id="div_form">

<?php if(!empty($_GET['Estado_dom']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

<!--LABEL USUARIO FINAL -->
<label>Estado domicilio por Modificar: <?php echo $Estado_dom->__GET('Estado_dom'); ?> </label>


<input type="text" name="Estado_dom" value="<?php echo $Estado_dom->__GET('Estado_dom'); ?>" style="display:none" placeholder="Numero Documento" required>

<br><br><label>TIPO DOCUMENTO</label>
 <input type="text" name="Estado_dom2" id="Estado_dom2" value="<?php echo $Estado_dom->__GET('Estado_dom'); ?>" placeholder="Tipo Documento" required>

<br><br><label>ESTADO TIPO DOCUMENTO</label>
<input type="number" name="estado_e_dom" id="estado_e_dom" value="<?php echo $Estado_dom->__GET('estado_e_dom'); ?>" placeholder="Estado tipo Documento" required>


<!-- <br> <input type="text" name="rol_Rol" id="rol_Rol" value="<?php echo $Estado_dom->__GET('rol_Rol'); ?>" placeholder="Rol" required> -->

<br><br><input type="submit" value= "Actualizar" onclick = "this.form.action = '?action=actualizar';" />

</form>
</div>

<?php }

$sq11= "CALL Listar_estado_domicilio";

$query= $db->query($sq11);

if($query->rowCount()>0):?>

	<br><h1>Consulta - Registros</h1><br>
	<table id="customers">
		<thead>
			<tr>
				<th>Estado domicilio</th>
				<th>Estado e domicilio</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
	

<?php foreach ($model->Listar_Estado_domicilio() as $r): ?>
	<tr>
		<td><?php echo $r->__GET('Estado_dom'); ?></td>		
		<td><?php echo $r->__GET('estado_e_dom'); ?></td>
		

		<td>
		<a href="?action=editar&Estado_dom=<?php echo $r->Estado_dom; ?>">Editar</a>
	    </td>

	    <td>
		<a href="?action=eliminar&Estado_dom=<?php echo $r->Estado_dom; ?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Eliminar</a>
	    </td>

	</tr>
<?php endforeach; ?>

</table>

<?php else:?>

	<h4 class="alert-danger">Señor Usuario No se Encuentran Registros!!!</h4>

<?php endif;?>

</body>
</html>

