<?php
if(!isset($_SESSION["session"])) // Verifica si la variable de sesión creada esta activa si no la inicializa
{
session_start();
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

		<li><a href="">Bienvenido Empleado</a></li>
				
</div>
<div id="headerie">

				<li class="pull-right"><a href="<?php if(isset($_SESSION['session'])){echo $ruta.'../../controlador/salir.php';} else {
				echo $ruta.'inicio_sesion.php';}?>">
				<?php
				if(isset($_SESSION["session"])){ echo "Salir";} else{echo "Ingresar";}?></a></li>
				
				<li class="pull-right"><a href="<?php if(isset($_SESSION['session'])){echo 'empleado.php';} else {
				echo $ruta.'registro2.php';}?>"><span class="glyphicon glyphicon-user"></span> <?php
				if(isset($_SESSION["session"])){ echo $_SESSION["session"];} else{echo "Registro";}?></a></li>
</div>
				</div>
				
				
</div>
</body>
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
