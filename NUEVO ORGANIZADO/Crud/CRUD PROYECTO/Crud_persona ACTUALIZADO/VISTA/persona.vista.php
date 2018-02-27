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
			$persona->__SET('Num_Documento_per2', 				$_REQUEST['Num_Documento_per2']);
			$persona->__SET('Primer_Nombre_per', 				$_REQUEST['Primer_Nombre_per']);
			$persona->__SET('Segundo_Nombre_per', 				$_REQUEST['Segundo_Nombre_per']);
			$persona->__SET('Primer_Apellido_per', 				$_REQUEST['Primer_Apellido_per']);
			$persona->__SET('Segundo_Apellido_per', 			$_REQUEST['Segundo_Apellido_per']);
			$persona->__SET('Usuario_login', 				 	$_REQUEST['Usuario_login']);
			$persona->__SET('Pass_login', 						$_REQUEST['Pass_login']);
			$persona->__SET('Tel_per', 							$_REQUEST['Tel_per']);
			$persona->__SET('Cel_per', 							$_REQUEST['Cel_per']);
			$persona->__SET('Direc_per', 						$_REQUEST['Direc_per']);
			$persona->__SET('Correo_per', 						$_REQUEST['Correo_per']);
			$persona->__SET('tipo_doc', 						$_REQUEST['tipo_doc']);
			$persona->__SET('rol_Rol', 							$_REQUEST['rol_Rol']);
			$persona->__SET('Num_Documento_per', 				$_REQUEST['Num_Documento_per']);

			$model->Actualizar_Persona($persona);
			print "<script>alert(\"Registro Actualizado exitosamente.\");window.location='persona.vista.php';</script>";
			break;

		case 'registrar':
			$persona->__SET('Num_Documento_per', 				$_REQUEST['Num_Documento_per']);
			$persona->__SET('Primer_Nombre_per', 				$_REQUEST['Primer_Nombre_per']);
			$persona->__SET('Segundo_Nombre_per', 				$_REQUEST['Segundo_Nombre_per']);
			$persona->__SET('Primer_Apellido_per', 				$_REQUEST['Primer_Apellido_per']);
			$persona->__SET('Segundo_Apellido_per', 			$_REQUEST['Segundo_Apellido_per']);
			$persona->__SET('Usuario_login', 				 	$_REQUEST['Usuario_login']);
			$persona->__SET('Pass_login', 						$_REQUEST['Pass_login']);
			$persona->__SET('Tel_per', 							$_REQUEST['Tel_per']);
			$persona->__SET('Cel_per', 							$_REQUEST['Cel_per']);
			$persona->__SET('Direc_per', 						$_REQUEST['Direc_per']);
			$persona->__SET('Correo_per', 						$_REQUEST['Correo_per']);
			$persona->__SET('tipo_doc', 						$_REQUEST['tipo_doc']);
			$persona->__SET('rol_Rol', 							$_REQUEST['rol_Rol']);

			$model->Registrar_Persona($persona);
			print "<script>alert(\"Registro Agregado exitosamente.\");window.location='persona.vista.php';</script>";
			break;

//  		Instancia la clase a eliminar que se encuentra al final de cada registro//

		case 'eliminar':
			$model->Eliminar_Persona($_REQUEST['Num_Documento_per']);
			print "<script>alert(\"Registro Eliminado exitosamente.\");window.location='persona.vista.php';</script>";
			break;

//  		Instancia la clase editar que se encuentra al final de cada registro//	


		case 'editar':
			$persona = $model->Obtener_Persona($_REQUEST['Num_Documento_per']);
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

	<label for="Numero_Documento">Numero Documento</label>
	<input type="number" name="Num_Documento_per" placeholder="Numero Documento" required>

	<br><br><label for="Tipo Documento">Tipo Documento</label>
	<select class="form-control" name="tipo_doc">
		<?php
			foreach ($db->query('SELECT * FROM tipo_doc where estado_tipo_doc=1') as $row)
			{
				echo '<option value="' . $row['tipo_doc'] . '">' . $row['tipo_doc'] . '</option>';;
			}
		?>
	</select>

	<br><br><label for="Primer Nombre">Primer Nombre</label>
	<input type="text" name="Primer_Nombre_per" placeholder="Primer Nombre" required>

	<br><br><label for="Segundo Nombre">Segundo Nombre</label>
	<input type="text" name="Segundo_Nombre_per" placeholder="Segundo Nombre" required>

	<br><br><label for="Primer Apellido">Primer Apellido</label>
	<input type="text" name="Primer_Apellido_per" placeholder="Primer Apellido" required>

	<br><br><label for="Segundo Apellido">Segundo Apellido</label>
	<input type="text" name="Segundo_Apellido_per" placeholder="Segundo Apellido" required>

	<br><br><label for="Usuario">Usuario</label>
	<input type="text" name="Usuario_login" placeholder="Usuario" required>

	<br><br><label for="Contraseña">Contraseña</label>
	<input type="password" name="Pass_login" placeholder="Contraseña" required>

	<br><br><label for="Telefono">Telefono</label>
	<input type="number" name="Tel_per" placeholder="Telefono" required>

	<br><br><label for="Celular">Celular</label>
	<input type="number" name="Cel_per" placeholder="Celular" required>

	<br><br><label for="Direccion">Direccion</label>
	<input type="text" name="Direc_per" placeholder="Direccion" required>

	<br><br><label for="Correo">Correo</label>
	<input type="email" name="Correo_per" placeholder="Correo" required>

	<br><br><label for="Rol">Rol</label>
	<select class="form-control" name="rol_Rol">
		<?php
			foreach ($db->query('SELECT * FROM rol where estado_rol=1') as $row)
			{
				echo '<option value="' . $row['Rol'] . '">' . $row['Rol'] . '</option>';;
			}
		?>
	</select>

	<br><br><input type="submit" value= "Guardar" onclick = "this.form.action = '?action=registrar';" />
</form>
</div>

<?php } ?>

<div id="div_form">

<?php if(!empty($_GET['Num_Documento_per']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

<!--LABEL USUARIO FINAL -->
<label>Persona por Modificar: <?php echo $persona->__GET('Num_Documento_per'); ?> </label>


<input type="number" name="Num_Documento_per" value="<?php echo $persona->__GET('Num_Documento_per'); ?>" style="display:none" placeholder="Numero Documento" required>

<br><br><label>Numero Documento</label>
 <input type="number" name="Num_Documento_per2" id="Num_Documento_per2" value="<?php echo $persona->__GET('Num_Documento_per'); ?>" placeholder="Numero Documento" required>

<br><br><label>Tipo Documento</label>
<select class="form-control" name="tipo_doc">
		<?php
			foreach ($db->query('SELECT * FROM tipo_doc where estado_tipo_doc=1') as $row)
			{
				echo '<option value="' . $row['tipo_doc'] . '">' . $row['tipo_doc'] . '</option>';;
			}
		?>
	</select>

<br><br><label>Primer Nombre</label>
<input type="text" name="Primer_Nombre_per" id="Primer_Nombre_per" value="<?php echo $persona->__GET('Primer_Nombre_per'); ?>" placeholder="Primer Nombre" required>
<br><br><label>Segundo Nombre</label>
<input type="text" name="Segundo_Nombre_per" id="Segundo_Nombre_per" value="<?php echo $persona->__GET('Segundo_Nombre_per'); ?>" placeholder="Segundo Nombre" required>
<br><br><label>Primer Apellido</label>
<input type="text" name="Primer_Apellido_per" id="Primer_Apellido_per" value="<?php echo $persona->__GET('Primer_Apellido_per'); ?>" placeholder="Primer Apellido" required>
<br><br><label>Segundo Apellido</label>
<input type="text" name="Segundo_Apellido_per" id="Segundo_Apellido_per" value="<?php echo $persona->__GET('Segundo_Apellido_per'); ?>" placeholder="Segundo Apellido" required>
<br><br><label>Usuario</label>
<input type="text" name="Usuario_login" id="Usuario_login" value="<?php echo $persona->__GET('Usuario_login'); ?>" placeholder="Usuario" required>
<br><br><label>Contraseña</label>
<input type="password" name="Pass_login" id="Pass_login" value="<?php echo $persona->__GET('Pass_login'); ?>" placeholder="Contraseña" required>
<br><br><label>Telefono</label>
<input type="number" name="Tel_per" id="Tel_per" value="<?php echo $persona->__GET('Tel_per'); ?>" placeholder="Telefono" required>
<br><br><label>Celular</label>
<input type="number" name="Cel_per" id="Cel_per" value="<?php echo $persona->__GET('Cel_per'); ?>" placeholder="Celular" required>
<br><br><label>Direccion</label>
<input type="text" name="Direc_per" id="Direc_per" value="<?php echo $persona->__GET('Direc_per'); ?>" placeholder="Direccion" required>
<br><br><label>Correo</label>
<input type="text" name="Correo_per" id="Correo_per" value="<?php echo $persona->__GET('Correo_per'); ?>" placeholder="Correo" required>

<br><br><label>Rol</label>
<select class="form-control" name="rol_Rol">
		<?php
			foreach ($db->query('SELECT * FROM rol where estado_rol=1') as $row)
			{
				echo '<option value="' . $row['Rol'] . '">' . $row['Rol'] . '</option>';;
			}
		?>
	</select>

<!-- <br> <input type="text" name="rol_Rol" id="rol_Rol" value="<?php echo $persona->__GET('rol_Rol'); ?>" placeholder="Rol" required> -->

<br><br><input type="submit" value= "Actualizar" onclick = "this.form.action = '?action=actualizar';" />

</form>
</div>

<?php }

$sq11= "CALL Listar_Persona";

$query= $db->query($sq11);

if($query->rowCount()>0):?>

	<br><h1>Consulta - Registros</h1><br>
	<table id="customers">
		<thead>
			<tr>
				<th>Numero Documento</th>
				<th>Tipo Documento</th>
				<th>Primer Nombre</th>
				<th>Segundo Nombre</th>
				<th>Primer Apellido</th>
				<th>Segundo Apellido</th>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Telefono</th>
				<th>Celular</th>
				<th>Direccion</th>
				<th>Correo</th>
				<th>Rol</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
	

<?php foreach ($model->Listar_Persona() as $r): ?>
	<tr>
		<td><?php echo $r->__GET('Num_Documento_per'); ?></td>
		<td><?php echo $r->__GET('tipo_doc'); ?></td>
		<td><?php echo $r->__GET('Primer_Nombre_per'); ?></td>
		<td><?php echo $r->__GET('Segundo_Nombre_per'); ?></td>
		<td><?php echo $r->__GET('Primer_Apellido_per'); ?></td>
		<td><?php echo $r->__GET('Segundo_Apellido_per'); ?></td>
		<td><?php echo $r->__GET('Usuario_login'); ?></td>
		<td><?php echo $r->__GET('Pass_login'); ?></td>
		<td><?php echo $r->__GET('Tel_per'); ?></td>
		<td><?php echo $r->__GET('Cel_per'); ?></td>
		<td><?php echo $r->__GET('Direc_per'); ?></td>
		<td><?php echo $r->__GET('Correo_per'); ?></td>
		<td><?php echo $r->__GET('rol_Rol'); ?></td>

		<td>
		<a href="?action=editar&Num_Documento_per=<?php echo $r->Num_Documento_per; ?>">Editar</a>
	    </td>

	    <td>
		<a href="?action=eliminar&Num_Documento_per=<?php echo $r->Num_Documento_per; ?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Eliminar</a>
	    </td>

	</tr>
<?php endforeach; ?>

</table>

<?php else:?>

	<h4 class="alert-danger">Señor Usuario No se Encuentran Registros!!!</h4>

<?php endif;?>

</body>
</html>

