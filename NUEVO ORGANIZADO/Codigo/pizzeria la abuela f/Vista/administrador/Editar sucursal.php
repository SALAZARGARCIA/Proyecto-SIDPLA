<?php
require_once '../../Controlador/control1.php';
require_once '../../Modelo/modelo.php';
require_once '../../Modelo/conexion1.php';

$prod = new Pizzeria();
$model = new PizzeriaModel();
$db = database::conectar();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':
            $prod->__SET('Nit_Pizzeria', $_REQUEST['Nit_Pizzeria']);
            $prod->__SET('Nom_Pizzeria', $_REQUEST['Nom_Pizzeria']);
            $prod->__SET('Dir_Pizzeria', $_REQUEST['Dir_Pizzeria']);
            $prod->__SET('Tel_Pizzeria', $_REQUEST['Tel_Pizzeria']);
            $prod->__SET('Cel_Pizzeria', $_REQUEST['Cel_Pizzeria']);
            $prod->__SET('Logo_Pizzeria', $_REQUEST['Logo_Pizzeria']);
            $prod->__SET('Nit_Pizzeria2', $_REQUEST['Nit_Pizzeria2']);

            $model->Actualizar_pizzeria($prod);
            print "<script>alert(\"Registro actualizado exitosamente.\");window.location='Pizzeria.php'; </script>";
            break;

        case 'registrar':
            $prod->__SET('Nit_Pizzeria', $_REQUEST['Nit_Pizzeria']);
            $prod->__SET('Nom_Pizzeria', $_REQUEST['Nom_Pizzeria']);
            $prod->__SET('Dir_Pizzeria', $_REQUEST['Dir_Pizzeria']);
            $prod->__SET('Tel_Pizzeria', $_REQUEST['Tel_Pizzeria']);
            $prod->__SET('Cel_Pizzeria', $_REQUEST['Cel_Pizzeria']);
            $prod->__SET('Logo_Pizzeria', $_REQUEST['Logo_Pizzeria']);


            $model->Registrar_pizzeria($prod);
            print "<script>alert(\"Registro realizado exitosamente.\");window.location='Pizzeria.php'; </script>";
            break;

        case 'eliminar':
            $model->Eliminar_pizzeria($_REQUEST['Nit_Pizzeria']);
            print "<script>alert(\"Registro ELIMINADO exitosamente.\");window.location='Pizzeria.php'; </script>";
            break;

        case 'editar':
            $prod = $model->Obtener_pizzeria($_REQUEST['Nit_Pizzeria']);
            break;
    }
}
?>


<html lang="es">
    <head>
        <?php
        if (!isset($_SESSION["session"])) { // Verifica si la variable de sesi??n creada esta activa si no la inicializa
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
            ?>
            <?php
            include("../llamadoestilos2.php");
            ?>

        </head> 
        <body>
            <header>
                <?php
                include("menugerente.php");
                ?>
            </header>

            <br>

        <center>
            <table class="reg1">
                <tr>
                    <td>
                <center>
                    <br><h1>Modificar sucursal </h1>


                    <?php if (!empty($_GET['Nit_Pizzeria']) && !empty($_GET['action'])) { ?> 
                        <table class="hola">
                            <tr>
                                <td>

                                    <form action='#' method="post">
                                        <br><label>Nit pizzeria</label>
                                        <input type="text" name="Nit_Pizzeria" value="<?php echo $prod->__GET('Nit_Pizzeria'); ?>" style="display:none" placeholder="produmento" required>
                                        <!--CAMPO QUE GUARDA EL  prod -->
                                        <br><input type="text" name="Nit_Pizzeria2" id="user_login" value="<?php echo $prod->__GET('Nit_Pizzeria'); ?>"><br>

                                        <br><label><span class="icon-shop"></span> Nombre pizzeria</label>

                                        <br><input type="text" name="Nom_Pizzeria" id="user_login" value="<?php echo $prod->__GET('Nom_Pizzeria'); ?>"><br>


                                        <br><label><span class="icon-location"></span> Direccion pizzeria</label>

                                        <br><input type="text" name="Dir_Pizzeria" id="user_login" value="<?php echo $prod->__GET('Dir_Pizzeria'); ?>"><br>


                                        <br><label><span class="icon-old-phone"></span> Telefono pizzeria</label>

                                        <br><input type="text" name="Tel_Pizzeria" id="user_login" value="<?php echo $prod->__GET('Tel_Pizzeria'); ?>"><br>


                                        <br><label><span class="icon-mobile"></span> Celular pizzeria</label>

                                        <br><input type="text" name="Cel_Pizzeria" id="user_login" value="<?php echo $prod->__GET('Cel_Pizzeria'); ?>"><br>


                                        <br><label><span class="icon-images"></span> Logo de la pizzeria</label>

                                        <br><input type="text" name="Logo_Pizzeria" id="user_login" onkeypress="return justNumbers(event);" value="<?php echo $prod->__GET('Logo_Pizzeria'); ?>"><br>



                                        <br><input type="submit" value="Actualizar" onclick="this.form.action = '?action=actualizar';"/> 
                                    </form>
                                </td>
                            </tr>
                        </table>

                    <?php } ?>
                    <br> 
                    <br> 
                </center>
                </td>
                </tr>
            </table>
        </center>

        <br>
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