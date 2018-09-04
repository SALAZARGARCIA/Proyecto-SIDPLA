<?php 
    $misdom= false;
    session_start();
    if(isset($_SESSION['session'])){
        //Funcion para separar los nombres, para que solo quede uno
        $exploden = explode(' ', $_SESSION['session']['Nombres']); 
        $nombre = array_pop($exploden);
        $misdom = true;
    }
    $explode = explode('/', $_SERVER['PHP_SELF']); //Funcion para definir la ruta en la que esta
    $url = array_pop($explode);
    if ($url == 'index.php') {
        $ruta = 'Vista/';
        $ruta2 = '';
    }elseif ($url == 'empleado.php') {
        $ruta = '../';
        $ruta2 = '../../';
    }else{
        $ruta = '';
        $ruta2 = '../';
    }
 ?>

<header>
        <div>
            <img src="<?php echo $ruta . 'img/logo.png'; ?>">
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu"><img src="<?php echo $ruta . 'img/menu_hamburguesa.png'; ?>"></label>
            <nav class="menu">
            	<ul>
            		<li><a href="<?php echo $ruta2 . 'index.php'; ?>"><span class="icon-home"></span></a></li>
            		<li><a href="<?php echo $ruta . 'acerca.php'; ?>">Acerca</a></li>
            		<li><a href="<?php echo $ruta . 'contactanos.php'; ?>">Contactanos</a></li>
            		<li><a href="<?php echo $ruta . 'Nproductos.php'; ?>">Productos</a></li>
                    <?php if($misdom){ ?>
                    <li><a href="<?php echo $ruta . 'misdomicilios.php'; ?>">Mis Domicilios</a></li>
                    <?php if($_SESSION['session']['Rol'] == 'EMPLEADO'){ ?>
                        <li><a href="<?php echo $ruta . 'empleado/empleado.php'; ?>">Empleado</a></li>
                    <?php }if($_SESSION['session']['Rol'] == 'ADMINISTRADOR') { ?>
                        <li class="Administrador">
                            <a href="">Rol</a>
                            <ul>
                                <li class="admin_li"><a href="<?php echo $ruta . 'empleado/empleado.php'; ?>">Empleado</a></li>
                                <li class="admin_li"><a href="<?php echo $ruta . 'administrador/administrador.php'; ?>">Administrador</a></li>
                            </ul>
                        </li>
                    <?php }} ?>
            		<li><a href="<?php echo $ruta . 'Cart.php'; ?>"><span class="icon-shopping-cart"></span></a></li>
            	</ul>
            </nav>
            <nav class="login">
                <ul>
                    <li>
                        <form class="buscador" action="Productos.php" method="GET">
                            <input type="search" name="Prod" placeholder="Buscar">
                        </form>
                    </li>
                    <?php if(isset($_SESSION['session'])){ ?>
                        <li><a href="<?php echo $ruta . 'perfil.php'; ?>"> <?php echo $nombre; ?></a></li>
                        <li><a href="<?php echo $ruta . '../Controlador/salir.php'; ?>">Salir</a></li>
                    <?php }else{ ?>
                        <li><a href="<?php echo $ruta . 'login.php'; ?>">Iniciar</a></li>
                        <li><a href="<?php echo $ruta . 'registro.php'; ?>">Registro</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
</header>