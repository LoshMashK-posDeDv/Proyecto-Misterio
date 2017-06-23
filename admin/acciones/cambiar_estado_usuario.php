<?php 
	include("../../setup/config.php");

	$i_user = $_GET['i'];
	$c_user = <<<ESTADO
		UPDATE 
			usuarios 
		SET 
			U_ESTADO = ( -1 * (U_ESTADO -1))  
		WHERE 
			IDUSUARIOS = '$i_user' 
		LIMIT 1
ESTADO;
	
	mysqli_query($conexion, $c_user);

	header("Location: ../index.php?s=usuarios_listado#user_$i_user");
?>