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
            $sql = "insert into PRODUCTO (Nom_prod, Desc_prod, Foto_prod, Stok_min, Stok_max, Cantidad_exist, tipo_producto_tipo_prod, tamaño_tamaño, Valor_unitario)values(?,?,?,?,?,?,?,?,?)"; 

            $this->pdo->prepare($sql)
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
                                $data->__GET('Valor_unitario')
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

     public function Listar_Prod($tipo) {
        try {
            $result = array();
            if($tipo=='todos'){
            $stm = $this->pdo->prepare("select * from PRODUCTO");
            }else{
                $stm = $this->pdo->prepare("select * from PRODUCTO where tipo_producto_tipo_prod='$tipo'");
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

            return $producto;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Producto(Producto $data) {
        try {

            $sql = "UPDATE PRODUCTO SET Nom_prod=?,Desc_prod=?,Foto_prod=?,Stok_min=?,Stok_max=?,Cantidad_exist=?,tipo_producto_tipo_prod=?, tamaño_tamaño=?, Valor_unitario=? WHERE Cod_producto = ?";
            

            $this->pdo->prepare($sql)
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
                                $data->__GET('Cod_producto')
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar_Producto($Cod_producto) {
        try {
            $stm = $this->pdo->prepare("delete from PRODUCTO where Cod_producto=?");

            $stm->execute(array($Cod_producto));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>