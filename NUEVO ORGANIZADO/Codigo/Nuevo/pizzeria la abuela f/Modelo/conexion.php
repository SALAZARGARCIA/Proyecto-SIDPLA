<?php
class conexion //clase principal
{
protected  $con;
public function __construct() //Método Constructor de la clase
{
$this->con = new mysqli("localhost", "root", "", "sidpla2"); // servidor , usuario db, base de datos
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