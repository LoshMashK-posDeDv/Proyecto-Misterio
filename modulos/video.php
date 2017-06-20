<?php

	$vid_id = $_GET['vid'];

	$consulta_video = <<<SQL
	SELECT
		*
	FROM
		articulos
	WHERE IDARTICULO = $vid_id
SQL;

	$r1 = mysqli_query($conexion, $consulta_video);

	$video = mysqli_fetch_array($r1);

	var_dump($video);

?>