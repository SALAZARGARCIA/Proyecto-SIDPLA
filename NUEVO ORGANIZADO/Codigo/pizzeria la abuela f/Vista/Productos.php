<!DOCTYPE html>
<html>
<head>
    <title>Productos - Pizzeria la Abuela</title>
    <meta charaset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/icomoon/style.css">
</head>
<body>
    <?php
        include "header.php";
        include "../Modelo/conexion.php";
        $con = database::conectar();
        include "../Modelo/producto.model.php";

        
        // Se hace esta validacion por que al momento de añadir al carrito, la URL cambia 
        
            $busc = $_GET['Prod'];
            $busca = preg_replace('([^A-Za-z0-9])', '', $busc);
        
    ?>
    <main>

    	<div class="contenedor titulo"> <!---------TITULO--------->
    		<?php 
                switch ($_GET['Prod']) {
                    case 'PIZZA':
                            $products = $con->query("select * from PRODUCTO where tipo_producto_tipo_prod = '$busca' and estado_prod = 1");
                            ?> <p>Nuestras Pizzas</p> <?php
                        break;
                    case 'BEBIDA':
                            $products = $con->query("select * from PRODUCTO where tipo_producto_tipo_prod = '$busca' and estado_prod = 1");
                            ?> <p>Nuestras Bebidas</p> <?php
                        break;
                    case 'PASTA':
                            $products = $con->query("select * from PRODUCTO where tipo_producto_tipo_prod = '$busca' and estado_prod = 1");
                            ?> <p>Nuestras Pastas</p> <?php
                        break;
                    case 'ENSALADA':
                            $products = $con->query("select * from PRODUCTO where tipo_producto_tipo_prod = '$busca' and estado_prod = 1");
                            ?> <p>Nuestras Ensaladas</p> <?php
                        break;
                    case 'ACOMPAÑANTE':
                            $products = $con->query("select * from PRODUCTO where tipo_producto_tipo_prod = 'ACOMPAÑANTE' and estado_prod = 1");
                            ?> <p>Nuestros Acompañantes</p> <?php
                        break;
                    case 'ADICIONALES':
                            $products = $con->query("select * from PRODUCTO where tipo_producto_tipo_prod = '$busca' and estado_prod = 1");
                            ?> <p>Nuestros Adicionales</p> <?php
                        break;

                    default:
                        $products = $con->query("select * from PRODUCTO where Nom_prod LIKE '%$busca%' and estado_prod = 1");
                        ?> <p>Resultados para  "<?php echo $busca; ?> "</p> <?php
                        break;
                }
            ?>
    	</div>

        <!-- COMIENZO CONTENEDORES DE PRODUCTOS -->

    	<div class="contenedor blanco">
        <?php if($products->rowCount() == 0){ 
            echo "No se encontraron rasultados, por favor verifique su busqueda.";
            ?> <br><img src="img/error.png" style="width: 250px; height: 250px; margin: 30px 0px;"> <?php
        }else{
        foreach ($products->fetchAll(PDO::FETCH_OBJ) as $r): ?>

    		<div class="contprod">
                <p><?php echo $r->Nom_prod; ?></p>
                <img src="MEDIA/<?php echo $r->Foto_prod; ?>">
                <p><b>$</b><?php echo $r->Valor_unitario; ?></p>
                <p><b>Tamaño: </b><?php echo $r->tamaño_tamaño; ?></p>
                
                    <!--Carrito de compras -->
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
                        if ($found){ ?> 
                            <a href="Cart.php">Ver en el carrito<span class="icon-shopping-cart"></span></a>
                        <?php }else{ ?>
                            <form method="post" action="../Controlador/cart.control.php">
                                <input type="hidden" name="ID" value="<?php echo $r->Cod_producto; ?>">
                                <label for="cant">Cantidad</label>
                                <input type="number" name="Cantidad" value="1" min="1" max="20"  placeholder="Cantidad" id="cant">
                                <button type="submit" name="Anadir">Añadir al carrito <span class="icon-shopping-cart"></span></button>
                            </form>
                        <?php }
                    ?>
                    <!--FIN Carrito de compras -->
                    
                </form> 
            </div>

        <?php endforeach; } ?>


    	</div>

    </main>
    <?php 
        include "footer.php";
     ?>
</body>
</html>