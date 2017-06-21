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
		<nav class="navbar navbar-default">
  			<div class="container-fluid">
    			<!-- Brand and toggle get grouped for better mobile display -->
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
      				</button>
     				<a class="navbar-brand botones" href="#"><img src="images/brand.png"></a>
    			</div>

    			<!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       				<ul class="nav navbar-nav navbar-right">
        				<li><a class="botones" href="#"><i class="glyphicon glyphicon-user"></i> Login</a></li>
       					<li><a class="botones" href="#"><i class="glyphicon glyphicon-align-center"></i> Registro</a></li>
    				</ul>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>

	</header>
	<div class="contenedor">
		<?php include($seccion); ?>
	</div>

	<!-- Falta el footer -->
</body>
</html>