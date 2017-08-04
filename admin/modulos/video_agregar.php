<?php

	if(isset($_GET['m'])){
		$mensaje =  'Oops, Algo salió mal. Revisá los campos e intenta nuevamente';
		$class = 'error';
	}

	$c_categoria = "SELECT * FROM categorias";

	$f_categoria = mysqli_query($conexion, $c_categoria);
?>

<div class="seccion--video-agregar">

	<?php if(isset($_GET['m'])) { ?>
		<p class="<?php echo $class; ?>">
			<?php echo $mensaje; ?>
		</p>
	<?php } ?>

	<div class="row video_agregar_form">
		<div class="col-md-5">
			<form class="create_form" id="form_agregar_video" action="acciones/agregar_video.php" enctype="multipart/form-data" method="post">
				<div class="form-group">
					<div class="section__title">
						<a class="section__title__back" href="index.php?s=videos_listado">
							<i class="glyphicon glyphicon-chevron-left"></i>
						</a>
						<h2>Agregar nuevo video</h2>
					</div>

					<div class="clearfix">
						<h3>Titulo</h3>
						<input type="text" name="titulo" id="titulo" class="form-control create_form__titulo"/>
					</div>

					<div class="clearfix">
						<h3>Descripcion</h3>
						<textarea class="form-control create_form__descripcion" name="descripcion" id="descripcion"></textarea>
					</div>

					<div class="row">
						<div class="col-md-6">
							<h3>Duraci&oacute;n</h3>
							<input type="text" name="duracion" id="duracion" class="form-control create_form__duracion" />
						</div>
						<div class="col-md-6">
							<h3>A&ntilde;o</h3>
							<input type="text" name="anio" id="anio" class="form-control create_form__anio" />
						</div>
					</div>

					<div class="clearfix">
						<div class="row">
							<div class="col-md-6">
								<h3>Video</h3>
								<img src="http://placehold.it/200x200" alt="Preview del video" />
								<input type="file" name="video" id="video" class="form-control create_form__video" />
								<p>Formatos: mp4 o webm</p>
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
						<div class="imagenes row">
							<div class="imagenes__item col-xs-6 col-md-3"><img src="http://placehold.it/100x100" alt=""></div>
							<div class="imagenes__item col-xs-6 col-md-3"><img src="http://placehold.it/100x100" alt=""></div>
							<div class="imagenes__item col-xs-6 col-md-3"><img src="http://placehold.it/100x100" alt=""></div>
							<div class="imagenes__item col-xs-6 col-md-3"><img src="http://placehold.it/100x100" alt=""></div>
							<div class="imagenes__item col-xs-6 col-md-3"><img src="http://placehold.it/100x100" alt=""></div>
							<div class="imagenes__item col-xs-6 col-md-3"><img src="http://placehold.it/100x100" alt=""></div>
							<div class="imagenes__item col-xs-6 col-md-3"><img src="http://placehold.it/100x100" alt=""></div>
							<div class="imagenes__item col-xs-6 col-md-3"><img src="http://placehold.it/100x100" alt=""></div>
						</div>
						<div class="pull-right">
							<input type="file" multiple="true" name="imagenes[]" id="imagenes" class="form-control create_form__imagenes" />
							<p>Formatos: jpg, jpeg o png.</p>
						</div>
					</div>

					<div class="clearfix">
						<h3>Im&aacute;gen destacada</h3>
						<div class="row">
							<div class="col-md-6">
								<img src="http://placehold.it/300x150" alt="">
							</div>
							<div class="col-md-6">
								<input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control create_form__imagen_destacada" />
								<p>Formatos: jpg, jpeg o png.</p>
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
