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
$res = $con->query("select * from persona where Num_Documento_per='$sessionidp' and tipo_doc='$sessiontdp' and rol_Rol= 'ADMINISTRADOR'");
if ($res->num_rows == 1) {
    require_once '../../CONTROLADOR/producto.control.php';
    require_once '../../MODELO/producto.model.php';
    require_once '../../MODELO/database.php';
//logica
    $producto = new Producto();
    $model = new ProductoModel();
    $db = database::conectar();

    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {


            case 'registrar':

                $Ruta_imagen = "../MEDIA/";
                $Ruta_imagen = $Ruta_imagen . basename($_FILES['Foto_prod']['name']);
                move_uploaded_file($_FILES['Foto_prod']['tmp_name'], $Ruta_imagen);
                $producto->__SET('Cod_producto', $_REQUEST['Cod_producto']);
                $producto->__SET('Nom_prod', $_REQUEST['Nom_prod']);
                $producto->__SET('Desc_prod', $_REQUEST['Desc_prod']);
                $producto->__SET('Foto_prod', $_FILES['Foto_prod']['name']);
                $producto->__SET('Stok_min', $_REQUEST['Stok_min']);
                $producto->__SET('Stok_max', $_REQUEST['Stok_max']);
                $producto->__SET('Cantidad_exist', $_REQUEST['Cantidad_exist']);
                $producto->__SET('tipo_producto_tipo_prod', $_REQUEST['tipo_producto_tipo_prod']);
                $producto->__SET('tamaño_tamaño', $_REQUEST['tamaño_tamaño']);
                $producto->__SET('Valor_unitario', $_REQUEST['Valor_unitario']);

                $model->Registrar_Prod($producto);
                print "<script>alert(\"Producto Agregado exitosamente.\");window.location='productos1.php';</script>";
                break;
        }
    }
    ?>

    <html lang="es">
        <head>
            <?php
            include("../llamadoestilos2.php");
            ?>

        </head> 
        <body>
        <center>
            <header>
                <?php
                include("menugerente.php");
                ?>
            </header>

            <br>

            <table class ="reg1">
                <tr>
                    <td>
                           <table class ="hola">
                <tr>
                    <td>
                <center>

                    <br>
                    <br>


                    <!-- FORMULARIO NUEVO REGISTRO -->



                    <H1>REGISTRO</H1>

                    <br>

                    <?php if (!empty($_GET['m']) && !empty($_GET['action'])) { ?>

                        <form enctype="multipart/form-data" action="#" method="post">

                            <br>
                            <br>

                            <label for="Cod_producto">Codigo</label>
                            <input type="text" name="Cod_producto" placeholder="Codigo Producto" required>

                            <br>
                            <br>

                            <label for="Nom_prod">Nombre</label>
                            <input type="text" name="Nom_prod" placeholder="Nombre Producto" required>

                            <br>
                            <br>

                            <label for="Desc_prod">Descripcion</label>
                            <input type="text" name="Desc_prod" placeholder="Descripcion Producto" required>

                            <br>
                            <br>

                            <label for="Foto_prod">Foto</label>
                            <input type="file" name="Foto_prod" placeholder="Foto Producto" required>

                            <br>
                            <br>

                            <label for="Stok_min">Stok Min</label>
                            <input type="text" name="Stok_min" placeholder="Stok Min" required>

                            <br>
                            <br>

                            <label for="Stok_max">Stok Max</label>
                            <input type="text" name="Stok_max" placeholder="Stok Max" required>

                            <br>
                            <br>

                            <label for="Cantidad_exist">Cantidad existente</label>
                            <input type="text" name="Cantidad_exist" placeholder="Cant existente" required>

                            <br>
                            <br>

                            <label for="tipo_producto_tipo_prod">Tipo Producto</label>
                            <select class="form-control" name="tipo_producto_tipo_prod">
                                <?php
                                foreach ($db->query('SELECT * FROM tipo_producto where estado_tipo_prod=1') as $row) {
                                    echo '<option value="' . $row['tipo_prod'] . '">' . $row['tipo_prod'] . '</option>';
                                    ;
                                }
                                ?>
                            </select>

                            <br>
                            <br>

                            <label for="tamaño_tamaño">Tamaño</label>
                            <select class="form-control" name="tamaño_tamaño">
                                <?php
                                foreach ($db->query('SELECT * FROM tamaño where estado_tamaño=1') as $row) {
                                    echo '<option value="' . $row['tamaño'] . '">' . $row['tamaño'] . '</option>';
                                    ;
                                }
                                ?>
                            </select>

                            <br>
                            <br>

                            <label for="Valor_unitario">Valor</label>
                            <input type="text" name="Valor_unitario" placeholder="Valor" required>

                            <br><input type="submit" value= "Guardar" onclick = "this.form.action = '?action=registrar';" />
                        </form><br><br>










                    <?php } ?>

                    <?php if (!empty($_GET['Cod_producto']) && !empty($_GET['action'])) { ?>

                        <?php
                    }

                    $sq11 = "CALL Consulta_Producto";

                    $query = $db->query($sq11);

                    if ($query->rowCount() > 0):
                        ?>
                        <?php foreach ($model->Listar_Prod() as $r): ?>

                        <?php endforeach; ?>



                    <?php else: ?>
                        <h4 class="alert-danger">Señor Usuario No se Encuentran Registros!!!</h4>
                    <?php endif; ?>



 </center>
                </td>
                </tr>
            </table>

              
                </td>
                </tr>
            </table>
        </center>	
        <br>

        <footer>
            <!-- pie de pagina-->
        </footer>
        <!--se valida para saber si esta logeado como admin-->
        <?php
    }else {
        echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
    }
    ?>
</body>
</html>