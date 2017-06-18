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
	$id = $_POST['id'];

	//$autor = $_SESSION['NOMBRE_COMPLETO'];

	$er_titulo = "/^[a-z0-9-\.*\s]{5,80}$/i";
	$txt_titulo = preg_match($er_titulo, $titulo, $coincidencia_titulo);
	
	/*
	TENGO UN HERMOSO PROBLEMA CON EL VIDEO Y LA IMAGEN DESTACADA.
	CUANDO EDITO, NO LE PUEDO SETEAR UN VALOR AL INPUT FILE, ENTONCES SI EL USUARIO NO VUELVE A SUBIR EL VIDEO, EN LA BASE DE DATOS PONE '' =D

	$er_descripcion = "/^.{10,500}$/i";
	$txt_descripcion = preg_match_all($er_descripcion, $descripcion, $coincidencia_descripcion);

	$er_duracion = "/^[0-9]{1,2}(:|.)[0-9]{2}(:|.)[0-9]{2}$/";
	$txt_duracion = preg_match($er_duracion, $duracion, $coincidencia_duracion);

	$er_video = "/^[\w\s]{4,45}\.(mp4|webm)$/i";
	$txt_video = preg_match($er_video, $video_nombre = $_FILES['video']['name'], $coincidencia_video);

	$er_imagen_destacada = "/^[\w\s]{4,45}\.(jpg|png)$/i";
	$txt_imagen_destacada = preg_match($er_imagen_destacada, $imagen_destacada['name'], $coincidencia_imagen_destacada);
	*/
	if($txt_titulo){
		$c = <<<SQL

		UPDATE 
			articulos
		SET 
			TITULO = "$titulo",
			DESCRIPCION = "$descripcion",
			DURACION = "$duracion",
			AÑO = "$anio",
			VIDEO = '$video_nombre',
			IMG_DESTACADA = '$imagen_destacada_nombre'
		WHERE
			IDARTICULO = '$id'
SQL;
		$rta = 'ok';
		
		echo 'bien';
		mysqli_query($conexion, $c);
		echo $c;
	} else {
		$rta = 'error';
		echo mysqli_error($conexion);
		echo 'mal';
		#echo $id;
	}
	
	//header("Location: ../index.php?s=agregar_video&e=$rta");
?>