<?php
/*
 * Este archio muestra los productos en una tabla.
 */

include("llamadoestilos.php");
include "../../MODELO/conection.php";
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

                <ul class="slides">
                    <li>

                        <h1>Carrito</h1>

                        <br>

                        <table class="listar1" >	

                            <?php
                            /*
                             * Esta es la consula para obtener todos los productos de la base de datos.
                             */
                            $products = $con->query("select * from producto");
                            if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
                                ?>
                                <section id="contenido">
                                    <section id="principal">

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
                                         * Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
                                         */
                                        foreach ($_SESSION["cart"] as $c):
                                            $products = $con->query("select * from producto where Cod_producto=$c[product_id]");
                                            $r = $products->fetch_object();
                                            ?>
                                            <tr>
                                                <th><?php echo $c["q"]; ?></th>

                                                <td><?php echo $r->Nom_prod; ?></td>
                                                <td><?php echo $r->Desc_prod; ?></td>
                                                <td><img src="../MEDIA/<?php echo $r->Foto_prod; ?>" width="190px" height="120px"></td>
                                                <td><?php echo $r->tamaño_tamaño; ?></td>
                                                <td>$ <?php echo $r->Valor_unitario; ?></td>
                                                <td>$ <?php echo $c["q"] * $r->Valor_unitario; ?></td>
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
                                                    <a href="../../Controlador/delfromcart1.php?id=<?php echo $c["product_id"]; ?>" class="btn btn-danger">Eliminar</a>
                                                </td><br>


                                        <?php endforeach; ?>

                                        </tr>
                                        </table>

                                        <form class="form-horizontal" method="post" action="../../Controlador/controler2.php">
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
                                                    <button type="submit" name="registrarVenta" class="comprar" >Confirmar compra</button>
                                                </div>
                                            </div>
                                        </form>


                                    <?php else: ?>

                                        <br>
                                        <h2 class="alert alert-warning">El carrito esta vacio.</h2>
                                        <br>
                                        <br>
                                        <hr>

                                    <?php endif; ?>

                                    </li>
                                    </ul>

                                    </center> 
                                    </td>
                                    </tr>
                                    </table>

                                    <br>
                                    <br>

                                    <footer>
                                        <!-- pie de pagina-->
                                    </footer>

                                    </body>
                                    </html>