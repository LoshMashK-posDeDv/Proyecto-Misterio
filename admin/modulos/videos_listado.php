<div class="section__title">
	<h2>Videos</h2>
	<a href="#" class="section__title__action"><i class="glyphicon glyphicon-plus"></i> Agregar video</a>
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
					A_ESTADO
				FROM
					articulos
SQL;
			echo $consulta_videos;
			$respuesta_videos = mysqli_query($conexion, $consulta_videos);
			var_dump($respuesta_videos);
			
			/*while($array_videos = mysql_fetch_assoc($respuesta_videos)){
				echo $array_videos['TITULO'];
			};
			var_dump($respuesta_videos);
			echo mysqli_error($conexion);*/
		?>
		<tr class="video_list__row">
			<td class="video_list__row__image"><img src="http://placehold.it/100x80"></td>
			<td class="video_list__row__name"><p>Lorem ipsum dolor sit amet.</p></td>
			<td class="video_list__row__author hidden-xs"><p>Admin</p></td>
			<td class="video_list__row__date hidden-xs"><p>21/01/2017</p></td>
			<td class="video_list__row__actions">
				<a href="#" title="Editar video"><i class="glyphicon glyphicon-pencil"></i></a>
				<a href="#" title="Eliminar video"><i class="glyphicon glyphicon-remove"></i></a>
			</td>
		</tr>
		<tr class="video_list__row">
			<td class="video_list__row__image"><img src="http://placehold.it/100x80"></td>
			<td class="video_list__row__name"><p>Lorem ipsum dolor sit amet.</p></td>
			<td class="hidden-xs"><p>Admin</p></td>
			<td class="hidden-xs"><p>21/01/2017</p></td>
			<td class="video_list__row__actions"><a href="#"><i class="glyphicon glyphicon-remove"></i></a></td>
		</tr>
		<tr class="video_list__row">
			<td class="video_list__row__image"><img src="http://placehold.it/100x80"></td>
			<td class="video_list__row__name"><p>Lorem ipsum dolor sit amet.</p></td>
			<td class="hidden-xs"><p>Admin</p></td>
			<td class="hidden-xs"><p>21/01/2017</p></td>
			<td class="video_list__row__actions"><a href="#"><i class="glyphicon glyphicon-remove"></i></a></td>
		</tr>
		<tr class="video_list__row">
			<td class="video_list__row__image"><img src="http://placehold.it/100x80"></td>
			<td class="video_list__row__name"><p>Lorem ipsum dolor sit amet.</p></td>
			<td class="hidden-xs"><p>Admin</p></td>
			<td class="hidden-xs"><p>21/01/2017</p></td>
			<td class="video_list__row__actions"><a href="#"><i class="glyphicon glyphicon-remove"></i></a></td>
		</tr>
		<tr class="video_list__row">
			<td class="video_list__row__image"><img src="http://placehold.it/100x80"></td>
			<td class="video_list__row__name"><p>Lorem ipsum dolor sit amet.</p></td>
			<td class="hidden-xs"><p>Admin</p></td>
			<td class="hidden-xs"><p>21/01/2017</p></td>
			<td class="video_list__row__actions"><a href="#"><i class="glyphicon glyphicon-remove"></i></a></td>
		</tr>
	</tbody>
</table>