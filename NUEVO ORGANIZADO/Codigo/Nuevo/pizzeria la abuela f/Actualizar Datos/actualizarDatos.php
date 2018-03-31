<?php
if (!isset($_SESSION["session"])) { // Verifica si la variable de sesión creada esta activa si no la inicializa
    session_start();
    $ruta = "";
}
include("../modelo/conection.php");
error_reporting(0);
$sessionidp = $_SESSION["idp"];
$sessiontdp = $_SESSION["tdp"];
$rol_pers = $_SESSION["rolp"];

    require_once '../controlador/persona.control.php';
    require_once '../Modelo/persona.model.php';
    require_once '../Modelo/database.php';

    $persona = new Persona();
    $model = new PersonaModel();
    $db = database::conectar();
    $res = $con->query("select * from persona where Num_Documento_per='$sessionidp' and tipo_doc='$sessiontdp'");
    while ($s = $res->fetch_object()):

    ?>
    <html lang="es">
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


            <center>
                <table class ="reg">
                    <tr>
                        <td>
                    <center>
                        <ul class="slides">
                            <li>
                                <h1>Actualiza tus Datos</h1>
                                    <form action="../controlador/controler1.php" method="post">

                                        <input type="number" name="Num_Documento_per" value="<?php echo $s->Num_Documento_per; ?>" style="display:none" placeholder="Numero Documento" required>

                                        <br>
                                        <br>
                                        <h4>
                                            <label>
                                                Numero Documento <?php echo $s->Num_Documento_per; ?>
                                            </label>

                                            <br>
                                            <br>

                                            <label>
                                                Tipo Documento " <?php echo $s->tipo_doc; ?> "
                                            </label>

                                            <input name="tipo_doc" value="<?php echo $s->tipo_doc; ?>" style="display:none">

                                            <br>
                                            <br>

                                            <label>
                                                Primer Nombre
                                            </label>
                                            <input type="text" name="Primer_Nombre_per" id="Primer_Nombre_per" value="<?php echo $s->Primer_Nombre_per; ?>" placeholder="Primer Nombre" required>

                                            <br>
                                            <br>

                                            <label>
                                                Segundo Nombre
                                            </label>
                                            <input type="text" name="Segundo_Nombre_per" id="Segundo_Nombre_per" value="<?php echo $s->Segundo_Nombre_per; ?>" placeholder="Segundo Nombre" required>

                                            <br>
                                            <br>

                                            <label>
                                                Primer Apellido
                                            </label>
                                            <input type="text" name="Primer_Apellido_per" id="Primer_Apellido_per" value="<?php echo $s->Primer_Apellido_per; ?>" placeholder="Primer Apellido" required>

                                            <br>
                                            <br>

                                            <label>
                                                Segundo Apellido
                                            </label>
                                            <input type="text" name="Segundo_Apellido_per" id="Segundo_Apellido_per" value="<?php echo $s->Segundo_Apellido_per; ?>" placeholder="Segundo Apellido" required>

                                            <br>
                                            <br>

                                            <label>
                                                Usuario
                                            </label>
                                            <input type="text" name="Usuario_login" id="Usuario_login" value="<?php echo $s->Usuario_login; ?>" placeholder="Usuario" required>

                                
                                            <br>
                                            <br>

                                            <label>
                                                Telefono
                                            </label>
                                            <input type="number" name="Tel_per" id="Tel_per" value="<?php echo $s->Tel_per; ?>" placeholder="Telefono" required>

                                            <br>
                                            <br>

                                            <label>
                                                Celular
                                            </label>
                                            <input type="number" name="Cel_per" id="Cel_per" value="<?php echo $s->Cel_per; ?>" placeholder="Celular" required>

                                            <br>
                                            <br>

                                            <label>
                                                Direccion
                                            </label>
                                            <input type="text" name="Direc_per" id="Direc_per" value="<?php echo $s->Direc_per; ?>" placeholder="Direccion" required>

                                            <br>
                                            <br>

                                            <label>
                                                Correo
                                            </label>

                                            <br>

                                            <input type="text" name="Correo_per" id="Correo_per" value="<?php echo $s->Correo_per; ?>" placeholder="Correo" required>


                                            <br>
                                            <br>

                                            <input type="submit" name="actualizaDatos" value= "Actualizar"/>
                                        </h4>
                                    </form>
                                    </div>








                            </li>
                        </ul>

                    </center>
                    </td>
                    </tr>
                </table>
            </center>

            <br>
            <footer>
                pie de pagina
            </footer>

            <?php
            endwhile;
            ?>
            <!--se valida para saber si esta logeado como admin-->
            	

    </center>
</body>
</html>