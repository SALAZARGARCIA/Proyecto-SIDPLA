<?php
if (!isset($_SESSION["session"])) { // Verifica si la variable de sesión creada esta activa si no la inicializa
    session_start();
    error_reporting(0);
    $rol_pers = $_SESSION["rolp"];
}
$archivo = basename($_SERVER['PHP_SELF']); //Captura nombre archivo actual para definir ruta
if ($archivo == "index.php") {
    $ruta = "";
} else {
    $ruta = "";
}
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet"href="../fonts/style.css">
</head> 

<body>
    <div id="contenedor">

        <div id="header">
            <img class="sobre" src="../img/rojo.png" width="740px" height="36px"/><img src="../img/principal.png" vspace="16" width="1000px" height="180px"/>
            <div id="navegador">
                <?php if ($rol_pers == "EMPLEADO") { ?>
                    <ul class="navegadorg1">

                        <li><a href="empleado.php">Domicilios en espera</a></li>
                        <li><a href="">Rol</a>
                            <ul>
                                <li><a href="empleado.php">Empleado </a></li>
                                <li><a href="../index.php">Cliente</a></li>
                            </ul>
                        </li>	

                    </ul>
                <?php } else if ($rol_pers == "ADMINISTRADOR") {
                    ?>
                    <ul class="navegadorg1">

                        <li><a href="empleado.php">Domicilios en espera</a></li>
                        <li><a href="">Rol</a>
                            <ul>
                                <li><a href="../administrador/administrador.php">Gerente </a></li>
                                <li><a href="empleado.php">Empleado </a></li>
                                <li><a href="../index.php">Cliente</a></li>
                            </ul>
                        </li>	

                    </ul>
                <?php } ?>
            </div>
            <div id="headerie">

                <li class="pull-right"><a href="<?php
                if (isset($_SESSION['session'])) {
                    echo $ruta . '../../controlador/salir.php';
                } else {
                    echo $ruta . 'inicio_sesion.php';
                }
                ?>"></span> <?php
                                              if (isset($_SESSION["session"])) {
                                                  echo "Salir";
                                              } else {
                                                  echo "Ingresar";
                                              }
                                              ?></a></li>

               
                <li class="pull-right"><a href="<?php
                    if (isset($_SESSION['session'])) {
                        echo $ruta . '../actualizarDatos.php';
                    } else {
                        echo $ruta . 'registro2.php';
                    }
                    ?>"><span class="glyphicon glyphicon-user"></span> <?php
                        if (isset($_SESSION["session"])) {
                            echo $_SESSION["session"];
                        } else {
                            echo "Registro";
                        }
                        ?></a></li>
            </div>
            </div>
        </div>


    </div>
</body>
</html>
