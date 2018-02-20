<?php
session_start();
if (!empty($_SESSION["session"]))
{
session_destroy();
header("Location:../vista/seguridadbd.php");
}
?>