<!DOCTYPE html>
<html>
<head>
    <title>Productos - Pizzeria la Abuela</title>
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
    	<div class="contenedor titulo">
    		<p>Nuestros Productos</p>
    	</div>
    	<div class="contenedor blanco">
    		<div class="catproductos"> <!--Contenedor de Nuestras Pizzas -->
                <form  action="Productos.php" method="GET">
                    <input type="text" name="Prod" value="PIZZA">
                    <input type="submit" id="Pizzass"> 
                </form>
                <label for="Pizzass"><img src="img/Nuestas_Pizzas.jpg"></label>
    		</div>

    		<div class="catproductos"> <!--Contenedor de Nuestras Bebidas -->
    		  <form  action="Productos.php" method="GET">
                    <input type="text" name="Prod" value="BEBIDA">
                    <input type="submit" id="Bebida"> 
                </form>
                <label for="Bebida"><img src="img/Bebidas.jpg"></label> 
    		</div>

    		<div class="catproductos"> <!--Contenedor de Nuestras Pastas -->
    			<form  action="Productos.php" method="GET">
                    <input type="text" name="Prod" value="PASTA">
                    <input type="submit" id="Pasta"> 
                </form>
                <label for="Pasta"><img src="img/Pastas.jpg"></label> 
    		</div>

    		<div class="catproductos"> <!--Contenedor de Nuestras Ensaladas -->
    			<form  action="Productos.php" method="GET">
                    <input type="text" name="Prod" value="ENSALADA">
                    <input type="submit" id="Ensalada"> 
                </form>
                <label for="Ensalada"><img src="img/Ensaladas.jpg"></label> 
    		</div>

    		<div class="catproductos"> <!--Contenedor de Nuestros Acompañantes -->
    			<form  action="Productos.php" method="GET">
                    <input type="text" name="Prod" value="ACOMPAÑANTE">
                    <input type="submit" id="Acompañante"> 
                </form>
                <label for="Acompañante"><img src="img/Acompañantes.jpg"></label> 
    		</div>

    		<div class="catproductos"> <!--Contenedor de Nuestros Adicionales -->
    			<form  action="Productos.php" method="GET">
                    <input type="text" name="Prod" value="ADICIONALES">
                    <input type="submit" id="Adicional"> 
                </form>
                <label for="Adicional"><img src="img/Adicionales.jpg"></label> 
    		</div>
    	</div>

    </main>
    <?php 
        include "footer.php";
     ?>
</body>
</html>