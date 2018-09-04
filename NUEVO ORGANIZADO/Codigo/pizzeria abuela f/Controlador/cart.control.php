<?php
class Carrito{
	private $Cantidad;
	private $ID_PROD;

	public function __GET($k){ return $this->$k;}
	public function __SET($k, $v){ return $this->$k = $v; }
}

if (isset($_POST["Anadir"])){

    include "../Modelo/cart.model.php";
    $cart = new Carrito;
    $cartmodel = new CarritoModel;

	$cart->__SET('Cantidad',        $_POST['Cantidad']);
    $cart->__SET('ID_PROD',         $_POST['ID']);
    $cartmodel->Agregar($cart);
    print "<script>window.location='javascript:window.history.back();';</script>";
                    
}

if (isset($_GET["id"])){

    include "../Modelo/cart.model.php";
    $cartmodel = new CarritoModel;
    $cartmodel->Eliminar($_GET['id']);
    print "<script>window.location='../Vista/cart.php';</script>";
}

?>