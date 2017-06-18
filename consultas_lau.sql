/*DETALLE VIDEO DESDE IN VIDEO ID*/

$seleccionado = isset($_GET['d']) ? $_GET['d'] : 0;
$consulta_detalle = <<<SQL
	SELECT 
		IDARTICULO,
		TITULO,
		AUTOR,
		AÑO,
		DURACION,
		VIDEO,
		IMAGENES,
		IMG_DESTACADA	
	FROM
		articulos;
SQL;	

$respuesta_detalles = mysqli_query($conexion, $consulta_detalle);

while($array_detalle = mysqli_fetch_assoc($respuesta_detalles)){
	/*luego meto los echo de cada indice en el lugar que corresponda, sea tabla, lista, div o lo que sea*/

}

/* -------------------------------------------- */

/*VIDEOS PARA EL INDEX - PRIMERA PARTE*/ /*AGREGADA*/ 

/*importante: ver cuales son los 3 que agregamos, si son random*/

$consulta_videos = <<<SQL
	SELECT
		TITULO,
		DESCRIPCION,
		IMG_DESTACADA
	FROM
		articulos
	LIMIT 3
SQL;

$r1 = mysqli_query($conexion, $consulta_videos);

while($array_videos = mysqli_fetch_assoc($r1)){
	/*muestro datos*/
}	


/* -------------------------------------------- */



/*ADMIN: LISTADO DE VIDEOS*/	/*AGREGADA*/

$consulta_videos = <<<SQL
	SELECT
		IMG_DESTACADA,
		TITULO,
		AUTOR,
		FECHA_ALTA,
		A_ESTADO,
		IDARTICULO
	FROM
		articulos
	ORDER BY FECHA_ALTA
SQL;
	
$respuesta_videos = mysqli_query($conexion, $consulta_videos);		
			
while($array_videos = mysqli_fetch_assoc($respuesta_videos)){
	/*muestra*/
}