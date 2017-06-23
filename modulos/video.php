<?php

	$vid_id = isset($_GET['vid']) ? $_GET['vid'] : 0 ;

	$consulta_video = <<<SQL
	SELECT
		IDARTICULO,
		UCASE(TITULO) AS TITULO,
		AUTOR,
		AÑO,
		DURACION,
		DATE_FORMAT(a.FECHA_ALTA, "%d de %M de %Y") AS FECHA,
		VIDEO,
		IMAGENES,
		IMG_DESTACADA,
		DESCRIPCION,
		NOMBRE_COMPLETO,
		EMAIL
	FROM
		articulos a
	LEFT JOIN usuarios AS u ON a.FKUSUARIO = u.IDUSUARIOS
	WHERE IDARTICULO = $vid_id
SQL;

	$consulta_comentarios = <<<SQL
		SELECT
			COMENTARIO,
			FECHA_COMENTARIO,
			u.NOMBRE_COMPLETO AS NOMBRE
		FROM
			comentarios as c
		JOIN usuarios as u ON c.FKUSUARIO = u.IDUSUARIOS
		WHERE c.FKARTICULO = $vid_id
SQL;

	$r1 = mysqli_query($conexion, $consulta_video);
	$r2 = mysqli_query($conexion, $consulta_comentarios);
	//$video = mysqli_fetch_array($r1);

	//echo $consulta_video;


	while($array_detalle = mysqli_fetch_assoc($r1)):
		$separar_video = explode(".", $array_detalle['VIDEO']);
?>


<div class="jumbotron" id="contenedorVideo">
</div>

<section class="section--home--proyecto">
	<div class="container">

		<div class="row">

			<div class="col-sm-12">
				<video class="videito" controls>
					<source src="uploads/<?php echo $array_detalle['VIDEO'] ?>" type="video/<?php echo $separar_video[1] ?>">
					Tu navegador no soporta la reproducción de videos.
				</video>
			</div>
		</div>

		<div class="video--info">
			<div class="row">
				<div class="col-md-7 idvideito">

					<h2><?php echo $array_detalle['TITULO'] ?></h2>
					<ul>
						<li><?php echo traducir_mes($array_detalle['FECHA']); ?></li>
						<!--<li><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></li>-->
					</ul>

					<div class="desc">
						<p><?php echo $array_detalle['DESCRIPCION'] ?></p>
					</div>

					<ul>
						<li>DURACIÓN: <?php echo $array_detalle['DURACION'] ?> min</li>
						<li>AÑO: <?php echo $array_detalle['AÑO'] ?></li>
					</ul>

				</div>
				<div class="col-md-4 col-md-offset-1">
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
						</div>
					<?php endwhile; } ?>
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
					<!--<span>NOMBRE</span>
					<input type="text" name="nombre">
					<span>COMENTARIO</span>-->
					<textarea cols="50" rows="10" name="comentario"></textarea>
					<input type="hidden" name="video" value="<?php echo $vid_id ?>">
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
