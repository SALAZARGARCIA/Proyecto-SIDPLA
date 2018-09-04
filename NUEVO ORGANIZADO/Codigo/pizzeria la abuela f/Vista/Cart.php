<!DOCTYPE html>
<html>
<head>
    <title>Carrito - Pizzeria la Abuela</title>
    <meta charaset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/icomoon/style.css">
</head>
<body>
    <?php
        $Total = 0;
        include "header.php";
        include "../Modelo/cart.model.php";
        $model = new CarritoModel();
    ?>
    <main>
    	<div class="contenedor titulo">
    		<p>Carrito de compras</p>
    	</div>
    	<div class="contenedor blanco">
            <?php if(isset($_SESSION['cart'])){ ?>
            <div class="tabla_responsive">
            <table class="tabla_default">
                <thead>
                    <tr>
                        <th>PRODUCTO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>TAMAÑO</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO UNITARIO</th>
                        <th>SUBTOTAL</th>
                        <th></th>
                    </tr>
                </thead>
            <?php 
            foreach ($_SESSION["cart"] as $c){

                foreach ($model->Listar_Carrito($c['product_id']) as $r){ ?>               
                <tbody>
                    <tr>
                        <td><img src="MEDIA/<?php echo $r->__GET('Foto_prod'); ?>"></td>
                        <td>
                        <b><?php echo $r->__GET('Nom_prod'); ?></b><br>
                        <?php echo $r->__GET('Desc_prod'); ?>
                        </td>
                        <td><?php echo $r->__GET('tamaño_tamaño'); ?></td>
                        <td><?php echo $c["cant"]; ?></td>
                        <td>$<?php echo $r->__GET('Valor_unitario'); ?></td>
                        <td>$<?php echo $c["cant"]*$r->__GET('Valor_unitario'); ?></td>
                        <td>
                            <a class="a_advertencia" href="../Controlador/cart.control.php?id=<?php echo $c["product_id"]; ?>" 
                                   class="btn btn-danger">Eliminar <span class="icon-trash"></span></a>
                        </td>
                    </tr>
                </tbody>
            
            <?php } $Total=$Total+($c["cant"]*$r->__GET('Valor_unitario')); } ?>
                <tfoot>
                    <tr>
                    <td colspan="6">Total</td>
                    <td>$<?php echo $Total; ?></td>
                    </tr>
                </tfoot>
            </table>
            </div>
            <?php  
                if($model->Validar_Precio($Total)){ ?>
                    <input type="checkbox" id="detalle">
                    <label for="detalle" id="comprar">Continuar</label>
                <?php }else{ ?>
                    <p><b>Para continuar la compra debe ser mayor a $20.000</b></p>
                <?php }
            ?>
            
            <div class="finaliza_compra">
                <form method="post" action="../Controlador/persona.control.php">
                    <label for="Direc"><span class="icon-location"></span>Direccion</label>
                    <?php
                        if(isset($_SESSION['session'])){
                            $sql="SELECT Direc_per from PERSONA where Num_Documento_per = ?";
                            include_once "../Modelo/conexion.php";
                            $db=database::conectar();
                            $resultado=$db->prepare($sql);
                            $resultado->execute(array($_SESSION['session']['Documento']));
                            $Direccion='';
                            foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $k) {
                                $Direccion=$k->Direc_per;
                            }
                            ?>
                            <input type="text" name="Direc" id="Direc" value="<?php echo $Direccion; ?>" placeholder="Direccion">
                    <?php } else{  ?>
                            <input type="text" name="Direc" id="Direc" placeholder="Direccion">
                    <?php } ?>
                    <label for="Observaciones">Observaciones</label>
                    <textarea name="Observaciones" id="Observaciones" placeholder="Escriba aqui sus preferencias del domicilio" required></textarea>
                    <input type="submit" name="finalizar_compra" value="Finalizar Compra">
                </form>
            </div>
        <?php }else{  ?>
            <p>Tu carrito esta vacio</p>
            <img src="img/carro.png" style="width: 350px;">
        <?php } ?>
    	</div>

    </main>
    <?php 
        include "footer.php";
     ?>
</body>
</html>