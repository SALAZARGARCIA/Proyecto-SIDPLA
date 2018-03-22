<?php
include("../modelo/clases.php"); //Trae el archivo clases.php en cual se creara más adelante

if(isset($_POST["registrarVenta"])){
session_start();
include "../MODELO/conection.php";
if(!empty($_POST)){
$vt=0;
foreach($_SESSION["cart"] as $c){
$products = $con->query("select * from producto where Cod_producto=$c[product_id]");
$r = $products->fetch_object();
$vs=$c["q"]*$r->Valor_unitario;
$vt+=$vs;
}

$q1 = $con->query("insert into domicilio(Fecha_Hora,Direc_Dom,Valor_Total,Observacion_dom,estado_domicilio_Estado_dom,pizzeria_Nit_Pizzeria)
 values(NOW(),\"$_POST[Direc]\",$vt,\"$_POST[Obser]\",'EN ESPERA',801145012)");

if($q1){
$cart_id = $con->insert_id;

/*$q2 = $con->query("insert into persona_has_domicilio(persona_Num_Documento_per, persona_tipo_doc, domicilio_Cod_dom)
	values ($ndcp,$tdp,$cart_id)");*/

foreach($_SESSION["cart"] as $c){
$products = $con->query("select * from producto where Cod_producto=$c[product_id]");
$r = $products->fetch_object();
$vs=$c["q"]*$r->Valor_unitario;
$q3 = $con->query("insert into domicilio_has_producto(domicilio_Cod_dom,producto_Cod_producto,Cantidad,Valor_subtotal)
 values($cart_id,$c[product_id],$c[q],$vs)");
}


unset($_SESSION["cart"]);
}
}
print "<script>alert('Venta procesada exitosamente');window.location='../Vista/productos.php';</script>";
}


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
}//FIN Registro


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
$_SESSION["idp"]= $actor["Num_Documento_per"];
if($actor["rol_Rol"]=="CLIENTE")
{
header("location:../VISTA/index.php"); //Redirige a página de usuario
}
else if($actor["rol_Rol"]=="ADMINISTRADOR")
{
header("location:../Vista/administrador/administrador.php"); //Redirige a página de administrador
}
else if($actor["rol_Rol"]=="EMPLEADO")
{
echo "En construccion";
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