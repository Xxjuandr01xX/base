<?php
	/**
	 * Clase para gestionar citas medicas
	 * */
	defined('BASEPATH')or exit('No acceda de forma inapropiada');

	class Pacientes extends Controller{
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			$session = new Session();
			$session->Init();
			$this->render('pacientes/list',["titulo" => "Listado de Pacientes"]);
		}

		public function nuevo(){
			$session = new Session();
			$session->Init();
			$this->render('pacientes/nuevo',["titulo" => "Registrar Nuevo Paciente"]);
		}

		public function addPaciente(){
			$nom  	 = filter_input(INPUT_POST, 'nom');
			$ape 	 = filter_input(INPUT_POST, 'ape');
			$ced 	 = filter_input(INPUT_POST, 'ced');
			$cel 	 = filter_input(INPUT_POST, 'cel');
			$email 	 = filter_input(INPUT_POST, 'email');
			$sex 	 = filter_input(INPUT_POST, 'sex');
			$fec_nac = filter_input(INPUT_POST, 'fec_nac');
			$dir     = filter_input(INPUT_POST, 'dir');
			$per  = new PersonasModel();
			$resp = "";
			if ($per->verificar_persona($ced) > 0) {
				$resp = "duplicate";
			}else{
				if($per->insert_paciente($nom,$ape,$ced,$cel,$email,$sex,$fec_nac,$dir) == true){

					$resp = "1";

				}else{

					$resp = "0";
				}
			}
			echo $resp;
		}

		public function editarForm(){
			$session = new Session();
			$session->Init();
			$this->render('pacientes/editarForm',["titulo" => "Editar Informacion de Paciente"]);	
		}
		
		public function tablaPacientes(){
			$session = new Session();
			$session->Init();
			$per = new personasModel();
			$table =  "<table class = 'table w-100 table-hover table-bordered' id = 'pacientes-table'>";
			$table .= "<thead class = 'bg-primary text-white'><tr>".
							"<td>CEDULA</td>".
							"<td>NOMBRE</td>".
							"<td>TELEFONO</td>".
							"<td>CORREO</td>".
							"<td>ACCIONES</td>"."</tr></thead><tbody>";
			foreach($per->getAll() as $person){
				if($person->id_tipo == "2"){
					$table .= "<tr>".
								"<td>".$person->ced_ide."</td>".
								"<td>".$per->getNombreById($person->id)."</td>".
								"<td>".$person->telefono."</td>".
								"<td>".$person->correo."</td>".
								"<td>".
									"<button class = 'btn rounded-circle btn-warning btn-sm'><span class = 'bi-pencil'></span></button>".
									"<button class = 'btn rounded-circle btn-danger btn-sm'><span class = 'bi-trash'></span></button>"
								."</td>".
							  "</tr>";
				}else{
	
				}
			}
			$table .= "</tbody></table>";

			echo $table;
		}

		
	}
?>