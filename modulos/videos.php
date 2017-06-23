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

<div class="seccion--videos container">

	<?php
		while($array_videos = mysqli_fetch_assoc($r1)){
	?>
	<article class="seccion--videos__video">
		<div class="seccion--videos__img">
			<a href="index.php?s=video&vid=<?php echo $array_videos['IDARTICULO']; ?>"><img src="uploads/<?php echo $array_videos['IMG_DESTACADA'] ?>"></a>
		</div>
		<a href="index.php?s=video&vid=<?php echo $array_videos['IDARTICULO']; ?>"><h3 class="seccion--videos__title"><?php echo $array_videos['TITULO'] ?></h3></a>
		<p class="seccion--videos__desc"><?php echo trim_desc($array_videos['DESCRIPCION']); ?></p>
	</article>
	<?php
		} //cierre while
	?>

</div>