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
	<form action="login.php" method="POST" enctype="" >
		<div><input type="text" name="usuario"></div>
		<div><input type="password" name="password"></div>
		<div><input type="submit" name="" value="Ingresar"></div>
	</form>
</body>
</html>