
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
        
        <br>

        <table class="reg1" >
            <tr>
                <td>
            <center>

                <h1>Nuestras Pizzas</h1>
                
                <br>

                <table class="tmenu1" >
                    <tr>
                        <td>	
                            
                            <br>
                            
                            <?php
                            /*
                             * Esta es la consula para obtener todos los productos de la base de datos.
                             */
                            $products = $con->query("select * from producto where tipo_producto_tipo_prod = 'PIZZA'");
                            ?>

                            <?php
                            /*
                             * Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
                             */
                            $x = 0;
                            while ($r = $products->fetch_object()):
                                ?>

                            
                            	<?php
                				$rs = $products->fetch_object();
                				$rss = $products->fetch_object();


                             if($r->Nom_prod==$rss->Nom_prod){ ?>
                             <td>

    						<p><?php echo $r->Nom_prod; ?></p><br>
                                
                                
                                
                                <img src="MEDIA/<?php echo $r->Foto_prod; ?>" width="190px" height="120px">

    						<!--<?php echo $r->tamaño_tamaño; ?>-->

    							
                                
                                <br>
                                
                                <!--$ <?php echo $r->Valor_unitario; ?><br>-->


                                <?php
                                $found = false;

                                if (isset($_SESSION["cart"])) {
                                    foreach ($_SESSION["cart"] as $c) {
                                        if ($c["product_id"] == $r->Cod_producto) {
                                            $found = true;
                                            break;
                                        }
                                    }
                                }
                                ?>
    
                                    <form class="form-inline" method="post" action="../Controlador/addtocart.php">
                                    	<h4>Tamaño</h4>
                                    	<select class="form-control" name="tamano">
											<?php
												$dede= $r->Desc_prod;
												$qq = "select tamaño_tamaño, valor_unitario  from producto where tipo_producto_tipo_prod = 'PIZZA' and desc_prod = '$dede'";
												foreach ($con->query($qq) as $row)
												{
												echo '<option value="' . $row['tamaño_tamaño'] . '">' . $row['tamaño_tamaño'] . " $" . $row['valor_unitario'] . '</option>';;
												}
										?>
										</select>
                                        <input type="hidden" name="tipo_prod" value="<?php echo $r->tipo_producto_tipo_prod; ?>">
                                        <input type="hidden" name="Nom_produ" value="<?php echo $r->Nom_prod; ?>">
                                        <div class="form-group">
                                        	Cant.
                                        <input type="number" name="q" value="1" style="width:100px;" min="1" max="20" class="form-control" placeholder="Cantidad">
                                        </div>
                                        <button type="submit" class="comprar">Agregar al carrito</button>
                                    </form>	



                                <?php
                                
                                $x += 1;
                                if ($x == 4) {
                                    echo "<tr><td><tr><td><tr><td>";


                                    $x = 0;
                                }}
                                ?>

<?php endwhile; ?>
                            </td> 
                    </tr>
                </table>


            </center>
                </td>
                </tr>
        </table>

 


<?php
                                include 'footer.php';
?>

</body>
</html>