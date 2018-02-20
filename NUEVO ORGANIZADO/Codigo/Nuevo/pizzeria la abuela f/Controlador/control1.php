<?php
session_start(); //Inicio la sesión
if ($_SESSION["validar"]="true") { //COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
//si no existe, envio a la página de logueo de nuevo
header("Location: ../vista/seguridadbd.php");
//ademas salgo de este script
exit();
}
?>

<?php/*
include ("control.php");
?>