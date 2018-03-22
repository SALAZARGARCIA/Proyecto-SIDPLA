<?php
require_once '../CONTROLADOR/tipo_prod.control.php';
require_once '../MODELO/tipo_prod.model.php';
require_once '../MODELO/database.php';
//logica
$tipo_prod = new TipoProducto();
$model = new TipoProductoModel();
$db = database::conectar();

if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']) {
		case 'actualizar':
			$tipo_prod->__SET('tipo_prod2', 			$_REQUEST['tipo_prod2']);
			$tipo_prod->__SET('estado_tipo_prod', 	    $_REQUEST['estado_tipo_prod']);			
			$tipo_prod->__SET('tipo_prod', 				$_REQUEST['tipo_prod']);

			$model->Actualizar_tipo_producto($tipo_prod);
			print "<script>alert(\"Registro Actualizado exitosamente.\");window.location='tipo_prod.vista.php';</script>";
			break;

		case 'registrar':
			$tipo_prod->__SET('tipo_prod', 				$_REQUEST['tipo_prod']);
			$tipo_prod->__SET('estado_tipo_prod', 		$_REQUEST['estado_tipo_prod']);
			

			$model->Registrar_tipo_producto($tipo_prod);
			print "<script>alert(\"Registro Agregado exitosamente.\");window.location='tipo_prod.vista.php';</script>";
			break;

//  		Instancia la clase a eliminar que se encuentra al final de cada registro//

		case 'eliminar':
			$model->Eliminar_tipo_producto($_REQUEST['tipo_prod']);
			print "<script>alert(\"Registro Eliminado exitosamente.\");window.location='tipo_prod.vista.php';</script>";
			break;

//  		Instancia la clase editar que se encuentra al final de cada registro//	


		case 'editar':
			$tipo_prod = $model->Obtener_tipo_producto($_REQUEST['tipo_prod']);
			break;

	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
			<title>CRUD tipo_prod</title>
	<link rel="stylesheet" href="../css/style_form.css">

	</head>
	<body>

<!-- FORMULARIO NUEVO REGISTRO -->

<br><a href="?action=ver&m=1">NUEVO REGISTRO</a><br><br>

<div id="div_form">
<?php if( !empty($_GET['m']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

	<label for="tipo prod">Tipo producto</label>
	<input type="text" name="tipo_prod" placeholder="Tipo producto" required>


	<br><br><label for="Estado producto">Estado producto</label>
	<input type="number" name="estado_tipo_prod" placeholder="Estado producto" required>

	

	<br><br><input type="submit" value= "Guardar" onclick = "this.form.action = '?action=registrar';" />
</form>
</div>

<?php } ?>

<div id="div_form">

<?php if(!empty($_GET['tipo_prod']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

<!--LABEL USUARIO FINAL -->

<input type="text" name="tipo_prod" value="<?php echo $tipo_prod->__GET('tipo_prod'); ?>" style="display:none" placeholder="Numero Documento" required>

<br><br><label>TIPO PRODUCTO</label>
 <input type="text"  readonly=”readonly” name="tipo_prod2" id="tipo_prod2" value="<?php echo $tipo_prod->__GET('tipo_prod'); ?>" placeholder="Tipo producto" required>

<br><br><label>ESTADO TIPO PRODUCTO</label>
<input type="number" name="estado_tipo_prod" id="estado_tipo_prod" value="<?php echo $tipo_prod->__GET('estado_tipo_prod'); ?>" placeholder="Estado tipo producto" required>


<!-- <br> <input type="text" name="rol_Rol" id="rol_Rol" value="<?php echo $tipo_prod->__GET('rol_Rol'); ?>" placeholder="Rol" required> -->

<br><br><input type="submit" value= "Actualizar" onclick = "this.form.action = '?action=actualizar';" />

</form>
</div>

<?php }

$sq11= "CALL Listar_tipo_producto";

$query= $db->query($sq11);

if($query->rowCount()>0):?>

	<br><h1>Consulta - Registros</h1><br>
	<table id="customers">
		<thead>
			<tr>
				<th>Tipo Producto</th>
				<th>Estado tipo producto</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
	

<?php foreach ($model->Listar_tipo_producto() as $r): ?>
	<tr>
		<td><?php echo $r->__GET('tipo_prod'); ?></td>		
		<td><?php echo $r->__GET('estado_tipo_prod'); ?></td>
		

		<td>
		<a href="?action=editar&tipo_prod=<?php echo $r->tipo_prod; ?>">Editar</a>
	    </td>

	    <td>
		<a href="?action=eliminar&tipo_prod=<?php echo $r->tipo_prod; ?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Eliminar</a>
	    </td>

	</tr>
<?php endforeach; ?>

</table>

<?php else:?>

	<h4 class="alert-danger">Señor Usuario No se Encuentran Registros!!!</h4>

<?php endif;?>

</body>
</html>

