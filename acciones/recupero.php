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
		$mnsj = 'exito';
		header("Location: ../index.php?s=recupero&m=$mnsj");
	}

?>
