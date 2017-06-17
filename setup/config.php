<?php

//leo el archivo de configuración general
$config_gen = parse_ini_file('setup.ini',true);

date_default_timezone_set($config_gen['zona']['timezone']);

//conexion local u online
if($_SERVER['HTTP_HOST'] == 'localhost'){
	$config = parse_ini_file('local.ini');
}else{
	$config = parse_ini_file('online.ini');
}
//error_reporting($config['errores']['reporting']);
//ini_set('display_errors' , $config['errores']['display']) ;

//conexion al sql
$conexion = @mysqli_connect(
	$config['host'],
	$config['user'],
	$config['pwd'],
	$config['bdd']
);


// To do:
// - Validacion del get
// - Sanitizacion del get

$seccion = 'modulos/';

if(isset($_GET['s'])){
	$s = $_GET['s'];
} else {
	$s = '';
}

switch ($s) {
	case 'agregar_video':
		$seccion .= 'video_agregar.php';
		break;
	
	default:
		$seccion .= 'videos_listado.php';
		break;
}

?>