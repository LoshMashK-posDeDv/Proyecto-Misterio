
<div class="seccion--admin-listado">

	<div class="section__title">
		<h2>Usuarios</h2>
		<!--<a href="index.php?s=agregar_usuario" class="section__title__action"><i class="glyphicon glyphicon-plus"></i> Agregar usuario</a>-->
	</div>

	<table class="admin_list">
		<thead>
			<tr class="admin_list__head">
				<th class="admin_list__head__image">Nombre completo</th>
				<th class="admin_list__head__name">Nombre de usuario</th>
				<th class="admin_list__head__author">Email</th>				
				<th class="admin_list__head__date hidden-xs">Fecha de alta</th>
				<th class="admin_list__head__tipo">Tipo de usuario</th>
				<th class="admin_list__head__estado">Estado</th>
				<th class="admin_list__head__actions">Acción</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$usuarios = "SELECT	IDUSUARIOS,	NOMBRE_USUARIO,	NOMBRE_COMPLETO, EMAIL,	FECHA_ALTA,	U_ESTADO, FKPERMISOS FROM usuarios ORDER BY FECHA_ALTA DESC";

				$r_usuarios = mysqli_query($conexion, $usuarios);

				while($a_usuarios = mysqli_fetch_assoc($r_usuarios)):			
			?>

				<tr class="admin_list__row">
					<td class="admin_list__row__image">
						<p>
							<?php echo $a_usuarios['NOMBRE_COMPLETO'] ?>					
						</p>
					</td>

					<td class="admin_list__row__name">
						<p><?php echo $a_usuarios['NOMBRE_USUARIO'] ?></p>
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
						<p>
							<?php 
								$permiso = $a_usuarios['FKPERMISOS'] == 1 ? 'Admin' : 'Usuario';	
								echo $permiso; 
							?>					
						</p>
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
						<a class="<?php echo strtolower($estado); ?>" href="acciones/usuario_status.php?i=<?php echo $a_usuarios['IDUSUARIOS'] ?>" title="Cambiar estado a <?php echo $estado_cont; ?> ">
							<i class="glyphicon glyphicon-flag"></i>
						</a>
					</td>
				</tr>

			<?php
				endwhile;
			?>
		</tbody>
	</table>
</div>
