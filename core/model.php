<?php
	/**
	  * Fichero que contiene varias consultas para automatizar tareas CRUD.
	  * @author: Juan D Rincon U - 2021
	  */
    require_once 'conexion.php';
	/**
	 * Se requiere primero el fichero de conexion con la 
	 * base de datos.
	 */
    class Model extends Conexion{
		/**
		 * Clase destinada para automatizar operaciones de 
		 * seleccion, actualizacion e insercion de datos.
		 */
        private $conection;
        function __construct(){
			/**
			  * Constructor de la clase.
			  */
			require_once 'funcionesDb.php';////fichero de funciones para armar Strings
            parent::__construct();
            $this->conection = $this->Link();
        }
        public function get_conection(){
			/**
			  * Metodo que devulve el objeto de conexion.
			  */
            return $this->conection;
        }
        public function get_all($table){
			/**
			  * Metodo que devulve todos los registros de una tabla.
			  */
            $res = $this->conection->query("SELECT * FROM ".$table);
            $resultSet = array();
            while ($rowsObj = $res->fetch_object()) {
                $resultSet[] = $rowsObj;
            }
            return $resultSet;
        }
		public function get_by_id($table,$id){
			/**
			  * funcion que devulve unsolo registro segun el valor del
			  * id.
			  */
			$sql = "SELECT * FROM $table WHERE id = '$id'";
			$res = $this->conection->query($sql);
			$resultSet = [];
			while($rows = $res->fetch_object()){
				$resultSet[] = $rows;
			}
			return $resultSet;
		}
        public function select($table,$camp,$colums){
			/**
			 * Funcion para realizar consulta select aplicando clausula where.
			 */
			$sql       = select_string($table, $camp, $colums);
			$resultset = [];
			$res = $this->conection->query($sql);
			while($obj = $res->fetch_object()){
				$resultSet[] = $obj;
			}
			mysqli_free_result($res);
			return $resultSet;
		}
        public function insert($table,$colums){
			/**
			 * Funcion para insertar un registro en la db.
			 */
			$sql = insert_string($table, $colums);
			$res = $this->conection->query($sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
        public function update($table,$colums){
			/**
			 * Funcion para Actualizar un registro en la db.
			 */
			$sql = update_string($table, $columns);
			$res = $this->conection->query($sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function get_where($table,$where){
			$sql 		= string_get_where($table,$where);
			$res 		= $this->conection->query($sql);
			$resultSet  = [];
			while($rowObj = $res->fetch_object()){
				$resultSet[] = $rowObj;
			}
			mysqli_free_result($res);
			return $resultSet;
		}

		public function EjecutarSQL($sql){
			$res = $this->conection->query($sql);
            $resultSet = array();
            while ($rowsObj = $res->fetch_object()) {
                $resultSet[] = $rowsObj;
            }
            return $resultSet;
		}
    }

?>