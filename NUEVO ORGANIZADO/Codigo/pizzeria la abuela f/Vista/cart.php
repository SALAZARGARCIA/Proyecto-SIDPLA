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

        <br>

        <table class="reg1">
            <tr>
                <td>
            <center>



                <table class="listar1" >	

                    <h1>Carrito</h1>


                    <?php
                    /*
                     * Esta es la consula para obtener todos los productos de la base de datos.
                     */
                    $products = $con->query("select * from producto");
                    if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
                        ?>
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Foto</th>
                                <th>Tamaño</th>
                                <th>Precio Unitario</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        /*
                         * Apartir de aqui hacemos el recorrido de los productos obtenidos
                         *  y los reflejamos en una tabla.
                         */
                        foreach ($_SESSION["cart"] as $c):
                            $products = $con->query("select * from producto where Cod_producto=$c[product_id]");
                            $r = $products->fetch_object();
                            ?>
                            <tr>
                                <th><?php echo $c["q"]; ?></th>

                                <td><?php echo $r->Nom_prod; ?></td>
                                <td><?php echo $r->Desc_prod; ?></td>
                                <td><img src="MEDIA/<?php echo $r->Foto_prod; ?>" width="190px" height="120px"> <br></td>
                                <td><?php echo $r->tamaño_tamaño; ?></td><br>
                            <td>$ <?php echo $r->Valor_unitario; ?></td>
                            <td>$ <?php echo $o = $c["q"] * $r->Valor_unitario; ?></td>
                            <?php $d = $d + $o ?>

                            <td>
                                <?php
                                $found = false;
                                foreach ($_SESSION["cart"] as $c) {
                                    if ($c["product_id"] == $r->Cod_producto) {
                                        $found = true;
                                        break;
                                    }
                                }
                                ?>
                                <a href="../Controlador/delfromcart.php?id=<?php echo $c["product_id"]; ?>" 
                                   class="btn btn-danger">Eliminar <span class="icon-trash"></span></a>
                            </td>




                        <?php endforeach; ?>

                        </tr>
                    </table>
                    <table class="lis">

                        <tr>
                            <td> <h2>   <?php
                                    if ($d < 21999) {
                                        echo "Para realizar un domicilio debe realizar una compra de $22000 como minimo ";
                                    } else {
                                        echo '<h2 align="right">Total a pagar: $' . $d;
                                        ?>

                                    </h2><br>

                                    <form class="form-horizontal" method="post" action="../Controlador/controler1.php">
                                        <div class="form-group">
                                            <label for="Direc" class="col-sm-2 control-label"><span class="icon-location"></span>Direccion</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="Direc"  value="<?php
                                                session_start();
                                                if (!isset($_SESSION["session"])) {
                                                    echo "Direccion";
                                                } else {
                                                    $sessionidp = $_SESSION["idp"];
                                                    $res = $con->query("select * from persona where Num_Documento_per='$sessionidp'");
                                                    while ($rs = $res->fetch_object()):

                                                        echo $rs->Direc_per;
                                                    endwhile;
                                                }
                                                ?> " required class="form-control" id="Direc"
                                                       placeholder="Direccion">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Obser" class="col-sm-2 control-label">Observaciones</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="Obser" required class="form-control" id="Obser"
                                                       placeholder="Escriba aqui sus preferencias del domicilio">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" name="registrarVenta" 
                                                        class="comprar" ><span class="icon-check"></span>Confirmar compra</button>
                                            </div>
                                        </div>
                                    </form>

                                <?php } ?>
                            <?php else: ?>
                                <br>
                                <h2 class="alert alert-warning">El carrito esta vacio.</h2>

                                <br>
                                <br>
                                <hr>
                            <?php endif; ?>

                        </td>
                    </tr>
                </table>

            </center> 
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