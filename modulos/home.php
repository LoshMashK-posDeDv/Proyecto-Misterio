
<section id="contenedorHome">
	<h1 class="hidden">Prisión &amp; Libertad</h1>

</section>
<section class="section--home--proyecto">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2>El proyecto</h2>
				<p>You cost three-hundred buck damage to my car, you son-of-a-bitch. And I'm gonna take it out of your ass. Hold him. Let him go, Biff, you're drunk. Well looky what we have here. No no no, you're staying right here with me. Stop it.</p>
				<p>Marty, you have to wear the boots. You can't wear those futuristic things in 1885. You shouldn't even be wearing them in 1955. (Indicating his Nike's.) All right, Doc, look. Once I get there I'll put them on, I promise. Okay, I think we're about ready. I put gas in the tank, your future clothes are packed, just in case fresh batteries for your walkie-talkies. Oh, and what about that floating device? Hoverboard. Alright. (he picks up the hoverboard and puts it in the Delorean.)</p>
			</div>
		</div>
	</div>
</section>

<section class="section--home--videos container">
			<?php
				$consulta_videos = <<<SQL
				SELECT
					IDARTICULO,
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
				<a href="index.php?s=video&vid=<?php echo $array_videos['IDARTICULO']; ?>"><img src="admin/uploads/<?php echo $array_videos['IMG_DESTACADA'] ?>"></a>
			</div>
			<a href="index.php?s=video&vid=<?php echo $array_videos['IDARTICULO']; ?>"><h3 class="home__videos__title"><?php echo $array_videos['TITULO'] ?></h3></a>
			<p class="home__videos__desc"><?php echo $array_videos['DESCRIPCION'] ?></p>
		</article>
		<?php
			}//cierre while
		?>


</section>

<section class="section--home--info container">
	<div class="row">
		<div class="section--home--info__title col-md-10 col-md-offset-1">
			<h3>Otra info</h3>
		</div>
		<div class="col-md-4 col-md-offset-1">
			<video controls>
				<source src="" type="">
					Tu navegador no soporta la reproducción de videos.
			</video>
		</div>
		<div class="col-md-6">
			<p>Yeah. (Saturday Morning) (George's Backyard) (George is hanging up laundry.) I still don't understand, how am I supposed to go to the dance with her, if she's already going to the dance with you.</p>
			<p>Hey! (Biff walks over to his car, where Terry the mechanic has fixed it. It's the same Terry from 2015 who asked Marty to donate money to save the clock tower- of course here he's 60 years younger.) Looking good Terry. Hey Biff, she's all fixed up just like you wanted, but I couldn't get it started! You got some kind of a kill switch on this thing?</p>
		</div>
	</div>
</section>

<section class="section--home--quote container-fluid">
	<blockquote class="container">
		Hey kid, thumb a hundred bucks will ya, help save the clock tower. I... Sorry, no. Another time.
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

	<p class="pull-right"><a class="linki" href="#">Ver todos</a></p>
</section>