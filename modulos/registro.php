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
		<div class="login_form__row"><input type="submit" name="" value="Registrarse" class="btn btn_ok btn-lg btn-block"></div>	

		<div>
			<a href="#" class="link-a block-text">¿Ya tienes una cuenta? Ingresa.</a>
		</div>
	</div>
</form>