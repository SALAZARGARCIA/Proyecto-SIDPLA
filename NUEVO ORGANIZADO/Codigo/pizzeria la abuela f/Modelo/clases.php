<?php
include("conexion.php"); // incluye el archivo conexion.php el cual se conecta a la base de datos
$df=new conexion; // Crea un objeto a partir de la clase conexión para inicializar constructor
class clases extends conexion { // Crea una clase que hereda de la clase conexión
public function verifica($dato) //Método que verifica si el usuario existe
{
$q = "select * from persona where Usuario_login='$dato'";
$consulta = $this->con->query($q) or die ('Error!' . mysql_error());
return $consulta;
}
public function registro($num_doc,$nombre1,$nombre2,$apellido1,$apellido2,$login,$contra,$tel,$cel,$direc,$correo,$tdoc) // Método que recibe 4 parámetros
{
$q ="insert into persona values('$num_doc','$nombre1','$nombre2','$apellido1','$apellido2','$login','$contra','$tel','$cel','$direc','$correo','$tdoc','CLIENTE')";
$consulta = $this->con->query($q) or die ('failed!' . mysql_error());
return $consulta;
}
// Se realiza inserción a la base de datos y retorna el resultado en la variable $consulta

public function logueo($usuario)
{
$q = "select * from persona where Usuario_login='$usuario'";
$consulta = $this->con->query($q) or die ('failed!' . $this->con->error);
return $consulta;
}

public function recuperacontra($usu,$numdoc,$tdoc,$email,$cel) //Método que verifica si el usuario existe
{
$q = "select * from persona where Usuario_login='$usu' and Num_Documento_per='$numdoc' and tipo_doc='$tdoc' and Correo_per='$email' and Cel_per=$cel";

$consulta = $this->con->query($q) or die ('Error!' . mysql_error());
return $consulta;
}


}
?>