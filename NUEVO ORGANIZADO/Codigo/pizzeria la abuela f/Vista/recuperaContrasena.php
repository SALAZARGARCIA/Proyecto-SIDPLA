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
		?>
	</header>

<br><br><br>

<table class ="reg">
<tr>
<td>
<br>
 
<CENTER>

<form name="areat" action="../Controlador/controler1.php" method="post">

<table class="hola" style="" align="center" width="400">
<h1>Recuperar contraseña</h1><br><br>

<h4>Para confirmar que seas tu, introduce los siguientes datos. Si tienes problemas comunicate con nosotros al 7451220</h4><br><br>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"> <h4>Nombre de Usuario</h4></td><td>
<div class="input-group input-group-sm">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" name="usu" class="form-control">
</div></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"> <h4>Numero de Documento</h4></td><td>
<div class="input-group input-group-sm">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="number" name="numdoc" class="form-control">

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"> <h4>Tipo de Documento</h4></td><td>
<div class="input-group input-group-sm">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<select class="form-control" name="tdoc">
		<?php
			foreach ($con->query('SELECT * from tipo_doc where estado_tipo_doc=1') as $row)
			{
				echo '<option value="' . $row['tipo_doc'] . '">' . $row['tipo_doc'] . '</option>';;
			}
		?>
		</select>
</div></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"> <h4>Correo</h4></td><td>
<div class="input-group input-group-sm">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="email" name="correo" class="form-control" placeholder="Ej: usuario@usuario.com" >
</div></td></tr>

<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"> <h4>Celular</h4></td><td>
<div class="input-group input-group-sm">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="number" name="celular" class="form-control" placeholder="Unicamente celular" >
</div></td></tr>

<tr><td style="padding:2px"></td></tr>
<tr><td align="center"><input type="submit" name="recuperar_contra" class="" width="300px" value="Recuperar"></td></tr>
<tr><td style="padding:4px"></td></tr>
<tr><td style="color:#F00"><?php if(isset($_REQUEST['error'])) { echo "Los datos ingresados no coinciden con nuestra base de datos, verifique los datos e intente nuevamente";}?></td></tr>
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


</body>
</html>