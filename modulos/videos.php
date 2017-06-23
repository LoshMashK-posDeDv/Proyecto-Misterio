<?php
	$consulta_videos = <<<SQL
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

	$r1 = mysqli_query($conexion, $consulta_videos);
?>

<?php
	//primer consulta
	$cantidad_por_pagina = 8;
	$pagina_actual = isset($_GET['p']) ? $_GET['p'] : 1; //lo que viene por get, el num de la pag cliqueada
	$inicio_paginador = ($pagina_actual - 1) * $cantidad_por_pagina; //cantidad que debe saltear


	//segunda consulta: cant de videos que hay
	$consulta_cant_videos = <<<SQL
		SELECT
			COUNT(IDARTICULO) AS CANTIDAD
		FROM
			articulos
		WHERE
			A_ESTADO = 1
SQL;
	$cantidad_videos = mysqli_query ($conexion, $consulta_cant_videos);
	//var_dump($cantidad_videos);
	$array_videos2 = mysqli_fetch_assoc ($cantidad_videos);
	$cantidad_resultados = $array_videos2['CANTIDAD'];

	$total_links = ceil ($cantidad_resultados / $cantidad_por_pagina);

	//verificacion de cantidad de paginas
	if($pagina_actual > $total_links or $pagina_actual < 1){
		echo 'Pediste una página inexistente';
	} else {
		$consulta_videos = <<<SQL
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

	$respuesta_videos = mysqli_query($conexion, $consulta_videos);
	
?>

<div class="container">

	<div class="paginador clear">
		<ul class="paginator">
		<?php 
			$pag_anterior = $pagina_actual - 1;
			if( $pag_anterior > 0 ){
			?>
			<li><a href="index.php?s=videos&p=<?php echo $pag_anterior; ?>">&larr;</a></li> 
			
			<?php 

			} 

			for( $i = 1; $i <= $total_links; $i++ ){
			$activo = $pagina_actual == $i ? 'class="pag_activa"':'';
			
			echo '<li><a href="index.php?s=videos&p='.$i.'" '.$activo.'>'.$i.'</a></li> ';
			
			}
			
		?>
			
		<?php 
		
			$pag_siguiente = $pagina_actual + 1;
			if( $pag_siguiente <= $total_links ){
		
		?>
		
			<li><a href="index.php?s=videos&p=<?php echo $pag_siguiente ?>">&rarr;</a></li>
		
		<?php } ?>
		
		</ul>
	</div>

	<div class="seccion--videos">

		<?php
			while($array_videos = mysqli_fetch_assoc($respuesta_videos)) {
		?>
		<article class="seccion--videos__video">
			<div class="seccion--videos__img">
				<a href="index.php?s=video&vid=<?php echo $array_videos['IDARTICULO']; ?>">
					<img src="uploads/<?php echo $array_videos['IMG_DESTACADA'] ?>">
				</a>
			</div>
			<div class="seccion--videos__txt">
				<h3 class="seccion--videos__title">
					<a href="index.php?s=video&vid=<?php echo $array_videos['IDARTICULO']; ?>">
						<?php echo $array_videos['TITULO'] ?>					
					</a>
				</h3>
				<p class="seccion--videos__desc"><?php echo trim_desc($array_videos['DESCRIPCION']); ?></p>
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
			<li><a href="index.php?s=videos&p=<?php echo $pag_anterior; ?>">&larr;</a></li> 
			
			<?php 

			} 

			for( $i = 1; $i <= $total_links; $i++ ){
			$activo = $pagina_actual == $i ? 'class="pag_activa"':'';
			
			echo '<li><a href="index.php?s=videos&p='.$i.'" '.$activo.'>'.$i.'</a></li> ';
			
			}
			
		?>
			
		<?php 
		
			$pag_siguiente = $pagina_actual + 1;
			if( $pag_siguiente <= $total_links ){
		
		?>
		
			<li><a href="index.php?s=videos&p=<?php echo $pag_siguiente ?>">&rarr;</a></li>
		
		<?php } ?>
		
		</ul>
	</div>

</div>

<?php } ?>