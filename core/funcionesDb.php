<?php
	function insert_string($table,$data){
		/**
		  * Esta funcion genera el string de insercion de la
		  * db.
		  */
		$Inicio = "INSERT INTO $table ";
		$campos   = "(";
		$valores  = "";
		$i = 0;
		foreach($data as $keys => $values){
			$i++;
			if(count($data) == $i){
				$campos   .= $keys.") VALUES (";
				$valores  .= $values.")";

			}else{
				$campos   .= $keys.",";
				$valores  .= $values.",";
			}
		}

		$sql = $Inicio.$campos.$valores;

		return $sql;		
	}
	
	function update_string($table,$data,$where){
		/**
		  * Esta funcion realiza un string para actualizar.
		  * un registro de la db.
		  */
		$inicio  = "UPDATE $table SET ";
		$set     = "";
		$filter  = " WHERE ";
		$i 		 = 0;
		foreach ($data as $keys => $values) {
			$i++;
			if(count($data) == $i){
				$set .= $keys." = ".$values;
			}else{
				$set .= $keys." = ".$values.",";
			}
		}
		$j = 0;
		foreach ($where as $condition => $value) {
			$j++;
			if(count($where) == $j){
				$filter .= $condition."=".$value;
			}else{
				$filter .= $condition."=".$value." AND "; 
			}	
		}
		return $inicio.$set.$filter;
	}
	
	function select_string($table,$camp,$condition){
		$inicio = "SELECT ";
		$i = 0;
		$j = 0;
		foreach ($camp as $columns => $values) {
			$i++;
			if(count($camp) == $i){
				$inicio .= $columns;
			}else{
				$inicio .= $columns.',';
			}
		}

		$inicio .= " FROM ".$table." WHERE ";

		foreach ($condition as $campo => $valor) {
			$j++;
			if(count($condition) == $j){
				$inicio .= $campo."=".$valor;
			}else{
				$inicio .= $campo."=".$valor.",";
			}
		}

		return $inicio;
	}
	

	function string_get_where($table,$arr){
		$inicio = "SELECT * FROM $table WHERE ";
		$where = "";
		$i = 0;
		foreach ( $arr as $condition => $value) {
			$i++;
			if($i == count($arr)){
				$where .= $condition." = ".$value;
			}else{
				$where .= $condition." = ".$value.", AND ";
			}
		}
		$sql = $inicio.$where;
		return $sql;
	}
	



?>