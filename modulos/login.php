<form class="login_form" action="acciones/login.php" method="POST">
	<?php 
		if( isset($_SESSION['LOGIN_ERROR'])){
			echo '<p class="response error">';
				echo $_SESSION['LOGIN_ERROR'];
			echo '</p>';
			unset( $_SESSION['LOGIN_ERROR'] );
		} else {
			echo '<p class="response ok"> Todo bien </p>';
		}
	?>

	<div class="login_form__row"><input type="text" name="usuario" placeholder="Usuario"></div>
	<div class="login_form__row"><input type="password" name="password" placeholder="Contraseña"></div>
	<div class="login_form__row"><input type="submit" name="" value="Ingresar"></div>

	<a href="logout.php">Cerrar Sesión</a>
</form>