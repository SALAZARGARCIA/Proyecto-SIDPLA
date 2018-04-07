<html>

    <head>
        <?php
        include("llamadoestilos.php");
        ?>


    </head>

    <body> 
    <center>
        <header>

            <?php
            include("header.php");
            ?>
        </header>

        <br>

        <table class ="reg1">
            <tr>
                <td>
                    <br>

            <CENTER>

                <form  c name="areat" action="../controlador/controler1.php" method="post">

                    <table class="hola">
                        <h1>INICIO DE SESION</h1>
                        <br>
                        <br>

                        <tr>
                            <td> <h4> <span class="icon-user"></span> Nombre de Usuario</h4>
                            </td>
                            <td>
                                <span class="input-group-addon"></span>
                                <input type="text" name="usu" class="form-control" placeholder="usuejemplo" required>
                            </td>
                        </tr>

                        <tr><td><h4><span class="icon-key"></span> Contraseña</h4></td>
                            <td><br><br>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" id="password1" name="pass" class="form-control" required>
                                <br><br><a href="recuperaContrasena.php">¿Olvidaste tu contraseña?</a>

                            </td></tr>


                        <tr><td align="center"><input type="submit" name="enviar" value="Iniciar Sesion" class="" width="300px"><br><br></td></tr>

                        <tr><td style="color:#F00"><?php
                                if (isset($_REQUEST['error'])) {
                                    echo'<script type="text/javascript">
    alert("Usuario o contraseña incorrecta");
    window.location.href="inicio_sesion.php";
    </script>';
                                }
                                ?></td></tr>
                    </table>
                </form>
            </center>

            </td>
            </tr>
        </table>
    </center>

    <CENTER>






        <!--<div class="alert alert-success">
        <div class="row">
        <div class="col-sm-12 col-md-12">
        <form name="areat" action="">
        <table class="table">
        <tr><td colspan="2" style="color:#000000">Ejercicio Area triangulo: Digite los datos y al oprimir el boton, se
        realicen los calculos</td></tr>
        <tr><td align="right">Base</td><td><input name="base" type="text"></td></tr>
        <tr><td align="right">Altura</td><td><input name="altura" type="text"></td></tr>
        <tr><td colspan="2" align="center"><input value="CALCULAR" type="submit" width="500"
        style="color:#000000"></td></tr>
        <tr><td align="right">Resultado Area</td><td><input name="area" type="text"
        disabled="disabled"></td></tr>
        </table>
        </form>
        </div>
         </div>
         </div>-->

    </center>

    <br>
    <br>

    <?php
    include 'footer.php';
    ?>

</body>
</html>