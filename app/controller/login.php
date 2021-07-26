<?php
	defined('BASEPATH')or exit('No acceda de forma inapropiada');
	
	class Login extends Controller{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$contactos = new Contactos();
			$this->render('login/login', ["titulo"=>"Esto es una prueba con los controladores","contactos" => $contactos->getAll()]);
		}

		
	}
?>