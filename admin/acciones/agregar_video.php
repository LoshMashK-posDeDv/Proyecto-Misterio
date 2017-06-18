<?php
	include("../../setup/config.php");

	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$duracion = $_POST['duracion'];
	$anio = $_POST['anio'];
	$video = $_FILES['video'];
	$video_nombre = $_FILES['video']['name'];
	$imagenes = $_FILES['imagenes'];
	$imagen_destacada = $_FILES['imagen_destacada'];
	$imagen_destacada_nombre = $_FILES['imagen_destacada']['name'];

	//$autor = $_SESSION['NOMBRE_COMPLETO'];


	$er_titulo = "/^[a-z0-9-\.*\s]{5,80}$/i";
	$txt_titulo = preg_match($er_titulo, $titulo, $coincidencia_titulo);

	$er_descripcion = "/^.{10,500}$/i";
	$txt_descripcion = preg_match_all($er_descripcion, $descripcion, $coincidencia_descripcion);

	$er_duracion = "/^[0-9]{1,2}(:|.)[0-9]{2}(:|.)[0-9]{2}$/";
	$txt_duracion = preg_match($er_duracion, $duracion, $coincidencia_duracion);

	$er_video = "/^[\w\s]{4,45}\.(mp4|webm)$/i";
	$txt_video = preg_match($er_video, $video_nombre = $_FILES['video']['name'], $coincidencia_video);

	$er_imagen_destacada = "/^[\w\s]{4,45}\.(jpg|png)$/i";
	$txt_imagen_destacada = preg_match($er_imagen_destacada, $imagen_destacada['name'], $coincidencia_imagen_destacada);

	if($txt_titulo && $txt_descripcion && $txt_duracion && $txt_video && $txt_imagen_destacada){
		if($video['size'] > 0){
			$extension = pathinfo($video_nombre, PATHINFO_EXTENSION);
			$video_nombre = $titulo; 
			$video_nombre = preg_replace("/[^a-zA-Z0-9_-]/", "_", $video_nombre);
			$video_nombre .= "_video." . $extension;
			move_uploaded_file($video['tmp_name'], "../uploads/$video_nombre");
		}

		if($imagen_destacada['size'] > 0){
			$extension_img = pathinfo($imagen_destacada_nombre, PATHINFO_EXTENSION);
			$imagen_destacada_nombre = $titulo; 
			$imagen_destacada_nombre = preg_replace("/[^a-zA-Z0-9_-]/", "_", $imagen_destacada_nombre);
			$imagen_destacada_nombre .= "_img_destacada." . $extension_img;
			move_uploaded_file($imagen_destacada['tmp_name'], "../uploads/$imagen_destacada_nombre");
		}

		$c = <<<SQL

		INSERT INTO 
			articulos
		SET 
			TITULO = "$titulo",
			DESCRIPCION = "$descripcion",
			DURACION = "$duracion",
			AÑO = "$anio",
			VIDEO = '$video_nombre',
			IMG_DESTACADA = '$imagen_destacada_nombre'
SQL;
		$rta = 'ok';

		mysqli_query($conexion, $c);
	} else {
		$rta = 'error';
	}
	
	header("Location: ../index.php?s=agregar_video&e=$rta");
?>