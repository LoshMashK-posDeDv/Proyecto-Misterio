<?php

$c = <<<SQL
	SELECT
		COUNT(IDARTICULO) AS TOTAL
	FROM
		articulos
SQL;

$c2 = <<<SQL
	SELECT
		IDCOMENTARIO,
		COMENTARIO,
		FECHA_COMENTARIO,
		u.NOMBRE_USUARIO AS USUARIO,
		a.TITULO AS TITULO
	FROM
		comentarios AS c
	JOIN articulos AS a ON a.IDARTICULO = c.FKARTICULO
	JOIN usuarios AS u on u.IDUSUARIOS = c.FKUSUARIO
	ORDER BY FECHA_COMENTARIO DESC
	LIMIT 5
SQL;

$c3 = <<<SQL
	SELECT
		TITULO,
		FECHA_ALTA
	FROM
		articulos
	ORDER BY FECHA_ALTA DESC
	LIMIT 5
SQL;

$c4 = <<<SQL
	SELECT
		NOMBRE_USUARIO,
		FECHA_ALTA
	FROM
		usuarios
	ORDER BY FECHA_ALTA DESC
	LIMIT 5
SQL;

$f = mysqli_query($conexion, $c);
$a_categorias = mysqli_fetch_assoc($f);

$f2 = mysqli_query($conexion, $c2);

$f3 = mysqli_query($conexion, $c3);

$f4 = mysqli_query($conexion, $c4);

?>
<div class="seccion--dashboard">

	<h2>ACTIVIDAD RECIENTE</h2>

  	<div class="row">		
		<div id="contadorvideitos" class="col-md-12">
			<p>
				<span>
					<?php echo $a_categorias['TOTAL']; ?>		
				</span> 
				VIDEOS
			</p>
		</div>

		<div class="col-md-12" id="estadistica">
			<h3>Últimos comentarios</h3>
			<ul>
				<?php
					while($a_comentarios = mysqli_fetch_assoc($f2)):
				?>
					<li><?php echo $a_comentarios['USUARIO'] ?>: <?php echo $a_comentarios['COMENTARIO'] ?> (<?php echo $a_comentarios['TITULO'] ?>)</li>
				<?php endwhile; ?>
			</ul>

			<h3>Últimos videos</h3>
			<ul>
				<?php
					while($a_videos = mysqli_fetch_assoc($f3)):
				?>
					<li><?php echo $a_videos['TITULO'] ?></li>
				<?php endwhile; ?>
			</ul>

			<h3>Nuevos usuarios</h3>
			<ul>
				<?php
					while($a_usuarios = mysqli_fetch_assoc($f4)):
				?>
					<li><?php echo $a_usuarios['NOMBRE_USUARIO'] ?></li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>
