<?php

class tamanio {

    private $tamaño;
    private $estado_tamaño;
    private $tamaño2;
 

    public function __GET($k) {
        return $this->$k;
    }

    public function __SET($k, $v) {
        return $this->$k = $v;
    }

}

//Registro
if (isset($_POST["Actualizar_tam"])){

    require_once '../Modelo/tamaño.model.php';
    $tamaño = new tamanio();
    $model = new tamanioModel();
    
    
        $tamaño->__SET('tamaño', $_POST['tamaño']);
        $tamaño->__SET('tamaño2', $_POST['tamaño2']);

    $model->Actualizar_tamaño($tamaño);
}

if (isset($_POST["Agregar_tam"])){

    require_once '../Modelo/tamaño.model.php';
    $tamaño = new tamanio();
    $model = new tamanioModel();

    $tamaño->__SET('tamaño',                $_POST['tamaño']);
    $tamaño->__SET('estado_tamaño',               1);


    $model->Registrar_tam($tamaño);
  
    print "<script>alert(\"Tamaño agregado exitosamente\");window.location='../Vista/Administrador/Tamanios.php';</script>";
      
    
}

if (isset($_POST["Deshabiliar_tam"])){
    
    require_once '../Modelo/tamano.model.php';
    $model = new tamanioModel();
    $Cod_tamaño = $_POST['tamaño'];

    $model->Deshabilitar_tamaño($Cod_tamaño);
}

if (isset($_POST["Habiliar_tam"])){
    
    require_once '../Modelo/tamano.model.php';
    $model = new tamanioModel();
    $Cod_tamaño = $_POST['tamaño'];

    $model->Habilitar_tamaño($Cod_tamaño);
}



?>