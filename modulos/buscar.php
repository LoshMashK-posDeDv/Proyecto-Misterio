<?php

    $busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';
    $busqueda = mysqli_real_escape_string($conexion, $busqueda);

    //primer consulta
        $cantidad_por_pagina = 8;
        $pagina_actual = isset($_GET['p']) ? $_GET['p'] : 1; //lo que viene por get, el num de la pag cliqueada
        $inicio_paginador = ($pagina_actual - 1) * $cantidad_por_pagina; //cantidad que debe saltear

        //segunda consulta: cant de posts que hay
        $consulta_cant_posts = <<<SQL
            SELECT
                COUNT(IDARTICULO) AS CANTIDAD
            FROM
                articulos
            WHERE
                A_ESTADO = 1 AND TITULO LIKE '%$busqueda%' OR DESCRIPCION LIKE '%$busqueda%'
SQL;
                $cantidad_posts = mysqli_query ($conexion, $consulta_cant_posts);
                //var_dump($cantidad_posts);
                $array_posts3 = mysqli_fetch_assoc ($cantidad_posts);
                $cantidad_resultados = $array_posts3['CANTIDAD'];

                $total_links = ceil ($cantidad_resultados / $cantidad_por_pagina);

                //verificacion de cantidad de paginas
                if($pagina_actual > $total_links or $pagina_actual < 1){
        ?>  
                <div class="container">
                    <section class="resultados_error">
                        <img src="images/errores/no_hay resultados.jpg" alt="Error en la búsqueda" class="img-responsive">
                        <h2 class="sr-only">No hay resultados</h2>
                        <p class="sr-only">Las malas búsquedas son el nectar de los ignorantes. Para buscar más volvé a Google.</p>
                    </section>
                </div>
        <?php 
                } else {

        $consulta_buscar = <<<SQL
            SELECT
                IDARTICULO,
                TITULO,
                IMG_DESTACADA,
                DESCRIPCION
            FROM
                articulos
            WHERE
                TITULO LIKE '%$busqueda%' OR DESCRIPCION LIKE '%$busqueda%'
            ORDER BY
                TITULO
            LIMIT $inicio_paginador, $cantidad_por_pagina
SQL;

        $filas = mysqli_query($conexion, $consulta_buscar);
?>


<div class="container">
    <section class="resultados">
        <h2 class="u text-center"><?php echo $busqueda; ?>...</h2>
        <div class="clear"></div>
        <div class="seccion--posts">
            <?php
                if(mysqli_num_rows($filas) == 0){   
            ?>                 
                    <section class="resultados_error">
                        <img src="images/errores/no_hay resultados.jpg" alt="Error en la búsqueda" class="img-responsive">
                        <h2 class="sr-only">No hay resultados</h2>
                        <p class="sr-only">Las malas búsquedas son el nectar de los ignorantes. Para buscar más volvé a Google.</p>
                    </section>
            <?php
                } else {

                    while($array_resultados = mysqli_fetch_assoc($filas)):
            ?>
                        <article class="seccion--posts__post">
                            <div class="seccion--posts__img">
                                <a href="index.php?s=post&vid=<?php echo $array_resultados['IDARTICULO'] ?>">
                                   <img src="uploads/<?php echo $array_resultados['IMG_DESTACADA'] ?>" alt="">
                                </a>
                            </div>
                            <div class="seccion--posts__txt">
                                <h3 class="seccion--posts__title">
                                    <a href="index.php?s=post&vid=<?php echo $array_resultados['IDARTICULO'] ?>">
                                        <?php echo $array_resultados['TITULO'] ?>       
                                    </a>
                                </h3>
                                <p><?php echo $array_resultados['DESCRIPCION'] ?></p>
                                <a href="index.php?s=post&vid=<?php echo $array_resultados['IDARTICULO'] ?>">Ver más</a>
                            </div>
                        </article>

                <?php
                    endwhile;
                ?>
            <?php
                }}
            ?>
        </div>

            <!-- PAGINADOR MÁGICO -->

    <div class="paginador clear">
        <ul class="paginator">
        <?php
            $pag_anterior = $pagina_actual - 1;
            if( $pag_anterior > 0 ){
            ?>
            <li><a href="index.php?buscar=<?php echo $busqueda; ?>&p=<?php echo $pag_anterior; ?>">&larr;</a></li>

            <?php

            }

            for( $i = 1; $i <= $total_links; $i++ ){
            $activo = $pagina_actual == $i ? 'class="pag_activa"':'';

            echo '<li><a href="index.php?buscar='.$busqueda.'&p='.$i.'" '.$activo.'>'.$i.'</a></li> ';

            }

        ?>

        <?php

            $pag_siguiente = $pagina_actual + 1;
            if( $pag_siguiente <= $total_links ){

        ?>

            <li><a href="index.php?buscar=<?php echo $busqueda; ?>&p=<?php echo $pag_siguiente ?>">&rarr;</a></li>

        <?php } ?>

        </ul>
    </div>

        
    </section>
</div>

