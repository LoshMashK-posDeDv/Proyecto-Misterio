<?php
	include('../funciones.php');
	include('../setup/config.php');

	if(!isset($_SESSION['NOMBRE_USUARIO']) || $_SESSION['FKPERMISOS'] != 1){
		header("Location: ../index.php?s=login");
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prisión &amp; Libertad</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body class="admin">
	<header class="header clearfix">
		<h1 class="header__title">Prisión &amp; Libertad</h1>
		<p class="header__user">Bienvenido, <?php echo $_SESSION['NOMBRE_USUARIO']; ?></p>
		<div class="header__logos"><img src="../images/header-logos.png" alt="Sponsors:" /></div>
	</header>
	<div class="container-fluid">
		<div class="row">
			<aside class="col-md-2 menu">
				<nav>
					<ul class="menu__list">						
						<?php if(chequear_permisos('MODERAR_VIDEOS')) { ?>
							<li class="menu__list__option">
								<a href="index.php">
									<i class="glyphicon glyphicon-home"></i>
									Inicio
								</a>
							</li>
						<?php } ?>
							<li class="menu__list__option">
								<a href="index.php">
									<i class="glyphicon glyphicon-user"></i>
									Mi cuenta
								</a>
							</li>
						<?php if(chequear_permisos('EDITAR')) { ?>
							<li class="menu__list__option">
								<a href="index.php?s=editar_pagina&p=home">
									<i class="glyphicon glyphicon-file"></i>
									Homepage
								</a>
							</li>
						<?php } ?>
						<?php if(chequear_permisos('EDITAR')) { ?>
							<li class="menu__list__option">
								<a href="index.php?s=editar_pagina&p=nosotros">
									<i class="glyphicon glyphicon-file"></i>
									Nosotros
								</a>
							</li>
						<?php } ?>
						<?php if(chequear_permisos('EDITAR')) { ?>
							<li class="menu__list__option">
								<a href="index.php?s=editar_pagina&p=contacto">
									<i class="glyphicon glyphicon-file"></i>
									Contacto
								</a>
							</li>
						<?php } ?>
						<?php if(chequear_permisos('MODERAR_USUARIOS')) { ?>
							<li class="menu__list__option">
								<a href="index.php?s=usuarios_listado">
									<i class="glyphicon glyphicon-pawn"></i>
									Usuarios
								</a>
							</li>
						<?php } ?>
						<?php if(chequear_permisos('MODERAR_COMENTARIOS')) { ?>
							<li class="menu__list__option">
								<a href="index.php?s=comentarios_listado">
									<i class="glyphicon glyphicon-comment"></i>
									Comentarios
								</a>
							</li>
						<?php } ?>
						<?php if(chequear_permisos('MODERAR_VIDEOS')) { ?>
							<li class="menu__list__option">
								<a href="index.php?s=videos_listado">
									<i class="glyphicon glyphicon-facetime-video"></i>
									Videos
								</a>
							</li>
						<?php } ?>
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