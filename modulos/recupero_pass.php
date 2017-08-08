<form class="login_form" action="acciones/recupero.php" method="POST">	
	<h2>Recuperar contraseña</h2>
	<div class="login_form__row"><input type="text" name="usuario" placeholder="Email"></div>
	<div class="login_form__row"><input type="submit" name="enviar" value="Enviar" class="btn btn_ok btn-lg btn-block"></div>

	<?php 
		if (isset($_GET['m'])) {
			if ($_GET['m'] == 'error') {
				echo '<p class="error">';
					echo 'El usuario no ha sido registrado.';
				echo '</p>';
			}
		}		
	?>
</form> 