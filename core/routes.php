<?php
	require_once 'parametros.php';

	class Route{
		private $uri;
		private $controller;
		private $action;
		private $param;

		public function __construct(){
			$this->uri 		  = $this->setUri();
			$this->controller = $this->setController();
			$this->action     = $this->setAction();
			$this->param      = $this->setParam();
		}

		public function getUri(){
			return $this->uri;
		}

		public function getController(){
			return $this->controller;
		}

		public function getAction(){
			return $this->action;
		}

		public function getParam(){
			return $this->param;
		}

		public function setUri(){
			$this->uri = $para['URI'];
		}

		public function setController(){
			$url = explode('/', $this->uri);
			if(empty($url[2])){
				$this->controller = $param['DEFAULT_CONTROLLER'];
			}else{
				$this->controller = $url[2];
			}
		}

		public function setAction(){
			$url = explode('/', $this->uri);
			if(empty($url[3])){
				$this->controller = $param['DEFAULT_METHOD'];
			}else{
				$this->controller = $url[3];
			}
		}

		public function setParam(){
			if($param['REQUEST_METHOD'] == "POST"){
				$this->param = $_POST;
			}else{
				$url = explode('/', $this->uri);
				$this->param = $url[3];
			}
		}
	}
?>