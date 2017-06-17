<?php 
	include( '../../setup/config.php' ); 
	$nombre_login = $_POST['usuario'];
	$clave_login = md5($_POST['clave']);

	$c_log = <<<LOGIN
	SELECT  
		IFNULL(
			CONCAT(LEFT(NOMBRE,1),'. ',UCASE(APELLIDO)),
			LEFT( EMAIL , INSTR( EMAIL, '@' )-1 )
		) AS USERNAME,
		NOMBRE, 
		APELLIDO, /*ESTOS DOS SON PARA EL FORMULARIO DE EDITAR DATOS */
		EMAIL, 
		NIVEL, 
		ID, 
		ESTADO, 
		IFNULL( AVATAR, 'no-profile.jpg' ) AS AVATAR 
	FROM usuarios 
	WHERE 
		EMAIL='$usuario' 
		AND CLAVE='$clave' 
	LIMIT 1
LOGIN;

	$user = mysqli_query($conexion, $c_log);
	$log = mysqli_fetch_assoc($user);

	if( ! $log ){
		$_SESSION['LOGIN_ERROR'] = 'Mal usuario o clave';
	} else {
		if( $a['ESTADO'] == 1 ){
			$_SESSION = $a;
		} else {
			$_SESSION['LOGIN_ERROR'] = 'Cuenta bloqueada';
		}
	}

	header("Location: ../index.php");
?>