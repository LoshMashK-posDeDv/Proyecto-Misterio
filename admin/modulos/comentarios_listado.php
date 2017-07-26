<?php
	if(isset($_GET['m'])){
		if($_GET['m'] == 'ok'){
			$mensaje = 'El comentario se eliminó correctamente';
			$class = 'exito';
		} else {
			$mensaje =  'Oops, Algo salió mal';
			$class = 'error';
		}
	}

	$consulta =
		"SELECT
			COMENTARIO,
			FECHA_COMENTARIO as FECHA,
			C_ESTADO as ESTADO,
			u.NOMBRE_COMPLETO as NOMBRE,
			IDCOMENTARIO as ID
		FROM
			comentarios as c
		JOIN usuarios as u ON c.FKUSUARIO = u.IDUSUARIOS
		WHERE C_ESTADO = 1
		ORDER BY FECHA DESC";
	$respuesta = mysqli_query($conexion, $consulta);
?>
<div class="seccion--admin-listado">

	<?php
		if(isset($_GET['m'])):
	?>
		<p class="<?php echo $class; ?>">
			<?php echo $mensaje; ?>
		</p>
	<?php
	endif;
	?>

	<div class="section__title">
		<h2>Comentarios</h2>
	</div>

	<table class="admin_list">
		<thead>
			<tr class="admin_list__head">
				<th class="admin_list__head__name">Nombre de usuario</th>
				<th class="admin_list__head__date">Fecha de alta</th>
				<th class="admin_list__head__comentario">Comentario</th>
				<th class="admin_list__head__estado">Estado</th>
				<th class="admin_list__head__actions">Acción</th>
			</tr>
		</thead>

		<tbody>
			<?php
				while($array = mysqli_fetch_assoc($respuesta)):
			?>
			<tr class="admin_list__row">

				<td class="admin_list__row__name">
					<p>
						<?php echo $array['NOMBRE']; ?>
					</p>
				</td>

				<td class="admin_list__row__date">
					<p>
						<?php echo $array['FECHA']; ?>
					</p>
				</td>

				<td class="admin_list__head__comentario">
					<p>
					<?php echo $array['COMENTARIO']; ?>
					</p>
				</td>

				<td class="admin_list__row__estado">
					<p>
						Publicado
					</p>
				</td>

				<td class="admin_list__row__actions">
					<a class="" href="acciones/eliminar_comentario.php?id=<?php echo $array['ID'] ?>" title="Eliminar">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
					<!--
					Lo oculto porque no se que hace el botón
					<a class="" href="#" title="Ocultar">
						<i class="glyphicon glyphicon-remove"></i>
					</a>
					-->
				</td>
			</tr>
			<?php
				endwhile;
			?>
		</tbody>
	</table>
</div>
