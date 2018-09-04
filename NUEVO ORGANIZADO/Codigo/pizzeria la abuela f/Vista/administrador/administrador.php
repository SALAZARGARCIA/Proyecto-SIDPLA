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
    ?>
    <main>
        <div class="contenedor titulo admin">
            <p>Bienvenido Administrador</p>
        </div>
        <div class="contenedor blanco admin">

          <div class="tarjeta-admin ganancias">
              <span class="icon-shopping-cart"></span>
              <p>Ventas</p>
              <p><b>Total mes: </b>$145.000</p>
              <a href="">Ver detalles</a>
          </div>

          <div class="tarjeta-admin usuarios">
              <span class="icon-users"></span>
              <p>Usuarios</p>
              <p><b>Total: </b>145</p>
              <a href="personas.php">Ver detalles</a>
          </div>

          <div class="tarjeta-admin productos">
              <span class="icon-shopping-basket"></span>
              <p>Productos</p>
              <p><b>Total: </b>56</p>
              <a href="productos.php">Ver detalles</a>
          </div>

          <div class="tarjeta-admin comentarios">
              <span class="icon-message"></span>
              <p>Comentarios</p>
              <p><b>Total mes: </b>56</p>
              <a href="">Ver detalles</a>
          </div>

          <div class="tarjeta-admin roles">
              <span class="icon-key"></span>
              <p>Roles</p>
              <p><b>Total: </b>3</p>
              <a href="">Ver detalles</a>
          </div>

          <div class="tarjeta-admin tipo_prod">
              <span class="icon-shopping-bag"></span>
              <p>Tipos de producto</p>
              <p><b>Total: </b>6</p>
              <a href="">Ver detalles</a>
          </div>

          <div class="tarjeta-admin tipo_doc">
              <span class="icon-v-card"></span>
              <p>Tipos de documento</p>
              <p><b>Total: </b>3</p>
              <a href="">Ver detalles</a>
          </div>
          
          <div class="tarjeta-admin tamaños">
              <span class="icon-resize-full-screen"></span>
              <p>Tamaños de producto</p>
              <p><b>Total: </b> 8</p>
              <a href="">Ver detalles</a>
          </div>

        </div>

    </main>
    <?php 
        include "../footer.php";
     ?>
</body>
</html>