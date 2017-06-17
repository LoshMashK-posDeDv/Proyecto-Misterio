<?php 
	include('../setup/config.php'); 	

	/* CAMPOS LOGIN FORM */
	$nombre_login = $_POST['usuario'];
	$clave_login = md5($_POST['password']);

	/* CONSULTA A TABLA USUARIOS */
$c_log = <<<LOGIN
SELECT 
	*
FROM usuarios 
LIMIT 1
LOGIN;
	
	$user = mysqli_query($conexion, $c_log);
	$log = mysqli_fetch_assoc($user);

	var_dump($log['IDUSUARIOS']);

	/*if( ! $log ){
		$_SESSION['LOGIN_ERROR'] = 'Mal usuario o clave';
		var_dump($_SESSION['LOGIN_ERROR']);
	} else {
		if( $log['U_ESTADO'] == 1 ){
			$_SESSION = $log;
			var_dump($log);
		} else {
			$_SESSION['LOGIN_ERROR'] = 'Cuenta bloqueada';
			var_dump($_SESSION['LOGIN_ERROR']);
		}
	}*/

	//header("Location: ../index.php");
?>
