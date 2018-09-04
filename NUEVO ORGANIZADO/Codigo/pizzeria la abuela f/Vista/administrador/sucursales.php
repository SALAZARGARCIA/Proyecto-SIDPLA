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
        include "../../Modelo/sucursal.model.php";
        $model = new SucursalModel();
        require_once '../../Controlador/sucursal.control.php';
        $sucursal = new Sucursal();
    ?>
    <main>
        <?php  if(isset($_GET['Editar'])){ ?>

            <!-- Modal Editar-->
            <div class="modal">

              <div class="modal-contenido">

                <?php $sucursal = $model->Obtener_Sucursal($_GET['ID']); ?>

                <a class="cerrar-modal" href="sucursales.php">X</a>
                <form action="../../Controlador/sucursal.control.php" class="formactualizar" method="POST">

                    <input type="hidden" name="Nit_Pizzeria" value="<?php echo $sucursal->__GET('Nit_Pizzeria'); ?>">
                    <p><b>ID: </b><?php echo $sucursal->__GET('Nit_Pizzeria'); ?></p>

                    <label class="actualizar-label" for="Nom_Pizzeria">Nombre</label>
                        <input class="actualizar-input" type="text" name="Nom_Pizzeria" id="Nom_Pizzeria" value="<?php echo $sucursal->__GET('Nom_Pizzeria'); ?>" required>
                    
                    <label class="actualizar-label" for="Dir_Pizzeria">Direccion</label>
                        <input class="actualizar-input" type="text" name="Dir_Pizzeria" id="Dir_Pizzeria" value="<?php echo $sucursal->__GET('Dir_Pizzeria'); ?>" required>

                    <label class="actualizar-label" for="Tel_Pizzeria">Telefono</label>
                        <input class="actualizar-input" type="number" name="Tel_Pizzeria" id="Tel_Pizzeria" value="<?php echo $sucursal->__GET('Tel_Pizzeria'); ?>" required>
                              
                    <label class="actualizar-label" for="Cel_Pizzeria">Celular</label>
                        <input class="actualizar-input" type="number" name="Cel_Pizzeria" id="Cel_Pizzeria" value="<?php echo $sucursal->__GET('Cel_Pizzeria'); ?>" required>

                    <br>
                    <input type="submit" class="boton_exito actualizar-sub" name="actualizar_piz" value="Actualizar">
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

                <a class="cerrar-modal" href="sucursales.php">X</a>
                <form class="form-agregar" action="../../Controlador/sucursal.control.php" method="POST">

                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="Nit">NIT</label>
                        <input type="number" name="Nit_Pizzeria" id="Nit" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                        <label for="Nombre">Nombre</label>
                        <input type="text" name="Nom_Pizzeria" id="Nombre" required>
                    </div>
                    <div class="form-row-item">
                    <label for="Direccion">Direccion</label>
                        <input type="text" name="Dir_Pizzeria" id="Direccion" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="Tel_Pizzeria">Telefono</label>
                        <input type="number" name="Tel_Pizzeria" id="Tel_Pizzeria" required>
                    </div>
                    <div class="form-row-item">
                    <label for="Cel_Pizzeria">Celular</label>
                        <input type="number" name="Cel_Pizzeria" id="Cel_Pizzeria" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <input type="submit" class="boton_exito" name="registrar_piz" value="Agregar">
                    </div>
                    <div class="form-row-item">
                    <input type="submit" class="boton_peligro" value="Cancelar" onclick="location.href='sucursales.php'">
                    </div>
                  </div>

                </form>
              </div>

            </div>

        <?php } ?>
        <!-----------FIN MODAL AGREGAR persona---------->

        <div class="contenedor titulo admin">
            <p>Administrador de sucursales</p>
        </div>
        <div class="contenedor blanco admin">

          <button class="boton_exito btn-añadir" onclick="location.href='sucursales.php?Nuevo'">Agregar sucursal <span class="icon-add-user"></span></button>

          <div class="tabla_responsive">
            <table class="tabla_default">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>

                <?php foreach ($model->Listar_Sucursal() as $r): ?>               
                <tbody>
                    <tr>
                        <td><?php echo $r->__GET('Nit_Pizzeria'); ?></td>
                        <td><?php echo $r->__GET('Nom_Pizzeria'); ?></td>
                        <td><?php echo $r->__GET('Dir_Pizzeria'); ?></td>
                        <td><?php echo $r->__GET('Tel_Pizzeria'); ?></td>
                        <td><?php echo $r->__GET('Cel_Pizzeria'); ?></td>
                        <td>
                            <button class="boton_primario" onclick="location.href='sucursales.php?Editar&ID=<?php echo $r->__GET('Nit_Pizzeria'); ?>'">Editar</button>
                        </td>
                        <td>
                            <form action="../../Controlador/sucursal.control.php" method="POST">
                                <input type="hidden" name="Nit_Pizzeria" value="<?php echo $r->__GET('Nit_Pizzeria'); ?>">
                                <button type="submit" name="Eliminar_piz" class="boton_peligro">Eliminar</button>
                            </form>
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