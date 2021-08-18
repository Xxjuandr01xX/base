<?php

/**
	 * 
	 */
	class personasModel extends Model{
		
		function __construct(){
			parent::__construct();
		}

		public function getAll(){
			return $this->get_all('med_personas');
		}

		public function getNombreById($id){
			$nombre = "";
			foreach($this->get_where('med_personas',["id" => $id]) as $data){
				$nombre = $data->nombre." ".$data->apellido;
			}
			return $nombre;
		}


	}

?>