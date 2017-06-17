<?php

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