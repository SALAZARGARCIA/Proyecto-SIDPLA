<?php
if(!isset($_SESSION["session"])) // Verifica si la variable de sesión creada esta activa si no la inicializa
{
session_start();
$ruta="";
}
include("../../modelo/conection.php");
error_reporting(0);
$sessionidp= $_SESSION["idp"];
$sessiontdp= $_SESSION["tdp"];
$rol_pers= $_SESSION["rolp"];
$res = $con->query("select * from persona where Num_Documento_per='$sessionidp' and tipo_doc='$sessiontdp' and rol_Rol= 'ADMINISTRADOR'");
if($res->num_rows == 1){
?>
<html lang="es">
<head>
<?php
		include("../llamadoestilos2.php");
		?>

</head> 
<body>
<center>
	<header>
	<?php
		include("menugerente.php");
		?>
	</header>
	
	<table class="reg1" >
<tr>
<td>
<center>
    <br>
	<br>
<center>
<table class="pro">
<tr>

								<td class="pro">
								<a href="Opiniones.php" > <img src="../img/LogoIngresos.jpg" ><br><h1>...</h1></a>
						
								</td>
								<td class="pro">
									<a href="Opiniones.php"> <img src="../img/LogoProductos.jpg"  ><br><h1>...</h1></a>
								
								<td class="pro">
								<a href="Opiniones.php"> <img src="../img/LogoPersona.jpg" ><br><h1>...</h1></a>
								</td>	

							
								
							
		
								
							
			
			
		
				
				
				

</td>

</tr>
</table>
</center>

</tr>
</table>
<?php

}else{
	echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
}

?>
		<br>
		<br	>
	<footer>
	 pie de pagina
	</footer>

</body>
</html>