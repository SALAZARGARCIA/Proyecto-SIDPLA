<?php
require_once '../../Controlador/control1.php';
require_once '../../Modelo/modelo.php';
require_once '../../Modelo/conexion1.php';

$prod = new Pizzeria();
$model = new PizzeriaModel();
$db = database::conectar();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
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
    }
}
?>
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

    <html lang="es">
        <head>

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

                    <br><h1>Nueba sucursal</h1><br>

                    <!--FORMULARIO REGISTRO-->
                    <table class="hola">
                        <tr>
                            <td>

                                <form action="#" method="post">

                                    <label for="user_login">Nit Pizzeria</label><br>
                                    <input type="text" name="Nit_Pizzeria" placeholder="produmento" required><br>

                                    <br><label for="use_pass"><span class="icon-shop"></span> Nombre Pizzeria</label><br>
                                    <input type="text" name="Nom_Pizzeria" placeholder="Descripcion producto" required><br><br>

                                    <label for="user_login"><span class="icon-location"></span> Direccion Pizzeria</label><br>
                                    <input type="text" name="Dir_Pizzeria" placeholder="produmento" required><br><br>

                                    <label for="user_login"><span class="icon-old-phone"></span> Telefono Pizzeria</label><br>
                                    <input type="text" name="Tel_Pizzeria" placeholder="produmento" required><br><br>

                                    <label for="user_login"><span class="icon-mobile"></span> Celular Pizzeria</label><br>
                                    <input type="text" name="Cel_Pizzeria" placeholder="produmento" required><br><br>

                                    <label for="user_login"><span class="icon-images"></span> Logo de la Pizzeria</label><br>
                                    <input type="text" name="Logo_Pizzeria" placeholder="produmento" required>

                                    <br><input type="submit" value="Guardar" onclick="this.form.action = '?action=registrar';"/>

                                    <br>
                                    <br>

                                </form>
                            </td>
                        </tr>
                    </table>

                </center>
                </td>
                </tr>
            </table>
        </center>

        <br>
        <br>

<?php
                                include 'footer.php';
?>

        <!--se valida para saber si esta logeado como admin-->
        <?php
    } else {
        echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
    }
    ?>
</body>
</html>