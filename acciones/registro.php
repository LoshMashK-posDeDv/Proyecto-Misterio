<?php 
	include( '../setup/config.php' );

	$nombre_completo = $_POST['nombre_completo'];
	$email = $_POST['email'];
	$nombre_usuario = $_POST['usuario'];
	$password = md5($_POST['password']);

$c_reg = <<<REGISTRO
	INSERT INTO
		usuarios
	SET 
		NOMBRE_COMPLETO = '$nombre_completo',
		NOMBRE_USUARIO = '$nombre_usuario',
		EMAIL = '$email',
		CONTRASENIA = '$password',
		U_ESTADO = '1',
		FKPERMISO = 'user',
		FECHA_ALTA = NOW()
REGISTRO;

	mysqli_query($conexion, $c_reg);
	//header("Location: registro_Form.php");

	var_dump($c_reg );

?>