
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
                <h1>Personaersona</h1>

                
                <br>

                <form class="form-inline" method="post" action="#">
                                        <div class="form-group">
                                        
                                           <input type="text" name="data" style="width:160px;" class="form-control" placeholder="Numero Documento">
                                        </div>
                                        <button type="submit" name="buscar" class="buscar">Buscar</button>
                                    </form><br>

                <table class="lis" >
                    <tr>
                        <td>		

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
                            <br>
                            
                            <?php
                            if (isset($_POST["buscar"])) { // Verifica si el botón oprimido es el de buscar
                            /*
                             * Esta es la consula para obtener todos las opiniones de la base de datos buscando la fecha.
                             */
                            $dato=$_REQUEST["data"];
                            $persona = $con->query("select Num_Documento_per, Primer_Nombre_per, Segundo_Nombre_per, Primer_Apellido_per, Segundo_Apellido_per, Usuario_login,
                            Tel_per, Cel_per, Direc_per, Correo_per, tipo_doc, rol_Rol from persona where Num_Documento_per like '$dato%'");
                            ?>

                            <?php
                            /*
                             * Apartir de aqui hacemos el recorrido de las opiniones obtenidas y los reflejamos en una tabla.
                             */
                            while ($r = $persona->fetch_object()):
                                ?>
								
							


                           
<tr>

                               <td><?php echo  $r->Num_Documento_per; ?></td>
                                <td><?php echo  $r->Primer_Nombre_per; ?></td>
                                <td><?php echo  $r->Segundo_Nombre_per; ?></td>
                                <td><?php echo  $r->Primer_Apellido_per; ?></td>
                                <td><?php echo $r->Segundo_Apellido_per; ?></td>
                               <td> <?php echo $r->Usuario_login; ?></td>
                               <td> <?php echo  $r->Tel_per; ?></td>
                                <td><?php echo  $r->Cel_per; ?></td>
                               <td> <?php echo $r->Direc_per; ?></td>
                               <td> <?php echo  $r->Correo_per; ?></td>
                               <td> <?php echo $r->tipo_doc; ?></td>
                               <td> <?php echo  $r->rol_Rol; ?></td><br>	
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

</body>
</html>