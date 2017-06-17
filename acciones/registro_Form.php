<?php include('../setup/config.php');  ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Registro form</title>
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
		
		<p class="response info">
			Completá el siguiente formulario para crear tu cuenta en nuestro sistema.<br />
			Se te mandará un mail para confirmar el alta de usuario
		</p>
		<form action="registro.php" method="POST">		
			<div><input type="text" name="nombre_completo" placeholder="Nombre Completo"></div>
			<div><input type="text" name="email" placeholder="Correo electrónico"></div>
			<div><input type="text" name="usuario" placeholder="Nombre de usuario"></div>
			<div><input type="password" name="password" placeholder="Contraseña"></div>
			<div><input type="submit" name="" value="Registrarse"></div>
		</form>
	</body>
</html>