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
		u.NOMBRE_COMPLETO AS USUARIO,
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
		NOMBRE_COMPLETO,
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

	<a href="acciones/exportar_pdf.php">Exportar en PDF</a>

  	<div class="row">
		<div id="contadorvideitos" class="col-md-12">
			<p>
				<span>
					<?php echo $a_categorias['TOTAL']; ?>
				</span>
				POSTS
			</p>
		</div>

		<div class="col-md-12" id="estadistica">
			<h3>Últimos comentarios</h3>
			<ul>
				<?php
					while($a_comentarios = mysqli_fetch_assoc($f2)):
						$comentario = $a_comentarios['COMENTARIO'];
						$comentario = strip_tags($comentario);
						$comentario = nl2br($comentario);
						$comentario = trim($comentario);
				?>
					<li><?php echo $a_comentarios['USUARIO'] ?>: <?php echo $comentario ?> (<?php echo $a_comentarios['TITULO'] ?>)</li>
				<?php endwhile; ?>
			</ul>

			<h3>Últimos posts</h3>
			<ul>
				<?php
					while($a_posts = mysqli_fetch_assoc($f3)):
						$titulo = $a_posts['TITULO'];
						$titulo = strip_tags($titulo);
						$titulo = trim($titulo);
				?>
					<li><?php echo $titulo ?></li>
				<?php endwhile; ?>
			</ul>

			<h3>Nuevos usuarios</h3>
			<ul>
				<?php
					while($a_usuarios = mysqli_fetch_assoc($f4)):
				?>
					<li><?php echo $a_usuarios['NOMBRE_COMPLETO'] ?></li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>
