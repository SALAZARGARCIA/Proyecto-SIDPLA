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
            <meta charset="UTF-8">   
        </head> 
        <body>
        <center>
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
                        <table class="hola">
                            <tr>
                                <td>

                                    <form method="post" action="../../Controlador/lista-por-fechaProducto.php">
                                        <h1> Ver domicilio de un producto</h1>

                                        <br>

                                        <h4>Producto: <br/></h4> 
                                        <input type="TEXT" id="Producto" name="Producto" placeholder="Nombre Producto"> <br/>

                                        <h4><span class="icon-calendar"></span> Fecha comienzo: <br/></h4>
                                        <input type="TEXT" id="start_date" name="start_date" placeholder="mm/dd/yyyy"> <br/>
                                        <h4><span class="icon-calendar"></span>  Fecha final:<br/> </h4>
                                        <input type="TEXT" id="end_date" name="end_date"  placeholder="mm/dd/yyyy"><br/>

                                        <input type="hidden" id="form_sent" name="form_sent" value="true">
                                        <input type="submit" id="btn_submit" value="Enviar"><br/>    
                                    </form>
                                    <br>
                                    <br>


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