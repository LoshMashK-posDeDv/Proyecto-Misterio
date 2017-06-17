<?php 
	
	//include( '../../setup/config.php' ); 
	
	//borrar esto cuando este la conexion desde el config
		$dbini = parse_ini_file('../setup/online.ini');

		//conexion al sql
		$conexion = @mysqli_connect(
			$dbini['host'],
			$dbini['user'],
			$dbini['pwd'],
			$dbini['bdd']
		);

		if( $conexion ){
			mysqli_set_charset($conexion, 'utf8');
		}

	/* CAMPOS LOGIN FORM */
	$nombre_login = $_POST['usuario'];
	$clave_login = md5($_POST['password']);

	/* CONSULTA A TABLA USUARIOS */
$c_log = <<<LOGIN
SELECT 
	IDUSUARIOS, 
	NOMBRE_USUARIO, 
	CONTRASENIA, 
	U_ESTADO
FROM usuarios 
WHERE 
	NOMBRE_USUARIO='$nombre_login' AND CONTRASENIA='$clave_login' 
LIMIT 1
LOGIN;
	
	$user = mysqli_query($conexion, $c_log);
	$log = mysqli_fetch_assoc($user);

	if( ! $log ){
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
	}

	//header("Location: ../index.php");
?>
