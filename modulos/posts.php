<?php
	$consulta_posts = <<<SQL
	SELECT
		IDARTICULO,
		UCASE(TITULO) AS TITULO,
		DESCRIPCION,
		IMG_DESTACADA
	FROM
		articulos
	ORDER BY
		IDARTICULO
		DESC
SQL;

	$r1 = mysqli_query($conexion, $consulta_posts);
?>

<?php
	//primer consulta
	$cantidad_por_pagina = 8;
	$pagina_actual = isset($_GET['p']) ? $_GET['p'] : 1; //lo que viene por get, el num de la pag cliqueada
	$inicio_paginador = ($pagina_actual - 1) * $cantidad_por_pagina; //cantidad que debe saltear


	//segunda consulta: cant de posts que hay
	$consulta_cant_posts = <<<SQL
		SELECT
			COUNT(IDARTICULO) AS CANTIDAD
		FROM
			articulos
		WHERE
			A_ESTADO = 1
SQL;
	$cantidad_posts = mysqli_query ($conexion, $consulta_cant_posts);
	//var_dump($cantidad_posts);
	$array_posts2 = mysqli_fetch_assoc ($cantidad_posts);
	$cantidad_resultados = $array_posts2['CANTIDAD'];

	$total_links = ceil ($cantidad_resultados / $cantidad_por_pagina);

	//verificacion de cantidad de paginas
	if($pagina_actual > $total_links or $pagina_actual < 1){
		echo 'Pediste una página inexistente';
	} else {
		$consulta_posts = <<<SQL
			SELECT
				IDARTICULO,
				UCASE(TITULO) AS TITULO,
				DESCRIPCION,
				IMG_DESTACADA
			FROM
				articulos
			WHERE
				A_ESTADO = 1
			ORDER BY IDARTICULO DESC
			LIMIT $inicio_paginador, $cantidad_por_pagina
SQL;

	$respuesta_posts = mysqli_query($conexion, $consulta_posts);
	
?>

<div class="container">
	<h2 class="u text-left">Listado de posts</h2>
	<div class="paginador clear">
		<!--<ul class="paginator">
		<?php 
			$pag_anterior = $pagina_actual - 1;
			if( $pag_anterior > 0 ){
			?>
			<li><a href="index.php?s=posts&p=<?php echo $pag_anterior; ?>">&larr;</a></li> 
			
			<?php 

			} 

			for( $i = 1; $i <= $total_links; $i++ ){
			$activo = $pagina_actual == $i ? 'class="pag_activa"':'';
			
			echo '<li><a href="index.php?s=posts&p='.$i.'" '.$activo.'>'.$i.'</a></li> ';
			
			}
			
		?>
			
		<?php 
		
			$pag_siguiente = $pagina_actual + 1;
			if( $pag_siguiente <= $total_links ){
		
		?>
		
			<li><a href="index.php?s=posts&p=<?php echo $pag_siguiente ?>">&rarr;</a></li>
		
		<?php } ?>
		
		</ul>-->
	</div>

	<div class="seccion--posts">

		<?php
			while($array_posts = mysqli_fetch_assoc($respuesta_posts)) {
		?>
		<article class="seccion--posts__post">
			<div class="seccion--posts__img">
				<a href="index.php?s=post&vid=<?php echo $array_posts['IDARTICULO']; ?>">
					<img src="uploads/<?php echo $array_posts['IMG_DESTACADA'] ?>" alt="<?php echo $array_posts['TITULO'] ?>">
				</a>
			</div>
			<div class="seccion--posts__txt">
				<h3 class="seccion--posts__title">
					<a href="index.php?s=post&vid=<?php echo $array_posts['IDARTICULO']; ?>">
						<?php echo $array_posts['TITULO'] ?>					
					</a>
				</h3>
				<p class="seccion--posts__desc"><?php echo trim_desc($array_posts['DESCRIPCION']); ?></p>
			</div>
		</article>
		<?php
			} //cierre while
		?>

	</div>

	<div class="paginador clear">
		<ul class="paginator">
		<?php 
			$pag_anterior = $pagina_actual - 1;
			if( $pag_anterior > 0 ){
			?>
			<li><a href="index.php?s=posts&p=<?php echo $pag_anterior; ?>">&larr;</a></li> 
			
			<?php 

			} 

			for( $i = 1; $i <= $total_links; $i++ ){
			$activo = $pagina_actual == $i ? 'class="pag_activa"':'';
			
			echo '<li><a href="index.php?s=posts&p='.$i.'" '.$activo.'>'.$i.'</a></li> ';
			
			}
			
		?>
			
		<?php 
		
			$pag_siguiente = $pagina_actual + 1;
			if( $pag_siguiente <= $total_links ){
		
		?>
		
			<li><a href="index.php?s=posts&p=<?php echo $pag_siguiente ?>">&rarr;</a></li>
		
		<?php } ?>
		
		</ul>
	</div>

</div>

<?php } ?>