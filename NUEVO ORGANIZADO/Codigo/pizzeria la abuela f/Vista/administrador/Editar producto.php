<?php
if (!isset($_SESSION["session"])) { // Verifica si la variable de sesión creada esta activa si no la inicializa
    session_start();
    $ruta = "";
}
include("../../modelo/conection.php");
//error_reporting(0);
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
            case 'actualizar';
                
                
                $producto->__SET('Cod_producto', $_REQUEST['Cod_producto']);
                $producto->__SET('Nom_prod', $_REQUEST['Nom_prod']);
                $producto->__SET('Desc_prod', $_REQUEST['Desc_prod']);
                $var = $_FILES['Foto_prod']['tmp_name'];
                if ($var==""){
                    $producto->__SET('Foto_prod', $_REQUEST['Fotico']);
                   
                }else{
                    
                    if($_FILES['Foto_prod']['type']=="image/jpeg" or $_FILES['Foto_prod']['type']=="image/png"){
                    $Ruta_imagen = "../MEDIA/";
                    $Ruta_imagen = $Ruta_imagen . basename($_FILES['Foto_prod']['name']);
                    move_uploaded_file($_FILES['Foto_prod']['tmp_name'], $Ruta_imagen);
                    $producto->__SET('Foto_prod', $_FILES['Foto_prod']['name']);}else{
                        print "<script>alert(\"Tipo de imagen incorrecto.\");window.location='productos.php';</script>";
                    }
                    
                }
                $producto->__SET('Stok_min', $_REQUEST['Stok_min']);
                $producto->__SET('Stok_max', $_REQUEST['Stok_max']);
                $producto->__SET('Cantidad_exist', $_REQUEST['Cantidad_exist']);
                $producto->__SET('tipo_producto_tipo_prod', $_REQUEST['tipo_producto_tipo_prod']);
                $producto->__SET('tamaño_tamaño', $_REQUEST['tamaño_tamaño']);
                $producto->__SET('Valor_unitario', $_REQUEST['Valor_unitario']);
                /* $producto->__SET('Cod_producto2', 	 $_REQUEST['Cod_producto2']); */


                $model->Actualizar_Producto($producto);
                print "<script>alert(\"Producto Actualizado exitosamente.\");window.location='productos.php';</script>";
                break;

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
                print "<script>alert(\"Producto Agregado exitosamente.\");window.location='productos.php';</script>";
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

            case 'cancelar':
            print "<script>window.location='productos.php';</script>";
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

            <table class ="reg">
                <tr>
                    <td>
                <center>

                    <br>
                    <br>
                    
                    <ul class="slides">
                        <li>
                           

                                <?php if (!empty($_GET['Cod_producto']) && !empty($_GET['action'])) { ?>

                                    <form enctype="multipart/form-data" action="#" method="post">
                                        

                                            <!--LABEL USUARIO FINAL -->

                                            <label> <h2>ID Producto por modificar:<?php echo $producto->__GET('Cod_producto'); ?></h2> </label>


                                            <input type="text" name="Cod_producto" value="<?php echo $producto->__GET('Cod_producto'); ?>" style="display:none" placeholder="Codigo" required>


                                            <br>

                                            <label for="Nom_prod">Nombre</label><br><br>


                                            <input type="text" name="Nom_prod" value="<?php echo $producto->__GET('Nom_prod'); ?>" placeholder="Nombre" required>

                                            <br>


                                            <label for="Desc_prod">Descripcion</label><br>
                                            <input type="text" name="Desc_prod" value="<?php echo $producto->__GET('Desc_prod'); ?>" placeholder="Descripcion" required>

                                            <br>
                                            <br>

                                            <label for="Foto_prod"><span class="icon-images"></span>Foto</label>

                                            <br>
                                            <img src="../MEDIA/<?php echo $producto->__GET('Foto_prod'); ?> " width="195px"><br><br>
                                            <?php  $img= $producto->__GET('Foto_prod');?>
                                            
                                            <label for="Foto_prod"> Actualizar Foto</label><br>
                                            <input type="file" value="<img src='../MEDIA/<?php echo $img; ?>'>" name="Foto_prod" accept=".png, .jpg" >
                                            
                                            <input type="text" value="<?php echo $producto->__GET('Foto_prod'); ?>" name="Fotico" placeholder="Foto" style="display:none">

                                            <?php if ($producto->__GET('tipo_producto_tipo_prod') == 'BEBIDA') { ?>
                                            
                                                <br><br><label for="Stok_min"><span class="icon-circle-with-minus"></span> Stok Min</label><br>
                                                <input type="number" name="Stok_min" value="<?php echo $producto->__GET('Stok_min'); ?>" placeholder="Stok Min" required>
                                            <?php } else { ?>
                                                <input type="number" name="Stok_min" value="1" placeholder="Stok Min" required style="display:none">
                                            <?php } ?>

                                            <?php if ($producto->__GET('tipo_producto_tipo_prod') == 'BEBIDA') { ?>
                                                
                                                <br><br><label for="Stok_min"><span class="icon-circle-with-plus"></span> Stok Max</label><br>
                                                <input type="number" name="Stok_max" value="<?php echo $producto->__GET('Stok_max'); ?>" placeholder="Stok Max" required>
                                            <?php } else { ?>
                                                <input type="number" name="Stok_max" value="1" placeholder="Stok Max" required style="display:none">
                                            <?php } ?>

                                            <?php if ($producto->__GET('tipo_producto_tipo_prod') == 'BEBIDA') { ?>
                                                
                                                <br><br><label for="Cantidad_exist">Cantidad existente</label><br>
                                                <input type="number" name="Cantidad_exist" value="<?php echo $producto->__GET('Cantidad_exist'); ?>" placeholder="Cantidad exist" required>
                                            <?php } else { ?>
                                                <input type="number" name="Cantidad_exist" value="1" placeholder="Cantidad exist" required style="display:none">
                                            <?php } ?>

                                            <br><br><label>Tipo Producto: 
                                                <?php echo $producto->__GET('tipo_producto_tipo_prod'); ?></label>
                                            <input type="text" name="tipo_producto_tipo_prod" value="<?php echo $producto->__GET('tipo_producto_tipo_prod'); ?>" placeholder="Tipo de Producto" required style="display:none">

                                            <br><br><label><span class="icon-select-arrows"></span> Tamaño: 
                                                <?php echo $producto->__GET('tamaño_tamaño'); ?></label><br>
                                            <input type="text" name="tamaño_tamaño" value="<?php echo $producto->__GET('tamaño_tamaño'); ?>" placeholder="Tamaño" required style="display:none">


                                            <br><br><label for="Valor_unitario"><span class="icon-credit"></span> Valor</label>
                                            <input type="text" name="Valor_unitario" value="<?php echo $producto->__GET('Valor_unitario'); ?>" placeholder="Valor" required>


                                            <br><input type="submit" value= "Actualizar" onclick = "this.form.action = '?action=actualizar';" />
                                            <input type="submit" value= "Cancelar" onclick = "this
                                                                    .form.action = '?action=cancelar';" />
                                        
                                    </form>
                                

                                <?php
                            }

                            $sq11 = "CALL Consulta_Producto";

                            $query = $db->query($sq11);
                            ?>	
                        </li>
                    </ul>

                </center>
                </td>
                </tr>
            </table>
        </center>

        <br>
<?php
                                include '../footer.php';
?>

        <!--se valida para saber si esta logeado como admin-->
        <?php
    } else {
        echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
    }
    ?>

</body>
</html>