<?php  
session_start();
?>
<header>
        <div>
            <img src="../img/logo.png">
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu"><img src="../img/menu_hamburguesa.png"></label>
            <nav class="menu">
                <ul>
                    <li><a href="../../index.php">Ver como cliente</a></li>
                </ul>
            </nav>
            <nav class="login">
                <ul>
                    <li>
                        <form class="buscador" action="../Productos.php" method="GET">
                            <input type="search" name="Prod" placeholder="Buscar">
                        </form>
                    </li>
                    <li><a href="../perfil.php"> <?php echo $_SESSION['session']['Nombres']; ?></a></li>
                    <li><a href="../../Controlador/salir.php">Salir</a></li>
                </ul>
            </nav>
        </div>
</header>