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
		$token = md5('Jeff Albertson' . $email);
		$insert_pass = "INSERT into recuperar_pass SET EMAIL='$email', CLAVE_NUEVA='$nueva_pass', TOKEN_SEGURIDAD='$token'";
		$nombre = $info['NOMBRE_COMPLETO'];
		$nombre = strstr($nombre, ' ', true);
		$nombre = ucfirst($nombre);     
		mysqli_query($conexion, $insert_pass);	
		
		/*  Para mostrar como se veria el email de confirmación lo redireccionamos a un php de prueba */
		header("Location: ../index.php?s=prueba_email&e=$email&n=$nombre&nc=$nueva_pass&t=$token");
	}
?>