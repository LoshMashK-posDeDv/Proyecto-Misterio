<?php include('../setup/config.php');  ?>

<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
	<style type="text/css">
		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		body {
			margin: 30px;
		}

		div {
			padding: 10px 0;
		}

		input {
			width: 400px;
			height: 50px;
			line-height: 50px;
			padding: 0 20px;
		}
	</style>
</head>
<body>	
	

	<form action="login.php" method="POST">
		<?php 
			if( isset($_SESSION['LOGIN_ERROR'])){
				echo '<p class="response error">';
					echo $_SESSION['LOGIN_ERROR'];
				echo '</p>';
				unset( $_SESSION['LOGIN_ERROR'] );
			}
		?>

		<div><input type="text" name="usuario" placeholder="Usuario"></div>
		<div><input type="password" name="password" placeholder="Contraseña"></div>
		<div><input type="submit" name="" value="Ingresar"></div>

		<a href="logout.php">Cerrar Sesión</a>
	</form>
</body>
</html>