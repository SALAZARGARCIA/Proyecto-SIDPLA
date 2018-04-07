<?php
class conexion //clase principal
{
public function __construct() //Método Constructor de la clase
{
$this->con = new mysqli("localhost", "root", "", "sidpla"); // servidor , usuario db, base de datos
if($this->con->connect_errno)
{
die("Fallo al conectar a la BD: (". $this->con->connect_errno.")"); //Muestra error si
}
}
public function CloseDB() // Método que Cierra conexión a DB
{
$this->con->close();
}
}
?>

<?php
     //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="sidpla";


	$mysqli = mysqli_connect($hostname,$username,$password) or die ("<script language='javascript'>alert('Unable to connect to database')</script>");
     mysqli_select_db($mysqli, $dbname);
	
?>