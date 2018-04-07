<html>
<head>
  <?php
		include("llamadoestilos.php");
		include("../modelo/database.php");
		$con = database::conectar();
		?>
</head>

<body> 
<center>
<header>
	<?php
		include("header.php");
		if(isset($_SESSION["numdoc"])){
		?>
	</header>

<br><br><br>

<table class ="reg">
<tr>
<td>
<br>
 
<CENTER>

<form name="areat" action="../controlador/controler1.php" method="post">

<table class="hola" style="" align="center" width="400">
<h1>Recuperar contraseña</h1><br><br>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"> <h4>Nueva contraseña</h4></td><td>
<div class="input-group input-group-sm">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="password" name="contra1" class="form-control">
</div></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"> <h4>Vuelve a escribir la contraseña</h4></td><td>
<div class="input-group input-group-sm">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="password" name="contra2" class="form-control">

<tr><td style="padding:2px"></td></tr>
<tr><td align="center"><input type="submit" name="recuperar_contra2" class="" width="300px" value="Actualizar"></td></tr>
<tr><td style="padding:4px"></td></tr>
<tr><td style="color:#F00"><?php if(isset($_REQUEST['error'])) { echo "Las contraseñas no coinciden";}?></td></tr>
</table>
</form>


</td>
</tr>
</table>


<CENTER>
</SECTION>

 </div>


</div>
</center>
<?php
}else{
	print "<script>alert('No se ha intentado restaurar la contraseña de ninguna cuenta');window.location='inicio_sesion.php';</script>";
}
?>
</body>
</html>