<!DOCTYPE html>
<html lang="es">
<head>
<?php
		include("llamadoestilos.php");
		?>
</head> 
<body>
	<header>
	<?php
		include("header.php");
		?>
	</header>
	<section id="contenido">
	<section id="contacto">
		<h2>Contáctos</h2>
		<article id="info-contacto">
			<p>
				Email:
				<span class="datos-contacto">pizzerialaabuela@gmail.com</span>
				<br>
				Movil:
				<span class="datos-contacto">(57)444-44-422-22</span>
                                <br>
				Dirección:
				<span class="datos-contacto">Bogota - Colombia</span>
				<br>
				Redes Sociales:
				<br>
				<span class="datos-contacto">
					<a href=""><img src="img/facebook-logo.png"></a>
					<a href="#"><img src="img/twitter-logo.png"></a>
					<a href="#"><img src="img/google-plus-logo.png"></a>
					<a href="#"><img src="img/youtube-logo.png"></a>
				</span>


			</p>
			
		</article>
		<article id="contactos">
			<form>
				<fieldset>
					<legend>Tu opinion es valiosa para nosotros </legend>
					<div>
						<label for="nombre">Nombre</label>
						<input type="text" class="fade" name="nombre_txt" required>
					</div>
					<div>
						<label for="email">Email</label>
						<input type="email" class="fade" name="email_txt" required>
					</div>
					<div>
						<label for="asunto">Asunto</label>
						<input type="text" class="fade" name="asunto_txt" required>
					</div>
					<div>
						<label for="comentario">Comentario</label>
						<textarea name="comentario" class="fade" cols="31" rows="5"></textarea>
						
					</div>
					<div>
						<input type="submit" name="enviar" class="fade" value="Enviar">
					</div>
				</fieldset>
			</form>
			
		</article>
		</section>

	<footer>
		 pie de pagina
	</footer>

</body>
</html>