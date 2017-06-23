<?php

function chequear_permisos($permiso){

	global $conexion, $_SESSION;

	$pid = $_SESSION['FKPERMISOS'];

	$permiso = strtoupper($permiso);

	$c = <<<SQL

	SELECT 
		$permiso
	FROM 
		permisos
	WHERE 
		IDPERMISOS = $pid
	LIMIT 
		1 
SQL;

	$f = mysqli_query($conexion, $c);
	$a = mysqli_fetch_array($f);

	return $a[$permiso];
}

function trim_desc($text,$trim = 140){
	if(strlen($text) > $trim){
		$desc = substr($text, 0, $trim) . '...';
	} else {
		$desc = $text;
	}

	return $desc;
}