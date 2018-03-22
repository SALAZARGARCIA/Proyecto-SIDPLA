<?php
require_once '../CONTROLADOR/tipo_doc.control.php';
require_once '../MODELO/tipo_doc.model.php';
require_once '../MODELO/database.php';
//logica
$tipo_doc = new TipoDoc();
$model = new TipoDocModel();
$db = database::conectar();

if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']) {
		case 'actualizar':
			$tipo_doc->__SET('tipo_doc2', 			    $_REQUEST['tipo_doc2']);
			$tipo_doc->__SET('estado_tipo_doc', 	    $_REQUEST['estado_tipo_doc']);			
			$tipo_doc->__SET('tipo_doc', 				$_REQUEST['tipo_doc']);

			$model->Actualizar_tipo_doc($tipo_doc);
			print "<script>alert(\"Registro Actualizado exitosamente.\");window.location='tipo_doc.vista.php';</script>";
			break;

		case 'registrar':
			$tipo_doc->__SET('tipo_doc', 				$_REQUEST['tipo_doc']);
			$tipo_doc->__SET('estado_tipo_doc', 		$_REQUEST['estado_tipo_doc']);
			

			$model->Registrar_tipo_doc($tipo_doc);
			print "<script>alert(\"Registro Agregado exitosamente.\");window.location='tipo_doc.vista.php';</script>";
			break;

//  		Instancia la clase a eliminar que se encuentra al final de cada registro//

		case 'eliminar':
			$model->Eliminar_tipo_doc($_REQUEST['tipo_doc']);
			print "<script>alert(\"Registro Eliminado exitosamente.\");window.location='tipo_doc.vista.php';</script>";
			break;

//  		Instancia la clase editar que se encuentra al final de cada registro//	


		case 'editar':
			$tipo_doc = $model->Obtener_tipo_doc($_REQUEST['tipo_doc']);
			break;

	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
			<title>CRUD tipo_doc</title>
	<link rel="stylesheet" href="../css/style_form.css">

	</head>
	<body>

<!-- FORMULARIO NUEVO REGISTRO -->

<br><a href="?action=ver&m=1">NUEVO REGISTRO</a><br><br>

<div id="div_form">
<?php if( !empty($_GET['m']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

	<label for="tipo prod">Tipo Documento</label>
	<input type="text" name="tipo_doc" placeholder="Tipo Documento" required>


	<br><br><label for="Estado Documento">Estado Tipo Documento</label>
	<input type="number" name="estado_tipo_doc" placeholder="Estado Documento" required>

	

	<br><br><input type="submit" value= "Guardar" onclick = "this.form.action = '?action=registrar';" />
</form>
</div>

<?php } ?>

<div id="div_form">

<?php if(!empty($_GET['tipo_doc']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

<!--LABEL USUARIO FINAL -->
<label>Tipo de documento por Modificar: <?php echo $tipo_doc->__GET('tipo_doc'); ?> </label>


<input type="text" name="tipo_doc" value="<?php echo $tipo_doc->__GET('tipo_doc'); ?>" style="display:none" placeholder="Numero Documento" required>

<br><br><label>TIPO DOCUMENTO</label>
 <input type="text" name="tipo_doc2" id="tipo_doc2" value="<?php echo $tipo_doc->__GET('tipo_doc'); ?>" placeholder="Tipo Documento" required>

<br><br><label>ESTADO TIPO DOCUMENTO</label>
<input type="number" name="estado_tipo_doc" id="estado_tipo_doc" value="<?php echo $tipo_doc->__GET('estado_tipo_doc'); ?>" placeholder="Estado tipo Documento" required>


<!-- <br> <input type="text" name="rol_Rol" id="rol_Rol" value="<?php echo $tipo_doc->__GET('rol_Rol'); ?>" placeholder="Rol" required> -->

<br><br><input type="submit" value= "Actualizar" onclick = "this.form.action = '?action=actualizar';" />

</form>
</div>

<?php }

$sq11= "CALL Listar_tipo_doc";

$query= $db->query($sq11);

if($query->rowCount()>0):?>

	<br><h1>Consulta - Registros</h1><br>
	<table id="customers">
		<thead>
			<tr>
				<th>Tipo Documento</th>
				<th>Estado Tipo Documento</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
	

<?php foreach ($model->Listar_tipo_doc() as $r): ?>
	<tr>
		<td><?php echo $r->__GET('tipo_doc'); ?></td>		
		<td><?php echo $r->__GET('estado_tipo_doc'); ?></td>
		

		<td>
		<a href="?action=editar&tipo_doc=<?php echo $r->tipo_doc; ?>">Editar</a>
	    </td>

	    <td>
		<a href="?action=eliminar&tipo_doc=<?php echo $r->tipo_doc; ?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Eliminar</a>
	    </td>

	</tr>
<?php endforeach; ?>

</table>

<?php else:?>

	<h4 class="alert-danger">Señor Usuario No se Encuentran Registros!!!</h4>

<?php endif;?>

</body>
</html>

