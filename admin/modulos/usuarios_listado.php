<div class="seccion--admin-listado">

	<div class="section__title">
		<h2>Usuarios</h2>
		<!--<a href="index.php?s=agregar_usuario" class="section__title__action"><i class="glyphicon glyphicon-plus"></i> Agregar usuario</a>-->
	</div>

	<table class="admin_list">
		<thead>
			<tr class="admin_list__head">
				<th class="admin_list__head__image">Nombre completo</th>
				<th class="admin_list__head__author">Email</th>
				<th class="admin_list__head__date hidden-xs">Fecha de alta</th>
				<th class="admin_list__head__tipo">Tipo de usuario</th>
				<th class="admin_list__head__estado">Estado</th>
				<th class="admin_list__head__actions">Acción</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$usuarios = "SELECT	IDUSUARIOS,	NOMBRE_COMPLETO, EMAIL,	FECHA_ALTA,	U_ESTADO, FKPERMISOS FROM usuarios ORDER BY FECHA_ALTA DESC";

				$r_usuarios = mysqli_query($conexion, $usuarios);

				while($a_usuarios = mysqli_fetch_assoc($r_usuarios)):
			?>

				<tr class="admin_list__row">
					<td class="admin_list__row__image">
						<p>
							<?php echo $a_usuarios['NOMBRE_COMPLETO'] ?>
						</p>
					</td>

					<td class="admin_list__row__author">
						<p><?php echo $a_usuarios['EMAIL'] ?></p>
					</td>

					<td class="admin_list__row__date hidden-xs">
						<p>
							<?php echo $a_usuarios['FECHA_ALTA'] ?>
						</p>
					</td>

					<td class="admin_list__row__tipo">
						<form action="acciones/cambiar_permisos.php?i=<?php echo $a_usuarios['IDUSUARIOS'] ?>" method="post">
								<label class="tiposUser"><input type="radio" name="permiso" value="1" <?php echo $a_usuarios['FKPERMISOS'] == 1 ? 'checked' : '';  ?>> <span>Admin</span> </label>
								<label class="tiposUser"><input type="radio" name="permiso" value="2" <?php echo $a_usuarios['FKPERMISOS'] == 2 ? 'checked' : '';  ?>> <span>Usuario</span> </label>
								<button type="submit" class="btn btn-default refresh"><i class="glyphicon glyphicon-refresh"></i></button>
						</form>
					</td>

					<td class="admin_list__row__estado">
						<p>
							<?php
								$estado = $a_usuarios['U_ESTADO'] == 1 ? 'Activo' : 'Inactivo';
								echo $estado;
							?>
						</p>
					</td>

					<td class="admin_list__row__actions">
						<?php
							$estado_cont = $a_usuarios['U_ESTADO'] == 1 ? 'inactivo' : 'activo';
						?>
						<a class="<?php echo strtolower($estado); ?>" href="acciones/cambiar_estado_usuario.php?i=<?php echo $a_usuarios['IDUSUARIOS'] ?>" title="Cambiar estado a <?php echo $estado_cont; ?> ">
							<i class="glyphicon cajon"></i>
							<span class="sr-only"> cambiar estado </span>
						</a>

						<a class="eliminar" data-toggle="modal" data-target="#eliminar" title="Eliminar usuario">
							<img src="../images/iconos/bomba-negro.png" alt="ícono bomba" class="iconitos">
							<span class="sr-only"> borrar usuario </span>
						</a>
					</td>
				</tr>

			<?php
				endwhile;
			?>
		</tbody>
	</table>
</div>

<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p class="text-center">¿Desea eliminar al usuario?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="acciones/eliminar_usuario.php?i=<?php echo $a_usuarios['IDUSUARIOS'] ?>" class="btn btn-danger">Eliminar</a>
      </div>
    </div>
  </div>
</div>
