<form class="login_form" action="acciones/login.php" method="POST">	
	<h2>Inicia sesión</h2>
	<div class="login_form__row"><input type="text" name="email" placeholder="Email"></div>
	<div class="login_form__row"><input type="password" name="password" placeholder="Contraseña"></div>
	<div class="login_form__row"><input type="submit" name="enviar" value="Ingresar" class="btn btn_ok btn-lg btn-block"></div>
	
	<?php 
		if( isset($_SESSION['LOGIN_ERROR'])){
			echo '<p class="error">';
				echo $_SESSION['LOGIN_ERROR'];
			echo '</p>';
			unset( $_SESSION['LOGIN_ERROR'] );
		}

		if (isset($_GET['e'])) {
			if ($_GET['e'] == 'error_t') {
				echo '<p class="error">';
					echo 'Error al confirmar la contraseña';
				echo '</p>';
			} else if ($_GET['e'] == 'exito_t') {
				echo '<p class="error exito">';
					echo 'Su contraseña se ha actualizado con éxito';
				echo '</p>';
			}
		}
		
	?>

	<div>
		<a href="index.php?s=registro" class="link-a block-text">¿No tienes una cuenta? Registrate.</a>
	</div>
	<div>
		<a href="index.php?s=recupero" class="link-d block-text">¿No recuerdas tu contraseña?</a>
	</div>
</form>