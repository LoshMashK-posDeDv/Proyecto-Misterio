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
	LEFT JOIN usuarios u ON a.FKUSUARIO = u.IDUSUARIOS
	WHERE IDARTICULO = $vid_id
SQL;

	$r1 = mysqli_query($conexion, $consulta_video);

	//$video = mysqli_fetch_array($r1);

	//echo $consulta_video;
	
	
	while($array_detalle = mysqli_fetch_assoc($r1)):
		$separar_video = explode(".", $array_detalle['VIDEO']);
?>


<div class="jumbotron" id="contenedorVideo">
</div>

<section class="section--home--proyecto">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<video class="videito" controls>
					<source src="uploads/<?php echo $array_detalle['VIDEO'] ?>" type="video/<?php echo $separar_video[1] ?>">
					Tu navegador no soporta la reproducción de videos.
				</video>
			</div>
			<div class="col-md-6 col-md-offset-1 idvideito">
				<h2><?php echo $array_detalle['TITULO'] ?></h2>
				<ul>
					<li><?php echo traducir_mes($array_detalle['FECHA']); ?></li>
					<li><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></li>
				</ul>
				<div class="desc">
					<p><?php echo $array_detalle['DESCRIPCION'] ?></p>					
				</div>

				<ul>
					<li>DURACIÓN: <?php echo $array_detalle['DURACION'] ?> min</li>
					<li>AÑO: <?php echo $array_detalle['AÑO'] ?></li>
				</ul>

			</div>
			<div class="col-md-3 col-md-offset-1 infousuario">
				<div class="col-md-12">
					<div class="col-md-6 col-md-offset-3">
					<!--<img src="https://yt3.ggpht.com/-cjAi_YrRPCA/AAAAAAAAAAI/AAAAAAAAAAA/CvohcVRdIA0/s100-c-k-no-mo-rj-c0xffffff/photo.jpg" alt="foto del usuario" >-->
					</div>
				</div>
				<h3><?php echo $array_detalle['NOMBRE_COMPLETO']; ?></h3>
				<p>Email: <?php echo $array_detalle['EMAIL']; ?></p>
			</div>
		</div>
	</div>
</section>
<?php
	endwhile;
?>




<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-md-offset-1 comentarios">
				<div class="col-md-12">
				<h3>COMENTARIOS</h3>
				<div class="col-md-12">
					<h4>Marty McFly</h4>
					<span>15/05/2017</span>
					<p>I know Doc...but I had to c… But its good to see ya, Marty. (They hug.) Marty, you're gonna have to do something about those clothes. You walk around town dressed like that and you're liable to get shot. (rubs his neck) Or hanged. What idiot dressed you in that outfit? (smiles and claps Doc on the shoulder) You did.</p>
				</div>
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
			</div>
			<div class="col-md-12">
				<h3>NUEVO COMENTARIO</h3>
				<form>
					<span>NOMBRE</span>
					<input type="text" name="nombre">
					<span>COMENTARIO</span>
					<textarea cols="50" rows="10"></textarea>

					<div class="col-md-3 col-md-offset-9">
						<button class="btn respoboton" type="button">ENVIAR</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
</section>