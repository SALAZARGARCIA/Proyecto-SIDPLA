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
          <p>Pagina del administrador</p>
        </div>

    </main>
    <?php 
        include "../footer.php";
     ?>
</body>
</html>