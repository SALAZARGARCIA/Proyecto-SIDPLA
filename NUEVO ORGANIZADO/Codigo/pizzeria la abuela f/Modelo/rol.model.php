<?php

include_once "conexion.php";

class RolModel {

    private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = database::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar_rol(Rol $data) {

        try {
            $sql = "INSERT into Rol values(?,?)"; 

            $resultado = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->__GET('Rol'),
                        1
                    )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

     public function Listar_rol() {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * from ROL where Rol != 'ADMINISTRADOR'");
            
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $rol = new Rol();

                $rol->__SET('Rol', $r->Rol);
                $rol->__SET('estado_rol', $r->estado_rol);

                $result[] = $rol;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }    

    public function Deshabilitar_rol($Cod_rol) {
        try {
            $stm = $this->pdo->prepare("UPDATE ROL SET estado_rol = 0 WHERE Rol = ?");
            $result = $stm->execute(array($Cod_rol));
            if($result){
                print "<script>alert(\"Rol deshabilitado exitosamente.\");window.location='../Vista/administrador/roles.php';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Habilitar_rol($Cod_rol) {
        try {
            $stm = $this->pdo->prepare("UPDATE ROL SET estado_rol = 1 WHERE Rol = ?");
            $result = $stm->execute(array($Cod_rol));
            if($result){
                print "<script>alert(\"Rol habilitado exitosamente.\");window.location='../Vista/administrador/roles.php';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>