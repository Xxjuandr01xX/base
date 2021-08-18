<?php
	
	function dateToSql($date){
		$fecha = explode("/", $date);
		return $fecha[2]."-".$fecha[1]."-".$fecha[0];
	}


	function sqlToLabel($date){
		$fecha = explode("-",$date);
		return $fecha[2]."/".$fecha[1]."/".$fecha[0];
	}

	

?>