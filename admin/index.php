<?php
	include('../funciones.php');
	include('../setup/config.php');

	if(!isset($_SESSION['EMAIL']) || $_SESSION['FKPERMISOS'] != 1){
		header("Location: ../index.php?s=login");
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>El calabozo del androide</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body class="admin">
	<header class="header clearfix">
		<h1 class="header__title">
			<a href="../index.php" title="Ver sitio">
				El calabozo del androide
			</a>
		</h1>
		<p class="header__user">Bienvenido, <?php echo $_SESSION['NOMBRE_COMPLETO']; ?></p>
	</header>
	<div class="container-fluid">
		<div class="row">
			<aside class="col-md-2 menu">
				<nav>
					<ul class="menu__list">
						<?php if(chequear_permisos('MODERAR_VIDEOS')) { ?>
							<li class="menu__list__option">
								<a href="index.php">
									<img src="../images/iconos/joy-blanco.png" alt="ícono joystick" class="iconitos">
									Panel
								</a>
							</li>
						<?php } ?>
							<li class="menu__list__option">
								<a href="index.php?s=mi_cuenta" class="tdv_no">
									<img src="../images/iconos/calavera-blanco.png" alt="ícono calavera" class="iconitos">
									Perfil
								</a>
							</li>
						<?php if(chequear_permisos('MODERAR_USUARIOS')) { ?>
							<li class="menu__list__option">
								<a href="index.php?s=usuarios_listado">
									<img src="../images/iconos/superman-blanco.png" alt="ícono superman" class="iconitos">
									Usuarios
								</a>
							</li>
						<?php } ?>
						<?php if(chequear_permisos('MODERAR_COMENTARIOS')) { ?>
							<li class="menu__list__option">
								<a href="index.php?s=comentarios_listado">
									<img src="../images/iconos/globo-blanco.png" alt="ícono globo con un corazón" class="iconitos">
									Comentarios
								</a>
							</li>
						<?php } ?>
						<?php if(chequear_permisos('MODERAR_VIDEOS')) { ?>
							<li class="menu__list__option">
								<a href="index.php?s=videos_listado">
									<img src="../images/iconos/gameboy-blanco.png" alt="ícono gameboy" class="iconitos">
									Posts
								</a>
							</li>
						<?php } ?>
							<li class="menu__list__option border__top">
								<a href="index.php?s=cerrar_sesion">
									<img src="../images/iconos/llave-blanco.png" alt="ícono llave" class="iconitos">
									Cerrar Sesión
								</a>
							</li>
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
