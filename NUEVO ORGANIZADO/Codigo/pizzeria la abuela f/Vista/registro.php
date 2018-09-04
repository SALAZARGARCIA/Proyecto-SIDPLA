<!DOCTYPE html>
<html>
<head>
    <title>Registro - Pizzeria la Abuela</title>
    <meta charaset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/icomoon/style.css">
</head>
<body>
    <?php
        include "header.php";
        require_once '../Modelo/conexion.php';
        $db = database::conectar();
    ?>
    <main>

    	<div class="contenedor titulo"> <!---------TITULO--------->
    		<p>Registro</p>
    	</div>

    	<div class="contenedor blanco">
            <form action="../Controlador/persona.control.php" class="formreg" method="POST" name="fregistro" onsubmit="return evaluar();">
                   <input type="number" name="Num_Documento_per" id="ndoc" class="inputt" required>
                <label class="labell" for="ndoc">Numero de Documento</label>
                <label class="labelselect" for="tdoc">Tipo de documento</label>

                   <select name="tipo_doc" id="tdoc" class="select">
                    <?php
                        foreach ($db->query('SELECT * FROM tipo_doc where estado_tipo_doc=1') as $row) {
                            echo '<option class="inputt" value="' . $row['tipo_doc'] . '">' . $row['tipo_doc'] . '</option>';        
                        } ?>
                   </select>
                   <input type="text" name="Nombres" id="Nomb" class="inputt" required>
                <label class="labell" for="Nomb">Nombres</label>
                  
                   <input type="text" name="Apellidos" id="Apell" class="inputt" required>
                <label class="labell" for="Apell">Apellidos</label>
                  
                   <input type="email" name="Correo_per" id="email" class="inputt" required>
                <label class="labell" for="email">Correo</label>
                  
                   <input type="password" name="Pass_login" id="Pass" class="inputt" required>
                <label class="labell" for="Pass">Contraseña</label>
                  
                    <input type="password" name="Pass_login2" id="Pass2" class="inputt">
                <label class="labell" for="Pass2">Confirmar contraseña</label>
                  
                   <input type="number" name="Tel_per" id="tel" class="inputt" required>
                <label class="labell" for="tel">Telefono fijo</label>
                  
                   <input type="number" name="Cel_per" id="cel" class="inputt">
                <label class="labell" for="cel">Celular</label>
                  
                   <input type="text" name="Direc_per" id="direc" class="inputt" required>
                <label class="labell" for="direc">Direccion</label>
                
                <input type="submit" class="submit" name="registrar_per" value="Registrar">
            </form>
    	</div>
        <script src="js/form.js"></script>
    </main>
    
    <?php 
        include "footer.php";
     ?> 
    
</body>
</html>