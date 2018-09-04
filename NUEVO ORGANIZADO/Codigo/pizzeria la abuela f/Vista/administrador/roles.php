<!DOCTYPE html>
<html>
<head>
    <title>Administrador - Pizzeria la Abuela</title>
    <meta charaset="UTF-8">
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
</head>
<body>
    <?php
        include "header_administrador.php";
        include "../seguridad.php";
        $seguridad = new Seguridad;
        $seguridad->Validar_Administrador();
        include "../../Modelo/rol.model.php";
        $model = new RolModel();
        require_once '../../Controlador/rol.control.php';
        $tamaño = new Rol();
    ?>
    <main>

        <!------------MODAL AGREGAR Rol------------>
        <?php  if(isset($_GET['Nuevo'])){ ?>

            <!-- The Modal -->
            <div class="modal">

              <!-- Modal content -->
              <div class="modal-contenido">

                <a class="cerrar-modal" href="roles.php">X</a>
                <form class="form-agregar" action="../../Controlador/rol.control.php" method="POST">
                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="nombre">Rol</label>
                        <input type="text" name="Rol" id="nombre" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <input type="submit" class="boton_exito" name="Agregar_rol" value="Agregar">
                    </div>
                    <div class="form-row-item">
                    <input type="submit" class="boton_peligro" value="Cancelar" onclick="location.href='roles.php'">
                    </div>
                  </div>

                </form>
              </div>

            </div>

        <?php } ?>
        <!-----------FIN MODAL AGREGAR PRODUCTO---------->
        <div class="contenedor titulo admin">
            <p>Administrador de Roles</p>
        </div>
        <div class="contenedor blanco admin">

          <button class="boton_exito btn-añadir" onclick="location.href='roles.php?Nuevo'">Agregar Rol <span class="icon-add-to-list"></span></button>

          <div class="tabla_responsive">
            <table class="tabla_default">
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Deshabilitar</th>
                    </tr>
                </thead>

                <?php foreach ($model->Listar_rol() as $r): ?>               
                <tbody>
                    <tr>
                        <td><?php echo $r->__GET('Rol'); ?></td>
                        <td><?php echo $r->__GET('estado_rol'); ?></td>
                        <td>
                            <?php if($r->__GET('estado_rol') == 1){ ?>
                            <form action="../../Controlador/rol.control.php" method="POST" id="Deshabilitar">
                                <input type="hidden" name="Rol" value="<?php echo $r->__GET('Rol'); ?>">
                                <button type="submit" onclick="confirmar(event)" name="Deshabiliar_rol" class="boton_peligro">Deshabilitar</button>
                            </form>

                        <?php }elseif ($r->__GET('estado_rol') == 0) { ?>
                            <form action="../../Controlador/rol.control.php" method="POST">
                                <input type="hidden" name="Rol" value="<?php echo $r->__GET('Rol'); ?>">
                                <button type="submit" name="Habiliar_rol" class="boton_exito">Habiliar</button>
                            </form>
                        <?php } ?>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
            </table>
              
          </div>
        </div>
         

    </main>
    <?php 
        include "../footer.php";
     ?>

    <script language="JavaScript"> 
    function confirmar(e){ 
        if (confirm('¡Atencion! "\n" Ya no se podra ingresar al sistema con este rol ¿Estas seguro de desabilitar este rol?')){
           document.Deshabilitar.submit(); 
        }else{
           e.preventDefault();
        } 
    } 
    </script>

</body>
</html>