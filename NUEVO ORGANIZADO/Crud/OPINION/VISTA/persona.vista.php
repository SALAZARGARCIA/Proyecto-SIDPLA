<?php
require_once '../CONTROLADOR/persona.control.php';
require_once '../MODELO/persona.model.php';
require_once '../MODELO/database.php';
//logica
$persona = new Persona();
$model = new PersonaModel();
$db = database::conectar();

if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']) {
		case 'actualizar':
			$persona->__SET('Cod_Opinion2', 				  	$_REQUEST['Cod_Opinion2']);
			$persona->__SET('Opinion', 							$_REQUEST['Opinion']);
			$persona->__SET('persona_Num_Documento_per', 		$_REQUEST['persona_Num_Documento_per']);
			$persona->__SET('persona_tipo_doc', 				$_REQUEST['persona_tipo_doc']);
			$persona->__SET('Cod_Opinion', 				        $_REQUEST['Cod_Opinion']);

			$model->Actualizar_opinion($persona);
			print "<script>alert(\"Registro Actualizado exitosamente.\");window.location='persona.vista.php';</script>";
			break;

		case 'registrar':
			$persona->__SET('Cod_Opinion', 							$_REQUEST['Cod_Opinion']);
			$persona->__SET('Opinion', 				    			$_REQUEST['Opinion']);
			$persona->__SET('persona_Num_Documento_per', 			$_REQUEST['persona_Num_Documento_per']);
			$persona->__SET('persona_tipo_doc', 					$_REQUEST['persona_tipo_doc']);

			$model->Registrar_opinion($persona);
			print "<script>alert(\"Registro Agregado exitosamente.\");window.location='persona.vista.php';</script>";
			break;

//  		Instancia la clase a eliminar que se encuentra al final de cada registro//

		case 'eliminar':
			$model->Eliminar_opinion($_REQUEST['Cod_Opinion']);
			print "<script>alert(\"Registro Eliminado exitosamente.\");window.location='persona.vista.php';</script>";
			break;

//  		Instancia la clase editar que se encuentra al final de cada registro//	


		case 'editar':
			$persona = $model->Obtener_opinion($_REQUEST['Cod_Opinion']);
			break;

	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
			<title>CRUD PERSONA</title>
	<link rel="stylesheet" href="../css/style_form.css">

	</head>
	<body>

<!-- FORMULARIO NUEVO REGISTRO -->

<br><a href="?action=ver&m=1">NUEVO REGISTRO</a><br><br>

<div id="div_form">
<?php if( !empty($_GET['m']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

	<label for="Numero_Documento">Codigo opinion</label>
	<input type="number" name="Cod_Opinion" placeholder="Numero Documento" required>

		<br><br><label for="Primer Nombre">Opinion</label>
	<input type="text" name="Opinion" placeholder="Opinion" required>


	<br><br><label for="Primer Nombre">Numer de documento</label>
	<input type="text" name="persona_Num_Documento_per" placeholder="Numero de documento" required>

	<br><br><label for="Primer Nombre">Tipo de documento</label>
	<input type="text" name="persona_tipo_doc" placeholder="Primer Nombre" required>





	<!--	<br><br><label for="Numero Documento">Numero Documento</label>
	<select class="form-control" name="persona_Num_Documento_per">
		<?php
			foreach ($db->query('SELECT * FROM persona where Num_Documento_per=Num_Documento_per') as $row)
			{
				echo '<option value="' . $row['persona'] . '">' . $row['Num_Documento_per'] . '</option>';;
			}
		?>
	</select>


	<br><br><label for="tipo_doc">Tipo documento</label>
	<select class="form-control" name="persona_tipo_doc">
		<?php
			foreach ($db->query('SELECT * FROM persona where tipo_doc=tipo_doc') as $row)
			{
				echo '<option value="' . $row['persona'] . '">' . $row['tipo_doc'] . '</option>';;
			}
		?>
	</select>-->

	<br><br><input type="submit" value= "Guardar" onclick = "this.form.action = '?action=registrar';" />
</form>
</div>

<?php } ?>

<div id="div_form">

<?php if(!empty($_GET['Cod_Opinion']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

<!--LABEL USUARIO FINAL -->
<label>Persona por Modificar: <?php echo $persona->__GET('Cod_Opinion'); ?> </label>


<input type="number" name="Cod_Opinion" value="<?php echo $persona->__GET('Cod_Opinion'); ?>" style="display:none" placeholder="Numero Documento" required>

<br><br><label>Codigo opinion</label>
 <input type="number" name="Cod_Opinion2" id="Cod_Opinion2" value="<?php echo $persona->__GET('Cod_Opinion'); ?>" placeholder="Codigo de opiniono" required>


	</select>

<br><br><label>Opinion</label>
<input type="text" name="Opinion" id="Opinion" value="<?php echo $persona->__GET('Opinion'); ?>" placeholder="Opinion" required>

<br><br><label>Numero de documento</label>
<input type="text" name="persona_Num_Documento_per" id="persona_Num_Documento_per" value="<?php echo $persona->__GET('persona_Num_Documento_per'); ?>" placeholder="Numero De Documento" required>

<br><br><label>Tipo Documento</label>
<input type="text" name="persona_tipo_doc" id="persona_tipo_doc" value="<?php echo $persona->__GET('persona_tipo_doc'); ?>" placeholder="Tipo Documento" required>

<!--<br><br><label>Numero de documento</label>
<select class="form-control" name="persona_Num_Documento_per">
		<?php
			foreach ($db->query('SELECT * FROM opinion where persona_Num_Documento_per=persona_Num_Documento_per') as $row)
			{
				echo '<option value="' . $row['opinion'] . '">' . $row['persona_Num_Documento_per'] . '</option>';;
			}
		?>
		</select>
<br><br><label>Tipo Documento</label>

<select class="form-control" name="persona_tipo_doc">
		<?php
			foreach ($db->query('SELECT * FROM opinion where persona_tipo_doc=persona_tipo_doc') as $row)
			{
				echo '<option value="' . $row['opinion'] . '">' . $row['persona_tipo_doc'] . '</option>';;
			}
		?>
	</select>-->

<!-- <br> <input type="text" name="persona_tipo_doc" id="persona_tipo_doc" value="<?php echo $persona->__GET('persona_tipo_doc'); ?>" placeholder="Rol" required> -->

<br><br><input type="submit" value= "Actualizar" onclick = "this.form.action = '?action=actualizar';" />

</form>
</div>

<?php }

$sq11= "CALL Listar_opinion";

$query= $db->query($sq11);

if($query->rowCount()>0):?>

	<br><h1>Consulta - Registros</h1><br>
	<table id="customers">
		<thead>
			<tr>
				<th>Codigo opinion</th>
				<th>Opinion</th>
				<th>Numero de documento</th>
				<th>Tipo documento</th>
		
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
	

<?php foreach ($model->Listar_opinion() as $r): ?>
	<tr>
		<td><?php echo $r->__GET('Cod_Opinion'); ?></td>
		<td><?php echo $r->__GET('Opinion'); ?></td>
		<td><?php echo $r->__GET('persona_Num_Documento_per'); ?></td>
		<td><?php echo $r->__GET('persona_tipo_doc'); ?></td>

		<td>
		<a href="?action=editar&Cod_Opinion=<?php echo $r->Cod_Opinion; ?>">Editar</a>
	    </td>

	    <td>
		<a href="?action=eliminar&Cod_Opinion=<?php echo $r->Cod_Opinion; ?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Eliminar</a>
	    </td>

	</tr>
<?php endforeach; ?>

</table>

<?php else:?>

	<h4 class="alert-danger">Señor Usuario No se Encuentran Registros!!!</h4>

<?php endif;?>

</body>
</html>

