<?php
include("../modelo/clases.php"); //Trae el archivo clases.php en cual se creara más adelante


if(isset($_POST["registrar"])) { // Verifica si el botón oprimido es el de registro


$doc=$_REQUEST['doc'];
$tdoc=$_REQUEST['tdoc'];
$nom1=$_REQUEST['nom1'];
$nom2=$_REQUEST['nom2'];
$ape1=$_REQUEST['ape1'];
$ape2=$_REQUEST['ape2'];
$usu=$_REQUEST['usu']; // Captura de valor de campos de formulario
$pass=$_REQUEST['pass'];
$pass = password_hash($pass,PASSWORD_DEFAULT); //Encriptación de la contraseña digitada
$tel=$_REQUEST['tel'];
$cel=$_REQUEST['cel'];
$direc=$_REQUEST['direc'];
$correo=$_REQUEST['correo'];

$objeto= new clases; // Creación de un objeto de la clase clases del archivo clases.php
$res=$objeto->verifica($usu); //Llamada mediante el objeto creado del método “verifica” con el parámetro usuario
//el resultado del método se asigna a la variable $res
echo ("Hasta aqui");

if($res->num_rows == 1) //Verifica cuantos registro hay en el valor retornado $res (num_rows)
{
header("location:../vista/registro2.php?dato1=no"); //si es = a 1, el usuario ya existe
}
else
{
$res=$objeto->registro($doc,$nom1,$nom2,$ape1,$ape2,$usu,$pass,$tel,$cel,$direc,$correo,$tdoc); //Si no es = 1 , llama al método “resgistro” con 4 parámetros
header("location:../vista/registro2.php?dato=no"); //Redirige a página registro sin errores
}
$objeto->CloseDB(); // Cierra conexión a base de datos
}
if(isset($_POST["enviar"]))
{
$loginNombre = $_REQUEST["usu"];
$loginPassword=$_REQUEST['pass'];
$objeto= new clases;
$res=$objeto->logueo($loginNombre); //Ejecuta método y devuelve consulta para saber si el usuario esta
if($res->num_rows == 0)
{
header("location:../vista/inicio_sesion.php?error=si"); //Redirige al index pasando la variable error
}
//En otro caso En $reg se guarda el resultado de la consulta. Al segundo posición de SESION se le asigna el id
//del usuario
else //Redirige a página logueada
{
$actor = $res->fetch_array(); // Obtiene una fila de resultados como un array asociativo, numérico, o ambos
if (password_verify($loginPassword,$actor["Pass_login"]))
{
session_start();
$_SESSION["session"]= $actor["Primer_Nombre_per"]." ".$actor["Primer_Apellido_per"];
$_SESSION["validar"]="true";
if($actor["rol_Rol"]="CLIENTE")
{
header("location:../VISTA/index.php"); //Redirige a página de usuario
}
else
{
header("location:../pagina_administrador.php"); //Redirige a página de administrador
}
}
else // Si el password no es correcto
{
header("location:../vista/inicio_sesion.php?error=si");
}
}
$objeto->CloseDB();
}
?>