<html>

<head>
<?php
		include("llamadoestilos.php");
		?>
</head> 

<body> 

	<header>
		<?php
		include("menuprincipal.php");
		?>
	</header>

<br><br><br>

<!--<div id="ofertas">
</div>-->
<p align="center">Registro</p>
<center>
<form name="areat" action="../controlador/controler1.php" method="post">
<table class="" style="" align="center" width="400">
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Numero de Documento</h4></td><td>
<input class="form-control input-sm" type="text" name="Num_Doc" class="form-control" placeholder="Numero de Documento" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Tipo Documento</h4></td><td>
<input class="form-control input-sm" type="text" name="Tipo_Doc" class="form-control" placeholder="Tipo Documento" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Nombre</h4></td><td>
<input class="form-control input-sm" type="text" name="Nom" class="form-control" placeholder="Nombre"required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Nombre 2</h4></td><td>
<input class="form-control input-sm" type="text" name="Nom2" class="form-control" placeholder="Nombre 2" required></td></tr>
<tr><td style="padding:4px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Apellido</h4></td><td>
<input class="form-control input-sm" type="text" name="Ape" class="form-control" placeholder="Apellido" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Apellido 2</h4></td><td>
<input class="form-control input-sm" type="text" name="Ape2" class="form-control" placeholder="Apellido_2" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Usuario</h4></td><td>
<input class="form-control input-sm" type="text" name="Usu" class="form-control" placeholder="Usuario"required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Contraseña</h4></td><td>
<input class="form-control input-sm" type="password" name="pass" class="form-control" placeholder="Contraseña" required></td></tr>
<tr><td style="padding:4px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Telefono</h4></td><td>
<input class="form-control input-sm" type="number" name="Tel" class="form-control" placeholder="Telefono" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Celular</h4></td><td>
<input class="form-control input-sm" type="number" name="Cel" class="form-control" placeholder="Celular" required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Dirección</h4></td></td><td>
<input class="form-control input-sm" type="text" name="Dir" class="form-control" placeholder="Dirección"required></td></tr>
<tr><td style="padding:2px"></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Correo</h4></td><td>
<input class="form-control input-sm" type="email" name="Correo" class="form-control" placeholder="Correo" required></td></tr>
<tr><td style="padding:4px"></td></tr>

<tr><td colspan="2"><hr></td></tr>
<tr><td align="center" colspan="2"><input type="submit" name="registrar" style="width:400px" value="REGISTRAR"></td></tr>
<tr><td style="padding:4px"></td></tr>

<tr>
<?PHP 
if(isset($_REQUEST['dato']))
{ 
echo "<td colspan='2' align='center'><div class='alert alert-
success'>"."REGISTRO CORRECTO"."</div>";} if(isset($_REQUEST['dato1'])){ echo "<td colspan='2' align='center'><div

class='alert alert-warning'>"."USUARIO YA SE ENCUENTRA EN EL SISTEMA"."</div>"; }?></td></tr>
</table>
</form>
</center>

</div>
</body>
</html>