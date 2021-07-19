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

		public function setUserData($data){
			$this->userData = $_SESSION;
		}

	}
?>