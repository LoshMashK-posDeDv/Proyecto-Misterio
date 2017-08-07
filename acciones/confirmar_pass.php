<?php
	include( '../setup/config.php' );

	$email = $_GET['E'];
	$token = $_GET['T'];

	$c = "SELECT * FROM recuperar_pass WHERE EMAIL='$email'
	AND TOKEN_SEGURIDAD='$token'";

	$f = mysqli_query($conexion, $c);
	$info = mysqli_fetch_assoc($f);

	if( !$info ){
		header("Location: ../index.php?s=login&e=error_t");
	}else{	
		$nueva_password = $info['CLAVE_NUEVA'];

		$act_clave = "UPDATE usuarios SET CONTRASENIA=MD5('$nueva_password') WHERE EMAIL='$email'
		LIMIT 1";
		mysqli_query($conexion, $act_clave);

		$borrar_clave_tmp = "DELETE FROM recuperar_pass WHERE EMAIL='$email' LIMIT 1";
		mysqli_query($conexion, $borrar_clave_tmp);
		header("Location: ../index.php?s=login&e=exito_t");
	}

?>
