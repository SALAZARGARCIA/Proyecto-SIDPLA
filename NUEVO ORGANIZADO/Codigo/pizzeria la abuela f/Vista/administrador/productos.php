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
        include "../../Modelo/producto.model.php";
        $model = new ProductoModel();
        require_once '../../Controlador/producto.control.php';
        $producto = new Producto();
        $listar = 'ACOMPAÑANTE';
        if(isset($_POST['aplicar_filtro'])){
            $listar = $_POST['opcion-filtro'];
        }
    ?>
    <main>
        <?php  if(isset($_GET['Editar'])){ ?>

            <!-- The Modal -->
            <div class="modal">

              <!-- Modal content -->
              <div class="modal-contenido">

                <?php $prod = $model->Obtener_Producto($_GET['ID']); ?>

                <a class="cerrar-modal" href="productos.php">X</a>
                <form action="../../Controlador/producto.control.php" class="formactualizar" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="Cod_producto" value="<?php echo $prod->__GET('Cod_producto'); ?>">
                    <input type="hidden" name="tipo_producto_tipo_prod" value="<?php echo $prod->__GET('tipo_producto_tipo_prod'); ?>">

                    <img src="../MEDIA/<?php echo $prod->__GET('Foto_prod'); ?>">

                    <label for="Foto_prod" class="actualizar-label-foto">Actualizar Foto</label>
                        <input type="hidden" name="Fotico" value="<?php echo $prod->__GET('Foto_prod'); ?>">
                        <input class="actualizar-foto" type="file" id="Foto_prod" name="Foto_prod">

                    <label class="actualizar-label" for="ndoc">Nombre</label>
                        <input class="actualizar-input" type="text" name="Nom_prod" id="Nom_prod" value="<?php echo $prod->__GET('Nom_prod'); ?>" required>

                    <label class="actualizar-label" for="Nomb">Descripcion</label>
                        <input class="actualizar-input" type="text" name="Desc_prod" id="Nomb" value="<?php echo $prod->__GET('Desc_prod'); ?>" required>
                              
                    <label class="actualizar-label" for="Apell">Precio</label>
                        <input class="actualizar-input" type="text" name="Valor_unitario" id="Apell" value="<?php echo $prod->__GET('Valor_unitario'); ?>" required>

                    <?php if($prod->__GET('tipo_producto_tipo_prod') == 'BEBIDA'): ?>

                        <label class="actualizar-label" for="Stok_min">Stok Minimo</label>
                        <input class="actualizar-input" type="number" name="Stok_min" id="Stok_min" value="<?php echo $prod->__GET('Stok_min'); ?>" required>

                        <label class="actualizar-label" for="Stok_max">Stok Maximo</label>
                        <input class="actualizar-input" type="number" name="Stok_max" id="Stok_max" value="<?php echo $prod->__GET('Stok_max'); ?>" required>

                        <label class="actualizar-label" for="Cantidad_exist">Cantidad Existente</label>
                        <input class="actualizar-input" type="number" name="Cantidad_exist" id="Cantidad_exist" value="<?php echo $prod->__GET('Cantidad_exist'); ?>" required>

                    <?php endif; ?>

                    <br>
                    <input type="submit" class="boton_exito actualizar-sub" name="Actualizar_prod" value="Actualizar">
                </form>
              </div>

            </div>

        <?php } ?>
        <!------------MODAL AGREGAR PRODUCTO------------>
        <?php  if(isset($_GET['Nuevo'])){ ?>

            <!-- The Modal -->
            <div class="modal">

              <!-- Modal content -->
              <div class="modal-contenido">

                <a class="cerrar-modal" href="productos.php">X</a>
                <form class="form-agregar" action="../../Controlador/producto.control.php" method="POST" enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="tprod">Tipo de Producto</label>    
                        <select name="tipo_producto_tipo_prod" id="tprod" onChange="stok(this.value)">
                            <?php foreach ($model->Obtener_tipo_prod() as $tipo) { ?>
                                <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-row-item">
                    <label for="nombre">Nombre</label>
                        <input type="text" name="Nom_prod" id="nombre" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="desc">Descripcion</label>
                        <textarea name="Desc_prod" id="desc"></textarea>
                    </div>
                    <div class="form-row-item">
                    <label for="smin">Stock Minimo</label>
                        <input type="number" name="Stok_min" id="smin" required>
                    
                    <label for="smax">Stok Maximo</label>
                        <input type="number" name="Stok_max" id="smax" required>

                    <label for="cant">Cantidad Existente</label>
                        <input type="number" name="Cantidad_exist" id="cant" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="foto">Foto</label>
                        <input type="file" name="Foto_prod" id="foto" required>
                    </div>
                    <div class="form-row-item">
                    <label for="valor">Precio</label>
                        <input type="number" name="Valor_unitario" id="valor" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <label for="tamaño">Tamaño</label>
                        <select name="tamaño_tamaño" id="tamaño">
                            <?php foreach ($model->Obtener_tamaños_prod() as $tamaño) { ?>
                                <option value="<?php echo $tamaño; ?>"><?php echo $tamaño; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-row-item">
                    <input type="submit" class="boton_exito" name="Agregar_prod" value="Agregar">
                    </div>
                    <div class="form-row-item">
                    <input type="submit" class="boton_peligro" value="Cancelar" onclick="location.href='productos.php'">
                    </div>
                  </div>

                </form>
              </div>

            </div>

        <?php } ?>
        <!-----------FIN MODAL AGREGAR PRODUCTO---------->
        <div class="contenedor titulo admin">
            <p>Administrador de Productos</p>
        </div>
        <div class="contenedor blanco admin">
          <label for="filtro" class="boton_filtro">Filtar Productos <span class="icon-chevron-down"></span></label>
          <input type="checkbox" id="filtro" name="filtro">
          <div class="contenedor-filtro">
            <form method="post" class="formulario-filtro">
              <label for="opcion-filtro">Filtrar productos por</label>
                <select name="opcion-filtro" id="opcion-filtro"">
                    <option value="todos" selected>TODOS</option>
                    <?php foreach ($model->Obtener_tipo_prod() as $tipo) { ?>
                        <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
                    <?php } ?>
                        <input type="submit" class="boton_primario btn-filtro" name="aplicar_filtro" value="Aplicar Filtro">
                </select>
            </form>
          </div>

          <button class="boton_exito btn-añadir" onclick="location.href='productos.php?Nuevo'">Agregar Producto <span class="icon-add-to-list"></span></button>

        <form method="POST" class="buscador-filtro">
            <input type="text" name="opcion-filtro" id="busca-filtro"">
            <input type="submit" class="boton_primario" name="aplicar_filtro" value="Buscar">
        </form>
        
          <div class="tabla_responsive">
            <table class="tabla_default">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Stok Min</th>
                        <th>Stok Max</th>
                        <th>Cant. Existente</th>
                        <th>Precio</th>
                        <th>Tamaño</th>
                        <th>Tipo de Producto</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>

                <?php foreach ($model->Listar_Prod($listar) as $r): ?>               
                <tbody>
                    <tr>
                        <td><?php echo $r->__GET('Cod_producto'); ?></td>
                        <td><img src="../MEDIA/<?php echo $r->__GET('Foto_prod'); ?>"></td>
                        <td><?php echo $r->__GET('Nom_prod'); ?></td>
                        <td><?php echo $r->__GET('Desc_prod'); ?></td>
                        <td><?php echo $r->__GET('Stok_min'); ?></td>
                        <td><?php echo $r->__GET('Stok_max'); ?></td>
                        <td><?php echo $r->__GET('Cantidad_exist'); ?></td>
                        <td>$<?php echo $r->__GET('Valor_unitario'); ?></td>
                        <td><?php echo $r->__GET('tamaño_tamaño'); ?></td>
                        <td><?php echo $r->__GET('tipo_producto_tipo_prod'); ?></td>
                        <td>
                            <button class="boton_primario" onclick="location.href='productos.php?Editar&ID=<?php echo $r->__GET('Cod_producto'); ?>'">Editar</button>
                        </td>
                        <td>
                            <?php if($r->__GET('estado_prod') == 1){ ?>
                            <form action="../../Controlador/producto.control.php" method="POST">
                                <input type="hidden" name="Cod_producto" value="<?php echo $r->__GET('Cod_producto'); ?>">
                                <button type="submit" name="Deshabiliar_prod" class="boton_peligro">Deshabilitar</button>
                            </form>

                        <?php }elseif ($r->__GET('estado_prod') == 0) { ?>
                            <form action="../../Controlador/producto.control.php" method="POST">
                                <input type="hidden" name="Cod_producto" value="<?php echo $r->__GET('Cod_producto'); ?>">
                                <button type="submit" name="Habiliar_prod" class="boton_exito">Habiliar</button>
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
     <script type="text/javascript">
        window.onload = stok();

        function stok(opcion){
            var smin = document.getElementById('smin');
            var smax = document.getElementById('smax');
            var cant = document.getElementById('cant');
            if(opcion != "BEBIDA")
            {
                smin.placeholder = 'No permitido';
                smax.placeholder = 'No permitido';
                cant.placeholder = 'No permitido';
                smin.disabled=true;
                smax.disabled=true;
                cant.disabled=true;
            }else{
                smin.placeholder = '';
                smax.placeholder = '';
                cant.placeholder = '';
                smin.disabled=false;
                smax.disabled=false;
                cant.disabled=false;
            }
        }
    </script>
</body>
</html>