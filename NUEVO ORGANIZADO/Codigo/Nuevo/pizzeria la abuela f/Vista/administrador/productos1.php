
<!DOCTYPE html>
<html lang="es">
    <head Content-Type: text/html; charset=utf-8>
    <?php
    include("../llamadoestilos2.php");
    include "../../Modelo/conection.php";
    ?>
          <!-- <link rel="stylesheet" type="text/css" href="bootstrap.min.css"> -->
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    </head> 
    <body>
        <header>
            <?php
            include("menugerente.php");
            ?>
        </header>

        <br>

        <table class="reg1" >
            <tr>
                <td>
            <center>

                <h1>Productos</h1>

                <br>

                <table class="pro" >
                    <tr>
                        <td>
                    <center>
                        <a href="consultar pizza.php"><img src="../img/Pizzas.jpg" ></a>
                        <a href="consultar bebida.php"><img src="../img/Bebidas.jpg"></a> 
                        <a href="consultar pasta.php"><img src="../img/Pastas.jpg"></a> 
                        <a href="consultar ensalada.php"><img src="../img/Ensaladas.jpg"></a>
                        <a href="consultar Acompaniante.php"><img src="../img/Acompañantes.jpg"></a>
						<a href="productos.php"><img src="../img/Acompañantes.jpg"></a>
                    </center>
                    </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
</table>

<br>
<br>

<footer>
    <!--  pie de pagina-->
</footer>
</body>
</html>