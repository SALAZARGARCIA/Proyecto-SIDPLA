<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "php/conection.php";
?>
<!DOCTYPE html>
<html>
<head Content-Type: text/html; charset=utf-8>
	<title>Pizzeria la Abuela</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Productos</h1>
			<a href="./cart.php" class="btn btn-warning">Ver Carrito</a>
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $con->query("select * from producto");
?>
<table class="table table-bordered">
<thead>
	<th>Nombre</th>
	<th>Descripcion</th>
	<th>Foto</th>
	<th>Tamaño</th>
	<th>Precio</th>
	<th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
while($r=$products->fetch_object()):?>
<tr>
	<td><?php echo $r->Nom_prod;?></td>
	<td><?php echo $r->Desc_prod;?></td>
	<td><?php echo $r->Foto_prod;?></td>
	<td><?php echo $r->tamaño_tamaño;?></td>
	<td>$ <?php echo $r->Valor_unitario; ?></td>
	<td style="width:260px;">
	<?php
	$found = false;

	if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->Cod_producto){ $found=true; break; }}}
	?>
	<?php if($found):?>
		<a href="cart.php" class="btn btn-info">Agregado</a>
	<?php else:?>
	<form class="form-inline" method="post" action="./php/addtocart.php">
	<input type="hidden" name="product_id" value="<?php echo $r->Cod_producto; ?>">
	  <div class="form-group">
	    <input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
	  </div>
	  <button type="submit" class="btn btn-primary">Agregar al carrito</button>
	</form>	
	<?php endif; ?>
	</td>
</tr>
<?php endwhile; ?>
</table>

		</div>
	</div>
</div>
</body>
</html>