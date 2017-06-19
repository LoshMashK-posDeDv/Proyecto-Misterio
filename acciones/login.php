<?php 
	include('../setup/config.php'); 	

	/* CAMPOS LOGIN FORM */
	$nombre_login = $_POST['usuario'];
	$clave_login = md5($_POST['password']);

	/* CONSULTA A TABLA USUARIOS */
$c_log = <<<LOGIN
SELECT
	IDUSUARIOS,
	NOMBRE_USUARIO, 
	CONTRASENIA, 
	U_ESTADO,
	FKPERMISOS
FROM usuarios 
WHERE 
	NOMBRE_USUARIO='$nombre_login' 
	AND CONTRASENIA='$clave_login' 
LIMIT 1
LOGIN;
	
	$user = mysqli_query($conexion, $c_log);
	$log = mysqli_fetch_assoc($user);

	if( !$log ){
		$_SESSION['LOGIN_ERROR'] = 'Tu usuario o contraseña son incorrectos';
	} else {
		if( $log['U_ESTADO'] == 1 ){
			$_SESSION = $log;
		} else {
			$_SESSION['LOGIN_ERROR'] = 'Tu cuenta ha sido bloqueada';
		}
	}
	//var_dump($_SESSION);
	header("Location: ../index.php");
?>
