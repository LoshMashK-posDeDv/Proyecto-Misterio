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
