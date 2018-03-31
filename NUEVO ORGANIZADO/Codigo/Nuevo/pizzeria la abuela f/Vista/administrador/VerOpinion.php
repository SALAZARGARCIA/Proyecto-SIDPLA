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
                <table class="reg">
                    <tr>
                        <td>
                    <center>
                        <table class="hola">
                            <tr>
                                <td>
                                    <ul class="slides">
                                        <li>
                                            <form method="post" action="../../Controlador/lista-opinion-por-fecha.php">
                                                <h1>Búsqueda por Fecha</h1>
                                                Fecha comienzo: <br/>
                                                <input type="TEXT" id="start_date" name="start_date" placeholder="mm/dd/yyyy"> <br/>
                                                Fecha final:<br/>
                                                <input type="TEXT" id="end_date" name="end_date"  placeholder="mm/dd/yyyy"><br/>

                                                <input type="hidden" id="form_sent" name="form_sent" value="true">
                                                <input type="submit" id="btn_submit" value="Enviar"><br/>    
                                            </form> 
                                        </li>
                                    </ul>
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

            <footer>
                <!--pie de pagina-->
            </footer>

            <!--se valida para saber si esta logeado como admin-->
            <?php
        } else {
            echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
        }
        ?>
    </body>
</html>