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
        include "../../Modelo/persona.model.php";
        $model = new PersonaModel();
        require_once '../../Controlador/persona.control.php';
        $persona = new Persona();
        $rol_filtro = 'todos';
        if(isset($_POST['aplicar_filtro'])){
            $rol_filtro = $_POST['opcion-filtro'];
        }
    ?>
    <main>
        <?php  if(isset($_GET['Editar'])){ ?>

            <!-- The Modal -->
            <div class="modal">

              <!-- Modal content -->
              <div class="modal-contenido">

                <?php $persona = $model->Obtener_Persona($_GET['ID']); ?>

                <a class="cerrar-modal" href="personas.php">X</a>
                <form action="../../Controlador/persona.control.php" class="formactualizar" method="POST">

                    <input type="hidden" name="Num_Documento_per" value="<?php echo $persona->__GET('Num_Documento_per'); ?>">
                    <p><b>Documento: </b><?php echo $persona->__GET('Num_Documento_per'); ?></p>

                    <label class="actualizar-label" for="Nombres">Nombres</label>
                        <input class="actualizar-input" type="text" name="Nombres" id="Nombres" value="<?php echo $persona->__GET('Nombres'); ?>" required>

                    <label class="actualizar-label" for="Apellidos">Apellidos</label>
                        <input class="actualizar-input" type="text" name="Apellidos" id="Apellidos" value="<?php echo $persona->__GET('Apellidos'); ?>" required>
                              
                    <label class="actualizar-label" for="Tel_per">Telefono</label>
                        <input class="actualizar-input" type="number" name="Tel_per" id="Tel_per" value="<?php echo $persona->__GET('Tel_per'); ?>" required>

                    <label class="actualizar-label" for="Cel_per">Celular</label>
                        <input class="actualizar-input" type="number" name="Cel_per" id="Cel_per" value="<?php echo $persona->__GET('Cel_per'); ?>" required>

                    <label class="actualizar-label" for="Direc_per">Direccion</label>
                        <input class="actualizar-input" type="text" name="Direc_per" id="Direc_per" value="<?php echo $persona->__GET('Direc_per'); ?>" required>

                    <label class="actualizar-label" for="Correo_per">Correo</label>
                        <input class="actualizar-input" type="email" name="Correo_per" id="Correo_per" value="<?php echo $persona->__GET('Correo_per'); ?>" required>

                    <label class="actualizar-label" for="rol_Rol">Rol</label>
                        <select class="actualizar-input" name="rol_Rol" id="rol_Rol">
                            <?php foreach ($model->Obtener_Roles() as $rol) {
                                if($persona->__GET('rol_Rol')==$rol){ 
                                    echo '<option value="' . $rol . '" selected>' . $rol . '</option>';
                                    }else{
                                    echo '<option value="' . $rol . '">' . $rol . '</option>';
                                    } 
                            } ?>
                        </select>

                    <br>
                    <input type="submit" class="boton_exito actualizar-sub" name="actualizar_per" value="Actualizar">
                </form>
              </div>

            </div>

        <?php } ?>

        <!------------MODAL AGREGAR persona------------>


        <?php  if(isset($_GET['Nuevo'])){ ?>

            <!-- The Modal -->
            <div class="modal">

              <!-- Modal content -->
              <div class="modal-contenido">

                <a class="cerrar-modal" href="personas.php">X</a>
                <form class="form-agregar" action="../../Controlador/persona.control.php" method="POST" onsubmit="return evaluar();">

                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="tipo_doc">Tipo documento</label>    
                        <select name="tipo_doc" id="tipo_doc">
                            <?php foreach ($model->Obtener_tipo_doc() as $tipo) { ?>
                                <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-row-item">
                    <label for="documento">Documento</label>
                        <input type="text" name="Num_Documento_per" id="documento" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="nombre">Nombres</label>
                        <input type="text" name="Nombres" id="nombre" required>
                    </div>
                    <div class="form-row-item">
                    <label for="Apellidos">Apellidos</label>
                        <input type="text" name="Apellidos" id="Apellidos" required>
                    </div>
                    <div class="form-row-item">
                    <label for="Pass">Contraseña</label>
                        <input type="password" name="Pass_login" id="Pass" required>
                    </div>
                    <div class="form-row-item">
                    <label for="Pass2">Repetir Contraseña</label>
                        <input type="password" name="Pass_login" id="Pass2" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="Tel_per">Telefono</label>
                        <input type="number" name="Tel_per" id="Tel_per" required>
                    </div>
                    <div class="form-row-item">
                    <label for="Cel_per">Celular</label>
                        <input type="number" name="Cel_per" id="Cel_per" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="Direc_per">Direccion</label>
                        <input type="text" name="Direc_per" id="Direc_per" required>
                    </div>
                    <div class="form-row-item">
                    <label for="Correo_per">Correo</label>
                        <input type="email" name="Correo_per" id="Correo_per">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="rol">Rol</label>    
                        <select name="rol_Rol" id="rol">
                            <?php foreach ($model->Obtener_Roles() as $rol) { ?>
                                <option value="<?php echo $rol; ?>"><?php echo $rol; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <input type="submit" class="boton_exito" name="registrar_per" value="Agregar">
                    </div>
                    <div class="form-row-item">
                    <input type="submit" class="boton_peligro" value="Cancelar" onclick="location.href='personas.php'">
                    </div>
                  </div>

                </form>
              </div>

            </div>

        <?php } ?>
        <!-----------FIN MODAL AGREGAR persona---------->

        <div class="contenedor titulo admin">
            <p>Administrador de personas</p>
        </div>
        <div class="contenedor blanco admin">
          <label for="filtro" class="boton_filtro">Filtar personas <span class="icon-menu"></span></label>
          <input type="checkbox" id="filtro" name="filtro">
          <div class="contenedor-filtro">
            <form method="post" class="formulario-filtro">
              <label for="opcion-filtro">Filtrar personas por</label>
                <select name="opcion-filtro" id="opcion-filtro"">
                    <option value="todos" selected>TODOS</option>
                    <?php foreach ($model->Obtener_Roles() as $rol) { ?>
                        <option value="<?php echo $rol; ?>"><?php echo $rol; ?></option>
                    <?php } ?>
                        <input type="submit" class="boton_primario btn-filtro" name="aplicar_filtro" value="Aplicar Filtro">
                </select>
            </form>
          </div>

          <button class="boton_exito btn-añadir" onclick="location.href='personas.php?Nuevo'">Agregar persona <span class="icon-add-to-list"></span></button>

          <div class="tabla_responsive">
            <table class="tabla_default">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Tipo de documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Editar</th>
                        <th>Deshabilitar</th>
                    </tr>
                </thead>

                <?php foreach ($model->Listar_Persona($rol_filtro) as $r): ?>               
                <tbody>
                    <tr>
                        <td><?php echo $r->__GET('Num_Documento_per'); ?></td>
                        <td><?php echo $r->__GET('tipo_doc'); ?></td>
                        <td><?php echo $r->__GET('Nombres'); ?></td>
                        <td><?php echo $r->__GET('Apellidos'); ?></td>
                        <td><?php echo $r->__GET('Tel_per'); ?></td>
                        <td><?php echo $r->__GET('Cel_per'); ?></td>
                        <td><?php echo $r->__GET('Direc_per'); ?></td>
                        <td><?php echo $r->__GET('Correo_per'); ?></td>
                        <td><?php echo $r->__GET('rol_Rol'); ?></td>
                        <td>
                            <button class="boton_primario" onclick="location.href='personas.php?Editar&ID=<?php echo $r->__GET('Num_Documento_per'); ?>'">Editar</button>
                        </td>
                        <td>
                            <?php if($r->__GET('estado_per') == 1){ ?>
                            <form action="../../Controlador/persona.control.php" method="POST">
                                <input type="hidden" name="Num_Documento_per" value="<?php echo $r->__GET('Num_Documento_per'); ?>">
                                <button type="submit" name="Deshabiliar_per" class="boton_peligro">Deshabilitar</button>
                            </form>

                        <?php }elseif ($r->__GET('estado_per') == 0) { ?>
                            <form action="../../Controlador/persona.control.php" method="POST">
                                <input type="hidden" name="Num_Documento_per" value="<?php echo $r->__GET('Num_Documento_per'); ?>">
                                <button type="submit" name="Habiliar_per" class="boton_exito">Habiliar</button>
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

     <!--JAVASCRIPT PARA VERIFICAR CONTRASEÑAS-->
     <script src="../js/form.js"></script>
</body>
</html>