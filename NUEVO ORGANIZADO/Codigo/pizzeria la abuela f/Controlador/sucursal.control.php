<?php

class Sucursal {

    private $Nit_Pizzeria;
    private $Nom_Pizzeria;
    private $Dir_Pizzeria;
    private $Tel_Pizzeria;
    private $Cel_Pizzeria;
    private $Nit_Pizzeria2;
    

    public function __GET($k) {
        return $this->$k;
    }

    public function __SET($k, $v) {
        $this->$k = $v;
    }

}


//Registro
if (isset($_POST["registrar_piz"])){

    require_once '../Modelo/sucursal.model.php';
    $model = new SucursalModel();
    $sucursal = new Sucursal();

        $sucursal->__SET('Nit_Pizzeria',               $_POST['Nit_Pizzeria']);
        $sucursal->__SET('Nom_Pizzeria',               $_POST['Nom_Pizzeria']);
        $sucursal->__SET('Dir_Pizzeria',               $_POST['Dir_Pizzeria']);
        $sucursal->__SET('Tel_Pizzeria',               $_POST['Tel_Pizzeria']);
        $sucursal->__SET('Cel_Pizzeria',               $_POST['Cel_Pizzeria']);

        $model->Registrar_Sucursal($sucursal);
}

//Actualizar Datos
if (isset($_POST["actualizar_piz"])){

    require_once '../Modelo/sucursal.model.php';
    $model = new SucursalModel();
    $sucursal = new Sucursal();

    $sucursal->__SET('Nit_Pizzeria',               $_POST['Nit_Pizzeria']);
    $sucursal->__SET('Nom_Pizzeria',               $_POST['Nom_Pizzeria']);
    $sucursal->__SET('Dir_Pizzeria',               $_POST['Dir_Pizzeria']);
    $sucursal->__SET('Tel_Pizzeria',               $_POST['Tel_Pizzeria']);
    $sucursal->__SET('Cel_Pizzeria',               $_POST['Cel_Pizzeria']);

    $model->Actualizar_Sucursal($sucursal);
}

if (isset($_POST["Eliminar_piz"])){
    
    require_once '../Modelo/sucursal.model.php';
    $model = new SucursalModel();
    $Nit_Pizzeria = $_POST['Nit_Pizzeria'];

    $model->Eliminar_Sucursal($Nit_Pizzeria);
}






?>