<?php
	
	$nombre = $_GET['n'];
	$nueva_pass = $_GET['nc'];
	$token = $_GET['t'];	
	$email = $_GET['e'];	
?>
<div class="seccion--email login_form text-center">
	<h2>Bueno bueno bueno <?php echo $nombre; ?>...</h2>	
	<p>
		Pruebas científicas demostraron que simios pueden recordar parámetros simples de formas y colores.
	</p>
	<p>
		Parece que alguien olvidó su contraseña, lo cual lo hace más estúpido que un simio.
	</p>
	<p>
		No te preocupes, tu clave temporal es:
		<span class="green bold"><?php echo $nueva_pass; ?></span>
		Pero no va a funcionar hasta que no hagas click <a class="bold" href="confirmar_pass.php?E=$email&T=$token">ACÁ</a>
	</p>
</div>