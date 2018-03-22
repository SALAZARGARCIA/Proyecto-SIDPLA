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

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet"href="fonts/style.css">
</head> 

<body>
<div id="contenedor">

<div id="header">
<img class="sobre" src="rojo.png" width="740px" height="36px"/><img src="principal.png" vspace="16" width="1000px" height="180px"/>
<div id="navegador">


				<li><span class="icon-home"><a href="index.php">Inicio</a></li>
				<li><a href="acerca.php">Acerca</a></li>
				<li><a href="productos.php">Productos</a></li>
				<li><a href="contactos.php">Contactos</a></li>
				<li><a href="contactos.php"><span class="icon-shopping-basket"></a></li>
</div>
<div id="headerie">

				<li class="pull-right"><a href="<?php if(isset($_SESSION['session'])){echo $ruta.'../controlador/salir.php';} else {
				echo $ruta.'inicio_sesion.php';}?>"></span> <?php
				if(isset($_SESSION["session"])){ echo "Salir";} else{echo "Ingresar";}?></a></li>
				
				<li class="pull-right"><a href="<?php if(isset($_SESSION['session'])){echo $ruta.'../controlador/salir.php';} else {
				echo $ruta.'registro2.php';}?>"><span class="glyphicon glyphicon-user"></span> <?php
				if(isset($_SESSION["session"])){ echo $_SESSION["session"];} else{echo "Registro";}?></a></li>
</div>
				</div>
				
				
</div>
</body>
</html>
