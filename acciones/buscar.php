<?php
    $busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';

    $consulta_buscar = <<<SQL
        SELECT
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

    //$filas = mysqli_query($conexion, $c);
?>

<section>
    <h2>Resultados de búsqueda</h2>
</section>
