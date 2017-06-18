		<section>
			<article>
				<h2>El proyecto</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
			</article>
		</section>

		<section>
			<?php
				$consulta_videos = <<<SQL
				SELECT
					TITULO,
					DESCRIPCION,
					IMG_DESTACADA
				FROM
					articulos
				LIMIT 3
SQL;

				$r1 = mysqli_query($conexion, $consulta_videos);

				while($array_videos = mysqli_fetch_assoc($r1)){
			?>
			
			<article>
				<img src="<?php echo $array_videos['IMG_DESTACADA'] ?>">
				<h3><?php echo $array_videos['TITULO'] ?></h3>
				<p><?php echo $array_videos['DESCRIPCION'] ?></p>
			</article>
			<?php
				}//cierre while
			?>
			<!--<article>
				<img src="http://placehold.it/50x50">
				<h3>Titulo A</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</article>

			<article>
				<img src="http://placehold.it/50x50">
				<h3>Titulo B</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</article>

			<article>
				<img src="http://placehold.it/50x50">
				<h3>Titulo C</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</article>-->
		</section>

		<section>
			<h2>Otra info</h2>
			<video controls>
				<source src="" type="">
				Tu navegador no soporta la reproducción de videos.
			</video>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
			<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</section>

		<blockquote>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		</blockquote>

		<section>
			<h2>Más cosas</h2>
			<ul>
				<li>
					<video controls>
						<source src="" type="">
						Tu navegador no soporta la reproducción de videos.
					</video>
				</li>

				<li>
					<video controls>
						<source src="" type="">
						Tu navegador no soporta la reproducción de videos.
					</video>
				</li>

				<li>
					<video controls>
						<source src="" type="">
						Tu navegador no soporta la reproducción de videos.
					</video>
				</li>

				<li>
					<video controls>
						<source src="" type="">
						Tu navegador no soporta la reproducción de videos.
					</video>
				</li>
			</ul>

			<p><a href="#">Ver todos</a></p>
		</section>