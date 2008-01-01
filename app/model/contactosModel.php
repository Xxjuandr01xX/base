<?php
	 class Contactos extends Model{
	 	public function __construct(){
	 		parent::__construct();
	 	}

	 	public function getAll(){
	 		return $this->get_all('contactos');
	 	}

	 	public function getById($id){
	 		return $this->get_by_id('contactos',$id);
	 	}

	 	public function addUser($arr){
	 		return $this->insert('contactos',$arr);
	 	}

	 } 
?>