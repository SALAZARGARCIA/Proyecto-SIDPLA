<?php

include_once "conexion.php";

class ProductoModel {

    private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = database::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar_Prod(Producto $data) {

        try {
            $sql = "insert into PRODUCTO (Nom_prod, Desc_prod, Foto_prod, Stok_min, Stok_max, Cantidad_exist, tipo_producto_tipo_prod, tamaño_tamaño, Valor_unitario, estado_prod)values(?,?,?,?,?,?,?,?,?,?)"; 

            $resultado = $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->__GET('Nom_prod'),
                                $data->__GET('Desc_prod'),
                                $data->__GET('Foto_prod'),
                                $data->__GET('Stok_min'),
                                $data->__GET('Stok_max'),
                                $data->__GET('Cantidad_exist'),
                                $data->__GET('tipo_producto_tipo_prod'),
                                $data->__GET('tamaño_tamaño'),
                                $data->__GET('Valor_unitario'),
                                1
                            )
            );
            if($resultado){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

     public function Listar_Prod($tipo) {
        try {
            $result = array();
            if($tipo=='' || $tipo=='todos'){
            $stm = $this->pdo->prepare("select * from PRODUCTO");
            }else{
                $stm = $this->pdo->prepare("select * from PRODUCTO where Nom_prod LIKE '%$tipo%' or Desc_prod LIKE '%$tipo%' or tamaño_tamaño LIKE '%$tipo%' or tipo_producto_tipo_prod LIKE '%$tipo%'");
            }
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
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
                $producto->__SET('estado_prod', $r->estado_prod);

                $result[] = $producto;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }    

    public function Obtener_Producto($Cod_producto) {
        try {
            $stm = $this->pdo->prepare("select * from PRODUCTO where Cod_producto = ?");

            $stm->execute(array($Cod_producto));
            $r = $stm->fetch(PDO::FETCH_OBJ);

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
                $producto->__SET('estado_prod', $r->estado_prod);

            return $producto;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Producto(Producto $data) {
        try {

            $sql = "UPDATE PRODUCTO SET Nom_prod=?,Desc_prod=?,Foto_prod=?,Stok_min=?,Stok_max=?,Cantidad_exist=?, Valor_unitario=? WHERE Cod_producto = ?";
            

            $result = $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->__GET('Nom_prod'),
                                $data->__GET('Desc_prod'),
                                $data->__GET('Foto_prod'),
                                $data->__GET('Stok_min'),
                                $data->__GET('Stok_max'),
                                $data->__GET('Cantidad_exist'),
                                $data->__GET('Valor_unitario'),
                                $data->__GET('Cod_producto')
                            )
            );
            if($result){
                print "<script>alert(\"Producto Actualizado exitosamente.\");window.location='../Vista/administrador/productos.php';</script>";
            }
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Deshabilitar_Producto($Cod_producto) {
        try {
            $stm = $this->pdo->prepare("UPDATE PRODUCTO SET estado_prod = 0 WHERE Cod_producto = ?");
            $result = $stm->execute(array($Cod_producto));
            if($result){
                print "<script>alert(\"Producto Deshabilitado exitosamente.\");window.location='../Vista/administrador/productos.php';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Habilitar_Producto($Cod_producto) {
        try {
            $stm = $this->pdo->prepare("UPDATE PRODUCTO SET estado_prod = 1 WHERE Cod_producto = ?");
            $result = $stm->execute(array($Cod_producto));
            if($result){
                print "<script>alert(\"Producto habilitado exitosamente.\");window.location='../Vista/administrador/productos.php';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener_tipo_prod() {
        try {
            $result = array();
            $stm = $this->pdo->prepare("select * from TIPO_PRODUCTO");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $result[] = $r->tipo_prod;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener_tamaños_prod() {
        try {
            $result = array();
            $stm = $this->pdo->prepare("select * from TAMAÑO");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $result[] = $r->tamaño;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>