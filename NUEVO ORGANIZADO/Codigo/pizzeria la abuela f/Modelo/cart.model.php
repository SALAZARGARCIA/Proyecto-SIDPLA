<?php
include 'conexion.php';
include '../Controlador/producto.control.php';
class CarritoModel{
	private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = database::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }//Fin Constructor

	public function Agregar(Carrito $cart){

		try {
			// Verificamos si la sesion cart esta vacia para agregar el primer producto
			session_start();
			if(empty($_SESSION["cart"])){

  				$_SESSION["cart"] = array(array(
                    "product_id" => $cart->__GET('ID_PROD'), 
                    "cant" => $cart->__GET('Cantidad')
                ));
                print "<script>alert(\"Producto agregado exitosamente.\");</script>";

			}else{
				$car = $_SESSION["cart"];
	            $repetido = false;
	            // recorremos el carrito en busqueda de producto repetido
	            foreach ($car as $c) {
	                // si el producto esta repetido rompemos el ciclo
	                if ($c["product_id"] == $cart->__GET('ID_PROD')) {
	                    $repetido = true;
	                    break;
	                }
				}
			// si el producto es repetido no hacemos nada, simplemente redirigimos
            if ($repetido) {
                print "<script>alert('!ESTE PRODUCTO YA SE ENCUENTRA EN EL CARRITO¡');</script>";
            } else {
                // si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
                
                array_push($car, array(
                    "product_id" => $cart->__GET('ID_PROD'), 
                    "cant" => $cart->__GET('Cantidad')
                ));
                
                $_SESSION["cart"] = $car;
                print "<script>alert(\"Producto agregado exitosamente.\");</script>";
            }
			}
		
		}catch (Exception $e){
			die($e->getMessage());
		}
	}//Fin funcion Añadir

	public function Listar_Carrito($cod){
        try{
            $result =array();
             
                $sql = $this->pdo->prepare("select * from PRODUCTO where Cod_producto=$cod");
                $sql->execute();
                foreach($sql->fetchAll(PDO::FETCH_OBJ) as $r){
                    $producto = new Producto();

                    $producto->__SET('Cod_producto', $r->Cod_producto);
                    $producto->__SET('Nom_prod', $r->Nom_prod);
                    $producto->__SET('Desc_prod', $r->Desc_prod);
                    $producto->__SET('Foto_prod', $r->Foto_prod);
                    $producto->__SET('Stok_min', $r->Stok_min);
                    $producto->__SET('Stok_max', $r->Stok_max);
                    $producto->__SET('Cantidad_exist', $r->Cantidad_exist);
                    $producto->__SET('tipo_producto_tipo_prod', $r->tipo_producto_tipo_prod);
                    $producto->__SET('tamaño_tamaño', $r->tamaño_tamaño);
                    $producto->__SET('Valor_unitario', $r->Valor_unitario);

                    $result[]   = $producto;
            }
            
            
            return $result;
        } catch(Exception $e){
            die($e->getMessage());
        
        }
    }//Fin funcion Listar_Carrito

    public function Eliminar($id){

        session_start();
        if (!empty($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
            // Si solamente existe un producto en el carro, simplemente se destruye la sesion carrito
            if (count($cart) == 1) {
                unset($_SESSION["cart"]);
            } else {
                $newcart = array();
                foreach ($cart as $c) {
                    if ($c["product_id"] != $_GET["id"]) {
                        $newcart[] = $c;
                    }
                }
                $_SESSION["cart"] = $newcart;
            }
        }
    }//Fin funcion Eliminar

    public function Validar_Precio($Total){
        try {
            if($Total >= '20000' ){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}//Fin Clase CarritoModel

?>