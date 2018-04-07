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


        case 'eliminar':
            $model->Eliminar_pizzeria($_REQUEST['Nit_Pizzeria']);
            print "<script>alert(\"Registro ELIMINADO exitosamente.\");window.location='Pizzeria.php'; </script>";
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
                    <ul class="slides">
                        <li>


                            <!--FORMULARIO ACTUALIZAR REGISTRO-->
                            <div id="div_form">

                                <?php if (!empty($_GET['Nit_Pizzeria']) && !empty($_GET['action'])) { ?> 



                                    <?php
                                }




                                $sqll = "CALL Listar_Pizzeria";

                                $query = $db->query($sqll);

                                if ($query->rowCount() > 0):
                                    ?>

                                    <br><h1>Consulta sucursales </h1><br>
                                    <table class="listar1">
                                        <thead>
                                            <tr>
                                                <th>NIT PIZZERIA</th>
                                                <th>NOMBRE PIZZERIA</th>
                                                <th>DIRECCION PIZZERIA</th>
                                                <th>TELEFONO PIZZERIA</th>
                                                <th>CELULAR DPIZZERIA</th>
                                                <th>LOGO MINIMO DEL PIZZERIA</th>
                                                <th>FUNCION EDITAR</th>
                                                <th>FUNCION ELIMINAR</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($model->Listar_pizzeria() as $r): ?> 
                                            <tr>

                                                <td><?php echo $r->__GET('Nit_Pizzeria'); ?></td>
                                                <td><?php echo $r->__GET('Nom_Pizzeria'); ?> </td>
                                                <td><?php echo $r->__GET('Dir_Pizzeria'); ?></td>
                                                <td><?php echo $r->__GET('Tel_Pizzeria'); ?> </td>
                                                <td><?php echo $r->__GET('Cel_Pizzeria'); ?></td>
                                                <td><?php echo $r->__GET('Logo_Pizzeria'); ?> </td>

                                                <td>
                                                    <a href="Editar sucursal.php?action=editar&Nit_Pizzeria=<?php echo $r->Nit_Pizzeria; ?>" )">Editar <span class="icon-edit"></span> </a>
                                                </td>

                                                <td>
                                                    <a href="?action=eliminar&Nit_Pizzeria=<?php echo $r->Nit_Pizzeria; ?>" onclick="return confirm('¿ESTA SEGURO DE ELIMINAR ESTE USUARIO?')">Eliminar<span class="icon-trash"></span></a>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </table><br>

                                <?php else: ?>

                                    <h4 class="alert alert-danger">SEÑOR USUARIO NO SE ENCUENTRAN REGISTROS!!!</h4>
                                <?php endif; ?>





                        </li>
                    </ul>
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