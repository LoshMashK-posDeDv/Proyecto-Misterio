<?php
	include("../../setup/config.php");

	$i_user = $_GET['i'];
  $v_user = $_POST['permiso'];
	$p_user = <<<PERMISO
		UPDATE
			usuarios
		SET
			FKPERMISOS = '$v_user'
		WHERE
			IDUSUARIOS = '$i_user'
		LIMIT 1
PERMISO;
	mysqli_query($conexion, $p_user);

	header("Location: ../index.php?s=usuarios_listado#user_$i_user");

?>
