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
            <?php
            $sum = $con->query("select SUM(Valor_Total) as Suma FROM domicilio WHERE Fecha_Hora BETWEEN concat(year(curdate()), '-', month(curdate()), '-', '01') AND concat(year(curdate()), '-', month(curdate()), '-', '31') AND estado_domicilio_Estado_dom = 'ENTREGADO'");
            $r = $sum->fetch_object();
            ?>
            <br>

            <table class="reg1" >
                <tr>
                    <td>

                        <br>
                        <br>

                <center>
                    <table class="pro">
                        <tr>

                            <td class="pro">
                                <a href="" > <img src="../img/LogoIngresos.jpg" ><br><h4>Los ingresos en este mes son de: $<?php echo $r->Suma;?></h4></a></td>
                            <td class="pro">
                                <a href="productos.php"> <img src="../img/LogoProductos.jpg"  ><br><h4>lista de productos</h4></a></td>

                            <td class="pro">
                                <a href="Opiniones.php"> <img src="../img/LogoPersona.jpg" ><br><h4>lista de opiniones</h4></a>
                            </td>	

                        </tr>
                    </table>
                </center>
                </td>
                </tr>
            </table>
            <!--se valida para saber si esta logeado como admin-->
            <?php
        } else {
            echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
        }
        ?>

        <br>
        <br>
<?php
                                include 'footer.php';
?>

    </body>
</html>