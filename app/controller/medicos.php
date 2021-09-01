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
			$users = new Usuarios();
			$this->render('medicos/nuevo',[
				"titulo" => "Agregar Nuevo Medico",
				"rol"    => $users->getRoleUsuarios()
			]);
		}

		public function editar(){
			$session = new Session();
			$session->Init();
			$this->render('medicos/editar',["titulo" => "Actualizar Informacion de Medico"]);
		}

		public function newMedico(){
			$id      = filter_input(INPUT_POST, 'id');
			$nom  	 = filter_input(INPUT_POST, 'nom');
			$ape 	 = filter_input(INPUT_POST, 'ape');
			$ced 	 = filter_input(INPUT_POST, 'ced');
			$cel 	 = filter_input(INPUT_POST, 'cel');
			$email 	 = filter_input(INPUT_POST, 'email');
			$sex 	 = filter_input(INPUT_POST, 'sex');
			$fec_nac = filter_input(INPUT_POST, 'fec_nac');
			$dir     = filter_input(INPUT_POST, 'dir');
			$fecha   = dateToSql($fec_nac);
			$user    = filter_input(INPUT_POST,'user');
			$pass    = filter_input(INPUT_POST,'pass');
			$rol     = filter_input(INPUT_POST,'rol');

			$per  = new PersonasModel();
			$resp = ""; 

			if($per->verify($ced) == false){
				if($per->insertMedico($nom, $ape , $ced, $cel, $email, $sex, $fec_nac, $dir, $user, $pass, $rol) == true){
					$resp = "1";
				}else{
					$resp = "0";
				}
			}else{
				$resp = "duplicate";
			}
			echo $resp;
 		}
	}
?>