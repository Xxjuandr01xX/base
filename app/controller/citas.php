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
			$this->render('citas/panel',["titulo" => "Citas Medicas"]);
		}

		public function addCita(){
			$resp = '';
			$cta = new CitasModel();
			$cod = $_POST['codigo'];
			if($cta->verificarCorrelativo('"$cod"') == true){
				if($cta->ctaInsert($_POST['codigo'],$_POST['selectPacientes'],$_POST['selectMedicos'],dateToSql($_POST['fecha']),$_POST['hora'],$_POST['motivo']) == true){
					$resp = '1';
				}else{
					$resp = '0';
				}
			}else{
				$resp = 'duplicate';
			}
			echo $resp;
		}

		public function getPacientesList(){
			$session = new Session();
			$session->Init();
			$personas = new PersonasModel();
			$resp     = "";
			foreach ($personas->getAll() as $per) {
				if($per->id_tipo == '2'){
					echo "<option value = '".$per->id."'>".$per->nombre." ".$per->apellido."</option>";
				}else{
					echo " ";
				}
			}
		}

		public function getMedicosList(){
			$session = new Session();
			$session->Init();
			$personas = new PersonasModel();
			$resp     = "";
			foreach ($personas->getAll() as $per) {
				if($per->id_tipo == '1'){
					echo "<option value = '".$per->id."'>".$per->nombre." ".$per->apellido."</option>";
				}else{
					echo " ";
				}
			}
		}

		public function tableCitas(){
			$session = new Session();
			$session->Init();
			$table = "";
			$citas = new CitasModel();
			$per   = new PersonasModel();

			if(count($citas->getAll()) < 1){
				$table = "<button class = 'btn btn-warning p-4 w-100'>No hay informacion para mostrar...!</button>";
			}else{
				$table = '<table class = "table table-stripped table-hover table-bordered rounded-0 w-100" id = "citas-table">'.
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
					$table .= '<tr>'.
						'<td><b>'.$x.'</b></td>'.
						'<td>'.$data->cod_cita.'</td>'.
						'<td>'.$per->getNombreById($data->id_paciente_fk).'</td>'.
						'<td>'.$per->getNombreById($data->id_medico_fk).'</td>'.
						'<td>'.sqlToLabel($data->fec_cita).'</td>'.
						'<td>'.$citas->getEstatusCita($data->id).'</td>';
						if($_SESSION['rol'] == "1"){
							$table .= '<td>'.
								'<button class = "btn btn-sm btn-primary rounded-circle"><span class = "bi-eye-fill"></span></button>'.
								'<button class = "btn btn-sm btn-warning rounded-circle"><span class = "bi-pencil-square"></span></button>'.
								'<button class = "btn btn-sm btn-danger  rounded-circle"><span class = "bi-trash-fill"></span></button>'
							.'</td></tr>';
						}else{
							$table .= '<td>'.
								'<button class = "btn btn-sm btn-primary rounded-circle"><span class = "bi-pencil-square"></span></button>'.
								'<button class = "btn btn-sm btn-warning rounded-circle"><span class = "bi-trash-fill"></span></button>'
							.'</td></tr>';
						}
				}
				$table .= '<tbody></table>';
				echo $table;
			}
		}
		
	}
?>