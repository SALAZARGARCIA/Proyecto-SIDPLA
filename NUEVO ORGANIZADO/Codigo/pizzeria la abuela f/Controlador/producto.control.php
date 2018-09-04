<?php

class Producto {

    private $Cod_producto;
    private $Cod_producto2;
    private $Nom_prod;
    private $Desc_prod;
    private $Foto_prod;
    private $Stok_min;
    private $Stok_max;
    private $Cantidad_exist;
    private $tipo_producto_tipo_prod;
    private $tamaño_tamaño;
    private $Valor_unitario;
    private $estado_prod;

    public function __GET($k) {
        return $this->$k;
    }

    public function __SET($k, $v) {
        return $this->$k = $v;
    }

}

//Registro
if (isset($_POST["Actualizar_prod"])){

    require_once '../Modelo/producto.model.php';
    $producto = new Producto();
    $model = new ProductoModel();
    
    $var = $_FILES['Foto_prod']['tmp_name'];
    if ($var==""){
        $producto->__SET('Foto_prod', $_POST['Fotico']);
                   
    }else{
                    
        if($_FILES['Foto_prod']['type']=="image/jpeg" or $_FILES['Foto_prod']['type']=="image/png"){
        $Ruta_imagen = "../Vista/MEDIA/";
        $Ruta_imagen = $Ruta_imagen . basename($_FILES['Foto_prod']['name']);
        move_uploaded_file($_FILES['Foto_prod']['tmp_name'], $Ruta_imagen);
        $producto->__SET('Foto_prod', $_FILES['Foto_prod']['name']);}else{
            print "<script>alert(\"Tipo de imagen incorrecto.\");window.location='productos.php';</script>";
        }
                    
    }
    if($_POST['tipo_producto_tipo_prod'] != 'BEBIDA'){

        $producto->__SET('Stok_min', NULL);
        $producto->__SET('Stok_max', NULL);
        $producto->__SET('Cantidad_exist', NULL);

    }else{
        $producto->__SET('Stok_min', $_POST['Stok_min']);
        $producto->__SET('Stok_max', $_POST['Stok_max']);
        $producto->__SET('Cantidad_exist', $_POST['Cantidad_exist']);
    }

    $producto->__SET('Cod_producto', $_POST['Cod_producto']);
    $producto->__SET('Nom_prod', $_POST['Nom_prod']);
    $producto->__SET('Desc_prod', $_POST['Desc_prod']);
    $producto->__SET('Valor_unitario', $_POST['Valor_unitario']);

    $model->Actualizar_Producto($producto);
}

if (isset($_POST["Agregar_prod"])){

    require_once '../Modelo/producto.model.php';
    $producto = new Producto();
    $model = new ProductoModel();

    if($_POST['tipo_producto_tipo_prod'] != 'BEBIDA'){

        $producto->__SET('Stok_min', NULL);
        $producto->__SET('Stok_max', NULL);
        $producto->__SET('Cantidad_exist', NULL);

    }else{

        $producto->__SET('Stok_min',                $_POST['Stok_min']);
        $producto->__SET('Stok_max',                $_POST['Stok_max']);
        $producto->__SET('Cantidad_exist',          $_POST['Cantidad_exist']);

    }

    $producto->__SET('Nom_prod',                $_POST['Nom_prod']);
    $producto->__SET('Desc_prod',               $_POST['Desc_prod']);
    $producto->__SET('Foto_prod',               $_FILES['Foto_prod']['name']);
    $producto->__SET('tipo_producto_tipo_prod', $_POST['tipo_producto_tipo_prod']);
    $producto->__SET('tamaño_tamaño',           $_POST['tamaño_tamaño']);
    $producto->__SET('Valor_unitario',          $_POST['Valor_unitario']);

    if($model->Registrar_Prod($producto)){ 
        if($_FILES['Foto_prod']['type']=="image/jpeg" or $_FILES['Foto_prod']['type']=="image/png"){
            $Ruta_imagen = "../Vista/MEDIA/";
            $Ruta_imagen = $Ruta_imagen . basename($_FILES['Foto_prod']['name']);
            move_uploaded_file($_FILES['Foto_prod']['tmp_name'], $Ruta_imagen);
            $producto->__SET('Foto_prod', $_FILES['Foto_prod']['name']);
            print "<script>alert(\"Producto agregado exitosamente.\");window.location='../Vista/administrador/productos.php';</script>";
        }else{
                print "<script>alert(\"Tipo de imagen incorrecto.\");window.location='productos.php';</script>";
        }
    }
    
}

if (isset($_POST["Deshabiliar_prod"])){
    
    require_once '../Modelo/producto.model.php';
    $model = new ProductoModel();
    $Cod_producto = $_POST['Cod_producto'];

    $model->Deshabilitar_Producto($Cod_producto);
}

if (isset($_POST["Habiliar_prod"])){
    
    require_once '../Modelo/producto.model.php';
    $model = new ProductoModel();
    $Cod_producto = $_POST['Cod_producto'];

    $model->Habilitar_Producto($Cod_producto);
}




?>