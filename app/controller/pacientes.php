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

		public function editar(){
			$session = new Session();
			$session->Init();
			$id 	= filter_input(INPUT_GET, 'cod');
			$per 	= new PersonasModel();
			$data 	= $per->getBYId($id);
			$this->render('pacientes/editar',["titulo" => "Actualizacion de Datos de Pacientes.", "data" => $data]);
		}

		public function updatePaciente(){
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
			$resp = "";
			$per = new PersonasModel();
			if($per->updatePaciente($id,$nom,$ape,$ced,$cel,$email,$sex,$fecha,$dir) == true){
				$resp = "1";
			}else{
				$resp = "0";
			}
			echo $resp;
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
			$fecha   = dateToSql($fec_nac);
			$per  = new personasModel();
			$resp = "";

			//echo var_dump($per->verify($ced));
			if ($per->verify($ced) == true) {
				$resp = "duplicate";
			}else{
				if($per->insert_paciente($nom,$ape,$ced,$cel,$email,$sex,$fecha,$dir) == true){

					$resp = "1";

				}else{

					$resp = "0";
				}
			}
			echo $resp;
		}

		public function eliminarPaciente(){
			$id = filter_input(INPUT_POST, 'id');
			$resp = "";
			$per = new PersonasModel();
			if($per->elPaciente($id) == true){
				$resp = "1";
			}else{
				$resp = "0";
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
			$per = new PersonasModel();
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
									"<button onclick = 'formEditar(".$person->id.");' class = 'btn rounded-circle btn-warning btn-sm'><span class = 'bi-pencil'></span></button>".
									"<button onclick = 'eliminarPaciente(".$person->id.");' class = 'btn rounded-circle btn-danger btn-sm'><span class = 'bi-trash'></span></button>"
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