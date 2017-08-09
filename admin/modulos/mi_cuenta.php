<?php

	$consulta = "SELECT NOMBRE_COMPLETO, EMAIL, NICK, EDAD FROM usuarios WHERE IDUSUARIOS='$_SESSION[IDUSUARIOS]' LIMIT 1";

	$respuesta = mysqli_query($conexion, $consulta);
	$datos = mysqli_fetch_assoc($respuesta);
?>

<div class="seccion--mi-cuenta">
	<div class="section__title">
		<h2>Mi cuenta</h2>
	</div>

		<?php 
			if (isset($_GET['rta'])) {
				if ($_GET['rta'] == 'ok') {
					echo '<p class="error exito">';
						echo 'Tus datos se actualizaron correctamente ';
					echo '</p>';
				} else if ($_GET['rta'] == 'error') {
					echo '<p class="error">';
						echo 'Hubo un error cerebrito, intentá después';
					echo '</p>';
				}
			}		
		?>

		<p>Estos son los datos de tu perfil. Sentite libre de cambiar lo que quieras.</p>

		<form action="acciones/editar_perfil.php" id="editar_perfil" method="post">
			<div class="">

			</div>
			<div class="clearfix" id="nombre_inc">
				<label>Nombre completo</label>
				<input id="nombre" type="text" name="nombre" value="<?php echo $datos['NOMBRE_COMPLETO'] ?>" class="form-control">
			</div>
			<div class="clearfix" id="email_inc">
				<label>Mail</label>
				<input id="email" type="text" name="mail" value="<?php echo $datos['EMAIL'] ?>" class="form-control">
			</div>
			<div class="clearfix" id="nick_inc">
				<label>Nick</label>
				<input id="nick" type="text" name="nick" value="<?php echo $datos['NICK'] ?>" class="form-control">
			</div>
			<div class="clearfix" id="edad_inc">
				<label>Edad</label>
				<input id="edad" type="text" name="edad" value="<?php echo $datos['EDAD'] ?>" class="form-control">
			</div>
			<div class="clearfix" id="pass_a_inc">
				<label>Cambiar contraseña</label>
				<input id="password" type="password" name="password" class="form-control">
				<span>La contraseña debe tener entre 6 y 15 carácteres, letras y números</span>
			</div>
			<div class="clearfix" id="pass_b_inc">
				<label>Confirmar contraseña</label>
				<input id="password_confirm" type="password" name="password_confirm" class="form-control">
			</div>

			<button type="submit" class="btn btn_ok btn-block" id="actualizar">Actualizar info</button>
		</form>

</div>
<script src="../js/validaciones.js"></script>
