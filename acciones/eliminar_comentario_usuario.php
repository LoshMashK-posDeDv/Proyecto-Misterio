<?php
    include("../setup/config.php");

    if(isset($_GET['vid'])){
        $vid = $_GET['vid'];
    } else {
        $vid = 0;
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    } else {
        $id = '-1';
    }

    $c = <<<SQL

    UPDATE
        comentarios
    SET
        C_ESTADO = 0
    WHERE
        IDCOMENTARIO = '$id'
    LIMIT 1
SQL;

$rta = 'ok';

mysqli_query($conexion, $c);
header("Location: ../index.php?s=post&vid=$vid&m=$rta");

?>
