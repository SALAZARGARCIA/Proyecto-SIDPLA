<?php
require_once '../CONTROLADOR/producto.control.php';
require_once '../MODELO/producto.model.php';
require_once '../MODELO/database.php';
//logica
$producto = new Producto();
$model = new ProductoModel();
$db = database::conectar();

if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']) {
		case 'actualizar':
			$producto->__SET('Cod_producto',	 $_REQUEST['Cod_producto']);
			$producto->__SET('Nom_prod', 		 $_REQUEST['Nom_prod']);
			$producto->__SET('Desc_prod', 		 $_REQUEST['Desc_prod']);
			$producto->__SET('Foto_prod', 		 $_REQUEST['Foto_prod']);
			$producto->__SET('Stok_min', 		 $_REQUEST['Stok_min']);
			$producto->__SET('Stok_max', 		 $_REQUEST['Stok_max']);
			$producto->__SET('Cantidad_exist',   $_REQUEST['Cantidad_exist']);
			$producto->__SET('tipo_producto_tipo_prod',   $_REQUEST['tipo_producto_tipo_prod']);
			$producto->__SET('tamaño_tamaño', 	 $_REQUEST['tamaño_tamaño']);
			$producto->__SET('Valor_unitario', 		 $_REQUEST['Valor_unitario']);
			/*$producto->__SET('Cod_producto2', 	 $_REQUEST['Cod_producto2']);*/

			$model->Actualizar_Producto($producto);
			print "<script>alert(\"Producto Actualizado exitosamente.\");window.location='producto.vista.php';</script>";
			break;

		case 'registrar':
			$producto->__SET('Cod_producto',	 $_REQUEST['Cod_producto']);
			$producto->__SET('Nom_prod', 		 $_REQUEST['Nom_prod']);
			$producto->__SET('Desc_prod', 		 $_REQUEST['Desc_prod']);
			$producto->__SET('Foto_prod', 		 $_REQUEST['Foto_prod']);
			$producto->__SET('Stok_min', 		 $_REQUEST['Stok_min']);
			$producto->__SET('Stok_max', 		 $_REQUEST['Stok_max']);
			$producto->__SET('Cantidad_exist',   $_REQUEST['Cantidad_exist']);
			$producto->__SET('tipo_producto_tipo_prod',   $_REQUEST['tipo_producto_tipo_prod']);
			$producto->__SET('tamaño_tamaño', 	 $_REQUEST['tamaño_tamaño']);
			$producto->__SET('Valor_unitario', 		 $_REQUEST['Valor_unitario']);
 
			$model->Registrar_Prod($producto);
			print "<script>alert(\"Producto Agregado exitosamente.\");window.location='producto.vista.php';</script>";
			break;

//  		Instancia la clase a eliminar que se encuentra al final de cada registro//

		case 'eliminar':
			$model->Eliminar_Producto($_REQUEST['Cod_producto']);
			print "<script>alert(\"Producto Eliminado exitosamente.\");window.location='producto.vista.php';</script>";
			break;

//  		Instancia la clase editar que se encuentra al final de cada registro//	


		case 'editar':
			$producto = $model->Obtener_Producto($_REQUEST['Cod_producto']);
			break;

	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
			<title>CRUD PRODUCTOS ABUELA</title>
	<link rel="stylesheet" href="../css/style_form.css">

	</head>
	<body>

<!-- FORMULARIO NUEVO REGISTRO -->

<br><a href="?action=ver&m=1">NUEVO REGISTRO</a><br><br>

<div id="div_form">
<?php if( !empty($_GET['m']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

	<br><br><label for="Cod_producto">Codigo</label>
	<input type="text" name="Cod_producto" placeholder="Codigo Producto" required>

	<br><br><label for="Nom_prod">Nombre</label>
	<input type="text" name="Nom_prod" placeholder="Nombre Producto" required>

	<br><br><label for="Desc_prod">Descripcion</label>
	<input type="text" name="Desc_prod" placeholder="Descripcion Producto" required>

	<br><br><label for="Foto_prod">Foto</label>
	<input type="text" name="Foto_prod" placeholder="Foto Producto" required>

	<br><br><label for="Stok_min">Stok Min</label>
	<input type="text" name="Stok_min" placeholder="Stok Min" required>

	<br><br><label for="Stok_max">Stok Max</label>
	<input type="text" name="Stok_max" placeholder="Stok Max" required>

	<br><br><label for="Cantidad_exist">Cantidad existente</label>
	<input type="text" name="Cantidad_exist" placeholder="Cant existente" required>

	<br><br><label for="tipo_producto_tipo_prod">Tipo Producto</label>
	<select class="form-control" name="tipo_producto_tipo_prod">
		<?php
			foreach ($db->query('SELECT * FROM tipo_producto where estado_tipo_prod=1') as $row)
			{
				echo '<option value="' . $row['tipo_prod'] . '">' . $row['tipo_prod'] . '</option>';;
			}
		?>
	</select>

	<br><br><label for="tamaño_tamaño">Tamaño</label>
	<select class="form-control" name="tamaño_tamaño">
		<?php
			foreach ($db->query('SELECT * FROM tamaño where estado_tamaño=1') as $row)
			{
				echo '<option value="' . $row['tamaño'] . '">' . $row['tamaño'] . '</option>';;
			}
		?>
	</select>

	<br><br><label for="Valor_unitario">Valor</label>
	<input type="text" name="Valor_unitario" placeholder="Valor" required>

	<!--<label for="user_pass">Estado rol</label><br>
	ACTIVO <input type="radio" name="estado_rol" value="1" checked>
	INACTIVO <input type="radio" name="estado_rol" value="0">-->

	<br><br><br><input type="submit" value= "Guardar" onclick = "this.form.action = '?action=registrar';" />
</form>
</div>

<?php } ?>

<div id="div_form">

<?php if(!empty($_GET['Cod_producto']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

<!--LABEL USUARIO FINAL -->

<label> ID Producto por modificar:<?php echo $producto->__GET('Cod_producto'); ?></label>


<input type="text" name="Cod_producto" value="<?php echo $producto->__GET('Cod_producto'); ?>" style="display:none" placeholder="Codigo" required>

<!--<br><br><label for="Cod_producto">Codigo</label>
<input type="text" name="Cod_producto2" value="<?php echo $producto->__GET('Cod_producto'); ?>" placeholder="Codigo" required>-->

<br><br><label for="Nom_prod">Nombre</label>
<input type="text" name="Nom_prod" value="<?php echo $producto->__GET('Nom_prod'); ?>" placeholder="Nombre" required>

<br><br><label for="Desc_prod">Descripcion</label>
<input type="text" name="Desc_prod" value="<?php echo $producto->__GET('Desc_prod'); ?>" placeholder="Descripcion" required>

<br><br><label for="Foto_prod">Foto</label>
<input type="text" name="Foto_prod" value="<?php echo $producto->__GET('Foto_prod'); ?>" placeholder="Foto" required>

<?php if($producto->__GET('tipo_producto_tipo_prod') == 'BEBIDA'){ ?>
<br><br><label for="Stok_min">Stok Min</label>
<input type="number" name="Stok_min" value="<?php echo $producto->__GET('Stok_min'); ?>" placeholder="Stok Min" required>
<?php }else{ ?>
<input type="number" name="Stok_min" value="1" placeholder="Stok Min" required style="display:none">
<?php } ?>

<?php if($producto->__GET('tipo_producto_tipo_prod') == 'BEBIDA'){ ?>
<br><br><label for="Stok_min">Stok Max</label>
<input type="number" name="Stok_max" value="<?php echo $producto->__GET('Stok_max'); ?>" placeholder="Stok Max" required>
<?php }else{ ?>
<input type="number" name="Stok_max" value="1" placeholder="Stok Max" required style="display:none">
<?php } ?>

<?php if($producto->__GET('tipo_producto_tipo_prod') == 'BEBIDA'){ ?>
<br><br><label for="Cantidad_exist">Cantidad existente</label>
<input type="number" name="Cantidad_exist" value="<?php echo $producto->__GET('Cantidad_exist'); ?>" placeholder="Cantidad exist" required>
<?php }else{ ?>
<input type="number" name="Cantidad_exist" value="1" placeholder="Cantidad exist" required style="display:none">
<?php } ?>

<br><br><label>Tipo Producto: <?php echo $producto->__GET('tipo_producto_tipo_prod'); ?></label>
<input type="text" name="tipo_producto_tipo_prod" value="<?php echo $producto->__GET('tipo_producto_tipo_prod'); ?>" placeholder="Tipo de Producto" required style="display:none">

<br><br><label>Tamaño: <?php echo $producto->__GET('tamaño_tamaño'); ?></label>
<input type="text" name="tamaño_tamaño" value="<?php echo $producto->__GET('tamaño_tamaño'); ?>" placeholder="Tamaño" required style="display:none">


<br><br><label for="Valor_unitario">Valor</label>
<input type="text" name="Valor_unitario" value="<?php echo $producto->__GET('Valor_unitario'); ?>" placeholder="Valor" required>


<br><input type="submit" value= "Actualizar" onclick = "this.form.action = '?action=actualizar';" />

</form>
</div>

<?php }

$sq11= "CALL Consulta_Producto";

$query= $db->query($sq11);

if($query->rowCount()>0):?>

	<br><h1>Consulta - Registros</h1><br>
	<table id="customers">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Foto</th>
				<th>Stok_min</th>
				<th>Stok_max</th>
				<th>Cantidad_exist</th>
				<th>Valor_unitario</th>
				<th>tamaño_tamaño</th>
				<th>tipo_producto_tipo_prod</th>
				<th>Editar</th>
				<th>Eliminar</th>

			</tr>
		</thead>
	

<?php foreach ($model->Listar_Prod() as $r): ?>
	<tr>
		<td><?php echo $r->__GET('Cod_producto'); ?></td>
		<td><?php echo $r->__GET('Nom_prod'); ?></td>
		<td><?php echo $r->__GET('Desc_prod'); ?></td>
		<td><?php echo $r->__GET('Foto_prod'); ?></td>
		<td><?php echo $r->__GET('Stok_min'); ?></td>
		<td><?php echo $r->__GET('Stok_max'); ?></td>
		<td><?php echo $r->__GET('Cantidad_exist'); ?></td>
		<td><?php echo $r->__GET('Valor_unitario'); ?></td>
		<td><?php echo $r->__GET('tamaño_tamaño'); ?></td>
		<td><?php echo $r->__GET('tipo_producto_tipo_prod'); ?></td>

		<td>
		<a href="?action=editar&Cod_producto=<?php echo $r->Cod_producto; ?>">Editar</a>
	    </td>

	    <td>
		<a href="?action=eliminar&Cod_producto=<?php echo $r->Cod_producto; ?>" onclick="return confirm('¿Esta seguro de eliminar este Producto?')">Eliminar</a>
	    </td>

	</tr>
<?php endforeach; ?>

</table>

<?php else:?>

	<h4 class="alert-danger">Señor Usuario No se Encuentran Registros!!!</h4>

<?php endif;?>

</body>
</html>

