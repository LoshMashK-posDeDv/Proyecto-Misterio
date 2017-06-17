<?php
	if(isset($_GET['e'])){
		if($_GET['e'] == 'ok'){
			echo 'Se guardó correctamente';
		} else {
			echo 'Algo salió mal';
		}
	}
?>

<div class="row video_agregar_form">
	<div class="col-md-5">
		<form class="create_form" action="acciones/agregar_video.php" enctype="multipart/form-data" method="post">
			<div class="form-group">
				<div class="section__title">
					<h2>Agregar nuevo video</h2>
				</div>

				<div>
					<h3>Titulo</h3>
					<input type="text" name="titulo" id="titulo" class="form-control create_form__titulo"/>
				</div>

				<div>
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

				<div>
					<h3>Video</h3>
					<div class="row">
						<div class="col-md-6">	
							<img src="http://placehold.it/200x200" alt="Preview del video" />
						</div>
						<div class="col-md-6">
							<input type="file" name="video" id="video" class="form-control create_form__video" />	
						</div>
					</div>
				</div>

				<div>
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
						<input type="file" multiple="true" name="imagenes" id="imagenes" class="form-control create_form__imagenes" />
					</div>
				</div>

				<div>
					<h3>Im&aacute;gen destacada</h3>
					<div class="row">
						<div class="col-md-6">
							<img src="http://placehold.it/300x150" alt="">
						</div>
						<div class="col-md-6">
							<input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control create_form__imagen_destacada" />	
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-6"></div>
	<div class="col-md-1">
		<input type="submit" class="btn btn-default" value="Guardar"/>
	</div>
</div>