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

	function traducir_mes($date){

		$date = str_replace('January', 'Enero', $date);
		$date = str_replace('February', 'Febrero', $date);
		$date = str_replace('March', 'Marzo', $date);
		$date = str_replace('April', 'Abril', $date);
		$date = str_replace('May', 'Mayo', $date);
		$date = str_replace('June', 'Junio', $date);
		$date = str_replace('July', 'Julio', $date);
		$date = str_replace('August', 'Agosto', $date);
		$date = str_replace('September', 'Septiembre', $date);
		$date = str_replace('October', 'Octubre', $date);
		$date = str_replace('November', 'Noviembre', $date);
		$date = str_replace('December', 'Diciembre', $date);

		return $date;
	}

	function solo_nombre($nombre_completo){
		global $conexion, $_SESSION;
		$nombre_completo = $_SESSION['NOMBRE_COMPLETO'];
		$nombre_completo = strstr($nombre_completo, ' ', true);
		$nombre_completo = ucfirst($nombre_completo);    

		return $nombre_completo;
	}
?>