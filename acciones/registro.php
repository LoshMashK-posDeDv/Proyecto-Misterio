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

	mysqli_query($conexion, $c_reg);
	header("Location: ../index.php");

?>
