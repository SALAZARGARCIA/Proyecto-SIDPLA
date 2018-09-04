<?php

//Confirmar-Cancelar Domicilio

if(isset($_GET['Cambio_estado'])){
    
    include "../Modelo/empleado.model.php";
    $model = new EmpleadoModel(); 
    $ID_Dom = $_GET['ID'];
    if($_GET['Cambio_estado'] == 'Entregado'){
        $model->Cambio_estado_dom($ID_Dom,'ENTREGADO');
    }elseif ($_GET['Cambio_estado'] == 'Cancelado') {
        $model->Cambio_estado_dom($ID_Dom,'CANCELADO');
    }
        
}

?>


