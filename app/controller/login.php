<?php
	defined('BASEPATH')or exit('No acceda de forma inapropiada');
	
	class Login extends Controller{
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			$this->render('login/login', ["titulo"=>"Geston Medica"]);
		}
		public function procesar(){
			$username = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
			$usuarios = new Usuarios();
			$session  = new Session();
			$resp = "";
			if($usuarios->userVerify($username,$password) == False){
				$resp = "0";
			}else{
				foreach($usuarios->userVerify($username,$password) as $usr){
					$session->init();
					$session->Create('user',$usr->username);
					$session->Create('rol',$usr->rol);
				}
				$resp = "1";
			}
			echo $resp;
		}

		public function logOut(){
			$session  = new Session();
			$session->Close();
			echo "1";
		}

		
	}
?>