<?php
    include('../../setup/config.php');    

    $consulta1 = "SELECT COUNT(IDARTICULO) AS TOTAL FROM articulos";
    $f = mysqli_query($conexion, $consulta1);

    $consulta2 = "SELECT IDCOMENTARIO, COMENTARIO, FECHA_COMENTARIO, u.NOMBRE_COMPLETO AS USUARIO, a.TITULO AS TITULO FROM comentarios AS c JOIN articulos AS a ON a.IDARTICULO = c.FKARTICULO JOIN usuarios AS u on u.IDUSUARIOS = c.FKUSUARIO ORDER BY FECHA_COMENTARIO DESC LIMIT 5";
    $f2 = mysqli_query($conexion, $consulta2);

    $consulta3 = "SELECT TITULO, FECHA_ALTA FROM articulos LIMIT 10";
    $f3 = mysqli_query($conexion, $consulta3);

    $consulta4 = "SELECT EMAIL, NOMBRE_COMPLETO, FECHA_ALTA FROM usuarios LIMIT 5";
    $f4 = mysqli_query($conexion, $consulta4);

    $contenido = '<div>';

        while ($info = mysqli_fetch_assoc($f)) {
            $contenido .= '<p style="text-align: center; font-size: 40px; color: #333;"><span style="color: #361935; font-weight:bold;">' . $info['TOTAL'] . '</span> POSTS cargados hasta el momento</p>';
        }

    $contenido .= '</div>';

    $contenido .= '<div style="margin-top: 30px; margin-left:15px;">';

        $contenido .= '<h2 style="font-weight:normal; color: #854486;">Últimos comentarios</h2>';

        while ($info2 = mysqli_fetch_assoc($f2)) {        
            $contenido .= '<p style="text-align: left; font-size: 16px; color: #333; margin: 10px 0;"><span style="color: #777;">' . $info2['FECHA_COMENTARIO'] .  '</span> | ' . $info2['COMENTARIO'] . '</p>';
        }
    $contenido .= '</div>';

    $contenido .= '<div style="margin-top: 30px; margin-left:15px;">';

        $contenido .= '<h2 style="font-weight:normal; color: #854486;">Últimos Posts</h2>';

        while ($info3 = mysqli_fetch_assoc($f3)) {        
            $contenido .= '<p style="text-align: left; font-size: 16px; color: #333; margin: 10px 0;"><span style="color: #777;">' . $info3['FECHA_ALTA'] .  '</span> | ' . $info3['TITULO'] . '</p>';
        }

    $contenido .= '</div>';


    $contenido .= '<div style="margin-top: 30px; margin-left:15px;">';

        $contenido .= '<h2 style="font-weight:normal; color: #854486;">Nuevos usuarios</h2>';

        while ($info4 = mysqli_fetch_assoc($f4)) {        
            $contenido .= '<p style="text-align: left; font-size: 16px; color: #333; margin: 10px 0;"><span style="color: #777;">' . $info4['FECHA_ALTA'] .  '</span> | ' . $info4['NOMBRE_COMPLETO'] . ' | <span style="color: #81BDC2;"> ' .  $info4['EMAIL'] . '</span></p>';
        }

    $contenido .= '</div>';
    
    include('../html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P', 'A4');
    $pdf->writeHTML($contenido);
    $pdf->Output('pdf_file.pdf');

?>