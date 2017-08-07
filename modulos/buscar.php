<?php
    include('../setup/config.php');

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

<section>
    <h2>Resultados de búsqueda</h2>

    <?php
        if(mysqli_num_rows($filas) == 0){
            echo '<p>Lo que estás buscando no existe</p>';
        }

        while($array_resultados = mysqli_fetch_assoc($filas)):
    ?>
        <div>
            <img src="../uploads/<?php echo $array_resultados['IMG_DESTACADA'] ?>" alt="">
            <h3><?php echo $array_resultados['TITULO'] ?></h3>
            <p><?php echo $array_resultados['DESCRIPCION'] ?></p>
            <a href="../index.php?s=post&vid=<?php echo $array_resultados['IDARTICULO'] ?>">Ver más</a>
        </div>
    <?php
        endwhile;
    ?>

</section>
