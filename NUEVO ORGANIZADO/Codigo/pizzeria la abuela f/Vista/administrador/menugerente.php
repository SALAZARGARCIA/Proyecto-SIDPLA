<?php
if (!isset($_SESSION["session"])) { // Verifica si la variable de sesión creada esta activa si no la inicializa
    session_start();
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
                <ul class="navegadorg1">
                    <li><a href="administrador.php"><span class="icon-home"></span></a></li> 
                    <li><a href="productos.php">Productos</a>
                        <ul>
                            <li><a  href="Nuevo registro.php?action=ver&m=1">Nuevo producto</a></li>
                        </ul>
                    </li>
                    <li><a href="Personas.php">Personas</a>
                        <ul>
                            <li><a href="buscPersonas.php">Buscar persona</a></li>
                        </ul>
                    </li>
                    <li><a href="">Rol</a>
                        <ul>
                            <li><a href="administrador.php">Gerente</a></li>
                            <li><a href="../empleado/empleado.php">Empleado </a></li>
                            <li><a href="../index.php">Cliente</a></li>
                        </ul>
                    </li>
                    <li><a href="Pizzeria.php">Sucursales</a>
                        <ul>
                            <li><a href="Nueva sucursal.php?action=ver&m=1">Nueva sucursal</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Informes</a>
                        <ul>
                            <li><a href="Verdomicilios.php">Domicilios</a></li>
                            <li><a href="Opiniones.php">Opiniones</a></li>
                            <li><a href="VFechayProducto.php">Domicilio&nbsp;por&nbsp;producto</a></li>
                        </ul></li>
                    <!--<li><a href="administrador.php">mas</a>	
                        <ul>
                            <li><a href="Tamanio.php">Tamaño</a></li>
                            <li><a href="Tipoproductos.php">Tipo productos</a></li>
                        </ul>	

                    </li>
                </ul>	-->

                </ul>
            </div>
            <div id="headerie">

                <li class="pull-right"><a href="<?php
                    if (isset($_SESSION['session'])) {
                        echo $ruta . '../../controlador/salir.php';
                    } else {
                        echo $ruta . '../inicio_sesion.php';
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


</div>
</body>
</html>
