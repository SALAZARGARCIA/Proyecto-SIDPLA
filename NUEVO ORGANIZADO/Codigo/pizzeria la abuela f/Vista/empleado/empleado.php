<!DOCTYPE html>
<html>
<head>
    <title>Empleado - Pizzeria la Abuela</title>
    <meta charaset="UTF-8">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
</head>
<body>
    <?php
        include "header_empleado.php";
        include "../seguridad.php";
        $seguridad = new Seguridad;
        $seguridad->Validar_Empleado();
        include "../../Modelo/conexion.php";
        $con = database::conectar();
    ?>
    <main>
        <div class="contenedor titulo">
            <p>Domicilios Pendientes</p>
        </div>
        <div class="contenedor blanco">
        <?php 
        $domicilio = $con->query("select t1.*, t2.*, t3.* from DOMICILIO as t1 inner 
                    join PERSONA_HAS_DOMICILIO 
                    as t2 on t1.Cod_Dom = t2.domicilio_Cod_dom inner join PERSONA as t3
                    on t2.persona_Num_Documento_per = t3.Num_Documento_per
                    where t1.estado_domicilio_Estado_dom = 'EN ESPERA'");
        $detalle = 0;
        if($domicilio->rowCount() == 0){ 
            echo "No hay domicilios pendientes.";
            ?> <br><img src="../img/chech_green.png" style="width: 250px; height: 250px; margin: 30px 0px;"> <?php
        }else{
        foreach ($domicilio->fetchAll(PDO::FETCH_OBJ) as $x){  ?>

            <div class="misdomicilios">
               <div class="detalle__dom">
                 <div class="detalle_domi">
                  <p><b>Fecha:</b> <?php echo $x->Fecha; ?></p>
                  <p>Direccion: <?php echo $x->Direc_Dom; ?></p>
                  <p><b>Cliente</b> <?php echo $x->Nombres; ?></p>
                  <p><b>Total:</b> $<?php echo $x->Valor_Total; ?></p>
                 </div>
               </div>
               <input type="checkbox" id="detalle <?php echo $detalle; ?>">
               <label for="detalle <?php echo $detalle; ?>">Ver Detalles</label>
               <?php 
               $codigo_dom2 = $x->Cod_dom;
               $domicilioss2 = $con->query("select t1.*, t2.* from DOMICILIO_HAS_PRODUCTO as t1 inner 
                join PRODUCTO as t2 on t1.producto_Cod_producto = t2.Cod_producto where t1.domicilio_Cod_dom= $codigo_dom2");
               ?>
               <div class="prod__dom">
                   <p><b>Observaciones: </b><?php echo $x->Observacion_dom; ?></p>
                   <?php while ($z = $domicilioss2->fetch(PDO::FETCH_OBJ)){  ?>
                   <div id="detalleprods">
                        <table>
                            <tr>
                                <td rowspan="5" style="padding-right: 5px;"><img src="../MEDIA/<?php echo $z->Foto_prod; ?>"></td>
                                <td><b><?php echo $z->Nom_prod; ?></b></td>
                            </tr>
                            <tr>
                                <td><?php echo $z->Desc_prod; ?></td>
                            </tr>
                            <tr>
                                <td>Tamaño: <?php echo $z->tamaño_tamaño; ?></td>
                            </tr>
                            <tr>
                                <td>Cantidad: <?php echo $z->Cantidad; ?></td>
                            </tr>
                            <tr>
                                <td>$ <?php echo $z->Valor_subtotal; ?></td>
                            </tr>

                        </table>
                        </div>
                      <?php } $detalle++ ?>
                      <br><br>
                      <a class="boton_exito" href="../../Controlador/empleado.control?Cambio_estado=Entregado&ID=<?php echo $x->Cod_dom; ?>">Entregar Domicilio</a>
                      <a class="boton_peligro" href="../../Controlador/empleado.control?Cambio_estado=Cancelado&ID=<?php echo $x->Cod_dom; ?>">Cancelar Domicilio</a>
               </div>
            </div>
      <?php } }?>
        </div>

    </main>
    <?php 
        include "../footer.php";
     ?>
</body>
</html>