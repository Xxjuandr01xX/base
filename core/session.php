<?php
	class Session{
		public function Init(){
			session_start();
		}

		public function Close(){
			session_destroy();
		}

		public function Create($index,$value){
			$_SESSION[$index] = $value;
		}

		public function userData(){
			return $_SESSION;
		}

		public function load($index){
			return $_SESSION[$index];
		}

		public function Redirect(){
			if (!isset($_SESSION) || empty($_SESSION)){
				header('Location:?op=login/index');
			}
		}

	}
?>