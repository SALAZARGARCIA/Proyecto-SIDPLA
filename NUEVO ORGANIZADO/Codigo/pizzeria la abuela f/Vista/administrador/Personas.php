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


                                <?php
                                $sq11 = "CALL Listar_Persona";

                                $query = $db->query($sq11);

                                if ($query->rowCount() > 0):
                                    ?>
                                    <table class="listar">

                                        <br><h1>Consulta - Registros</h1><br>

                                        <thead>
                                            <tr>
                                                <th>Numero Documento</th>
                                                <th>Tipo Documento</th>
                                                <th>Primer Nombre</th>
                                                <th>Segundo Nombre</th>
                                                <th>Primer Apellido</th>
                                                <th>Segundo Apellido</th>
                                                <th>Usuario</th>

                                                <th>Telefono</th>
                                                <th>Celular</th>
                                                <th>Direccion</th>
                                                <th>Correo</th>
                                                <th>Rol</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>


                                        <?php foreach ($model->Listar_Persona() as $r): ?>
                                            <tr>
                                                <td><?php echo $r->__GET('Num_Documento_per'); ?></td>
                                                <td><?php echo $r->__GET('tipo_doc'); ?></td>
                                                <td><?php echo $r->__GET('Primer_Nombre_per'); ?></td>
                                                <td><?php echo $r->__GET('Segundo_Nombre_per'); ?></td>
                                                <td><?php echo $r->__GET('Primer_Apellido_per'); ?></td>
                                                <td><?php echo $r->__GET('Segundo_Apellido_per'); ?></td>
                                                <td><?php echo $r->__GET('Usuario_login'); ?></td>
                                                <td><?php echo $r->__GET('Tel_per'); ?></td>
                                                <td><?php echo $r->__GET('Cel_per'); ?></td>
                                                <td><?php echo $r->__GET('Direc_per'); ?></td>
                                                <td><?php echo $r->__GET('Correo_per'); ?></td>
                                                <td><?php echo $r->__GET('rol_Rol'); ?></td>

                                                <td>
                                                    <a href="Editar persona.php?action=editar&Num_Documento_per=<?php echo $r->Num_Documento_per; ?>">Editar<span class="icon-edit"></span></a>
                                                </td>

                                                <td>
                                                    <a href="?action=eliminar&Num_Documento_per=<?php echo $r->Num_Documento_per; ?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Eliminar<span class="icon-trash"></span></a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>

                                    </table>

                                <?php else: ?>

                                    <h4 class="alert-danger">Señor Usuario No se Encuentran Registros!!!</h4>

                                <?php endif; ?>
                            </li>
                        </ul>



                    </center>
                    </td>
                    </tr>
                </table>
            </center>	
            <br>	
<?php
                                include '../footer.php';
?>
            <?php
        }else {
            echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
        }
        ?>
    </body>
</html>