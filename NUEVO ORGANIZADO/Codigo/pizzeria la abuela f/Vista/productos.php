
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

                <h1>Productos</h1>

                <div class="buscador">
                    <div class="buscador--wrapper">
                        <form class="buscador--form" action="#" method="post">
                            <div class="buscador--input-wrapper">
                                <input class="buscador--input" name="buscarcosa" type="search" placeholder="Buscar productos">
                            </div>
                            <input class="buscador--submit" type="submit" value="&#10140;" onclick = "this.form.action = '?action';"/>
                        </form>
                    </div>
                </div>

                <?php
                $b = 1;
                if (isset($_REQUEST['action'])) {
                    ?>
                    <table class="tmenu1" ><tr><td>			<br>
                                <?php
                                $b = 0;
                                $busca = $_POST['buscarcosa'];
                                /*
                                 * Esta es la consula para obtener todos los productos de la base de datos.
                                 */
                                $products = $con->query("select * from producto where Nom_prod LIKE '%$busca%'");
                                ?>

                                <?php
                                /*
                                 * Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
                                 */
                                $x = 0;
                                while ($r = $products->fetch_object()):
                                    ?>

                                <td>


                                    <?php echo $r->Nom_prod; ?><br>
                                    <img src="MEDIA/<?php echo $r->Foto_prod; ?>" width="190px" height="120px">

                                    <?php echo $r->tamaño_tamaño; ?><br>
                                    $ <?php echo $r->Valor_unitario; ?><br>


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
                                    <?php if ($found): ?><br>
                                        <a href="cart.php" class="comprar">Agregado</a>

                                    <?php else: ?>
                                        <form class="form-inline" method="post" action="../Controlador/addtocart.php">
                                            <input type="hidden" name="product_id" value="<?php echo $r->Cod_producto; ?>">
                                            <div class="form-group">
                                                <input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
                                            </div>
                                            <button type="submit" class="comprar">Agregar al carrito</button>
                                        </form>	



                                    <?php
                                    endif;
                                    $x += 1;
                                    if ($x == 4) {
                                        echo "<tr><td>";


                                        $x = 0;
                                    }
                                    ?>

                                <?php endwhile; ?></td> </tr></table>


                    </div>
                    </div>
                    </div>
              
            <?php
        } if ($b === 1) {
            ?>



            <table class="pro" >
                <tr>
                    <td>
                <center>
                    <a href=productosPizza.php><img src="img/Pizzas.jpg" ></a>
                    <a href=productosBebida.php><img src="img/Bebidas.jpg"></a> 
                    <a href=productosPasta.php><img src="img/Pastas.jpg"></a> 
                    <a href=productosEnsalada.php><img src="img/Ensaladas.jpg"></a>
                    <a href=productosAcompaniante.php><img src="img/Acompañantes.jpg"></a>
                </center>
            </td>
        </tr>
    </table>
<?php } ?>
      </td>
                    </tr>
            </table>
<br>
<br>

<?php
                                include 'footer.php';
?>
</body>
</html>