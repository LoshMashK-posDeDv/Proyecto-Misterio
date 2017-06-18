<div class="section__title">
	<h2>Videos</h2>
	<a href="index.php?s=agregar_video" class="section__title__action"><i class="glyphicon glyphicon-plus"></i> Agregar video</a>
</div>

<table class="video_list">
	<thead>
		<tr class="video_list__head">
			<th class="video_list__head__image">Captura</th>
			<th class="video_list__head__name">Título</th>
			<th class="video_list__head__author hidden-xs">Autor</th>
			<th class="video_list__head__date hidden-xs">Fecha</th>
			<th class="video_list__head__actions">Acción</th>
		</tr>
	</thead>

	<tbody>
		<?php
			$consulta_videos = <<<SQL
				SELECT
					IMG_DESTACADA,
					TITULO,
					AUTOR,
					FECHA_ALTA,
					A_ESTADO,
					IDARTICULO
				FROM
					articulos
				ORDER BY FECHA_ALTA
SQL;
	
			$respuesta_videos = mysqli_query($conexion, $consulta_videos);		
			

			while($array_videos = mysqli_fetch_assoc($respuesta_videos)):
		?>
		<tr class="video_list__row">
			<td class="video_list__row__image"><img src="<?php echo $array_videos['IMG_DESTACADA'] ?>"></td>
			<td class="video_list__row__name"><p><?php echo $array_videos['TITULO'] ?></p></td>
			<td class="video_list__row__author hidden-xs"><p><?php echo $array_videos['AUTOR'] ?></p></td>
			<td class="video_list__row__date hidden-xs"><p><?php echo $array_videos['FECHA_ALTA'] ?></p></td>
			<td class="video_list__row__actions">
				<a href="index.php?s=editar_video&i=<?php echo $array_videos['IDARTICULO'] ?>" title="Editar video"><i class="glyphicon glyphicon-pencil"></i></a>
				<a href="#" title="Eliminar video"><i class="glyphicon glyphicon-remove"></i></a>
			</td>
		</tr>
		<?php
			endwhile;
		?>
	</tbody>
</table>