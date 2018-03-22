<html>

<head>
  <?php
		include("llamadoestilos.php");
		?>
</head>

<body> 
<center>
<header>
	<?php
		include("header.php");
		?>
	</header>

<br><br><br>

<table class ="reg">
<tr>
<td>
<br>
 
		<CENTER>

<form  c name="areat" action="../controlador/controler1.php" method="post">

<table class="hola" style="" align="center" width="400">
<P>INICIO DE SESION</P><br><br>



<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"> <h4>Nombre de Usuario</h4></td><td>
<div class="input-group input-group-sm">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" name="usu" class="form-control" placeholder="Nombre de Usuario" >
</div></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Contraseña</h4></td>
<td><div class="input-group input-group-sm">
<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
<input type="password" name="pass" class="form-control" placeholder="Contraseña" >
</div></td></tr>
<tr><td style="padding:4px"></td></tr>
<tr><td align="center"><input type="submit" name="enviar" class="" width="300px"></td></tr>
<tr><td style="padding:4px"></td></tr>
<tr><td style="color:#F00"><?php if(isset($_REQUEST['error'])) { echo "Usuario o contraseña incorrecta";}?></td></tr>
</table>
</form>


</td>
</tr>
</table>


<CENTER>
</SECTION>





<!--<div class="alert alert-success">
<div class="row">
<div class="col-sm-12 col-md-12">
<form name="areat" action="">
<table class="table">
<tr><td colspan="2" style="color:#000000">Ejercicio Area triangulo: Digite los datos y al oprimir el boton, se
realicen los calculos</td></tr>
<tr><td align="right">Base</td><td><input name="base" type="text"></td></tr>
<tr><td align="right">Altura</td><td><input name="altura" type="text"></td></tr>
<tr><td colspan="2" align="center"><input value="CALCULAR" type="submit" width="500"
style="color:#000000"></td></tr>
<tr><td align="right">Resultado Area</td><td><input name="area" type="text"
disabled="disabled"></td></tr>
</table>
</form>
</div>
 </div>
 </div>-->
 </div>


</div>
</center>
</body>
</html>