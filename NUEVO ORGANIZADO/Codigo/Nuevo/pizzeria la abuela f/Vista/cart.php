<?php
/*
* Este archio muestra los productos en una tabla.
*/

include("llamadoestilos.php");
include "../MODELO/conection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pizzeria la Abuela</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>
<body>
<header>
	<?php
		include("header.php");
		?>
	</header>
	
	<table class="reg1">
<tr>
<td>
<center>
<center>
							<section id="principal">
			<article id="slider">
				<div class="flexslider">
				<CENTER>
					<ul class="slides">
						<li>
			<h1>Carrito</h1>
			
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $con->query("select * from producto");
if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
?>
<section id="contenido">
<section id="principal">


<table class="listar">
<thead>
	<th>Cantidad</th>
	<th>Nombre</th>
	<th>Descripcion</th>
	<th>Foto</th>
	<th>Tamaño</th>
	<th>Precio Unitario</th>
	<th>Total</th>
	<th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
foreach($_SESSION["cart"] as $c):
$products = $con->query("select * from producto where Cod_producto=$c[product_id]");
$r = $products->fetch_object();
	?>
<center>
<th><?php echo $c["q"];?></th>
	<td><?php echo $r->Nom_prod;?></td>
	<td><?php echo $r->Desc_prod;?></td>
	<td><?php echo $r->Foto_prod;?></td>
	<td><?php echo $r->tamaño_tamaño;?></td>
	<td>$ <?php echo $r->Valor_unitario; ?></td>
	<td>$ <?php echo $c["q"]*$r->Valor_unitario; ?></td>
	<td>
	<?php
	$found = false;
	foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->Cod_producto){ $found=true; break; }}
	?>
		<a href="../Controlador/delfromcart.php?id=<?php echo $c["product_id"];?>" class="btn btn-danger">Eliminar</a>
	</td>
</tr>
<?php endforeach; ?>
</table>

<form class="form-horizontal" method="post" action="../Controlador/controler1.php">
  <div class="form-group">
    <label for="Direc" class="col-sm-2 control-label">Direccion</label>
    <div class="col-sm-5">
      <input type="text" name="Direc" required class="form-control" id="Direc" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="Obser" class="col-sm-2 control-label">Observaciones</label>
    <div class="col-sm-5">
      <input type="text" name="Obser" required class="form-control" id="Obser" placeholder="Escriba aqui sus preferencias del domicilio">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="registrarVenta" class="btn btn-primary">Procesar Venta</button>
    </div>
  </div>
</form>



<?php else:?>
	<p class="alert alert-warning">El carrito esta vacio.</p>
	<br><br><hr>
<?php endif;?>




</center>
</tr>
</td>
</table>


</body>
</html>