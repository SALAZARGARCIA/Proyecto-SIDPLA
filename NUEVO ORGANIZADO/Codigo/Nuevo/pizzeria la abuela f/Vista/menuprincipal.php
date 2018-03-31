<?php
if(!isset($_SESSION["session"])) // Verifica si la variable de sesión creada esta activa si no la inicializa
{
session_start();
}
$archivo = basename($_SERVER['PHP_SELF']); //Captura nombre archivo actual para definir ruta
if ($archivo=="index.php")
{
$ruta="";
}
else
{
$ruta="";
}
?>
	<header>
		<br>
		<h1>
			<a href="index.php">
				<img src="img/2.png" width="100%" height="8%"><br>Pizzeria la abuela <BR><BR> 
			</a>
		</h1>
		
		<nav>
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="acerca.php">Acerca</a></li>
				<li><a href="productos.php">Productos</a></li>
				<li><a href="contactos.php">Contactos</a></li>

<li class="pull-right"><a href="<?php if(isset($_SESSION['session'])){echo $ruta.'../controlador/salir.php';} else {
echo $ruta.'inicio_sesion.php';}?>"><span class="glyphicon glyphicon-log-out"></span> <?php
if(isset($_SESSION["session"])){ echo "Salir";} else{echo "Ingresar";}?></a></li>


<li class="pull-right"><a href="<?php if(isset($_SESSION['session'])){echo $ruta.'../controlador/salir.php';} else {
echo $ruta.'registro2.php';}?>"><span class="glyphicon glyphicon-user"></span> <?php
if(isset($_SESSION["session"])){ echo $_SESSION["session"];} else{echo "Registro";}?></a></li>


</ul>
		</nav>
	</header>
    