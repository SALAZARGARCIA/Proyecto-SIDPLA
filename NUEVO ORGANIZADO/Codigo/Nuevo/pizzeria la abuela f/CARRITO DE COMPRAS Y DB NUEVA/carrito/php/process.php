<?php 
session_start();
include "conection.php";
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
foreach($_SESSION["cart"] as $c){
$products = $con->query("select * from producto where Cod_producto=$c[product_id]");
$r = $products->fetch_object();
$vs=$c["q"]*$r->Valor_unitario;
$q1 = $con->query("insert into domicilio_has_producto(domicilio_Cod_dom,producto_Cod_producto,Cantidad,Valor_subtotal)
 values($cart_id,$c[product_id],$c[q],$vs)");
}
unset($_SESSION["cart"]);
}
}
print "<script>alert('Venta procesada exitosamente');window.location='../products.php';</script>";
?>