<?php

	$post_id = isset($_GET['vid']) ? $_GET['vid'] : 0 ;

	$consulta_post = <<<SQL
		SELECT 
		IDARTICULO,
		UCASE(TITULO) AS TITULO,
		DATE_FORMAT(a.FECHA_ALTA, "%d de %M de %Y") AS FECHA,
		VIDEO,
		IMAGENES,
		IMG_DESTACADA,
		DESCRIPCION,
		NOMBRE_COMPLETO,
		EMAIL,
		TIPO_CHUCHERIA	
	FROM articulos AS a 
	LEFT JOIN tipo_chucherias ON a.FKCHUCHERIA = tipo_chucherias.IDCHUCHERIA
	LEFT JOIN usuarios AS u ON a.FKUSUARIO = u.IDUSUARIOS
	WHERE IDARTICULO = $post_id
SQL;

	$consulta_comentarios = <<<SQL
		SELECT
			IDCOMENTARIO,
			COMENTARIO,
			FECHA_COMENTARIO,
			u.NICK AS NICK,
			C_ESTADO
		FROM
			comentarios as c
		JOIN usuarios as u ON c.FKUSUARIO = u.IDUSUARIOS
		WHERE c.FKARTICULO = $post_id AND C_ESTADO = 1
SQL;

	$consulta_categoria = <<<SQL
		SELECT
			FKCATEGORIA,
			CATEGORIA
		FROM
			articulos_categorias AS rel JOIN categorias AS c ON c.IDCATEGORIA = rel.FKCATEGORIA
		WHERE
			FKARTICULO = $post_id
SQL;

	$consulta_cant_posts = <<<SQL
		SELECT
			MAX(IDARTICULO) AS CANT_ARTICULOS
		FROM 
			articulos
SQL;

	$r1 = mysqli_query($conexion, $consulta_post);
	$r2 = mysqli_query($conexion, $consulta_comentarios);
	$r3 = mysqli_query($conexion, $consulta_categoria);
	
	while($array_detalle = mysqli_fetch_assoc($r1)):
		$separar_video = explode(".", $array_detalle['VIDEO']);
		
		$descripcion = $array_detalle['DESCRIPCION'];
		$descripcion = strip_tags($descripcion);
		$descripcion = nl2br($descripcion);
		$descripcion = trim($descripcion);
		//esta función está encaprichada y no quiere funcionar!
		//$descripcion = utf8_encode($descripcion);
		
		$nombre_completo = $array_detalle['NOMBRE_COMPLETO'];
		$nombre_completo = strip_tags($nombre_completo);
		$nombre_completo = trim($nombre_completo);
		//$nombre_completo = utf8_encode($nombre_completo);
		
		$titulo = $array_detalle['TITULO'];
		$titulo = strip_tags($titulo);
		$titulo = trim($titulo);
		//$titulo = utf8_encode($titulo);
?>


<div class="jumbotron" id="contenedorpost">
</div>

<section class="section--home--proyecto">
	<div class="container">

		<div class="row">

			<div class="col-sm-6">
				<?php if($array_detalle['VIDEO'] != null){
					?>
					<video class="videito" controls>
					<source src="uploads/<?php echo $array_detalle['VIDEO'] ?>" type="video/<?php echo $separar_video[1] ?>">
					Tu navegador no soporta la reproducción de videos.
				</video>
				<?php
				}else{
				?>	
					<img src="uploads/<?php echo $array_detalle['IMG_DESTACADA']; ?>" alt="<?php echo $titulo; ?>"/>
				<?php
				}
				?>
			</div>

			<div class="col-sm-6">
				<div class="post--info">
					<div class="idvideito">
						<h2><?php echo $titulo ?></h2>
						<ul>
							<li>Tipo de chuchería: <?php echo $array_detalle['TIPO_CHUCHERIA']; ?></li>
							<li>Categoría: <?php 
									while($array_categoria = mysqli_fetch_assoc($r3)):
										$categorias = explode(',',$array_categoria['CATEGORIA']);
										foreach( $categorias as $indice => $valor){						
											echo "<span>".$valor."</span>";
										}
									endwhile;
								?>
							</li>
							<li><?php echo traducir_mes($array_detalle['FECHA']); ?></li>
						</ul>

						<div class="desc">
							<p><?php echo $descripcion ?></p>
						</div>
						<div class="img_list">
							<ul>
								<?php 	
									if($array_detalle['IMAGENES'] != null){
										$imgs = explode(',' , $array_detalle['IMAGENES']);

										foreach( $imgs as $indice => $valor){
												$valor = trim($valor); //quito todos los malditos espacios
								?>
											<li>
												<img src="uploads/<?php echo $valor; ?>" alt="<?php echo $valor; ?>"/>
											</li>
											
								<?php
										}										
									//endwhile;
									}
								?>							
							</ul>
						</div>
					</div>

					<div class="infousuario">
						<div class="col-md-6 col-md-offset-3">
							<!--<img src="https://yt3.ggpht.com/-cjAi_YrRPCA/AAAAAAAAAAI/AAAAAAAAAAA/CvohcVRdIA0/s100-c-k-no-mo-rj-c0xffffff/photo.jpg" alt="foto del usuario" >-->
						</div>
						<h3><?php echo $nombre_completo; ?></h3>
						<p>Email: <?php echo $array_detalle['EMAIL']; ?></p> 
					</div>
				</div>
			</div>
		</div>

		
		
	</div>
</section>
<?php
	endwhile;
?>

<section class="section--home--comentarios">
	<div class="container">
		<div class="row">
			<div class="col-md-7 comentarios">
				<h3>COMENTARIOS</h3>
				<?php
					if(mysqli_num_rows($r2) == 0){
						echo "<p> La publicación no tiene comentarios</p>";
					} else {
						while($array_comentarios = mysqli_fetch_assoc($r2)):
							$comentario = $array_comentarios['COMENTARIO'];
							$comentario = strip_tags($comentario);
							$comentario = nl2br($comentario);
							$comentario = trim($comentario);
							//$comentario = utf8_decode($comentario);		
						?>
						<div class="comment">
							<h4><?php echo $array_comentarios['NICK'] ?></h4>
							<span><?php echo $array_comentarios['FECHA_COMENTARIO'] ?></span>
							<p><?php echo $comentario ?></p>
							<?php
								if (isset($_SESSION['NICK'])) {
									if($_SESSION['NICK'] == $array_comentarios['NICK']){
							?>
										<a href="acciones/eliminar_comentario_usuario.php?vid=<?php echo $post_id ?>&id=<?php echo $array_comentarios['IDCOMENTARIO'] ?>">
											Eliminar
										</a>
							<?php
									}
								}
							?>
						</div>
					<?php endwhile; }	?>
					
				<?php if(isset($_SESSION['IDUSUARIOS'])): ?>
				<h3>NUEVO COMENTARIO</h3>
				<form action="acciones/comentar.php" method="post">
					<textarea cols="50" rows="10" name="comentario"></textarea>
					<input type="hidden" name="post" value="<?php echo $post_id ?>">
					<div class="row">
						<div class="col-sm-8"></div>
						<div class="col-sm-4">
							<input class="btn_ok btn-xs" type="submit" value="enviar">
						</div>
					</div>
				</form>
			<?php else: ?>
				<p>Para comentar es necesario iniciar sesión.</p>
			<?php endif; ?>
			</div>
		</div>
	</div>
</section>
