
<!DOCTYPE html>
<html lang="es">
<head Content-Type: text/html; charset=utf-8>
	<?php
		include("llamadoestilos.php");
		include "../Modelo/conection.php";
		?>
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap.min.css"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head> 
<body>
	<header>
	<?php
		include("header.php");
		?>
	</header>
	
	<table class="reg">
<tr>
<td>
<center>

			<h1>Productos</h1>
			
			<br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $con->query("select * from producto");
?>
<table class="listar">
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
while($r=$products->fetch_object()):?>

	<table class="tmenu" ><td>
	<center>
	
	<tr><td><?php echo $r->Nom_prod;?></td></tr>
	<tr><td><img src="<?php echo $r->Foto_prod;?>" width="190px" height="120px"> </td></tr>
	<tr><td><?php echo $r->Desc_prod;?></td></tr>
<tr><td><?php echo $r->tamaño_tamaño;?></td></tr>
	<tr><td>$ <?php echo $r->Valor_unitario; ?></td></tr>
	<tr>
	<td>
	<?php
	$found = false;

	if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->Cod_producto){ $found=true; break; }}}
	?>
	<?php if($found):?>
		<a href="cart.php" class="btn btn-info">Agregado</a>
	
	<?php else:?>
	<form class="form-inline" method="post" action="../Controlador/addtocart.php">
	<input type="hidden" name="product_id" value="<?php echo $r->Cod_producto; ?>">
	  <div class="form-group">
	    <input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
	  </div>
	  <button type="submit" class="btn btn-primary">Agregar al carrito</button>
	</form>	
	<?php endif; ?>
	</td>
	</tr>	

<?php endwhile; ?></table>
</table>

		</div>
	</div>
</div>

			
		</section>
		
	</section>
	</center>
	</td>
	</tr>
	</table>
	

	<footer>
		pie de pagina
	</footer>

</body>
</html>