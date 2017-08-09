<?php
	include("../../setup/config.php");

	$i_user = $_GET['i'];
	$d_user = <<<SQL
		DELETE FROM 
			usuarios
		WHERE
			IDUSUARIOS = '$i_user'
		LIMIT 1
SQL;

	mysqli_query($conexion, $d_user);

	$d = 'elim';

	header("Location: ../index.php?s=usuarios_listado&d=$d#user_$i_user");
?>
