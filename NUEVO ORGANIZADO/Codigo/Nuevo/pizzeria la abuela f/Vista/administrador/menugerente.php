	
	
	
	
	
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
	<link rel="stylesheet" href="../css/header.css" />
</head> 

<body>
<div id="contenedor">

<div id="header">
<img class="sobre" src="../rojo.png" width="740px" height="36px"/><img src="../principal.png" vspace="16" width="1000px" height="180px"/>
<div id="navegadorg">
<ul class="navegadorg1">

				<li><a href="productos.php">Listas</a>
				<ul>
				<li><a href="productos.php">Productos</a></li>
				<li><a href="Personas.php">Personas</a></li>
				</ul>
				</li>
				<li><a href="Pizzeria.php">Pizzeria</a></li>
				<li><a href="Tamanio.php">Tamaño</a></li>
                <li><a href="Opiniones.php">Opiniones</a></li>
			
				
				
				<li><a href="administrador.php">mas</a>	
				<ul>
				<li><a  href="Nuevo registro.php?action=ver&m=1">Nuevo producto</a></li>
				<li><a href="Tipo productos.php">Tipo productos</a></li>
				<li><a href="Verdomicilios.php">Ver domicilios</a>
				<ul>
				<li><a href="Verdomicilios.php">Domicilios realizados</a></li>
				
				<li><a href="Verdomicilios.php">Domicilios no reali</a></li>
				</ul>
				</li>
				</ul>	

				</li>
</ul>
</div>
<div id="headerie">

				<li class="pull-right"><a href="<?php if(isset($_SESSION['session'])){echo $ruta.'../../controlador/salir.php';} else {
				echo $ruta.'inicio_sesion.php';}?>">
				<?php
				if(isset($_SESSION["session"])){ echo "Salir";} else{echo "Ingresar";}?></a></li>
				
				<li class="pull-right"><a href="<?php if(isset($_SESSION['session'])){echo $ruta.'../controlador/salir.php';} else {
				echo $ruta.'registro2.php';}?>"><span class="glyphicon glyphicon-user"></span> <?php
				if(isset($_SESSION["session"])){ echo $_SESSION["session"];} else{echo "Registro";}?></a></li>
</div>
				</div>
				
				
</div>
</body>
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
