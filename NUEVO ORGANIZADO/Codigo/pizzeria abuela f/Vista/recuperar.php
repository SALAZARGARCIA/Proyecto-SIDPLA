<!DOCTYPE html>
<html>
<head>
    <title>Login - Pizzeria la Abuela</title>
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
        $error = false;
        $error2 = false;
        $form2 = false;
    
        $ndoc = "";
        $tdoc = "";
    
        if (isset($_REQUEST['action'])) {
            require_once '../Modelo/persona.model.php';
            $model = new PersonaModel();
            
        switch ($_REQUEST['action']) {
            case 'recupera':
                $ndoc = $_POST['n_doc'];
                $tdoc = $_POST['tipo_doc'];
                $_SESSION['Documento'] = $ndoc;
                $_SESSION['Tipo_Doc'] = $tdoc;
                $query = $db->query("select * from PERSONA where Num_Documento_per='$ndoc' and tipo_doc = '$tdoc'");
                if($query->rowCount() == 0){
                    $error = true;
                }else{
                    $form2 = true;
                }
                //$model->login($correo,$pass);
                break;
            case 'recupera2':
                $form2 = true;
                $contra1 = $_POST['pass1'];
                $contra2 = $_POST['pass2'];
                if($contra1 === $contra2){
                    $model->Recuperar_contra($contra1,$_SESSION['Documento'], $_SESSION['Tipo_Doc']);
                }else{
                    $error2= true;
                }
                
                break;
                
            }
        }
    ?>
    <main>

    	<div class="contenedor titulo"> <!---------TITULO--------->
    		<p>Recuperar contraseña</p>
    	</div>

    	<div class="contenedor blanco">
           <?php if($form2 == true){ ?>
    
               <form class="formrecupera" method="post">
                   <label for="pass1">Ingresa una contraseña nueva</label>
                    <input type="password" name="pass1" id="pass1">
                   <label for="pass2">Repetir contraseña</label>
                    <input type="password" name="pass2" id="pass2">
                    <input type="submit" value="Siguiente" onclick = "this.form.action = '?action=recupera2';" />
                 <?php if($error2==true){?> <p class="error">Las contraseñas no coinciden</p> <?php }?>
                </form>
             <?php }else{  ?>
             
            <form class="formrecupera" method="post">
               <p>Por favor ingresa los siguientes datos:</p>
               <label for="tdoc">Tipo de documento</label>
               <select name="tipo_doc" id="tdoc">
               <?php
                foreach ($db->query('SELECT * FROM tipo_doc where estado_tipo_doc=1') as $row) {
                    echo '<option value="' . $row['tipo_doc'] . '">' . $row['tipo_doc'] . '</option>';        
                } ?>
               </select>
               
                <label for="number">Numero de documento</label>
                <input type="number" name="n_doc" id="number">
                <input type="submit" value="Siguiente" onclick = "this.form.action = '?action=recupera';" />
                <?php if($error==true){?> <p class="error">Este usuario no se encuentra en el sistema</p> <?php }?>
            </form>
            <?php } ?>
    	</div>

    </main>
    <?php 
        include "footer.php";
     ?>
</body>
</html>