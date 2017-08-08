<?php
	if(isset($_GET['m'])){
		if($_GET['m'] == 'ok'){
			$mensaje = 'El post se actualizó correctamente';
			$class = 'exito';
		} else {
			$mensaje =  'Oops, Algo salió mal';
			$class = 'error';
		}
	}
?>

<div class="seccion--admin-listado">
	<?php if(isset($_GET['m'])) { ?>
		<p class="<?php echo $class; ?>">
			<?php echo $mensaje; ?>
		</p>
	<?php } ?>

	<div class="section__title">
		<h2>posts</h2>
		<a href="index.php?s=agregar_post" class="section__title__action"><i class="glyphicon glyphicon-plus"></i> Agregar post</a>
	</div>

	<table class="admin_list">
		<thead>
			<tr class="admin_list__head">
				<th class="admin_list__head__image">Captura</th>
				<th class="admin_list__head__name">Título</th>
				<th class="admin_list__head__author hidden-xs">Tipo de chuchería</th> 
				<th class="admin_list__head__date hidden-xs">Fecha</th>
				<th class="admin_list__head__actions">Acción</th>
			</tr>
		</thead>

		<tbody>
			<?php
				//primer consulta
				$cantidad_por_pagina = 10;
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
							IMG_DESTACADA,
							TITULO,
							DATE_FORMAT(a.FECHA_ALTA, "%d de %M de %Y") AS FECHA_ALTA,
							A_ESTADO,
							IDARTICULO,
							TIPO_CHUCHERIA
						FROM
							articulos AS a
						LEFT JOIN tipo_chucherias ON a.FKCHUCHERIA = tipo_chucherias.IDCHUCHERIA
						WHERE
							A_ESTADO = 1
						ORDER BY IDARTICULO DESC
						LIMIT $inicio_paginador, $cantidad_por_pagina
SQL;

				$respuesta_posts = mysqli_query($conexion, $consulta_posts);

				while($array_posts = mysqli_fetch_assoc($respuesta_posts)):
			?>
			<tr class="admin_list__row">
				<td class="admin_list__row__image"><img src="../uploads/<?php echo $array_posts['IMG_DESTACADA'] ?>" alt="<?php echo $array_posts['TITULO'] ?>"></td>
				<td class="admin_list__row__name"><p><?php echo $array_posts['TITULO'] ?></p></td>
				<td class="admin_list__row__author hidden-xs"><p><?php echo $array_posts['TIPO_CHUCHERIA'] ?></p></td>
				<td class="admin_list__row__date hidden-xs"><p><?php echo traducir_mes($array_posts['FECHA_ALTA']) ?></p></td>
				<td class="admin_list__row__actions">
					<a href="index.php?s=editar_post&i=<?php echo $array_posts['IDARTICULO'] ?>" title="Editar post"><i class="glyphicon glyphicon-pencil"></i></a>
					<a href="acciones/eliminar_post.php?i=<?php echo $array_posts['IDARTICULO'] ?>" title="Eliminar post"><i class="glyphicon glyphicon-remove"></i></a>
				</td>
			</tr>
			<?php
		endwhile;
				} //cierre del else de la verificacion
			?>
		</tbody>
	</table>

	<!-- PAGINADOR MÁGICO -->

	<div class="paginador clear">
		<ul class="paginator">
		<?php
			$pag_anterior = $pagina_actual - 1;
			if( $pag_anterior > 0 ){
			?>
			<li><a href="index.php?s=posts_listado&p=<?php echo $pag_anterior; ?>">&larr;</a></li>

			<?php

			}

			for( $i = 1; $i <= $total_links; $i++ ){
			$activo = $pagina_actual == $i ? 'class="pag_activa"':'';

			echo '<li><a href="index.php?s=posts_listado&p='.$i.'" '.$activo.'>'.$i.'</a></li> ';

			}

		?>

		<?php

			$pag_siguiente = $pagina_actual + 1;
			if( $pag_siguiente <= $total_links ){

		?>

			<li><a href="index.php?s=posts_listado&p=<?php echo $pag_siguiente ?>">&rarr;</a></li>

		<?php } ?>

		</ul>
	</div>

</div>
