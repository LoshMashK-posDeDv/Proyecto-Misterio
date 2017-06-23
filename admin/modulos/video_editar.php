<?php
	if(isset($_GET['i'])){
		$id = $_GET['i'];
	} else {
		$id = 1;
	}

	$c = <<<SQL

	SELECT
		TITULO,
		DESCRIPCION,
		DURACION,
		AÑO,
		VIDEO,
		IMG_DESTACADA,
		IMAGENES,
		IDARTICULO
	FROM
		articulos
	WHERE
		IDARTICULO = $id
	LIMIT
		1
SQL;

	$f = mysqli_query($conexion, $c);
	$a = mysqli_fetch_assoc($f);

	$separar_video = explode(".", $a['VIDEO']);

	$separar_imagenes = explode(",", $a['IMAGENES']);


	$c_categoria = <<<CATEGORIA
	SELECT 
		*
	FROM 
		categorias
CATEGORIA;

	$f_categoria = mysqli_query($conexion, $c_categoria);
?>

<div class="seccion--video-editar">

	<div class="row video_agregar_form">
		<div class="col-md-5">
			<form class="create_form" action="acciones/editar_video.php" enctype="multipart/form-data" method="post">
				<input type="hidden" name="id" value="<?php echo $a['IDARTICULO'] ?>">

				<div class="form-group">
					<div class="section__title">
						<a class="section__title__back" href="index.php?s=videos_listado">
							<i class="glyphicon glyphicon-chevron-left"></i>
						</a>
						<h2>Editar video</h2>
					</div>

					<div class="clearfix">
						<h3>Titulo</h3>
						<input type="text" name="titulo" id="titulo" class="form-control create_form__titulo" value="<?php echo $a['TITULO'] ?>"/>
					</div>

					<div class="clearfix">
						<h3>Descripcion</h3>
						<textarea class="form-control create_form__descripcion" name="descripcion" id="descripcion"><?php echo $a['DESCRIPCION'] ?></textarea>
					</div>

					<div class="row">
						<div class="col-md-6">
							<h3>Duraci&oacute;n</h3>
							<input type="text" name="duracion" id="duracion" class="form-control create_form__duracion" value="<?php echo $a['DURACION'] ?>" />
						</div>
						<div class="col-md-6">
							<h3>A&ntilde;o</h3>
							<input type="text" name="anio" id="anio" class="form-control create_form__anio" value="<?php echo $a['AÑO'] ?>" />
						</div>
					</div>

					<div class="clearfix">						
						<div class="row">
							<div class="col-md-6">
								<h3>Video</h3>
								<video controls>
									<source src="../uploads/<?php echo $a['VIDEO'] ?>" type="video/<?php echo $separar_video[1] ?>">
								</video>
								<input type="file" name="video" id="video" class="form-control create_form__video" />
							</div>
							<div class="col-md-6">
								<h3>Categoría</h3>
								<select multiple class="form-control" name="categoria[]">
									<?php while($a_categoria = mysqli_fetch_assoc($f_categoria)): ?>
										<option value="<?php echo $a_categoria['IDCATEGORIA'] ?>">
											<?php echo $a_categoria['CATEGORIA'] ?>
										</option>
									<?php endwhile; ?>
								</select>
								<span class="disc">Manten apretado ctrl para seleccionar mas de una opción</span>
							</div>
						</div>
					</div>

					<div class="clearfix">
						<h3>Im&aacute;genes</h3>
						<div class="imagenes">
							<div class="row">
								<?php for($i = 0; $i < count($separar_imagenes); $i++): ?>
									<div class="imagenes__item col-xs-6 col-md-3">
										<img src="../uploads/<?php echo $separar_imagenes[$i]  ?>" alt="">
									</div>
								<?php endfor; ?>								
							</div>
						</div>
						<div class="btn-block">
							<input type="file" multiple="true" name="imagenes[]" id="imagenes" class="form-control create_form__imagenes" />
						</div>
					</div>

					<div class="clearfix">
						<h3>Im&aacute;gen destacada</h3>
						<div class="row">
							<div class="col-md-6">
								<img src="../uploads/<?php echo $a['IMG_DESTACADA'] ?>" alt="">
							</div>
							<div class="col-md-6">
								<input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control create_form__imagen_destacada" />
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<input type="submit" class="btn btn_ok btn-block" value="Guardar"/>
					</div>
					<div class="col-md-6"></div>					
				</div>
			</form>
		</div>
	</div>

</div>
