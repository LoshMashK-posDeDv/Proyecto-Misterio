<?php
include( '../setup/config.php' );

$nombre_completo = $_POST['nombre_completo'];
$email = $_POST['email'];
$nombre_usuario = $_POST['usuario'];
$password = $_POST['password'];

$c_reg = <<<REGISTRO
INSERT INTO
	usuarios
SET
	NOMBRE_USUARIO = '$nombre_usuario',
	CONTRASENIA = MD5('$password'),
	U_ESTADO = 1,
	FKPERMISOS = 2,
	NOMBRE_COMPLETO = '$nombre_completo',
	EMAIL = '$email',
	FECHA_ALTA = NOW( )
REGISTRO;

	if(empty($nombre_usuario) || empty($nombre_completo) || empty($email) || empty($password)) {
		$mnsj = 'error';
	} else {		
		
		$c_match = "SELECT * FROM usuarios WHERE NOMBRE_USUARIO = '" . $nombre_usuario . "' OR EMAIL = '" . $email . "'";
		
		$check = mysqli_query($conexion, $c_match);
		
		if (mysqli_num_rows($check) == 0 ) {
			mysqli_query($conexion, $c_reg);
			$mnsj = 'exito';
		} else {
			$mnsj = 'error';
		}	
	}

	header("Location: ../index.php?s=registro&m=$mnsj");

?>
