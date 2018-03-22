
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
$puto=pasta;
	<header>
	<?php
		include("header.php");
		?>
	</header>
	
	<table class="reg1" >
<tr>
<td >
<center>

			<h1>Productos</h1>
			
<table class="tmenu1" ><tr><td>			<br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $con->query("select * from producto where tipo_producto_tipo_prod = 'PASTA'");
?>

<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
$x=0;
while($r=$products->fetch_object()):?>

	<td>

	
	<?php echo $r->Nom_prod;?><br>
	<img src="administrador/MEDIA/<?php echo $r->Foto_prod;?>" width="190px" height="120px">
	
<?php echo $r->tamaño_tamaño;?><br>
	$ <?php echo $r->Valor_unitario; ?><br>
	
	
	<?php
	$found = false;

	if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->Cod_producto){ $found=true; break; }}}
	?>
	<?php if($found):?><br>
		<a href="cart.php" class="comprar">Agregado</a>
	
	<?php else:?>
	<form class="form-inline" method="post" action="../Controlador/addtocart.php">
	<input type="hidden" name="product_id" value="<?php echo $r->Cod_producto; ?>">
	  <div class="form-group">
	    <input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
	  </div>
	  <button type="submit" class="comprar">Agregar al carrito</button>
	</form>	
	
	
	
	<?php endif; 
	$x+=1;
	if($x==4){
		echo "<tr><td>";
		
		
		$x=0;
	}
	
	?>

<?php endwhile; ?></td> </tr></table>
	

		</div>
	</div>
</div>
</td>
</tr>
</table>
			
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