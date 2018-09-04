
<?php
     //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="sidpla";


	$mysqli = mysqli_connect($hostname,$username,$password) or die ("<script language='javascript'>alert('Unable to connect to database')</script>");
     mysqli_select_db($mysqli, $dbname);
	
?>