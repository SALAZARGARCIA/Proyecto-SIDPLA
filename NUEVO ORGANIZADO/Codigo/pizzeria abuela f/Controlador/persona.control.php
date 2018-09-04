<?php

class Persona {

    private $Num_Documento_per;
    private $Nombres;
    private $Apellidos;
    private $Pass_login;
    private $Tel_per;
    private $Cel_per;
    private $Direc_per;
    private $Correo_per;
    private $tipo_doc;
    private $rol_Rol;
    private $Num_Documento_per2;

    public function __GET($k) {
        return $this->$k;
    }

    public function __SET($k, $v) {
        $this->$k = $v;
    }

}

require_once '../Modelo/persona.model.php';

//Registro
if (isset($_POST["registrar_per"])){

        $model = new PersonaModel();
        $persona = new Persona();

        $contrasena = password_hash($_POST['Pass_login'], PASSWORD_DEFAULT);
        $persona->__SET('Num_Documento_per',                $_POST['Num_Documento_per']);
        $persona->__SET('Nombres',                          $_POST['Nombres']);
        $persona->__SET('Apellidos',                        $_POST['Apellidos']);
        $persona->__SET('Pass_login',                       $contrasena);
        $persona->__SET('Tel_per',                          $_POST['Tel_per']);
        $persona->__SET('Cel_per',                          $_POST['Cel_per']);
        $persona->__SET('Direc_per',                        $_POST['Direc_per']);
        $persona->__SET('Correo_per',                       $_POST['Correo_per']);
        $persona->__SET('tipo_doc',                         $_POST['tipo_doc']);
        $persona->__SET('rol_Rol',                          "CLIENTE");

        $model->Registrar_Persona($persona);
}

//Login
if (isset($_REQUEST["login"])){

    $model = new PersonaModel();

    $correo = $_POST['email'];
    $pass = $_POST['pass'];
    $model->login($correo,$pass);
}

//Finalizar Compra
if (isset($_REQUEST["finalizar_compra"])){

    $model = new PersonaModel();
    $Direc_Dom = $_POST['Direc'];
    $Observacion = $_POST['Observaciones'];
    $model->Finalizar_Compra($Direc_Dom,$Observacion);

}

//Cometario
if (isset($_POST["Comentar"])){
    session_start();
    if(!isset($_SESSION['session'])){
        print "<script>alert('Por favor inicia sesión para dejar un comentario');window.location='../Vista/login.php';</script>";
    }else{
    $model = new PersonaModel();
    $Comentario = $_POST['mensaje'];
    $Documento = $_SESSION['session']['Documento'];
    $Tipo_doc = $_SESSION['session']['Tipo_Doc'];
    $model->Comentar($Comentario,$Documento,$Tipo_doc);
    }
}

//Actualizar Datos
if (isset($_POST["actualizar_per"])){

    session_start();
    $model = new PersonaModel();
    $Persona = new Persona();

    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Correo = $_POST['Correo_per'];
    $Telefono = $_POST['Tel_per'];
    $Celular = $_POST['Cel_per'];
    $Direccion = $_POST['Direc_per'];
    $Documento = $_SESSION['session']['Documento'];

    $model->Actualizar_Datos($Nombres,$Apellidos,$Correo,$Telefono,$Celular,$Direccion,$Documento);
}





?>