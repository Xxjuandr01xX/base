<?php
	/**
	 * 
	 */
	class ProyectosModel extends Model{
		
		function __construct(){
			parent::__construct();
		}

		public function getAll(){
			return $this->get_all('py_proyectos');
		}
	}
?>