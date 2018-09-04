<?php

include_once "conexion.php";

class SucursalModel {

    protected $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = database::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar_Sucursal(Sucursal $data) {

        try {  
            $sql = "insert into PIZZERIA values(?, ?, ?, ?, ?)";
            $resultado = $this->pdo->prepare($sql)
                    ->execute(
                        array(
                            $data->__GET('Nit_Pizzeria'),
                            $data->__GET('Nom_Pizzeria'),
                            $data->__GET('Dir_Pizzeria'),
                            $data->__GET('Tel_Pizzeria'),
                            $data->__GET('Cel_Pizzeria')
                        ));

            if($resultado){
                print "<script>alert(\"Datos insertados exitosamente.\");window.location='javascript:window.history.back();';</script>";
            }else{
                print "<script>alert(\"Error al insertar.\");window.location='javascript:window.history.back();';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Sucursal() {
        try {

            $result = array();
            $stm = $this->pdo->prepare("select * from PIZZERIA");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $sucursal = new Sucursal();

                $sucursal->__SET('Nit_Pizzeria', $r->Nit_Pizzeria);
                $sucursal->__SET('Nom_Pizzeria', $r->Nom_Pizzeria);
                $sucursal->__SET('Dir_Pizzeria', $r->Dir_Pizzeria);
                $sucursal->__SET('Tel_Pizzeria', $r->Tel_Pizzeria);
                $sucursal->__SET('Cel_Pizzeria', $r->Cel_Pizzeria);

                $result[] = $sucursal;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener_Sucursal($Nit_Pizzeria) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM PIZZERIA WHERE Nit_Pizzeria=?");

            $stm->execute(array($Nit_Pizzeria));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $sucursal = new Sucursal();

            $sucursal->__SET('Nit_Pizzeria', $r->Nit_Pizzeria);
            $sucursal->__SET('Nom_Pizzeria', $r->Nom_Pizzeria);
            $sucursal->__SET('Dir_Pizzeria', $r->Dir_Pizzeria);
            $sucursal->__SET('Tel_Pizzeria', $r->Tel_Pizzeria);
            $sucursal->__SET('Cel_Pizzeria', $r->Cel_Pizzeria);

            return $sucursal;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Sucursal(Sucursal $data) {
        try {
            $sql = "UPDATE PIZZERIA SET Nom_Pizzeria = ?, Dir_Pizzeria = ?, Tel_Pizzeria = ?, Cel_Pizzeria = ? WHERE Nit_Pizzeria = ?";
            
            $resultado = $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->__GET('Nom_Pizzeria'),
                                $data->__GET('Dir_Pizzeria'),
                                $data->__GET('Tel_Pizzeria'),
                                $data->__GET('Cel_Pizzeria'),
                                $data->__GET('Nit_Pizzeria'),
                            ));

            if($resultado){
                print "<script>alert(\"Datos actualizados exitosamente.\");window.location='javascript:window.history.back();';</script>";
            }else{
                print "<script>alert(\"Error al actualizar.\");window.location='javascript:window.history.back();';</script>";
            }

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar_Sucursal($Nit_Pizzeria) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM PIZZERIA WHERE Nit_Pizzeria=?");

            $resultado = $stm->execute(array($Nit_Pizzeria));

            if($resultado){
                print "<script>alert(\"Eliminado exitosamente.\");window.location='javascript:window.history.back();';</script>";
            }else{
                print "<script>alert(\"Error al eliminar.\");window.location='javascript:window.history.back();';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>