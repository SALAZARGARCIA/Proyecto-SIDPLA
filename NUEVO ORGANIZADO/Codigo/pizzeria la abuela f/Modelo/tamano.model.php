<?php

include_once "conexion.php";

class tamanioModel {

    private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = database::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar_tam(tamanio $data) {

        try {
            $sql = "INSERT into tamaño (tamaño, estado_tamaño)values(?,?)"; 

            $resultado = $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->__GET('tamaño'),
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

     public function Listar_tam() {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * from TAMAÑO");
            
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tamaño = new tamanio();

                $tamaño->__SET('tamaño', $r->tamaño);
                $tamaño->__SET('estado_tamaño', $r->estado_tamaño);

                $result[] = $tamaño;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }    

    public function Obtener_tamaños($Cod_tamaño) {
        try {
            $stm = $this->pdo->prepare("SELECT * from tamaño where tamaño = ?");

            $stm->execute(array($Cod_tamaño));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tamaño = new tamanio();

                $tamaño->__SET('tamaño', $r->tamaño);
                $tamaño->__SET('estado_tamaño', $r->estado_tamaño);

            return $tamaño;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_tamaño(tamanio $data) {
        try {

            $sql = "UPDATE tamaño SET tamaño=? WHERE tamaño = ?";
            

            $result = $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->__GET('tamaño'),
                                $data->__GET('tamaño2')
                            )
            );
            if($result){
                print "<script>alert(\"Tamaño Actualizado exitosamente.\");window.location='../Vista/administrador/tamanios.php';</script>";
            }
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Deshabilitar_tamaño($Cod_tamaño) {
        try {
            $stm = $this->pdo->prepare("UPDATE tamaño SET estado_tamaño = 0 WHERE tamaño = ?");
            $result = $stm->execute(array($Cod_tamaño));
            if($result){
                print "<script>alert(\"Tamaño deshabilitado exitosamente.\");window.location='../Vista/administrador/tamanios.php';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Habilitar_tamaño($Cod_tamaño) {
        try {
            $stm = $this->pdo->prepare("UPDATE tamaño SET estado_tamaño = 1 WHERE tamaño = ?");
            $result = $stm->execute(array($Cod_tamaño));
            if($result){
                print "<script>alert(\"Tamaño habilitado exitosamente.\");window.location='../Vista/administrador/tamanios.php';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>