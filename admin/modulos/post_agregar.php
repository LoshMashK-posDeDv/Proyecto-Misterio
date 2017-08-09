<?php

	if(isset($_GET['m'])){
		$mensaje =  'Oops, Algo salió mal. Revisá los campos e intenta nuevamente';
		$class = 'error';
	}

	$c_categoria = "SELECT * FROM categorias";
	$c_chucheria = "SELECT * FROM tipo_chucherias";
	
	$f_categoria = mysqli_query($conexion, $c_categoria);
	$f_chucheria = mysqli_query($conexion, $c_chucheria);
	
?>

<div class="seccion--post-agregar">

	<?php if(isset($_GET['m'])) { ?>
		<p class="<?php echo $class; ?>">
			<?php echo $mensaje; ?>
		</p>
	<?php } ?>

	<div class="row post_agregar_form">
		<div class="col-md-7 col-md-offset-3">
			<form class="create_form" id="form_agregar_post" action="acciones/agregar_post.php" enctype="multipart/form-data" method="post">
				<div class="form-group">
					<div class="section__title">
						<a class="section__title__back" href="index.php?s=posts_listado">
							<i class="glyphicon glyphicon-chevron-left"></i>
						</a>
						<h2>Agregar nuevo post</h2>
					</div>

					<div class="clearfix">
						<h3>Titulo <span class="red">*</span> </h3>
						<input type="text" name="titulo" id="titulo" class="form-control create_form__titulo"/>
					</div>

					<div class="clearfix">
						<h3>Descripcion <span class="red">*</span></h3>
						<textarea class="form-control create_form__descripcion" name="descripcion" id="descripcion"></textarea>
					</div>

					<div class="row">
						<div class="col-md-6">
							<h3>Tipo de chucheria <span class="red">*</span></h3>
							<select class="form-control" name="chucheria">
								<?php while($a_chucherias = mysqli_fetch_assoc($f_chucheria)): ?>
									<option value="<?php echo $a_chucherias['IDCHUCHERIA'] ?>">
										<?php echo $a_chucherias['TIPO_CHUCHERIA'] ?>
									</option>
								<?php endwhile; ?>
							</select>

							<h3>Im&aacute;genes</h3>
							<div class="pull-right">
								<input type="file" multiple="true" name="imagenes[]" id="imagenes" class="form-control create_form__imagenes" accept="image/jpg, image/jpeg" />
								<p>Formatos: jpg, jpeg o png.</p>
							</div>
						</div>							

						<div class="col-md-6">
							<h3>Categoría <span class="red">*</span></h3>
							<select multiple class="form-control" name="categoria[]">
								<?php while($a_categoria = mysqli_fetch_assoc($f_categoria)):?>
									<option value="<?php echo $a_categoria['IDCATEGORIA'] ?>">
										<?php echo $a_categoria['CATEGORIA'] ?>
									</option>
								<?php endwhile; ?>
							</select>
							<span class="disc">Manten apretado ctrl para seleccionar mas de una opción</span>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<h3>Video</h3>
							<input type="file" name="video" id="video" class="form-control create_form__post" accept="video/mp4, video/avi" />
							<p>Formatos: MP4 y AVI.</p>	
						</div>						

						<div class="col-md-6">
							<h3>Im&aacute;gen destacada <span class="red">*</span></h3>
							<input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control create_form__imagen_destacada" accept="image/jpg, image/jpeg" />
							<p>Formatos: jpg o jpeg.</p>
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
