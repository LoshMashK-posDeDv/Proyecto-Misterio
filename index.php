<?php

include('funciones.php');
include('setup/config.php');

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>El calabozo del androide</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/stylesheet.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand botones" href="index.php">
                            <img src="images/brand.png" alt="El calabozo del androide">
                        </a>
                        <form method="get" action="index.php?s=resultados" class="navbar-form navbar-left" id="buscadorsin" role="search">
                            <div class="form-group">
                                <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
                            </div>
                        </form>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-navbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li id="btn-videos">
                                <a href="index.php?s=videos">Videos</a>
                            </li>
                            <?php if(isset($_SESSION['NOMBRE_USUARIO'])) { ?>

                                <li class="dropdown">

                                    <button class="btn dropdown-toggle" type="button" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Hola <?php echo $_SESSION['NOMBRE_USUARIO'] ?>
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdown-menu">
                                        <li>
                                            <a class="botones" href="admin/index.php?s=mi_cuenta">
                                                <img src="images/iconos/calavera-blanco.png" alt="ícono calavera" class="iconitos">
                                                Mi cuenta
                                            </a>
                                        </li>
                                        <li>
                                            <a class="botones" href="index.php?s=cerrar_sesion">
                                                <img src="images/iconos/llave-blanco.png" alt="ícono llave" class="iconitos">
                                                Cerrar sesión
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            <?php } else if((isset($_GET['s']) && $_GET['s'] != 'login' && $_GET['s'] != 'registro') || !isset($_GET['s'])) {
                            ?>

                                <li class="dropdown">

                                    <button class="btn dropdown-toggle" type="button" id="dropdown-menu_2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <img src="images/iconos/superman-blanco.png" alt="ícono superman" class="iconitos">
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdown-menu_2">
                                        <li>
                                            <a class="botones botonitos" href="index.php?s=login">
                                                <img src="images/iconos/superman-blanco.png" alt="ícono superman" class="iconitos">
                                                Login
                                            </a>
                                        </li>
                                        <li>
                                            <a class="botones botonitos" href="index.php?s=registro">
                                                <i class="glyphicon glyphicon-align-center"></i>
                                                Registro
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            <?php } ?>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>

        <div class="contenedor">
            <?php include($seccion); ?>
        </div>

        <footer>
            <div class="container">
                <p>El Calabozo del Androide - Todos los derechos reservados</p>
            </div>
        </footer>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
