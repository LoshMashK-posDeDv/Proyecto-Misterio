<form class="login_form" action="acciones/login.php" method="POST">
	<?php 
		if( isset($_SESSION['LOGIN_ERROR'])){
			echo '<p class="response error">';
				echo $_SESSION['LOGIN_ERROR'];
			echo '</p>';
			unset( $_SESSION['LOGIN_ERROR'] );
		}
	?>
	
	<h2>Inicia sesión</h2>
	<div class="login_form__row"><input type="text" name="usuario" placeholder="Usuario"></div>
	<div class="login_form__row"><input type="password" name="password" placeholder="Contraseña"></div>
	<div class="login_form__row"><input type="submit" name="" value="Ingresar" class="btn btn_ok btn-lg btn-block"></div>
	
	<div>
		<a href="index.php?s=registro" class="link-a block-text">¿No tienes una cuenta? Registrate.</a>
	</div>
	<div>
		<a href="#" class="link-d block-text">¿No recuerdas tu contraseña?</a>
	</div>	
</form>