<html>

<head>
<?php
		include("llamadoestilos.php");
		?>
</head> 

<body> 

	<header>
		<?php
		include("header.php");
		?>
	</header>

<br><br><br>

<div id="letras">

	<section id="contenido">
		<section id="hola">
			<article id="slider">
<p align="center">Registro</p>
<center>
<form name="areat" action="../controlador/controler1.php" method="post">

<table class="" style="" align="center" width="400">
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Numero de Documento</h4></td><td>
<input class="form-control input-sm" type="text" name="doc" class="form-control" placeholder="Numero de Documento" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Tipo Documento</h4></td><td>
<input class="form-control input-sm" type="text" name="tdoc" class="form-control" placeholder="Tipo Documento" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Nombre</h4></td><td>
<input class="form-control input-sm" type="text" name="nom1" class="form-control" placeholder="Nombre"required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Nombre 2</h4></td><td>
<input class="form-control input-sm" type="text" name="nom2" class="form-control" placeholder="Nombre 2" required></td></tr>
<tr><td style="padding:4px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Apellido</h4></td><td>
<input class="form-control input-sm" type="text" name="ape1" class="form-control" placeholder="Apellido" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Apellido 2</h4></td><td>
<input class="form-control input-sm" type="text" name="ape2" class="form-control" placeholder="Apellido_2" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Usuario</h4></td><td>
<input class="form-control input-sm" type="text" name="usu" class="form-control" placeholder="Usuario"required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Contraseña</h4></td><td>
<input class="form-control input-sm" type="password" name="pass" class="form-control" placeholder="Contraseña" required></td></tr>
<tr><td style="padding:4px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Telefono</h4></td><td>
<input class="form-control input-sm" type="number" name="tel" class="form-control" placeholder="Telefono" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Celular</h4></td><td>
<input class="form-control input-sm" type="number" name="cel" class="form-control" placeholder="Celular" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Dirección</h4></td></td><td>
<input class="form-control input-sm" type="text" name="direc" class="form-control" placeholder="Dirección"required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Correo</h4></td><td>
<input class="form-control input-sm" type="email" name="correo" class="form-control" placeholder="Correo" required></td></tr>
<tr><td style="padding:4px"></td></tr>

<tr><td colspan="2"><hr></td></tr>
<tr><td align="center" colspan="2"><input type="submit" name="registrar" style="width:400px" value="REGISTRAR"></td></tr>
<tr><td style="padding:4px"></td></tr>
			</article>
			
	

	</section>
</div>
	<tr>
<?PHP 
if(isset($_REQUEST['dato']))
{ 
echo "<td colspan='2' align='center'><div class='alert alert-
success'>"."Gracias Por Registrarse"."</div>";} if(isset($_REQUEST['dato1'])){ echo "<td colspan='2' align='center'><div

class='alert alert-warning'>"."Este Usuario Ya Se Encuentra Registrado, Intenta De Nuevo"."</div>"; }?></td></tr>
</table>
</form>
</div>
</center>

</div>
</body>
</html>