<section class="section--home--proyecto container-fluid">
	<div class="section--home--proyecto__title">
		<h2>El proyecto</h2>
	</div>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
</section>

<section class="section--home--videos container">
	<div class="row">
		<?php
			$consulta_videos = <<<SQL
			SELECT
				TITULO,
				DESCRIPCION,
				IMG_DESTACADA
			FROM
				articulos
			ORDER BY
				IDARTICULO
				DESC
			LIMIT 3
SQL;

			$r1 = mysqli_query($conexion, $consulta_videos);

			while($array_videos = mysqli_fetch_assoc($r1)){
		?>
		
		<article class="col-md-4 home__videos">
			<div class="home__videos__img">
				<img src="admin/uploads/<?php echo $array_videos['IMG_DESTACADA'] ?>">
			</div>
			<h3 class="home__videos__title"><?php echo $array_videos['TITULO'] ?></h3>
			<p class="home__videos__desc"><?php echo $array_videos['DESCRIPCION'] ?></p>
		</article>
		<?php
			}//cierre while
		?>
	</div>
</section>

<section class="section--home--info container">
	<div class="section--home--info__title">
		<h3>Otra info</h3>
	</div>
	<div class="row">
		<div class="col-md-4">
			<video controls>
				<source src="" type="">
				Tu navegador no soporta la reproducción de videos.
			</video>
		</div>
		<div class="col-md-8">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</div>
	</div>
</section>

<section class="section--home--quote container-fluid">
	<blockquote class="container">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
	</blockquote>
</section>

<section class="section--home--otros-videos container">
	<div class="section--home--otros-videos__title">
		<h3>Más cosas</h3>
	</div>
	<ul class="row">
		<li class="col-md-3">
			<video controls>
				<source src="" type="">
				Tu navegador no soporta la reproducción de videos.
			</video>
		</li>

		<li class="col-md-3">
			<video controls>
				<source src="" type="">
				Tu navegador no soporta la reproducción de videos.
			</video>
		</li>

		<li class="col-md-3">
			<video controls>
				<source src="" type="">
				Tu navegador no soporta la reproducción de videos.
			</video>
		</li>

		<li class="col-md-3">
			<video controls>
				<source src="" type="">
				Tu navegador no soporta la reproducción de videos.
			</video>
		</li>
	</ul>

	<p class="pull-right"><a href="#">Ver todos</a></p>
</section>