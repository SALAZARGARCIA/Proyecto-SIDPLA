<?php

class Rol {

    private $Rol;
    private $estado_rol;
    private $Rol2;
 

    public function __GET($k) {
        return $this->$k;
    }

    public function __SET($k, $v) {
        return $this->$k = $v;
    }

}

if (isset($_POST["Agregar_rol"])){

    require_once '../Modelo/rol.model.php';
    $rol = new Rol();
    $model = new RolModel();

    $rol->__SET('Rol',            $_POST['Rol']);
    $rol->__SET('estado_rol',  1);


    $model->Registrar_rol($rol);
  
    print "<script>alert(\"Rol agregado exitosamente\");window.location='../Vista/Administrador/roles.php';</script>";
      
    
}

if (isset($_POST["Deshabiliar_rol"])){
    
    require_once '../Modelo/rol.model.php';
    $model = new RolModel();
    $Cod_rol = $_POST['Rol'];

    $model->Deshabilitar_rol($Cod_rol);
}

if (isset($_POST["Habiliar_rol"])){
    
    require_once '../Modelo/rol.model.php';
    $model = new RolModel();
    $Cod_rol = $_POST['Rol'];

    $model->Habilitar_rol($Cod_rol);
}



?>