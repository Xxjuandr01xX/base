<?php
	defined('BASEPATH')or exit('No acceda de forma inapropiada');

	class Medicos extends Controller{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$session = new Session();
			$session->Init();
			$this->render('medicos/list',["titulo" => "Listado de Medicos"]);
		}

		public function nuevo(){
			$session = new Session();
			$session->Init();
			$this->render('medicos/nuevo',["titulo" => "Agregar Nuevo Medico"]);
		}

		public function editar(){
			$session = new Session();
			$session->Init();
			$this->render('medicos/editar',["titulo" => "Actualizar Informacion de Medico"]);
		}
	}
?>