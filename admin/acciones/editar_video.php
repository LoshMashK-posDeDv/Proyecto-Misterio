<?php
	include("../../setup/config.php");

	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$duracion = $_POST['duracion'];
	$categoria = $_POST['categoria'];
	$anio = $_POST['anio'];
	$video = $_FILES['video'];
	$video_nombre = $_FILES['video']['name'];
	$imagenes = $_FILES['imagenes'];
	$imagen_destacada = $_FILES['imagen_destacada'];
	$imagen_destacada_nombre = $_FILES['imagen_destacada']['name'];
	$id = $_POST['id'];

	/*
	*
	* ----- COMIENZA LA DOCUMENTACIÓN SOBRE LOS INPUT FILE MULTIPLES -----
	*
	*/
	/* Este if es solo para asegurarme de haber recibido un dato. Por si las moscas */
	if($imagenes['size'] > 0){
		/* Lo primero que tengo que hacer, es saber si me llegó algo. Y como el comportamiento natural del $_FILES es tomar un solo archivo, pregunto si me llegó más de uno con is_array(). */
		if(is_array($imagenes['name'])){
			/* Si tengo un array, lo voy a recorrer, porque por defecto, el $_FILES se queda con el último archivo cargado */
			for($i = 0; $i < count($imagenes['name']); $i++){
					/* Cuando los recorro creo un array propio donde voy a ir guardando el nombre de cada archivo, físico y temporal (Esto lo voy a necesitar más adelante )*/
					$archivos[] = array(
							'name' => $imagenes['name'][$i],
							'tmp_name' => $imagenes['tmp_name'][$i]
					);
			}
		} else {
			/* Si no me llegó más de un archivo, igualmente creo el array y meto el único archivo que me llegó. Esto lo hago porque después uso un foreach que me sirve para mostrar si tengo uno o tengo 100 archivos. Optimizo el uso de estructuras */
			$archivos[] = $imagenes;
		}

		/* Esta variable $i la estoy usando solamente porque si me llega más de un archivo necesito que tengan alguna diferencia en el nombre */
		$i = 0;

		/* Recorro mi array donde fui guardando todo lo que cargó el usuario */
		foreach ($archivos as $foto) {
			/* Tomo el nombre de cada imagen y lo guardo en una variable */
			$foto_nombre = $foto['name'];
			/* Le saco la extensión */
			$extensiones = pathinfo($foto_nombre, PATHINFO_EXTENSION);
			/* Fuerzo a que el nombre del archivo sea igual al título del video */
			$foto_nombre = $titulo;
			/* Reemplazo todas las cosas extrañas por un _ */
			$foto_nombre = preg_replace("/[^a-zA-Z0-9_-]/", "_", $foto_nombre);
			/* Y acá hago varias cosas. Le estoy poniendo el nuevo nombre al archivo que está formado por:
				- El id: para reconocerlos fácil y agrupar todas las imágenes que correspondan a un mismo video.
				- La variable $i: Que me va a servir para que, por ejemplo, todas las fotos del ID 15 no se llamen 15_imagenes_TITULO.jpg, porque se pisarían, entonces se van a llamar  150_imagenes_TITULO.jpg, 151_imagenes_TITULO.jpg, 152_imagenes_TITULO.jpg, etc. Esto obviamente lo podemos cambiar para que quede de la manera que queramos.
				- "_imagenes_": Esto únicamente lo puse para que quede registrado que esa imagen pertenece a una selección múltiple.
				- Nombre de la foto (el título del video).
				- El ".", para que sea .jpg, .png o lo que corresponda
				- Extensión de la foto.
			*/
			$foto_nombre = $id . $i . "_imagenes_" . $foto_nombre . "." . $extensiones;
			/* Hago el move_uploaded_file para guardar la foto en nuestras carpetas */
			move_uploaded_file($foto['tmp_name'], "../../uploads/$foto_nombre");
			/* Incremento la $i para que cambie según la foto */
			$i++;
			$archivos_final[] = $foto_nombre;
		}

		$insertar = implode(',', $archivos_final);
	}

	/*
	*
	* ----- FIN DE LA DOCUMENTACIÓN SOBRE LOS INPUT FILE MULTIPLES -----
	*
	*/


	//$autor = $_SESSION['NOMBRE_COMPLETO'];

	if($video['size'] > 0){
		$extension = pathinfo($video_nombre, PATHINFO_EXTENSION);
		$video_nombre = $titulo;
		$video_nombre = preg_replace("/[^a-zA-Z0-9_-]/", "_", $video_nombre);
		$video_nombre .= "_video." . $extension;
		move_uploaded_file($video['tmp_name'], "../../uploads/$video_nombre");
	}

	if($imagen_destacada['size'] > 0){
		$extension_img = pathinfo($imagen_destacada_nombre, PATHINFO_EXTENSION);
		$imagen_destacada_nombre = $titulo;
		$imagen_destacada_nombre = preg_replace("/[^a-zA-Z0-9_-]/", "_", $imagen_destacada_nombre);
		$imagen_destacada_nombre .= "_img_destacada." . $extension_img;
		move_uploaded_file($imagen_destacada['tmp_name'], "../../uploads/$imagen_destacada_nombre");
	}

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

	if($imagenes['size'] > 0){
		$c .= ", IMAGENES = '$insertar'";
	}

	if($imagen_destacada['size'] > 0){
		$c .= ", IMG_DESTACADA = '$imagen_destacada_nombre'";
	}

	$c .= " WHERE
		IDARTICULO = '$id'";
	$rta = 'ok';

	mysqli_query($conexion, $c);
	header("Location: ../index.php?s=videos_listado&m=$rta");
?>
