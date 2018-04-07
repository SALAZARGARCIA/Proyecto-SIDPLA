
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

//          Instancia la clase editar que se encuentra al final de cada registro//  


            case 'editar':
                $persona = $model->Obtener_Persona($_REQUEST['Num_Documento_per']);
                break;
        }
    }
    ?>
<html lang="es">
    <head Content-Type: text/html; charset=utf-8>
    <?php
    include("../llamadoestilos2.php");
    include("../../Modelo/conection.php");
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
                <h1>Persona</h1>

                
                <br>

                <form class="form-inline" method="post" action="#">
                                        <div class="form-group">
                                        
                                           <input type="search" name="data" style="width:160px;" class="form-control" placeholder="Numero Documento">
                                        </div>
                    <button type="submit" name="buscar" class="comprar"><span class="icon-magnifying-glass"></span> <b>Buscar</b></button>
                                    </form><br>

                <table class="listar" >
                    		

                            
                            <?php
                            if (isset($_POST["buscar"])) { // Verifica si el botón oprimido es el de buscar
                            /*
                             * Esta es la consula para obtener todos las opiniones de la base de datos buscando la fecha.
                             */
                            $dato=$_REQUEST["data"];
                            $persona = $con->query("select * from persona where Num_Documento_per like '$dato%'");
                            ?>

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
                                            </tr>
                                        </thead>
                            <?php
                            /*
                             * Apartir de aqui hacemos el recorrido de las opiniones obtenidas y los reflejamos en una tabla.
                             */
                            while ($r = $persona->fetch_object()):
                                ?>
								


                            
                                        <tr>
							
                               <td><?php echo  $r->Num_Documento_per; ?></td> 
							   <td> <?php echo $r->tipo_doc; ?></td>
                                <td><?php echo  $r->Primer_Nombre_per; ?></td>
                                <td><?php echo  $r->Segundo_Nombre_per; ?></td>
                                <td><?php echo  $r->Primer_Apellido_per; ?></td>
                                <td><?php echo $r->Segundo_Apellido_per; ?></td>
                               <td> <?php echo $r->Usuario_login; ?></td>
                               <td> <?php echo  $r->Tel_per; ?></td>
                                <td><?php echo  $r->Cel_per; ?></td>
                               <td> <?php echo $r->Direc_per; ?></td>
                               <td> <?php echo  $r->Correo_per; ?></td>
                               <td> <?php echo  $r->rol_Rol; ?></td>
                              <td>
							<a href="Editar persona.php?action=editar&Num_Documento_per=<?php echo $r->Num_Documento_per; ?>">Editar</a>
							   </td>
							   <td>
							<a href="?action=eliminar&Num_Documento_per=<?php echo $r->Num_Documento_per; ?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Eliminar</a>
</td>	
</tr>
                               
                               

                            <?php endwhile; }?>

                    </tr>
                </table>

            </center>
                </td>
                </tr>
        </table>

 <br>
 <br>
        
<footer>
   <!-- pie de pagina-->
</footer>
<?php
        }else {
            echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
        }
        ?>
</body>
</html>