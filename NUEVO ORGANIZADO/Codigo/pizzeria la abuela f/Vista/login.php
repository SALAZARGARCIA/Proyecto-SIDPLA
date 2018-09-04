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
    ?>
    <main>

    	<div class="contenedor titulo"> <!---------TITULO--------->
    		<p>Inicio de Sesión</p>
    	</div>

    	<div class="contenedor blanco">
           <?php if(isset($_REQUEST['error'])) { echo "<p class='error'>El usuario no se encuentra registrado en el sistema</p>";}?>
           <?php if(isset($_REQUEST['error_c'])) { echo "<p class='error'>Contraseña incorrecta</p>";}?>
            <form class="formlogin" method="POST" action="../Controlador/persona.control.php">
                <label for="email"> <span class="icon-mail"></span> Correo</label>
                <input type="email" name="email" id="email" placeholder="correo@correo.com">
                <label for="pass"> <span class="icon-key"></span> Contraseña</label>
                <input type="password" name="pass" id="pass" placeholder="*******">
                <input type="submit" name="login" value="Login">
                <a href="recuperar.php">¿Olvidaste tu contraseña?</a><br><br>
                <a href="registro.php">¿Aun no estás registrado? Registrate</a>
            </form>
    	</div>

    </main>
    <?php 
        include "footer.php";
     ?>
</body>
</html>