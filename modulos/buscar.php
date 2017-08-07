<?php

    $busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';

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
SQL;

    $filas = mysqli_query($conexion, $consulta_buscar);
?>


<div class="container">
    <section class="resultados">
        <h2 class="u text-left">Resultados de búsqueda para <?php echo $busqueda; ?></h2>
        <div class="clear"></div>
        <div class="seccion--posts">
            <?php
                if(mysqli_num_rows($filas) == 0){                    
                    include('error_busqueda.php');
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
                    <div class="paginador clear">
                        <ul class="paginator">
                            <li><a href="index.php?s=posts&amp;p=1" class="pag_activa">1</a></li>
                            <li><a href="index.php?s=posts&amp;p=1" class="">2</a></li>
                        </ul>
                    </div>
            <?php
                }
            ?>
        </div>

        
    </section>
</div>

