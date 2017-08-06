<?php
	include("../../setup/config.php");

	$i_user = $_GET['i'];
	$d_user = <<<ELIMINAR
		DELETE
      FROM usuarios  
		WHERE
			IDUSUARIOS = '$i_user'
		LIMIT 1
ELIMINAR;

	mysqli_query($conexion, $d_user);

	header("Location: ../index.php?s=usuarios_listado#user_$i_user");
?>
