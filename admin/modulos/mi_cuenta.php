<?php

	$consulta =
		"SELECT
			NOMBRE_COMPLETO,
			EMAIL,
			CONTRASENIA,
			FECHA_ALTA,
			U_ESTADO,
			FKPERMISOS
		FROM
			usuarios";
	$respuesta = mysqli_query($conexion, $consulta);
?>

<div class="seccion--mi-cuenta">
	<div class="section__title">
		<h2>Mi cuenta</h2>
	</div>

		<p>Estos son los datos de tu perfil. Sentite libre de cambiar lo que quieras.</p>

		<form>
			<label>Nombre completo</label>
			<input type="text" name="nombre" value="">
			<label>Mail</label>
			<input type="email" name="mail" value="">
			<label>Cambiar contraseña</label>
			<input type="password" name="nombre" value="">
			<label>Confirmar contraseña</label>
			<input type="password" name="nombre" value="">
			<button type="submit" class="btn btn-default">Actualizar info</button>
		</form>

</div>
