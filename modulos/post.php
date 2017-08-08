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
		NICK,
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
			u.NOMBRE_COMPLETO AS NOMBRE,
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

	$r1 = mysqli_query($conexion, $consulta_post);
	$r2 = mysqli_query($conexion, $consulta_comentarios);
	$r3 = mysqli_query($conexion, $consulta_categoria);
	
	while($array_detalle = mysqli_fetch_assoc($r1)):
		$separar_post = explode(".", $array_detalle['VIDEO']);
		$descripcion = $array_detalle['DESCRIPCION'];
		$descripcion = nl2br($descripcion);
		$descripcion = strip_tags($descripcion);
?>


<div class="jumbotron" id="contenedorpost">
</div>

<section class="section--home--proyecto">
	<div class="container">

		<div class="row">

			<div class="col-sm-6">
				<?php if($array_detalle['VIDEO'] != null){
					?>
					<post class="videito" controls>
					<source src="uploads/<?php echo $array_detalle['post'] ?>" type="post/<?php echo $separar_post[1] ?>">
					Tu navegador no soporta la reproducción de posts.
				</post>
				<?php
				}else{
				?>	
					<img src="uploads/<?php echo $array_detalle['IMG_DESTACADA']; ?>" alt="<?php echo $array_detalle['TITULO']; ?>"/>
				<?php
				}
				?>
			</div>

			<div class="col-sm-6">
				<div class="post--info">
					<div class="idvideito">
						<h2><?php echo $array_detalle['TITULO'] ?></h2>
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
						<h3><?php echo $array_detalle['NOMBRE_COMPLETO']; ?></h3>
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
						while($array_comentarios = mysqli_fetch_assoc($r2)):?>
						<div class="comment">
							<h4><?php echo $array_comentarios['NOMBRE'] ?></h4>
							<span><?php echo $array_comentarios['FECHA_COMENTARIO'] ?></span>
							<p><?php echo $array_comentarios['COMENTARIO'] ?></p>
							<?php
								if(isset($_SESSION['NOMBRE_COMPLETO']) == $array_comentarios['NOMBRE']):
							?>
								<a href="acciones/eliminar_comentario_usuario.php?vid=<?php echo $post_id ?>&id=<?php echo $array_comentarios['IDCOMENTARIO'] ?>">Eliminar</a>
							<?php
								endif;
							?>
						</div>
					<?php endwhile; }	?>
				<!--

					ESTO POR AHORA NO VA

				<div class="col-md-11 col-md-offset-1">
					<h4>Biff</h4>
					<span>20/05/2017</span>
					<p>When I have kids, I'm going to let them do anything they want. Anything at all. (in the car) I'd like to have that in writing. (outside the car) Yeah, me too. (1985 Marty walks off to catch Strickland.) (o.s) Marty, why are you so nervous?</p>
				</div>
				<div class="col-md-11 col-md-offset-1">
					<h4>George McFly</h4>
					<span>11/06/2017</span>
					<p>Emmett! Hold on! Doc picks Clara up just in time. They are now safe on the hoverboard.) YES! (Marty watches as Doc and Clara, staring into each other's eyes, fly away from the Delorean. Marty slams the gull-wing door and get ready to travel back to the future. The Delorean hits 88 MPH and they shoot off into 1985. The locomotive, on fire, falls off the edge of the ravine.)</p>
					<div class="col-md-4 col-md-offset-8">
						<button class="btn respoboton" type="button">RESPONDER</button>
					</div>
				</div>
				-->
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
