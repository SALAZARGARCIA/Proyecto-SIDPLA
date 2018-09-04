<?php  
session_start();
$exploden = explode(' ', $_SESSION['session']['Nombres']); 
$nombre = array_pop($exploden);
?>
<header>
        <div>
            <img src="../img/logo.png">
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu"><img src="../img/menu_hamburguesa.png"></label>
            <nav class="menu">
                <ul>
                    <li><a href="../../index.php">Ver como cliente</a></li>
                    <li><a href="administrador.php"><span class="icon-home"></span></a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="personas.php">Usuarios</a></li>
                    <li><a href="">Sucursal</a></li>
                    <li><a href="">Domicilios</a></li>
                </ul>
            </nav>
            <nav class="login">
                <ul>
                    <li>
                        <form class="buscador" action="../Productos.php" method="GET">
                            <input type="search" name="Prod" placeholder="Buscar">
                        </form>
                    </li>
                    <li><a href="../perfil.php"> <?php echo $nombre; ?></a></li>
                    <li><a href="../../Controlador/salir.php">Salir</a></li>
                </ul>
            </nav>
        </div>
</header>