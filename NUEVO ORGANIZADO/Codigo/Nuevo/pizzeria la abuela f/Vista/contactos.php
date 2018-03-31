<?php
require_once '../Controlador/control1.php';
require_once '../Modelo/modelo.php';
require_once '../Modelo/conexion1.php';

$prod = new Pizzeria();
$model = new PizzeriaModel();
$db = database::conectar();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include("llamadoestilos.php");
        ?>
    </head> 
    <body>
        <header>
            <?php
            include("header.php");
            ?>
        </header>

        <br>

        <table class="reg1">
            <tr>
                <td>
                    <?php
                    $sqll = "CALL Listar_Pizzeria";

                    $query = $db->query($sqll);

                    if ($query->rowCount() > 0):
                        ?>

                        <h1>contactanos</h1>

                        <br>

                        <?php foreach ($model->Listar_pizzeria() as $r): ?> 


                            NIT PIZZERIA:   <a> <?php echo $r->__GET('Nit_Pizzeria'); ?></a><br>
                            NOMBRE PIZZERI:   <a><?php echo $r->__GET('Nom_Pizzeria'); ?> </a><br>
                            DIRECCION PIZZERIA:  <a><?php echo $r->__GET('Dir_Pizzeria'); ?></a><br>
                            TELEFONO PIZZERIA:  <a><?php echo $r->__GET('Tel_Pizzeria'); ?></a> <br>
                            CELULAR DPIZZERIA:  <a><?php echo $r->__GET('Cel_Pizzeria'); ?></a><br><br>

                        <?php endforeach; ?>
                            
                        <span class="datos-contacto">
                            <a href="#"><span class="icon-facebook"></a>
                            <a href="#"><span class="icon-twitter"></a>
                            <a href="#"><span class="icon-instagram"></a>
                            <a href="#"><span class="icon-youtube"></a>
                        </span>

                    <?php endif; ?>

                    <br>
                    <br>
                </td>   
            </tr>
        </table>

        <br>
        <br>

        <footer>
            <!-- pie de pagina-->
        </footer>

    </body>
</html>