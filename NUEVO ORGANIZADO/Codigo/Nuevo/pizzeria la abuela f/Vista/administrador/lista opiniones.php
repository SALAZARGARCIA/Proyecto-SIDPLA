<?php
require_once '../../Controlador/copinion.php';
require_once '../../Modelo/mcomentario.php';
require_once '../../Modelo/conexion1.php';

$prod = new Opinion();
$model = new OpinionModel();
$db = database::conectar();
?>

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

            <center>
                <table class="reg1">
                    <tr>
                        <td>
                    <center>

                        <?php
                        $sqll = "CALL Listar_Opinion";

                        $query = $db->query($sqll);

                        if ($query->rowCount() > 0):
                            ?>

                            <h1>Lista de opiniones</h1>

                            <br>
                            <!--      

                                 <form class="form-inline" method="post" action="#">
                                        <div class="form-group">
                                           FECHA <input type="date" name="fecha" step="1"  style="width:150px;" class="form-control" min="2018-01-01" value="<?php echo date("Y-m-d");?>">
                                        </div>
                                        <button type="submit" name="buscar" class="COMPRA">Buscar</button>
                                    </form><br>
                                     <table class="listar" >
                                <thead>
                                    <tr>
                                        <th> CODIGO OPINION   </th>
                                        <th> OPINION  </th>
                                        <th>DOCUMENTO PERSONA</th>
                                        <th>TIPO DE DOCUMENTO</th>
                                        <th> FECHA  </th>
                                    </tr>
                                </thead>
                            <br>
                            
                            <?php
                            if (isset($_POST["buscar"])) { // Verifica si el botón oprimido es el de buscar
                            /*
                             * Esta es la consula para obtener todos las opiniones de la base de datos buscando la fecha.
                             */
                            $fecha=$_REQUEST["fecha"];
                            
                            $opinion = $con->query("select * from opinion where Fecha = '$fecha'");
                            ?>

                            <?php
                            /*
                             * Apartir de aqui hacemos el recorrido de las opiniones obtenidas y los reflejamos en una tabla.
                             */
                            while ($r = $opinion->fetch_object()):
                                ?>
<tr>
                           


                              <td>   <?php echo "Codigo " . $r->Cod_Opinion; ?></td>
                               <td> <?php echo "Opinion " . $r->Opinion; ?></td>
                               <td> <?php echo "Documento " . $r->persona_Num_Documento_per; ?></td>
                               <td> <?php echo "Tipo documento " . $r->persona_tipo_doc; ?></td>
                               <td> <?php echo "Fecha " . $r->Fecha; ?></td>


                               
                               

                            <?php endwhile; }?>
                            
                    </tr>
                </table>

                                    
                          -->
                            <table class="listar1">
                                <thead>
                                    <tr>
                                        <th> CODIGO OPINION   </th>
                                        <th> OPINION  </th>
                                        <th>DOCUMENTO PERSONA</th>
                                        <th>TIPO DE DOCUMENTO</th>
                                        <th> FECHA  </th>
                                    </tr>
                                </thead>

                                <?php foreach ($model->Listar_Opinion() as $r): ?> 
                                    <tr>

                                        <td> <?php echo $r->__GET('Cod_Opinion'); ?></td>
                                        <td><?php echo $r->__GET('Opinion'); ?></td>
                                        <td><?php echo $r->__GET('persona_Num_Documento_per'); ?></td>
                                        <td><?php echo $r->__GET('persona_tipo_doc'); ?></td>
                                        <td><?php echo $r->__GET('Fecha'); ?></td>

                                    </tr>
                                <?php endforeach; ?>



                            <?php endif; ?>
                        </table>



                    </center>
                    </td>
                    </tr>
                </table>
            </center>

            <br>
            <br>


            <!--se valida para saber si esta logeado como admin-->
            <?php
        } else {
            echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
        }
        ?>  
        <footer>
            <!-- pie de pagina-->
        </footer>

    </body>
</html>