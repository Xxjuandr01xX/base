<?php
	/**
	 * Clase para Gestionar las Consultas a las tablas de medicos y pacientes.
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
		public function getBYId($id){
			return $this->get_where('med_personas',[
				"id" => "'$id'"
			]);
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
				"id_tipo"   => "2"
			]);
		}
		public function verify($ced_ide){
			$sql = "SELECT * FROM med_persona WHERE ced_ide = '$ced_ide'";
			$res = $this->get_conection()->query($sql);
			return $res;
		}
		public function elPaciente($id){
			return $this->delete("med_personas", ["id" => "$id"]);
		}
		public function updatePaciente($id,$nom,$ape,$ced,$cel,$email,$sex,$fecha,$dir){
			return $this->update('med_personas',[
				"nombre"    => "'$nom'",
				"ced_ide" 	=> "'$ced'",
				"nombre" 	=> "'$nom'",
				"apellido"  => "'$ape'",
				"correo"    => "'$email'",
				"telefono"  => "'$cel'",
				"direccion" => "'$dir'",
				"sexo" 		=> "'$sex'",
				"fec_nac"   => "'$fecha'"
			],[
				"id" => "'$id'"
			]);
		}
		public function insertMedico($nom, $ape , $ced, $cel, $email, $sex, $fec_nac, $dir, $user, $pass, $rol){
			$persona = $this->insert('med_personas',[
				"id"        => "NULL",
				"nombre"    => "'$nom'",
				"ced_ide" 	=> "'$ced'",
				"nombre" 	=> "'$nom'",
				"apellido"  => "'$ape'",
				"correo"    => "'$email'",
				"telefono"  => "'$cel'",
				"direccion" => "'$dir'",
				"sexo" 		=> "'$sex'",
				"fec_nac"   => "'$fec_nac'",
				"id_tipo"   => "1"
			]);
			if($persona){
				$id = mysqli_insert_id($this->get_conection());
				$usuario = $this->insert('med_usuarios',[
					"id" 			=> "NULL",
					"id_persona" 	=> "'$id'",
					"username"  	=> "'$user'",
					"pwd"  			=> "PASSWORD('$pass')",
					"rol" 			=> "'$rol'"
				]);

				if($usuario == true){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}


	}

?>