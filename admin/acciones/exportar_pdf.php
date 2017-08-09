<?php
    include('../../setup/config.php');
    include('../html2pdf/html2pdf.class.php');

    $c = <<<SQL
        SELECT
            COUNT(IDARTICULO) AS TOTAL
        FROM
            articulos
SQL;

    $c2 = <<<SQL
        SELECT
            IDCOMENTARIO,
            COMENTARIO,
            FECHA_COMENTARIO,
            u.NOMBRE_USUARIO AS USUARIO,
            a.TITULO AS TITULO
        FROM
            comentarios AS c
        JOIN articulos AS a ON a.IDARTICULO = c.FKARTICULO
        JOIN usuarios AS u on u.IDUSUARIOS = c.FKUSUARIO
        ORDER BY FECHA_COMENTARIO DESC
        LIMIT 5
SQL;

    $c3 = <<<SQL
        SELECT
            TITULO,
            FECHA_ALTA
        FROM
            articulos
        ORDER BY FECHA_ALTA DESC
        LIMIT 5
SQL;

    $c4 = <<<SQL
        SELECT
            NOMBRE_USUARIO,
            FECHA_ALTA
        FROM
            usuarios
        ORDER BY FECHA_ALTA DESC
        LIMIT 5
SQL;

    $f1 = mysqli_query($conexion, $c);
    $d1 = mysqli_fetch_assoc($f1);
    $f2 = mysqli_query($conexion, $c2);
    $f3 = mysqli_query($conexion, $c3);
    $f4 = mysqli_query($conexion, $c4);

    $content = "
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset='utf-8'>
                <title>Datos</title>
                <style>
                </style>
            </head>
            <body>
                <page_footer class='hola'>
                    <h1>El Calabozo del Androide</h1>
                    <p>Estadísticas</p>
                </page_footer>

                <h1 class='hola'>$d1[TOTAL] posts</h1>
                <page>

                <page_footer class='hola'>
                    <h1>El Calabozo del Androide</h1>
                    <p>Estadísticas</p>
                </page_footer>

                <h2>Últimos comentarios</h2>";
                while($d2 = mysqli_fetch_assoc($f2)){
                    $content .= "<p>$d2[COMENTARIO]</p>";
                }

    $content .= "</page>
                <page>

                <page_footer class='hola'>
                    <h1>El Calabozo del Androide</h1>
                    <p>Estadísticas</p>
                </page_footer>

                    <h2>Últimos posts</h2>";

                    while($d3 = mysqli_fetch_assoc($f3)){
                        $content .= "<p>$d3[TITULO]</p>";
                    }
    $content .= "</page>
                <page>

                <page_footer class='hola'>
                    <h1>El Calabozo del Androide</h1>
                    <p>Estadísticas</p>
                </page_footer>

                    <h2>Nuevos usuarios</h2>";

                    while($d4 = mysqli_fetch_assoc($f4)){
                        $content .= "<p>$d4[NOMBRE_USUARIO]</p>";
                    }
    $content .= "</page>
            </body>
            </html>";

$pdf = new HTML2PDF('L', 'A5');
$pdf->writeHTML($content);
$pdf->Output('reporte.pdf');

?>
