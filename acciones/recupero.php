<?php
	include( '../setup/config.php' );

	$email = $_POST['usuario'];
	$c = "SELECT * FROM usuarios WHERE EMAIL='$email' LIMIT 1";
	$f = mysqli_query($conexion, $c);
	$info = mysqli_fetch_assoc($f);

	if (!$info) {
		$mnsj = 'error';
		header("Location: ../index.php?s=recupero&m=$mnsj");

	} else {
		$nueva_pass = rand(10000, 99999);
		$token = md5(time() . 'Jeff Albertson' . $email);
		$insert_pass = "INSERT into recuperar_pass SET EMAIL='$email', CLAVE_NUEVA='$nueva_pass', TOKEN_SEGURIDAD='$token', FECHA_CAMBIO='now()'";
		mysqli_query($conexion, $insert_pass);

		$destinatario = $email;
		$mnsj = <<<MENSAJE
			Bueno bueno bueno.. 			
			Pruebas científicas demostraron que simios pueden recordar parámetros simples de formas y colores.
			Parece que alguien olvidó su contraseña, lo cual lo hace más estúpido que un simio.

			No te preocupes, tu clave temporal es $nueva_pass, pero no va a funcionar hasta que no hagas click <a href="confirmar_pass.php?EMAIL=$email&TOKEN=$token">ACÁ</a>
MENSAJE;
		
		mail($email, "Recupera tu clave inmundo mortal", $mnsj);
	}

?>
