<?php include('../setup/config.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Prisión &amp; Libertad</title>
</head>
<body>
	<header>
		<h1>Prisión &amp; Libertad</h1>

		<p>Bienvenido, admin</p>
	</header>

	<aside>
		<nav>
			<ul>
				<li><a href="#">Inicio</a></li>
				<li><a href="#">Homepage</a></li>
				<li><a href="#">Nosotros</a></li>
				<li><a href="#">Videos</a></li>
				<li><a href="#">Contacto</a></li>
			</ul>
		</nav>
	</aside>

	<main>
		<?php include($seccion); ?>
	</main>
</body>
</html>