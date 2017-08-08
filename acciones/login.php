<?php 
	include('../setup/config.php'); 	

	/* CAMPOS LOGIN FORM */
	$email_login = $_POST['email'];
	$email_login = trim($email_login);

	$clave_login = $_POST['password'];
	$clave_login = trim($clave_login);
	$clave_login = md5($clave_login);

	/* CONSULTA A TABLA USUARIOS */
$c_log = <<<LOGIN
	SELECT
		IDUSUARIOS,
		NOMBRE_COMPLETO,		
		EMAIL,
		CONTRASENIA,
		FECHA_ALTA,		
		FKPERMISOS,
		U_ESTADO
	FROM 
		usuarios 
	WHERE 
		EMAIL='$email_login' 
		AND CONTRASENIA='$clave_login' 
	LIMIT 1
LOGIN;
	
	$user = mysqli_query($conexion, $c_log);
	$log = mysqli_fetch_assoc($user);

	if( !$log ){
		$_SESSION['LOGIN_ERROR'] = 'Tu email o contraseña son incorrectos';
		header("Location: ../index.php?s=login");
	} else {
		if( $log['U_ESTADO'] == 1 ){
			$_SESSION = $log;
			header("Location: ../admin");
		} else {
			$_SESSION['LOGIN_ERROR'] = 'Tu cuenta ha sido bloqueada';
			header("Location: ../index.php?s=login");
		}
	}
?>
