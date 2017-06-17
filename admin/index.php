<?php include('../setup/config.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prisión &amp; Libertad</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/styles.css">
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<header class="header clearfix">
		<h1 class="header__title">Prisión &amp; Libertad</h1>
		<p class="header__user">Bienvenido, admin</p>
	</header>
	<divzzzz class="container-fluid">
		<div class="row">
			<aside class="col-md-2 menu">
				<nav>
					<ul class="menu__list">
						<li class="menu__list__option"><a href="#">Inicio</a></li>
						<li class="menu__list__option"><a href="#">Homepage</a></li>
						<li class="menu__list__option"><a href="#">Nosotros</a></li>
						<li class="menu__list__option"><a href="#">Videos</a></li>
						<li class="menu__list__option"><a href="#">Contacto</a></li>
					</ul>
				</nav>
			</aside>
			<main class="col-md-10">
				<?php include($seccion); ?>
			</main>
		</div>
	</div>
</body>
</html>