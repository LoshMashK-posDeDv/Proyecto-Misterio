<?php include('setup/config.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Prisión &amp; Libertad</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/stylesheet.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<h1>Prisión &amp; Libertad</h1>
		<nav>
			<ul>
				<li><a href="#">Opción 1</a></li>
				<li><a href="#">Opción 2</a></li>
				<li><a href="#">Opción 3</a></li>
			</ul>
		</nav>
	</header>
	<div class="contenedor">
		<?php include($seccion); ?>
	</div>

	<!-- Falta el footer -->
</body>
</html>