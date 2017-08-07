<?php

session_start( );

//leo el archivo de configuración general
$config_gen = parse_ini_file('setup.ini',true);

date_default_timezone_set($config_gen['zona']['timezone']);

//conexion local u online
if($_SERVER['HTTP_HOST'] == 'localhost'){
	/*$config = parse_ini_file('local.ini');
} else {*/
	$config = parse_ini_file('online.ini');
}

error_reporting($config['reporting']);
ini_set('display_errors' , $config['display']) ;

//conexion al sql
$conexion = @mysqli_connect(
	$config['host'],
	$config['user'],
	$config['pwd'],
	$config['bdd']
);

if( $conexion ){
	mysqli_set_charset($conexion, 'utf8');
}


// To do:
// - Validacion del get
// - Sanitizacion del get

$seccion = 'modulos/';

if(isset($_GET['s'])){
	$s = $_GET['s'];
} else {
	$s = '';
}

if(strpos($_SERVER['PHP_SELF'],'/admin/') == false ){
	switch ($s) {
		case 'login':
			$seccion .= 'login.php';
			break;
		case 'cerrar_sesion':
			$seccion = 'acciones/logout.php';
			break;
		case 'registro':
			$seccion .= 'registro.php';
			break;
		case 'recupero':
			$seccion .= 'recupero_pass.php';
			break;
		case 'posts':
			$seccion .= 'posts.php';
			break;
		case 'post':
			$seccion .= 'post.php';
			break;
		case 'resultados':
			$seccion .= 'buscar.php';
			break;

		default:
			$seccion .= 'home.php';
			break;
	}
} else {
	switch ($s) {
		case 'posts_listado':
			$seccion .= 'posts_listado.php';
			break;
		case 'mi_cuenta':
			$seccion .= 'mi_cuenta.php';
			break;
		case 'agregar_post':
			$seccion .= 'post_agregar.php';
			break;
		case 'editar_post':
			$seccion .= 'post_editar.php';
			break;
		case 'editar_pagina':
			$seccion .= 'pagina_editar.php';
			break;
		case 'usuarios_listado':
			$seccion .= 'usuarios_listado.php';
			break;
		case 'comentarios_listado':
			$seccion .= 'comentarios_listado.php';
			break;
		case 'cerrar_sesion':
			$seccion = 'acciones/logout.php';
			break;

		default:
			$seccion .= 'inicio.php';
			break;
	}
}

?>
