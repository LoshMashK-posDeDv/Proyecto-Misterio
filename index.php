<?php

include('funciones.php');
include('setup/config.php');

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prisión &amp; Libertad</title>
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
                            <img src="images/brand.png">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-navbar">
                        <?php 
                            if(isset($_SESSION['NOMBRE_USUARIO'])) { ?>                               

                                <ul class="nav navbar-nav navbar-right">
                                    <div class="dropdown">                                    
                                        <button class="btn dropdown-toggle" type="button" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Hola <?php echo $_SESSION['NOMBRE_USUARIO'] ?>
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdown-menu">
                                            <li>
                                                <a class="botones" href="index.php?s=mi_cuenta">
                                                    <i class="glyphicon glyphicon-user"></i> 
                                                    Mi cuenta
                                                </a>
                                            </li>
                                            <li>
                                                <a class="botones" href="index.php?s=cerrar_sesion">
                                                    <i class="glyphicon glyphicon-log-out"></i>
                                                    Cerrar sesión
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                        
                        <?php 
                            } else if((isset($_GET['s']) && $_GET['s'] != 'login' && $_GET['s'] != 'registro') || !isset($_GET['s'])) {
                        ?>                        
                            <ul class="nav navbar-nav navbar-right">
                                <div class="dropdown">
                                
                                    <button class="btn dropdown-toggle" type="button" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="glyphicon glyphicon-user"></i>
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdown-menu">
                                        <li>
                                            <a class="botones" href="index.php?s=login">
                                                <i class="glyphicon glyphicon-user"></i> 
                                                Login
                                            </a>
                                        </li>
                                        <li>
                                            <a class="botones" href="index.php?s=registro">
                                                <i class="glyphicon glyphicon-align-center"></i> 
                                                Registro
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </ul>

                        <?php        
                            }
                        ?>

                        

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
                <p>Prision &amp; Libertad - Todos los derechos reservados</p>            
            </div>
        </footer>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>