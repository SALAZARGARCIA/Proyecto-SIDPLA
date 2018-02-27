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
		<section id="mapa">
			<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1771.5475598899654!2d-74.16360845119272!3d4.595912211893476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbff7a8b4a2e3468f!2zVGVsw6lmb25vIFDDumJsaWNv!5e0!3m2!1ses!2sco!4v1504127112554" style="color:#0000FF;text-align:left">futurodelweb.com</a> en un mapa más grande</small>
                </section>
	</section>

	<footer>
		 pie de pagina
	</footer>

</body>
</html>