<?php
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$duracion = $_POST['duracion'];
	$anio = $_POST['anio'];
	$video = $_FILES['video'];
	$imagenes = $_FILES['imagenes'];
	$imagen_destacada = $_FILES['imagen_destacada'];


	$er_titulo = "/^[a-z0-9-\.*\s]{5,80}$/i";
	$txt_titulo = preg_match($er_titulo, $titulo, $coincidencia_titulo);

	$er_descripcion = "/^.{10,500}$/i";
	$txt_descripcion = preg_match_all($er_descripcion, $descripcion, $coincidencia_descripcion);

	$er_duracion = "/^[0-9]{1,2}(:|.)[0-9]{2}(:|.)[0-9]{2}$/";
	$txt_duracion = preg_match($er_duracion, $duracion, $coincidencia_duracion);

	$er_video = "/^[\w\s]{4,45}\.(mp4|webm)$/i";
	$txt_video = preg_match($er_video, $video['name'], $coincidencia_video);

	$er_imagen_destacada = "/^[\w\s]{4,45}\.(jpg|png)$/i";
	$txt_imagen_destacada = preg_match($er_imagen_destacada, $imagen_destacada['name'], $coincidencia_imagen_destacada);

	if($txt_titulo && $txt_descripcion && $txt_duracion && $txt_video && $txt_imagen_destacada){
		/* ACÁ VA EL INSERT DE LOS DATOS */
		echo "todo ok";
	} else {
		header("Location: ../crear_video.php");
		die();
	}

?>