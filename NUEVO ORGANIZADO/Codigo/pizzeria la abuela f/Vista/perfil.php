<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Datos - Pizzeria la Abuela</title>
    <meta charaset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/icomoon/style.css">
</head>
<body>
    <?php
        include "header.php";
        //Seguridad
        include "seguridad.php";
        $seguridad = new Seguridad;
        $seguridad->Validar_Sesion('','Vacia');
        //Fin Seguridad
        require_once '../Modelo/conexion.php';
        require '../Modelo/persona.model.php';
        include_once "../Controlador/persona.control.php";
        $db = database::conectar();
        $modelo = new PersonaModel;
        $persona = new Persona();
        $documento = $_SESSION['session']['Documento'];
        $p = $modelo->Obtener_Persona($documento);
    ?>
    <main>

        <div class="contenedor titulo"> <!---------TITULO--------->
            <p>Actualizar Datos</p>
        </div>

        <div class="contenedor blanco">
            <form action="../Controlador/persona.control.php" class="form_actualizar_per" method="POST" onsubmit="return evaluar();">

                <p><b>Numero de Documento: </b> <?php echo $p->__GET('Num_Documento_per'); ?><p>

                <p><b>Tipo de Documento: </b><?php echo $p->__GET('tipo_doc'); ?><p>

                <label for="Nomb">Nombres</label>
                   <input type="text" name="Nombres" value="<?php echo $p->__GET('Nombres'); ?>" id="Nomb" required>
                  
                <label for="Apell">Apellidos</label>
                   <input type="text" name="Apellidos" value="<?php echo $p->__GET('Apellidos'); ?>" id="Apell" required>
                  
                <label for="email">Correo</label>
                   <input type="email" name="Correo_per" value="<?php echo $p->__GET('Correo_per'); ?>" id="email" required>
                  
                <label for="tel">Telefono fijo</label>
                   <input type="number" name="Tel_per" value="<?php echo $p->__GET('Tel_per'); ?>" id="tel" required>
                  
                <label for="cel">Celular</label>
                   <input type="number" name="Cel_per" value="<?php echo $p->__GET('Cel_per'); ?>" id="cel">
                  
                <label for="direc">Direccion</label>
                   <input type="text" name="Direc_per" value="<?php echo $p->__GET('Direc_per'); ?>" id="direc" required>
                    
                <input type="submit" class="boton_exito" name="actualizar_per"  value="Actualizar">
            </form>
        </div>
        <script src="js/form.js"></script>
    </main>
    
    <?php 
        include "footer.php";
     ?> 
    
</body>
</html>