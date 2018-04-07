<html>

    <head>
        <?php
        include("llamadoestilos.php");
        include("../modelo/database.php");
        $con = database::conectar();
        ?>
    </head> 

    <body> 

        <header>
            <?php
            include("header.php");
            ?>
        </header>

        <br>

        <table class ="reg1">
            <tr>
                <td>
            <center>

                <h1>Registro</h1>

                <br>
                <br>



                <form name="areat" action="../controlador/controler1.php" method="post">

                    <table class="hola" >
                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4><span class="icon-v-card"></span> Numero de Documento</h4></td><td>
                                <input class="form-control input-sm" type="number" name="doc" class="form-control" required></td></tr>
                        <tr><td style="padding:2px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Tipo Documento</h4></td><td>
                                <select class="form-control" name="tdoc" >
                                    <?php
                                    foreach ($con->query('SELECT * from tipo_doc where estado_tipo_doc=1') as $row) {
                                        echo '<option value="' . $row['tipo_doc'] . '">' . $row['tipo_doc'] . '</option>';
                                        ;
                                    }
                                    ?>
                                </select>
                <!--<input class="form-control input-sm" type="text" name="tdoc" class="form-control" placeholder="Tipo Documento" required></td></tr>-->
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Primer nombre</h4></td><td>
                                <input class="form-control input-sm" type="text" name="nom1" class="form-control" required></td></tr>
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Segundo nombre</h4></td><td>
                                <input class="form-control input-sm" type="text" name="nom2" class="form-control" required></td></tr>
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Primer apellido</h4></td><td>
                                <input class="form-control input-sm" type="text" name="ape1" class="form-control"required></td></tr>
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Segundo apellido </h4></td><td>
                                <input class="form-control input-sm" type="text" name="ape2" class="form-control"required></td></tr>
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4> <span class="icon-user"></span> Nombre de usuario</h4></td><td>
                                <input class="form-control input-sm" type="text" name="usu" class="form-control" required></td></tr>
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4><span class="icon-lock" ></span> Contraseña</h4></td><td>
                                <input class="form-control input-sm" type="password" name="pass" class="form-control"  required></td></tr>
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4><span class="icon-old-phone"></span> Telefono</h4></td><td>
                                <input class="form-control input-sm" type="number" name="tel" class="form-control"  required></td></tr>
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4><span class="icon-mobile"></span> Celular</h4></td><td>
                                <input class="form-control input-sm" type="number" name="cel" class="form-control"  required></td></tr>
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4><span class="icon-location-pin"></span> Dirección</h4></td></td><td>
                                <input class="form-control input-sm" type="text" name="direc" class="form-control" required></td></tr>
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4><span class="icon-mail"></span> Correo</h4></td><td>
                                <input class="form-control input-sm" type="email" name="correo" class="form-control" required></td></tr>
                        <tr><td style="padding:4px"></td></tr>

                        <tr><td colspan="2"><hr></td></tr>
                        <tr><td align="center" colspan="2"><input type="submit" name="registrar" style="width:400px" value="REGISTRAR"></td></tr>
                        <tr><td style="padding:4px"></td></tr>
                        </article>

                        <tr>
                            <td>
                                <?PHP
                                if (isset($_REQUEST['dato'])) {
                                    echo '<script type="text/javascript">
                                              alert("Registro con exito gracias por registrarse");
                                              window.location.href="inicio_sesion.php";
                                           </script>';
                                } if (isset($_REQUEST['dato1'])) {
                                    echo '<script type="text/javascript">
                                            alert("El usuarioya existe ");
                                            window.location.href="registro2.php";
                                          </script>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </form>

            </center>

        </td>
    </tr>
</table>

<br>
<br>

<?php
                                include 'footer.php';
?>
</div>
</body>
</html>