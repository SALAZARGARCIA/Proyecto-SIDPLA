<?php
include("conexion.php"); // incluye el archivo conexion.php el cual se conecta a la base de datos
$df=new conexion; // Crea un objeto a partir de la clase conexión para inicializar constructor
class clases extends conexion { // Crea una clase que hereda de la clase conexión
public function verifica($dato) //Método que verifica si el usuario existe
{
$q = "select * from persona where usuario_login='$dato'";
$consulta = $this->con->query($q) or die ('Error!' . mysql_error());
return $consulta;
}
public function registro($Num_Doc,$Tipo_Doc,$Nom,$Nom2,$Ape,$Ape2,$Usu,$pass,$Tel,$Cel,$Dir,$Correo) // Método que recibe 4 parámetros
{
//$q = "insert into persona values ('$Num_Doc','$Tipo_Doc','$Nom','$Nom2','$Ape','$Ape2','$Usu','$pass','$Tel','$Cel','$Dir','$Correo')";

$q = "INSERT INTO `persona`(`Num_Documento_per`, `Primer_Nombre_per`, `Segundo_Nombre_per`, `Primer_Apellido_per`, `Segundo_Apellido_per`, `Usuario_login`, `Pass_login`, `Tel_per`, `Cel_per`, `Direc_per`, `Correo_per`, `tipo_doc`, `rol_Rol`) VALUES ('$Num_Doc',
'$Nom',
'$Nom2',
'$Ape',
'$Ape2',
'$Usu',
'$pass',
'$Tel',
'$Cel',
'$Dir',
'$Correo',
'$Tipo_Doc',
'rol')";


$consulta = $this->con->query($q) or die ('Failed!' . mysql_error());
return $consulta;
}
// Se realiza inserción a la base de datos y retorna el resultado en la variable $consulta

public function logueo($usuario)
{
$q = "select * from persona where usuario_login='$usuario'";
$consulta = $this->con->query($q) or die ('failed!' . $this->con->error);
return $consulta;
}
}
?>