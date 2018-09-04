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
        include "../../Modelo/tamano.model.php";
        $model = new tamanioModel();
        require_once '../../Controlador/tamanio.control.php';
        $tamaño = new tamanio();
    ?>
    <main>
        <?php  if(isset($_GET['Editar'])){ ?>

            <!-- The Modal -->
            <div class="modal">

              <!-- Modal content -->
              <div class="modal-contenido">

                
                <?php 
                $Cod_tamaño= $_GET['ID'];
                echo $Cod_tamaño;
                $prod = $model->Obtener_tamaños($Cod_tamaño); ?>

                <a class="cerrar-modal" href="tamanios.php">X</a>
                <form action="../../Controlador/tamanio.control.php" class="formactualizar" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="tamaño2" value="<?php echo $prod->__GET('tamaño'); ?>">

                    <label class="actualizar-label" for="ndoc">Tamaño</label>
                        <input class="actualizar-input" type="text" name="tamaño" id="tamaño" value="<?php echo $prod->__GET('tamaño'); ?>" required>
                    <br>
                    <input type="submit" class="boton_exito actualizar-sub" name="Actualizar_tam" value="Actualizar">
                </form>
              </div>

            </div>

        <?php } ?>
        <!------------MODAL AGREGAR tamaño------------>
        <?php  if(isset($_GET['Nuevo'])){ ?>

            <!-- The Modal -->
            <div class="modal">

              <!-- Modal content -->
              <div class="modal-contenido">

                <a class="cerrar-modal" href="Tamanios.php">X</a>
                <form class="form-agregar" action="../../Controlador/tamanio.control.php" method="POST" enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="nombre">Tamaño</label>
                        <input type="text" name="tamaño" id="nombre" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <input type="submit" class="boton_exito" name="Agregar_tam" value="Agregar">
                    </div>
                    <div class="form-row-item">
                    <input type="submit" class="boton_peligro" value="Cancelar" onclick="location.href='tamanios.php'">
                    </div>
                  </div>

                </form>
              </div>

            </div>

        <?php } ?>
        <!-----------FIN MODAL AGREGAR PRODUCTO---------->
        <div class="contenedor titulo admin">
            <p>Administrador de Tamaños</p>
        </div>
        <div class="contenedor blanco admin">

          <button class="boton_exito btn-añadir" onclick="location.href='tamanios.php?Nuevo'">Agregar Tamaño <span class="icon-add-to-list"></span></button>

          <div class="tabla_responsive">
            <table class="tabla_default">
                <thead>
                    <tr>
                        <th>Tamaño</th>
                        <th>Estado tamaño</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>

                <?php foreach ($model->Listar_tam() as $r): ?>               
                <tbody>
                    <tr>
                        <td><?php echo $r->__GET('tamaño'); ?></td>
                        <td><?php echo $est = $r->__GET('estado_tamaño') == 1 ? "Habilitado" : "Deshabilitado"; ?></td>
                        <td>
                            <button class="boton_primario" onclick="location.href='tamanios.php?Editar&ID=<?php echo $r->__GET('tamaño'); ?>'">Editar</button>
                        </td>
                        <td>
                            <?php if($r->__GET('estado_tamaño') == 1){ ?>
                            <form action="../../Controlador/tamanio.control.php" method="POST">
                                <input type="hidden" name="tamaño" value="<?php echo $r->__GET('tamaño'); ?>">
                                <button type="submit" name="Deshabiliar_tam" class="boton_peligro">Deshabilitar</button>
                            </form>

                        <?php }elseif ($r->__GET('estado_tamaño') == 0) { ?>
                            <form action="../../Controlador/tamanio.control.php" method="POST">
                                <input type="hidden" name="tamaño" value="<?php echo $r->__GET('tamaño'); ?>">
                                <button type="submit" name="Habiliar_tam" class="boton_exito">Habiliar</button>
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

</body>
</html>