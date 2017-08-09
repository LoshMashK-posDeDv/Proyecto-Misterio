<?php
	if(isset($_GET['i'])){
		$id = $_GET['i'];
	} else {
		$id = 1;
	}

	if(isset($_GET['m'])){
		if($_GET['m'] == 'ok'){
			$mensaje = 'El post se actualizó correctamente';
			$class = 'exito';
		} else {
			$mensaje =  'Oops, Algo salió mal. Revisa los campos e intenta nuevamente';
			$class = 'error';
		}
	}


	$c_chucheria = "SELECT * FROM tipo_chucherias";
	

	$f_chucheria = mysqli_query($conexion, $c_chucheria);

	$c = <<<SQL

	SELECT
		IDARTICULO,
		TITULO,
		FECHA_ALTA,
		FKCHUCHERIA,
		DESCRIPCION,
		VIDEO,
		IMG_DESTACADA,
		IMAGENES
	FROM
		articulos
	WHERE
		IDARTICULO = $id
	LIMIT
		1
SQL;

	$f = mysqli_query($conexion, $c);
	$a = mysqli_fetch_assoc($f);

	$separar_post = explode(".", $a['VIDEO']);
	
	$separar_imagenes = explode(",", $a['IMAGENES']);

	$x = <<<SQL

	SELECT
		FKCATEGORIA
	FROM
		articulos_categorias
	WHERE
		IDARTICULO = $id

SQL;	

	$p = mysqli_query($conexion, $x);
	

	$seleccionados = array();

	while ($cosito = mysqli_fetch_assoc($p)):
		$seleccionados[] = $cosito['FKCATEGORIA'];
	endwhile;

	var_dump($seleccionados);	


		$c_categoria = "SELECT * FROM categorias";
		$f_categoria = mysqli_query($conexion, $c_categoria);

?>

<div class="seccion--post-editar">

	<?php if(isset($_GET['m'])) { ?>
		<p class="<?php echo $class; ?>">
			<?php echo $mensaje; ?>
		</p>
	<?php } ?>

	<div class="row post_agregar_form">
		<div class="col-md-7 col-md-offset-3">
			<form class="create_form" action="acciones/editar_post.php" enctype="multipart/form-data" method="post">
				<input type="hidden" name="id" value="<?php echo $a['IDARTICULO'] ?>">

				<div class="form-group">
					<div class="section__title">
						<a class="section__title__back" href="index.php?s=posts_listado">
							<i class="glyphicon glyphicon-chevron-left"></i>
						</a>
						<h2>Editar post</h2>
					</div>

					<div class="clearfix">
						<h3>Titulo <span class="red">*</span> </h3>
						<input type="text" name="titulo" id="titulo" class="form-control create_form__titulo" value="<?php echo $a['TITULO'] ?>"/>
					</div>

					<div class="clearfix">
						<h3>Descripcion <span class="red">*</span> </h3>
						<textarea class="form-control create_form__descripcion" name="descripcion" id="descripcion"><?php echo $a['DESCRIPCION'] ?></textarea>
					</div>

					<div class="row">
						<div class="col-md-6">
							<h3>Tipo de chucheria <span class="red">*</span></h3>
							<select class="form-control" name="chucheria">
								<?php while($a_chucherias = mysqli_fetch_assoc($f_chucheria)): ?>
									<option value="<?php echo $a_chucherias['IDCHUCHERIA'] ?>" <?php 

										if ($a_chucherias['IDCHUCHERIA'] == $a['FKCHUCHERIA']){

									echo "selected";

								}
									?>>
										<?php echo $a_chucherias['TIPO_CHUCHERIA'] ?>
									</option>
								<?php endwhile; ?>
							</select>

							<h3>Im&aacute;genes</h3>
							<div class="imagenes">
								<div class="row">
									<?php if (count($separar_imagenes) > 0): ?>									
										<?php for($i = 0; $i < count($separar_imagenes); $i++): ?>
											<div class="imagenes__item col-xs-6">
												<img src="../uploads/<?php echo $separar_imagenes[$i]  ?>" alt="">
											</div>
										<?php endfor; ?>	
									<?php endif; ?>								
								</div>
							</div>
							<div class="btn-block">
								<input type="file" multiple="true" name="imagenes[]" id="imagenes" class="form-control create_form__imagenes" />
							</div>

							<h3>Video</h3>
							<?php if ($a['VIDEO'] > 0): ?>
								<video controls>
									<source src="../uploads/<?php echo $a['VIDEO'] ?>" type="video/<?php echo $separar_post[1] ?>">
								</video>		
							<?php endif; ?>		
							
							<input type="file" name="video" id="video" class="form-control create_form__post" />
						</div>							

						<div class="col-md-6">
							<h3>Categoría</h3>
							<select multiple class="form-control" name="categoria[]">
								<?php while($a_categoria = mysqli_fetch_assoc($f_categoria)): ?>
									<option value="<?php echo $a_categoria['IDCATEGORIA'] ?>" <?php 

										if (in_array($cosito['FKCATEGORIA'], $seleccionados)){

									echo "selected";

								}
									?>>
										<?php echo $a_categoria['CATEGORIA'] ?>
									</option>
								<?php endwhile; ?>
							</select>
							<span class="disc">Manten apretado ctrl para seleccionar mas de una opción</span>

							<h3>Im&aacute;gen destacada</h3>
							<div class="row">
								<div class="col-md-12">
									<img src="../uploads/<?php echo $a['IMG_DESTACADA'] ?>" alt="" class="img_cargada">
									<input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control create_form__imagen_destacada" />
								</div>
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
