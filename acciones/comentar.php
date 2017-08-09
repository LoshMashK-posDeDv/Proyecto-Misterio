<?php

include('../setup/config.php');

//$nombre = $_POST['nombre'];
$comentario = $_POST['comentario'];
$usuario = $_SESSION['IDUSUARIOS'];
$nick = $_SESSION['NICK'];
$post = $_POST['post'];

$nuevo_comentario = <<<SQL
    INSERT INTO
        comentarios
    SET
        COMENTARIO = '$comentario',
        FECHA_COMENTARIO = NOW(),
        C_ESTADO = 1,
        FKUSUARIO = '$usuario',
        FKARTICULO = '$post'
SQL;

mysqli_query($conexion, $nuevo_comentario);
//echo mysqli_error($conexion);
header("Location: ../index.php?s=post&vid=$post");

?>
