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
        $admin = new PersonaModel();
    ?>
    <main>
        <div class="contenedor titulo admin">
            <p>Bienvenido Administrador</p>
        </div>
        <div class="contenedor blanco admin">

          <div class="tarjeta-admin ganancias">
              <span class="icon-shopping-cart"></span>
              <p>Ventas</p>
              <p><b>Total mes: </b>$ <?php echo $admin->Ventas_mes(); ?></p>
            <button id="formdom" onclick="mostrar('ModalReporteVentas')">Ver detalles</button>
              
          </div>

          <div class="tarjeta-admin usuarios">
              <span class="icon-users"></span>
              <p>Usuarios</p>
              <p><b>Total: </b><?php echo $admin->Count('PERSONA', NULL); ?></p>
              <a href="personas.php">Ver detalles</a>
          </div>

          <div class="tarjeta-admin productos">
              <span class="icon-shopping-basket"></span>
              <p>Productos</p>
              <p><b>Total: </b><?php echo $admin->Count('PRODUCTO', NULL); ?></p>
              <a href="productos.php">Ver detalles</a>
          </div>

          <div class="tarjeta-admin comentarios">
              <span class="icon-message"></span>
              <p>Comentarios</p>
              <p><b>Total mes: </b><?php echo $admin->Count('OPINION', '1'); ?></p>
              <button id="formdom" onclick="mostrar('ModalReporteComentarios')">Ver detalles</button>
          </div>

          <div class="tarjeta-admin roles">
              <span class="icon-key"></span>
              <p>Roles</p>
              <p><b>Total: </b><?php echo $admin->Count('ROL', NULL); ?></p>
              <a href="roles.php">Ver detalles</a>
          </div>

          <div class="tarjeta-admin tipo_prod">
              <span class="icon-shopping-bag"></span>
              <p>Tipos de producto</p>
              <p><b>Total: </b><?php echo $admin->Count('TIPO_PRODUCTO', NULL); ?></p>
              <a href="">Ver detalles</a>
          </div>
          
          <div class="tarjeta-admin tamaños">
              <span class="icon-resize-full-screen"></span>
              <p>Tamaños de producto</p>
              <p><b>Total: </b><?php echo $admin->Count('TAMAÑO', NULL); ?></p>
              <a href="tamanios.php">Ver detalles</a>
          </div>

        </div>

        <!--MODAL-REPORTE-VENTAS-->
        <div class="modal" id="ModalReporteVentas" style="display: none;">
            <span class="cerrar-modal">&times;</span>
            <div class="modal-contenido">
                <form action="../../Controlador/persona.control.php" method="POST" class="formactualizar" id="formactualizar">
                    <p>Seleccione las fechas</p>
                    <label for="Fecha_inicio" class="actualizar-label">Fecha inicial</label>
                    <input type="date" class="actualizar-input" name="Fecha_inicio" id="Fecha_inicio">
                    <label for="Fecha_fin" class="actualizar-label">Fecha final</label>
                    <input type="date" name="Fecha_fin" class="actualizar-input" id="Fecha_fin">
                    <input type="submit" class="boton_exito actualizar-sub" value="Buscar" name="ReporteVentas">
                </form>
            </div>
        </div>
        <!--FIN-MODAL-REPORTE-VENTAS-->

        <!--MODAL-REPORTE-COMENTARIOS-->        
        <div class="modal" id="ModalReporteComentarios" style="display: none;">
            <span class="cerrar-modal">&times;</span>
            <div class="modal-contenido">
                <form action="../../Controlador/persona.control.php" method="POST" class="formactualizar" id="formactualizar">
                    <p>Seleccione las fechitas</p>
                    <label for="Fecha_inicio" class="actualizar-label">Fecha inicial</label>
                    <input type="date" class="actualizar-input" name="Fecha_inicio" id="Fecha_inicio">
                    <label for="Fecha_fin" class="actualizar-label">Fecha final</label>
                    <input type="date" name="Fecha_fin" class="actualizar-input" id="Fecha_fin">
                    <input type="submit" class="boton_exito actualizar-sub" value="Buscar" name="Reporte">
                </form>
            </div>
        </div>
        <!--FIN-MODAL-REPORTE-COMENTARIOS-->

    </main>
    <?php 
        include "../footer.php";
     ?>
    <script type="text/javascript">        

        var modal = "modal";
        var span = document.getElementsByClassName("cerrar-modal");
        var modalcontenido = document.getElementsByClassName("modal-contenido");

        function mostrar(id){
            modal = document.getElementById(id);
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            for(i = 0; i < modalcontenido.length; i++){
                if (event.target == modal || event.target == modalcontenido[i]){
                    modal.style.display = "none";
                }
            }
        }  
    </script>
</body>
</html>