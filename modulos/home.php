
<section id="contenedorHome">
	<h1 class="hidden">El Calabozo del Androide</h1>
	<div class="sr-only">
		<h1>Tus posts apestan (y vos también)</h1>
		<p>Una web para que subas tus cosas de juegos, comics y demases...  Y todos los critiquemos porque apestan.|</p>
	</div>

</section>
<section class="section--home--proyecto">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2>BIENVENIDOS, SIMPLES MORTALES</h2>
				<p>Ahoy! Pasen! Pasen! En esta web van a <strong>poder subir posts, imágenes, reviews y lo que quieran de cualquier cosa relacionada a juegos y afines</strong>. Puede que algunos de ustedes vengan a presumir sus colecciones, pero <strong>sepan que van a ser juzgados y criticados sin piedad por el resto de los usuarios</strong>.</p>
				<p>Por favor tengan en cuenta que no queremos simplonadas, por lo cual <strong>cualquier usuario que postee muñecos truchos o su colección de Mi Pequeño Pony, será banneado de por vida</strong>.</p>
				<p>Que eso no te desaliente, después de todo, ¿qué sería de la vida del coleccionista sin los giles que piensan que sus Magic de Surrak vale un millón de dólares?</p>
			</div>
		</div>
	</div>
</section>

<section class="section--home--posts">

	<div class="container">
		<h3 class="u text-center">Los más vistos</h3>
			<?php
				$consulta_posts = <<<SQL
				SELECT
					IDARTICULO,
					UCASE(TITULO) AS TITULO,
					DESCRIPCION,
					IMG_DESTACADA
				FROM
					articulos
					WHERE A_ESTADO = 1 
				ORDER BY
					IDARTICULO
					DESC
				LIMIT 3
SQL;

			$r1 = mysqli_query($conexion, $consulta_posts);
			while($array_posts = mysqli_fetch_assoc($r1)){
				
				$descripcion = $array_posts['DESCRIPCION'];
				$descripcion = strip_tags($descripcion);
				$descripcion = nl2br($descripcion);
				//esta función está encaprichada y no quiere funcionar!
				//$descripcion = utf8_encode($descripcion);
				
				$titulo = $array_posts['TITULO'];
				$titulo = strip_tags($titulo);
				$titulo = trim($titulo);
				//$titulo = utf8_encode($titulo);
						
			?>


		<article class="col-md-4 home__posts">
			<div class="home__posts__img">
				<a href="index.php?s=post&vid=<?php echo $array_posts['IDARTICULO']; ?>">
					<img src="uploads/<?php echo $array_posts['IMG_DESTACADA'] ?>" alt="<?php echo $titulo ?>"
					>
				</a>
			</div>
			<h4 class="home__posts__title">
				<a href="index.php?s=post&vid=<?php echo $array_posts['IDARTICULO']; ?>">
					<?php echo $titulo ?>
				</a>
			</h4>
			<p class="home__posts__desc">
				<?php echo trim_desc($descripcion) ?>
			</p>
		</article>
		<?php
			}//cierre while
		?>
	
	</div>
</section>

<section class="section--home--info">
	<div class="container">
		<div class="row">
			<div class="section--home--info__title col-md-11 col-md-offset-1">
				<h3>ARTE DE BATALLA</h3>
			</div>
			<div class="col-md-5 col-md-offset-1">
					<iframe width="400" height="200" src="https://www.youtube.com/embed/8yxOUiAQHEk?list=PLDFywqJ_KSCKWUVsKhoC0dU4f2VzyA59Z" allowfullscreen></iframe>
			</div>
			<div class="col-md-5">
				<p>Este mes arrancan los torneos del juego de mesa argentino de estrategia Arte de Batalla.</p>
				<p>Por eso te desafiamos a que te aprendas las reglas y te sumes a la academia para que te pateen el trasero jugadores más experimentados.</p>
				<p>Podés venir a las academias que damos en El Calabozo, o te podés sumar a alguno de los muchos eventos que se están armando.</p>
			</div>
		</div>		
	</div>
</section>

<div class="section--home--quote">
	<div class="container">
		<blockquote>
			"A DARLE ÁTOMOS!"
		</blockquote>		
	</div>
</div>

<section class="section--home--posts bottom">
	<div class="container">
		<div class="section--home--posts__title">
			<h3>ÚLTIMOS POSTS</h3>
		</div>
		<div class="row">
		<?php
			$consulta_posts_b = <<<SQL
			SELECT
				IDARTICULO,
				UCASE(TITULO) AS TITULO,
				DESCRIPCION,
				VIDEO,
				IMG_DESTACADA
			FROM
				articulos
			WHERE A_ESTADO = 1 
			ORDER BY
				IDARTICULO
				DESC
			LIMIT 4
SQL;

		$r2 = mysqli_query($conexion, $consulta_posts_b);
		while($array_posts = mysqli_fetch_assoc($r2)){
				
			$titulo_b = $array_posts['TITULO'];
			$titulo_b = strip_tags($titulo_b);
			$titulo_b = trim($titulo_b);
			//$titulo_b = utf8_encode($titulo_b);

		?>
			<article class="col-md-3 home__posts">
				<div class="home__posts__img">
					<a href="index.php?s=post&vid=<?php echo $array_posts['IDARTICULO']; ?>">
						<img src="uploads/<?php echo $array_posts['IMG_DESTACADA'] ?>" alt="<?php echo $titulo_b ?>">
					</a>
				</div>
				<h4 class="home__posts__title">
					<a href="index.php?s=post&vid=<?php echo $array_posts['IDARTICULO']; ?>">
						<?php echo $titulo_b ?>					
					</a>
				</h4>
			</article>
			<?php } ?>
		</div>

		<p class="seccion--home--otros-posts__ver-todos">
			<a class="linki" href="?s=posts">Ver todos</a>
		</p>
		
	</div>
</section>
