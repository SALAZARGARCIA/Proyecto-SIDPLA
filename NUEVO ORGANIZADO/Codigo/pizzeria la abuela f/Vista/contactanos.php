<!DOCTYPE html>
<html>
<head>
    <title>Contactanos - Pizzeria la Abuela</title>
    <meta charaset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/icomoon/style.css">
</head>
<body>
    <?php
        include "header.php";
        include "../Modelo/persona.model.php";
        $model = new PersonaModel();
    ?>
    <main>
    	<div class="contenedor titulo">
    		<p>Contactanos</p>
    	</div>
    	<div class="contenedor blanco ac">
    		<div class="formucontacto">
    			<form action="../Controlador/persona.control.php" method="POST">
                    <p>Para nosotros es muy importante conocer tu opinión.</p>
                    <textarea name="mensaje" placeholder="Escriba aqui su mensaje"></textarea>
                    <input type="submit" name="Comentar" value="Enviar">
                </form>
                    <p>Encuentranos</p>
                <iframe width="800" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1771.5475598899654!2d-74.16360845119272!3d4.595912211893476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbff7a8b4a2e3468f!2zVGVsw6lmb25vIFDDumJsaWNv!5e0!3m2!1ses!2sco!4v1504127112554" style="color:#0000FF;text-align:left"></iframe>
    		</div>
    		<div class="sucursal">
    			<p class="titulo-sucursal">Nuestras sucursales</p>
                <p>Conoce todas nuestras sucursales en Colombia, encuentra la mas cercana a tu hogar.</p>

                <?php foreach ($model->Listar_sucursales() as $k): ?>
                <div class="item-sucursal">
                    <p><b>Direccion:</b> <?php echo $k['Dir_Pizzeria']; ?></p>
                    <p><b>Telefono:</b> <?php echo $k['Tel_Pizzeria']; ?></p>
                    <p><b>Celular:</b> <?php echo $k['Cel_Pizzeria']; ?></p>
                </div>
                <?php endforeach; ?>
    		</div>
    	</div>

    </main>
    <?php 
        include "footer.php";
     ?>
</body>
</html>