<?php
if (!isset($_SESSION["session"])) { // Verifica si la variable de sesión creada esta activa si no la inicializa
    session_start();
    $ruta = "";
}
include("../../modelo/conection.php");
error_reporting(0);
$sessionidp = $_SESSION["idp"];
$sessiontdp = $_SESSION["tdp"];
$rol_pers = $_SESSION["rolp"];
$res = $con->query("select * from persona where Num_Documento_per='$sessionidp' and tipo_doc='$sessiontdp' and rol_Rol= 'EMPLEADO'");
$re = $con->query("select * from persona where Num_Documento_per='$sessionidp' and tipo_doc='$sessiontdp' and rol_Rol= 'ADMINISTRADOR'");
if ($res->num_rows == 1 || $re->num_rows == 1) {
    ?>

    <html lang="es">
        <head>
            <script src="jquery-3.3.1.js"></script>

            <?php
            include("../llamadoestilos2.php");
            ?>
<?php 
header("Refresh: 30; URL='empleado.php'");
?>
        </head> 
        <body>
        <center>
            <header>
                <?php
                include("menuempleado.php");
                ?>
            </header>
            <br>

            <table class="reg1">
                <tr>
                    <td>

                <center>
                    <h1>Lista de Domicilios Pendientes</h1>
                    <br>

                    <?php
                    /*
                      select t1.Cod_Dom, t1.Fecha_Hora, t1.Direc_Dom, t1.Observacion_dom, t1.estado_domicilio_Estado_dom, t2.persona_Num_Documento_per, t1.Valor_Total from domicilio as t1 inner join persona_has_domicilio as t2 on t1.Cod_Dom = t2.domicilio_Cod_dom where t1.estado_domicilio_Estado_dom= 'EN ESPERA';

                      select t1.*, t2.* from domicilio as t1 inner join persona_has_domicilio as t2 on t1.Cod_Dom = t2.domicilio_Cod_dom where t1.estado_domicilio_Estado_dom= 'EN ESPERA';
                     */

                    $domicilio_h_p = $con->query("select t1.*, t2.* from domicilio as t1 inner join persona_has_domicilio as t2 on t1.Cod_Dom = t2.domicilio_Cod_dom where t1.estado_domicilio_Estado_dom= 'EN ESPERA'");
                    ?>
                    <?php $numform = 0; ?>

                    <?php while ($d = $domicilio_h_p->fetch_object()): ?>

                        Domicilio <?php echo $d->Cod_dom; ?><br>

                        <table class="lis">
                            <thead>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Direccion</th>
                            <th>Observaciones</th>
                            <th>Estado</th>
                            <th>Cliente</th>
                            <th>Valor Total</th>
                            </thead>
                            <tr>
                                <td><?php echo $d->Cod_dom; ?></td>
                                <td><?php echo $d->Fecha_Hora; ?></td>
                                <td><?php echo $d->Direc_Dom; ?></td>
                                <td><?php echo $d->Observacion_dom; ?></td>
                                <td><?php echo $d->estado_domicilio_Estado_dom; ?></td>
                                <td><?php echo $d->persona_Num_Documento_per; ?></td>
                                <td>$ <?php echo $d->Valor_Total; ?></td>

                                </td>
                            </tr>
                        </table>



                        <br>
                        <br>
                        <br>



                        <b><p>Informacion del cliente</p></b>

                        <!-- INICIO DEL WHILE CLIENTE -->

                        <?php $numform += 1 ?>
                        <table class="lis myform<?php echo $numform ?>">
                            <thead>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            </thead>

                            <?php
                            $codigo_dom = $d->Cod_dom;
                            $domicilioss = $con->query("select t1.*, t2.* from persona_has_domicilio as t1 inner join persona as t2 on t1.persona_Num_Documento_per = t2.Num_Documento_per where t1.domicilio_Cod_dom= $codigo_dom");
                            ?>



                            <?php while ($s = $domicilioss->fetch_object()): ?>

                                <tr>
                                    <td><?php echo $s->Primer_Nombre_per . " " . $s->Primer_Apellido_per ?></td>
                                    <td><?php echo $s->Tel_per; ?></td>
                                    <td><?php echo $s->Cel_per; ?></td>
                                    <td><?php echo $s->Direc_per; ?></td>
                                    <td><?php echo $s->Correo_per; ?></td>
                                    </td>
                                </tr>

                            <?php endwhile; ?>

                        </table>

                        <button class="comprar"  id="myButton<?php echo $numform ?>" onclick="ShowHideElement<?php echo $numform ?>()">Ver Informacion del cliente</button>

                        <script type="text/javascript">

                            $(".myform<?php echo $numform ?>").hide();

                            function ShowHideElement<?php echo $numform ?>() {

                                let text = "";

                                if ($("#myButton<?php echo $numform ?>").text() === "Ver Informacion del cliente") {

                                    $(".myform<?php echo $numform ?>").show();
                                    text = "Ocultar informacion del cliente";

                                } else {
                                    $(".myform<?php echo $numform ?>").hide();
                                    text = "Ver Informacion del cliente";
                                }

                                $("#myButton<?php echo $numform ?>").html(text);

                            }

                        </script>
                        <br> 
                        <br>
                        <br>


                        <br>Productos 

                        <!-- INICIO DEL WHILE PRODUCTOS -->

                        <?php $numform += 1 ?>
                        <table class="lis myform<?php echo $numform ?>">
                            <thead>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Tamaño</th>
                            <th>Cantidad</th>
                            <th>Valor Subtotal</th>
                            </thead>

                            <?php
                            $codigo_dom = $d->Cod_dom;
                            $domicilioss = $con->query("select t1.*, t2.* from domicilio_has_producto as t1 inner join producto as t2 on t1.producto_Cod_producto = t2.Cod_producto where t1.domicilio_Cod_dom= $codigo_dom");
                            ?>



                            <?php while ($p = $domicilioss->fetch_object()): ?>

                                <tr>
                                    <td><?php echo $p->producto_Cod_producto; ?></td>
                                    <td><img src="../MEDIA/<?php echo $p->Foto_prod; ?>" width="190px" height="120px"></td>
                                    <td><?php echo $p->Nom_prod; ?></td>
                                    <td><?php echo $p->tamaño_tamaño; ?></td>
                                    <td><?php
                                        if ($p->tipo_producto_tipo_prod == 'BEBIDA') {
                                            if ($p->Cantidad < $p->Cantidad_exist) {
                                                echo $p->Cantidad;
                                            } else {
                                                echo "Advertencia: No hay sufuciente stok <br> Se requieren " . $p->Cantidad . " y hay " . $p->Cantidad_exist;
                                            }
                                        } else {
                                            echo $p->Cantidad;
                                        }
                                        ?></td>
                                    <td><?php echo $p->Valor_subtotal; ?></td>
                                    </td>
                                </tr>
        <?php endwhile; ?>

                        </table>
                        <table class="lis"><tr><td><center>
                                <button class="comprar" id="myButton<?php echo $numform ?>" onclick="ShowHideElement<?php echo $numform ?>()">Ver Productos</button>
                            </center></td><td><center>
                                <form class="form-inline" method="post" action="../../Controlador/controler1.php">
                                    <input type="hidden" name="domicilio_id" value="<?php echo $codigo_dom; ?>">
                                    <button type="submit" name="cambio_est_dom" class="comprar" onclick="return confirm('¿Esta seguro de actualizar este Domicilio?')">Entregado<span class="icon-check"></span></button>
                                    <button type="submit" name="cancelar_dom" class="cancelar" onclick="return confirm('¿Esta seguro de cancelar este Domicilio?')">Cancelar <span class="icon-circle-with-cross"></span></button>
                                </form></center></td></tr></table>
                        <hr size="1" />
                        <script type="text/javascript">

                            $(".myform<?php echo $numform ?>").hide();

                            function ShowHideElement<?php echo $numform ?>() {

                                let text = "";

                                if ($("#myButton<?php echo $numform ?>").text() === "Ver Productos") {

                                    $(".myform<?php echo $numform ?>").show();
                                    text = "Ocultar Productos";

                                } else {
                                    $(".myform<?php echo $numform ?>").hide();
                                    text = "Ver Productos";
                                }

                                $("#myButton<?php echo $numform ?>").html(text);

                            }

                        </script>

                        <br>

    <?php endwhile; ?> <!-- FIN DEL WHILE DOMICILIO -->

                </center>
                </td>
                </tr>
            </table>
        </center> 

        <!--se verifica que la cesion este iniciada como empleado-->
        <?php
    } else {
        echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como empleado";
    }
    ?>
    <br>
    <br>

<?php
                                include '../footer.php';
?>
</body>
</html>