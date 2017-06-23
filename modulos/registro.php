<form class="login_form" action="acciones/registro.php" method="POST">	
	<div class="seccion--registro">
		<h2>Registrate</h2>

		<p class="response info">
			Completa el siguiente formulario para crear tu cuenta en nuestro sistema.<br />
			Se te enviará un e-mail para confirmar el alta de usuario
		</p>

		<div class="login_form__row"><input type="text" name="nombre_completo" placeholder="Nombre Completo"></div>
		<div class="login_form__row"><input type="text" name="email" placeholder="Correo electrónico"></div>
		<div class="login_form__row"><input type="text" name="usuario" placeholder="Nombre de usuario"></div>
		<div class="login_form__row"><input type="password" name="password" placeholder="Contraseña"></div>
		<div class="login_form__row"><input type="submit" name="enviar" value="Registrarse" class="btn btn_ok btn-lg btn-block"></div>	
		
		<?php 
			if( isset($_GET['m']) &&  $_GET['m'] == 'error'){
				echo '<p class="error">';
					echo "Por favor revisa los campos";
				echo '</p>';
			} else if( isset($_GET['m']) &&  $_GET['m'] == 'exito'){
				echo '<p class="exito">';
					echo "Tu cuenta se ha creado con éxito";
				echo '</p>';
			}
		?>

		<div>
			<a href="index.php?s=login" class="link-a block-text">¿Ya tienes una cuenta? Ingresa.</a>
		</div>
	</div>
</form>