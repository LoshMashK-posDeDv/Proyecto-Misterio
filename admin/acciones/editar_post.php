<?php
	include("../../setup/config.php");

	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$categoria = $_POST['categoria'];
	$video = $_FILES['video'];
	$chucheria = $_POST['chucheria'];
	$video_nombre = $_FILES['video']['name'];
	$imagenes = $_FILES['imagenes'];
	$imagen_destacada = $_FILES['imagen_destacada'];
	$imagen_destacada_nombre = $_FILES['imagen_destacada']['name'];
	$id = $_POST['id'];

	if($imagenes['size'] > 0){
		if(is_array($imagenes['name'])){
			for($i = 0; $i < count($imagenes['name']); $i++){
				$archivos[] = array(
					'name' => $imagenes['name'][$i],
					'tmp_name' => $imagenes['tmp_name'][$i]
				);
			}
		} else {
			$archivos[] = $imagenes;
		}

		$i = 0;

		foreach ($archivos as $foto) {
			$foto_nombre = $foto['name'];
			$extensiones = pathinfo($foto_nombre, PATHINFO_EXTENSION);
			$foto_nombre = $i . "_imgs_" . time() . "." . $extensiones;
			move_uploaded_file($foto['tmp_name'], "../../uploads/$foto_nombre");
			$i++;
			$archivos_final[] = $foto_nombre;
		}

		$insertar = implode(',', $archivos_final);
	}

	if($video['size'] > 0){
		$extension = pathinfo($video_nombre, PATHINFO_EXTENSION);
		$video_nombre = "post_" . time() . '.' . $extension;
		move_uploaded_file($video['tmp_name'], "../../uploads/$video_nombre");
	}

	if($imagen_destacada['size'] > 0){
		$extension_img = pathinfo($imagen_destacada_nombre, PATHINFO_EXTENSION);
		$imagen_destacada_nombre = "img_" . time() . "." . $extension_img;
		move_uploaded_file($imagen_destacada['tmp_name'], "../../uploads/$imagen_destacada_nombre");
	}

	$c = "UPDATE articulos SET TITULO = '$titulo', DESCRIPCION = '$descripcion', FKCHUCHERIA = '$chucheria'";

	if($video['size'] > 0){
		$c .= ", VIDEO = '$video_nombre'";
	}

	if(count($imagenes) > 0){
		$c .= ", IMAGENES = '$insertar'";
	}

	if($imagen_destacada['size'] > 0){
		$c .= ", IMG_DESTACADA = '$imagen_destacada_nombre'";
	}

	$c .= " WHERE IDARTICULO = '$id'";

	mysqli_query($conexion, $c);

	$c2 = "DELETE FROM articulos_categorias WHERE FKARTICULO = '$id'";
	mysqli_query($conexion, $c2);	
	
	if (isset($categoria)) {
		foreach ($categoria as $cat) {
			$c3 = "INSERT INTO articulos_categorias SET FKCATEGORIA = '$cat', FKARTICULO = '$id'";
			 mysqli_query($conexion, $c3);	
		}
	}

	$rta = 'ok';

	
	header("Location: ../index.php?s=editar_post&m=$rta&i=$id");
?>