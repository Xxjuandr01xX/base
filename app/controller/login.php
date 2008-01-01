<?php
	class Login extends Controller{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->render('login/login', ["titulo"=>"Esto es una prueba con los controladores"]);
		}

		
	}
?>