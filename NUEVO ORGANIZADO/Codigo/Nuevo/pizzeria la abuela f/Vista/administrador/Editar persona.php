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

    require_once '../../CONTROLADOR/persona.control.php';
    require_once '../../Modelo/persona.model.php';
    require_once '../../Modelo/database.php';
//logica
    $persona = new Persona();
    $model = new PersonaModel();
    $db = database::conectar();

    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
            case 'actualizar':
                $persona->__SET('Num_Documento_per2', $_REQUEST['Num_Documento_per2']);
                $persona->__SET('Primer_Nombre_per', $_REQUEST['Primer_Nombre_per']);
                $persona->__SET('Segundo_Nombre_per', $_REQUEST['Segundo_Nombre_per']);
                $persona->__SET('Primer_Apellido_per', $_REQUEST['Primer_Apellido_per']);
                $persona->__SET('Segundo_Apellido_per', $_REQUEST['Segundo_Apellido_per']);
                $persona->__SET('Usuario_login', $_REQUEST['Usuario_login']);
                $persona->__SET('Pass_login', $_REQUEST['Pass_login']);
                $persona->__SET('Tel_per', $_REQUEST['Tel_per']);
                $persona->__SET('Cel_per', $_REQUEST['Cel_per']);
                $persona->__SET('Direc_per', $_REQUEST['Direc_per']);
                $persona->__SET('Correo_per', $_REQUEST['Correo_per']);
                $persona->__SET('tipo_doc', $_REQUEST['tipo_doc']);
                $persona->__SET('rol_Rol', $_REQUEST['rol_Rol']);
                $persona->__SET('Num_Documento_per', $_REQUEST['Num_Documento_per']);

                $model->Actualizar_Persona($persona);
                print "<script>alert(\"Registro Actualizado exitosamente.\");window.location='Personas.php';</script>";
                break;


//  		Instancia la clase a eliminar que se encuentra al final de cada registro//

            case 'eliminar':
                $model->Eliminar_Persona($_REQUEST['Num_Documento_per']);
                print "<script>alert(\"Registro Eliminado exitosamente.\");window.location='personas.php';</script>";
                break;

//  		Instancia la clase editar que se encuentra al final de cada registro//	


            case 'editar':
                $persona = $model->Obtener_Persona($_REQUEST['Num_Documento_per']);
                break;
        }
    }
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
            <br>


            <center>
                <table class ="reg">
                    <tr>
                        <td>
                    <center>
                        <ul class="slides">
                            <li>


                                <?php if (!empty($_GET['Num_Documento_per']) && !empty($_GET['action'])) { ?>

                                    <form action="#" method="post">

                                        <!--LABEL USUARIO FINAL -->
                                        <label>
                                            <h2> Persona por Modificar:<?php echo $persona->__GET('Num_Documento_per'); ?></h2>
                                        </label>


                                        <input type="number" name="Num_Documento_per" value="<?php echo $persona->__GET('Num_Documento_per'); ?>" style="display:none" placeholder="Numero Documento" required>

                                        <br>
                                        <br>
                                        <h4>
                                            <label>
                                                Numero Documento
                                            </label>

                                            <input type="number" name="Num_Documento_per2" id="Num_Documento_per2" value="<?php echo $persona->__GET('Num_Documento_per'); ?>" placeholder="Numero Documento" required>

                                            <br>
                                            <br>

                                            <label>
                                                Tipo Documento
                                            </label>

                                            <select class="form-control" name="tipo_doc">
                                                <?php
                                                foreach ($db->query('SELECT * FROM tipo_doc where estado_tipo_doc=1') as $row) {
                                                    echo '<option value="' . $row['tipo_doc'] . '">'
                                                    . $row['tipo_doc'] . '</option>';
                                                }
                                                ?>
                                            </select>

                                            <br>
                                            <br>

                                            <label>
                                                Primer Nombre
                                            </label>
                                            <input type="text" name="Primer_Nombre_per" id="Primer_Nombre_per" value="<?php echo $persona->__GET('Primer_Nombre_per'); ?>" placeholder="Primer Nombre" required>

                                            <br>
                                            <br>

                                            <label>
                                                Segundo Nombre
                                            </label>
                                            <input type="text" name="Segundo_Nombre_per" id="Segundo_Nombre_per" value="<?php echo $persona->__GET('Segundo_Nombre_per'); ?>" placeholder="Segundo Nombre" required>

                                            <br>
                                            <br>

                                            <label>
                                                Primer Apellido
                                            </label>
                                            <input type="text" name="Primer_Apellido_per" id="Primer_Apellido_per" value="<?php echo $persona->__GET('Primer_Apellido_per'); ?>" placeholder="Primer Apellido" required>

                                            <br>
                                            <br>

                                            <label>
                                                Segundo Apellido
                                            </label>
                                            <input type="text" name="Segundo_Apellido_per" id="Segundo_Apellido_per" value="<?php echo $persona->__GET('Segundo_Apellido_per'); ?>" placeholder="Segundo Apellido" required>

                                            <br>
                                            <br>

                                            <label>
                                                Usuario
                                            </label>
                                            <input type="text" name="Usuario_login" id="Usuario_login" value="<?php echo $persona->__GET('Usuario_login'); ?>" placeholder="Usuario" required>

                                            <label> 
                                            </label>
                                            <input type="password" name="Pass_login" id="Pass_login" value="<?php echo $persona->__GET('Pass_login'); ?>" style="display:none" placeholder="Contraseña" required>

                                            <br>
                                            <br>

                                            <label>
                                                Telefono
                                            </label>
                                            <input type="number" name="Tel_per" id="Tel_per" value="<?php echo $persona->__GET('Tel_per'); ?>" placeholder="Telefono" required>

                                            <br>
                                            <br>

                                            <label>
                                                Celular
                                            </label>
                                            <input type="number" name="Cel_per" id="Cel_per" value="<?php echo $persona->__GET('Cel_per'); ?>" placeholder="Celular" required>

                                            <br>
                                            <br>

                                            <label>
                                                Direccion
                                            </label>
                                            <input type="text" name="Direc_per" id="Direc_per" value="<?php echo $persona->__GET('Direc_per'); ?>" placeholder="Direccion" required>

                                            <br>
                                            <br>

                                            <label>
                                                Correo
                                            </label>

                                            <br>

                                            <input type="text" name="Correo_per" id="Correo_per" value="<?php echo $persona->__GET('Correo_per'); ?>" placeholder="Correo" required>


                                            <br>
                                            <br>

                                            <label>
                                                Rol
                                            </label>

                                            <select class="form-control" name="rol_Rol">
                                                <?php
                                                foreach ($db->query('SELECT * FROM rol where estado_rol=1') as $row) {
                                                    echo '<option value="' . $row['Rol'] . '">' . $row['Rol'] . '</option>';
                                                    ;
                                                }
                                                ?>
                                            </select>

                                            <br>
                                            <br>

                                            <input type="submit" value= "Actualizar" onclick = "this
                                                                    .form.action = '?action=actualizar';" />
                                        </h4>
                                    </form>
                                    </div>

                                    <?php
                                }

                                $sq11 = "CALL Listar_Persona";

                                $query = $db->query($sq11);

                                if ($query->rowCount() > 0):
                                    ?>

                                    <?php foreach ($model->Listar_Persona() as $r): ?>

                                    <?php endforeach; ?>



                                <?php else: ?>



                                <?php endif; ?>





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


            <!--se valida para saber si esta logeado como admin-->
            <?php
        }else {
            echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
        }
        ?>		

    </center>
</body>
</html>