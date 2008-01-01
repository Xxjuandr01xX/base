<?php
	/**
	 * Clase para gestionar citas medicas
	 * */
	defined('BASEPATH')or exit('No acceda de forma inapropiada');

	class Citas extends Controller{
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			$session = new Session();
			$session->Init();
			$this->render('pacientes/list',["titulo" => "Citas Medicas"]);
		}

		public function nuevo(){
			$session = new Session();
			$session->Init();
			$this->render('pacientes/nuevo',["titulo" => "Registrar Nuevo Paciente"]);
		}

		public function editarForm(){
			$session = new Session();
			$session->Init();
			$this->render('pacientes/editarForm',["titulo" => "Editar Informacion de Paciente"]);	
		}
		
		public function tablaPacientes(){
			$session = new Session();
			$session->Init();
			$table = "";
			if(count($citas->getAll()) < 1){
				$table = "<button class = 'btn btn-warning p-4 w-100'>No hay informacion para mostrar...!</button>";
			}else{
				$table = '<table class = "table table-stripped table-hover table-bordered rounded-0 w-100" id = "pacientes-table">'.
							'<thead class = "bg-primary text-center text-white">'.
								'<tr>'.
									'<td>NRO</td>'.
									'<td>COD</td>'.
									'<td>PACIENTE</td>'.
									'<td>MEDICO</td>'.
									'<td>FECHA</td>'.
									'<td>ESTATUS</td>'.
									'<td>ACCIONES</td>'.
								'</tr></thead><tbody>';
				$x = 0;
				foreach($citas->getAll() as $data){
					$x++;
					$table .= '<tr>'.'</tr>';
				}
				$table .= '<tbody></table>';
				echo $table;
			}
		}

		
	}
?>