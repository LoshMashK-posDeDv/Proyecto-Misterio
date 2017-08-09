<?php
	include("../../setup/config.php");

	$i_user = $_GET['i'];
	$c_user = <<<SQL
		UPDATE
			usuarios
		SET
			U_ESTADO = ( -1 * (U_ESTADO -1))
		WHERE
			IDUSUARIOS = '$i_user'
		LIMIT 1
SQL;

	mysqli_query($conexion, $c_user);

	
	$u = 'up';
	
	header("Location: ../index.php?s=usuarios_listado&d=$u#user_$i_user");
?>
