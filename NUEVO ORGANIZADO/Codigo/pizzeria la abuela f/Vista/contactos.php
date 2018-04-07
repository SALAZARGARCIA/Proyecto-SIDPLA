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


                         
                        <span class="icon-shop"></span> NOMBRE PIZZERIA :   <a><?php echo $r->__GET('Nom_Pizzeria'); ?> </a><br>
                          <span class="icon-location"></span>   DIRECCION PIZZERIA:  <a><?php echo $r->__GET('Dir_Pizzeria'); ?></a><br>
                          <span class="icon-old-phone"></span>  TELEFONO PIZZERIA:  <a><?php echo $r->__GET('Tel_Pizzeria'); ?></a> <br>
                          <span class="icon-mobile"></span> CELULAR PIZZERIA:  <a><?php echo $r->__GET('Cel_Pizzeria'); ?></a><hr><br><br><br>

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
<?php
                                include 'footer.php';
?>
    </body>
</html>