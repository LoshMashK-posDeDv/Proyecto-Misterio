<?php
	if(isset($_GET['e'])){
		if($_GET['e'] == 'ok'){
			echo 'Se guardó correctamente';
		} else {
			echo 'Algo salió mal';
		}
	}
?>

<div class="content-fluid">
	<form class="create_form" action="../acciones/agregar_video.php" enctype="multipart/form-data" method="post">
		<div class="section__title">
			<h2><input type="text" name="titulo" id="titulo" placeholder="Titulo del video" class="create_form__title"/></h2>
		</div>

		<div>
			<h3>Descripcion</h3>
			<textarea class="create_form__description" name="descripcion" id="descripcion"></textarea>
		</div>

		<div class="row">
			<div class="col-md-6">
				<h3>Duraci&oacute;n</h3>
				<input type="text" name="duracion" id="duracion" />
			</div>
			<div class="col-md-6">
				<h3>A&nacute;o</h3>
				<input type="text" name="anio" id="anio" />
			</div>
		</div>

		<div>
			<h3>Video</h3>
			<input type="file" name="video" id="video" />
		</div>

		<div>
			<h3>Imagenes</h3>
			<input type="file" name="imagenes" id="imagenes" />
		</div>

		<div>
			<h3>Imagen destacada</h3>
			<input type="file" name="imagen_destacada" id="imagen_destacada" />
		</div>

		<input type="submit" class="btn" />
	</form>
</div>