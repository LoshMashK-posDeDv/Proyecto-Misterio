<?php
  header("Access-Control-Allow-Origin: *");
  include("../setup/config.php");

  $busqueda = $_POST['item'];
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
$array = array();

while($a_resultados = mysqli_fetch_assoc($filas)){
  $array[] = $a_resultados;
}

echo json_encode($array);

?>
