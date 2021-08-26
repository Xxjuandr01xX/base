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

		public function insert_paciente($nom,$ape,$ced,$cel,$email,$sex,$fec_nac,$dir){
			return $this->insert('med_personas',[
				"id" 		=> "NULL",
				"ced_ide" 	=> "'$ced'",
				"nombre" 	=> "'$nom'",
				"apellido"  => "'$ape'",
				"correo"    => "'$email'",
				"telefono"  => "'$cel'",
				"direccion" => "'$dir'",
				"sexo" 		=> "'$sex'",
				"fec_nac"   => "'$fec_nac'",
				"id_tipo"   => "'2'"
			]);
		}

		public function verificar_persona($ced_ide){
			$persona = $this->get_where('med_personas', ["ced_ide" => "'$ced_ide'"]);
			return count($persona);
		}


	}

?>