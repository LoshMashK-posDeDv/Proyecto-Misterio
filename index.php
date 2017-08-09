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
            <nav class="navbar navbar-default logo">
                <div class="container">
                    <div class="collapse navbar-collapse pull-left">
                        <h1 class="pull-left">
                            <a class="navbar-brand" href="index.php">
                                El calabozo del Androide
                            </a>
                        </h1>  

                        <div class="navbar-header">                        
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <ul class="nav navbar-nav navbar-left" id="bs-navbar">
                            <li id="btn-videos">
                                <a href="index.php?s=posts">Posts</a>
                            </li> 
                            <li id="btn-videos">
                                <a href="index.php?s=about">Acerca del sitio</a>
                            </li> 
                            <li class="dropdown">
                                <?php if(isset($_SESSION['NOMBRE_COMPLETO'])) { ?>

                                    <button class="btn dropdown-toggle" type="button" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Hola, <?php echo solo_nombre($_SESSION['NOMBRE_COMPLETO']); ?>
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

                                <?php } else if((isset($_GET['s']) && $_GET['s'] != 'login' && $_GET['s'] != 'registro') || !isset($_GET['s'])) {
                                ?>

                                        <button class="btn dropdown-toggle" type="button" id="dropdown-menu_2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <img src="images/iconos/calavera-blanco.png" alt="ícono calavera" class="iconitos">
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdown-menu_2">
                                            <li>
                                                <a class="botones botonitos" href="index.php?s=login">
                                                    <img src="images/iconos/calavera-blanco.png" alt="ícono calavera" class="iconitos">
                                                    Login
                                                </a>
                                            </li>
                                            <li>
                                                <a class="botones botonitos" href="index.php?s=registro">
                                                    <img src="images/iconos/varita-blanco.png" alt="ícono varita" class="iconitos">
                                                    Registro
                                                </a>
                                            </li>
                                        </ul>
                                <?php } ?>                        
                            </li>                              
                        </ul>
                    </div>
                    
                    <div class="pull-right">
                        <form method="get" action="index.php" class="navbar-form navbar-left" id="buscadorsin" role="search">
                            <div class="form-group">
                                <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
                            </div>
                        </form>              
                    </div>
                </div>
            </nav>
        </header>

        <div class="contenedor">
            <?php
                if(isset($_GET['buscar'])){
                    require('modulos/buscar.php'); 
                } else {
                    require($seccion); 
                }
            ?>
        </div>

        <div id="noo"></div>
        <footer>
            
            <div class="container">
                <img src="images/lightsaber.png" alt="sable laser coleccionable" id="sable" onclick="noEsColeccionable()">
            </div>
        </footer>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/dom.js"></script>
    </body>
</html>
