<?php
	 class Usuarios extends Model{
	 	public function __construct(){
	 		parent::__construct();
	 	}

	 	public function getByIdPersona($id){
	 		return $this->get_where('med_usuarios',[
	 			"id_persona" => "'$id'"
	 		]);
	 	}

	 	public function getAll(){
	 		return $this->get_all('med_usuarios');
	 	}

	 	public function getRoleUsuarios(){
	 		return $this->get_all('med_rol');
	 	}

	 	public function userVerify($user,$pass){
	 		$sql = $this->EjecutarSQL("SELECT * FROM med_usuarios WHERE username = '$user' AND pwd = PASSWORD('$pass')");
	 		if(count($sql) < 1){
	 			return False;
	 		}else{
	 			return $sql;
	 		}
	 	}

	 } 
?>