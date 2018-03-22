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
    
	<center>
<table>
<tr>
<td>
<center>
							<section id="principal">
			<article id="slider">
				<div class="flexslider">
				<CENTER>
					<ul class="slides">
						<li>
								<img src="../img/3.jpg" width="100%" height="100%" >
					</ul>
					</CENTER>
				</div>
				
			</article>
			
		</section>
				
				
				
</center>
</td>
</tr>
</table>
</center>		
	<footer>
	 pie de pagina
	</footer>
<?php

}else{
	echo "!!!!!ATENCION!!!!!  Para ver esta pagina debe iniciar sesion como ADMINISTRADOR";
}

?>
</body>
</html>