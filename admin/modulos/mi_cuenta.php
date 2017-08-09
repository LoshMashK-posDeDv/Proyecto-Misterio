<?php

	$consulta = <<<SQL
		SELECT
			NOMBRE_COMPLETO,
			EMAIL,
			NICK
		FROM
			usuarios
		WHERE
		IDUSUARIOS = '$_SESSION[IDUSUARIOS]'
		LIMIT 1
SQL;

	$respuesta = mysqli_query($conexion, $consulta);
	$datos = mysqli_fetch_assoc($respuesta);
?>

<div class="seccion--mi-cuenta">
	<div class="section__title">
		<h2>Mi cuenta</h2>
	</div>

		<p>Estos son los datos de tu perfil. Sentite libre de cambiar lo que quieras.</p>

		<form action="acciones/editar_perfil.php" id="editar_perfil" method="post">
			<div class="">

			</div>
			<div class="clearfix">
				<label>Nombre completo</label>
				<input id="nombre" type="text" name="nombre" value="<?php echo $datos['NOMBRE_COMPLETO'] ?>" class="form-control" data-msj="El nombre solo puede contener letras (mínimo 5)" pattern="[\w\s]{5,50}" required>
			</div>
			<div class="clearfix">
				<label>Mail</label>
				<input id="email" type="email" name="mail" value="<?php echo $datos['EMAIL'] ?>" class="form-control" data-msj="El email es inválido" pattern="(([^<>()[\]\.,;:\s@\]+(\.[^<>()[\]\.,;:\s@\]+)*)|(\.+\))@(([^<>()[\]\.,;:\s@\]+\.)+[^<>()[\]\.,;:\s@\]{2,})" required>
			</div>
			<div class="clearfix">
				<label>Nick</label>
				<input id="nick" type="text" name="nick" value="<?php echo $datos['NICK'] ?>" class="form-control" data-msj="Ups, probá con otra cosa" pattern="[\d\w\s]{5,50}" required>
			</div>
			<div class="clearfix">
				<label>Cambiar contraseña</label>
				<input id="password" type="password" name="password" class="form-control" data-msj="La contraseña debe tener como mínimo 8 caracteres y 15 como máximo. Debe contener al menos un número y un caracter especial" pattern="(?=.*[a-z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}">
			</div>
			<div class="clearfix" id="pass_inc">
				<label>Confirmar contraseña</label>
				<input id="password_confirm" type="password" name="password_confirm" class="form-control">
			</div>

			<button type="submit" class="btn btn_ok btn-block" id="actualizar">Actualizar info</button>
		</form>

</div>
<script src="../js/validaciones.js"></script>
