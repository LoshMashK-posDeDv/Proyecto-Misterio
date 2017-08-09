<?php
    include("../../setup/config.php");

    if(isset($_GET['i'])){
        $id = $_GET['i'];
    } else {
        $id = '-1';
    }

    $c = <<<SQL

    UPDATE
        articulos
    SET
        A_ESTADO = 0
    WHERE
        IDARTICULO = '$id'
    LIMIT 1
SQL;

$rta = 'ok';

mysqli_query($conexion, $c);
header("Location: ../index.php?s=posts_listado&d=$rta");

?>
