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
            case 'actualizar':
                $Ruta_imagen = "MEDIA/";
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
                /* $producto->__SET('Cod_producto2', 	 $_REQUEST['Cod_producto2']); */

                $model->Actualizar_Producto($producto);
                print "<script>alert(\"Producto Actualizado exitosamente.\");window.location='productos1.php';</script>";
                break;

            case 'registrar':
                $Ruta_imagen = "MEDIA/";
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

//  		Instancia la clase a eliminar que se encuentra al final de cada registro//

            case 'eliminar':
                $model->Eliminar_Producto($_REQUEST['Cod_producto']);
                print "<script>alert(\"Producto Eliminado exitosamente.\");window.location='productos1.php';</script>";
                break;

//  		Instancia la clase editar que se encuentra al final de cada registro//	


            case 'editar':
                $producto = $model->Obtener_Producto($_REQUEST['Cod_producto']);
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


                <center>

                    <ul class="slides">
                        <li>

                            <?php if (!empty($_GET['m']) && !empty($_GET['action'])) { ?>

                                <?php
                            }

                            $sq11 = "CALL Consulta_Producto";

                            $query = $db->query($sq11);

                            if ($query->rowCount() > 0):
                                ?>

                                <h1>Consulta - Registros</h1><br>
                                <table class="listar" >
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Foto</th>
                                            <th>Stok_min</th>
                                            <th>Stok_max</th>
                                            <th>Cantidad_exist</th>
                                            <th>Valor_unitario</th>
                                            <th>tamaño_tamaño</th>
                                            <th>tipo_producto_tipo_prod</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>

                                        </tr>
                                    </thead>


                                    <?php foreach ($model->Listar_Prod() as $r): ?>
                                        <tr> 
                                            <td><?php echo $r->__GET('Cod_producto'); ?></td>
                                            <td><?php echo $r->__GET('Nom_prod'); ?></td>
                                            <td><?php echo $r->__GET('Desc_prod'); ?></td>
                                            <td><img src="../MEDIA/<?php echo $r->Foto_prod; ?>" width="120px" height="100px"></td>
                                            <td><?php echo $r->__GET('Stok_min'); ?></td>
                                            <td><?php echo $r->__GET('Stok_max'); ?></td>
                                            <td><?php echo $r->__GET('Cantidad_exist'); ?></td>
                                            <td><?php echo $r->__GET('Valor_unitario'); ?></td>
                                            <td><?php echo $r->__GET('tamaño_tamaño'); ?></td>
                                            <td><?php echo $r->__GET('tipo_producto_tipo_prod'); ?></td>

                                            <td>
                                                <a href="Editar producto.php?action=editar&Cod_producto=<?php echo $r->Cod_producto; ?>">Editar</a>
                                            </td>

                                            <td>
                                                <a href="?action=eliminar&Cod_producto=<?php echo $r->Cod_producto; ?>" onclick="return confirm('¿Esta seguro de eliminar este Producto?')">Eliminar</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>

                                </table>

                            <?php else: ?>

                                <h4 class="alert-danger">Señor Usuario No se Encuentran Registros!!!</h4>

                            <?php endif; ?>
                        </li>
                    </ul>
                </center>
                </td>
                </tr>
            </table>
        </center>

        <br>	

        <footer>
            <!--pie de pagina-->
        </footer>
        <!--se valida para saber si esta logeado como admin-->
        <?php
    }else {
        echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
    }
    ?>
</body>
</html>