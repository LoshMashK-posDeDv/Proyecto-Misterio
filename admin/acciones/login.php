<?php 
include( '../setup/config.php' ); //conexion + sesiones
$usuario = $_POST['usuario'];
$clave = md5($_POST['clave']);
//$clave = $_POST['clave'];

$c = <<<SQL
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
SQL;
$f = mysqli_query( $cnx, $c );
$a = mysqli_fetch_assoc( $f );
if( ! $a ){
	//algo fallo en el login....
	$_SESSION['LOGIN_ERROR'] = 'Mal usuario o clave';
}else{
	if( $a['ESTADO'] == 1 ){
		$_SESSION = $a;
	}else{
		$_SESSION['LOGIN_ERROR'] = 'Cuenta bloqueada';
	}
}

header("Location: ../index.php");

?>