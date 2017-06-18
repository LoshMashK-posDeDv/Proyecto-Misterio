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

	$c = "UPDATE 
		articulos
	SET 
		TITULO = '$titulo',
		DESCRIPCION = '$descripcion',
		DURACION = '$duracion',
		AÑO = '$anio'";

	if($video['size'] > 0){
		$c .= ", VIDEO = '$video_nombre'";
	}

	if($imagen_destacada['size'] > 0){
		$c .= ", IMG_DESTACADA = '$imagen_destacada_nombre'";
	}
	
	$c .= " WHERE
		IDARTICULO = '$id'";
	$rta = 'ok';
	
	mysqli_query($conexion, $c);

	header("Location: ../index.php?m=ok");
?>