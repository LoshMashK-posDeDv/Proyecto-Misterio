<?php

	$consulta =
		"SELECT
			NOMBRE_COMPLETO,
			EMAIL,
			NICK,
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
			<div class="">
				
			</div>
			<div class="clearfix">
				<label>Nombre completo</label>
				<input type="text" name="nombre" value="" class="form-control">
			</div>
			<div class="clearfix">
				<label>Nick</label>
				<input type="text" name="nick" value="" class="form-control">
			</div>
			<div class="clearfix">
				<label>Mail</label>
				<input type="email" name="mail" value="" class="form-control">
			</div>
			<div class="clearfix">
				<label>Cambiar contraseña</label>
				<input type="password" name="nombre" value="" class="form-control">
			</div>
			<div class="clearfix">
				<label>Confirmar contraseña</label>
				<input type="password" name="nombre" value="" class="form-control">
			</div>
			
			<button type="submit" class="btn btn_ok btn-block">Actualizar info</button>
		</form>

</div>
