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
			$id 	= filter_input(INPUT_GET, 'cod');
			$per	= new personasModel();
			$user 	= new Usuarios();
			$this->render('medicos/editar',[
				"titulo" 	  => "Actualizar Informacion de Medico",
				"dataPersona" => $per->getBYId($id),
				"dataUsuario" => $user->getByIdPersona($id),
				"rol"         => $user->getRoleUsuarios()
			]);
		}

		public function eliminarMedico(){
			$id = filter_input(INPUT_POST, "id");
			$resp = "";
			$per = new personasModel();
			if($per->dropMedico($id) == true){
				$resp = "1";
			}else{
				$resp = "0";
			}
			echo $resp;
		}

		public function dataTableMedicos(){
			$table = "<table class = 'table table-stripped table-hover w-100 table-bordered' id = 'table-medicos'>".
								"<thead class = 'bg-primary text-white'>".
									"<td><strong>Dni</strong></td>".
									"<td><strong>Nombre</strong></td>".
									"<td><strong>Correo</strong></td>".
									"<td><strong>Telefono</strong></td>".
									"<td><strong>Acciones</strong></td>"
								."</thead><tbody>";
			$per = new personasModel();
			foreach ($per->getAll() as $person) {
				if($person->id_tipo == 1){
					$table .= '<tr>'.
								'<td>'.$person->ced_ide.'</td>'.
								'<td>'.$per->getNombreById($person->id).'</td>'.
								'<td>'.$person->correo.'</td>'.
								'<td>'.$person->telefono.'</td>'.
								'<td>'.
									'<a href = "#" onclick = "eliminarMedico('.$person->id.');" class = "btn btn-danger rounded-circle btn-sm"><span class = "bi-trash"></span></a>'.
									'<a href = "#" onclick = "formEditar('.$person->id.');" class = "btn btn-warning rounded-circle btn-sm"><span class = "bi-pencil-square"></span></a>'.
								'</td></tr>';
				}else{
					
				}
			}
			$table .= "</tbody></table>";
			echo $table;
		}

		public function editarMedico(){
			$nom  	 = filter_input(INPUT_POST, 'nom');
			$ape 	 = filter_input(INPUT_POST, 'ape');
			$ced 	 = filter_input(INPUT_POST, 'ced');
			$cel 	 = filter_input(INPUT_POST, 'cell');
			$email 	 = filter_input(INPUT_POST, 'mail');
			$sex 	 = filter_input(INPUT_POST, 'sex');
			$fec_nac = filter_input(INPUT_POST, 'nac');
			$dir     = filter_input(INPUT_POST, 'dir');
			$fecha   = dateToSql($fec_nac);
			$user    = filter_input(INPUT_POST,'user');
			$pass    = filter_input(INPUT_POST,'pass');
			$rol     = filter_input(INPUT_POST,'rol');
			$id      = filter_input(INPUT_POST, 'id');

			$resp    = "";

			$per = new personasModel();

			if($per->updateMedico($id, $nom, $ape , $ced, $cel, $email, $sex, $fecha, $dir, $user, $pass, $rol) == true){
				$resp = "1";
			}else{
				$resp = "0";
			}

			echo $resp;
		}

		public function newMedico(){
			$nom  	 = filter_input(INPUT_POST, 'nom');
			$ape 	 = filter_input(INPUT_POST, 'ape');
			$ced 	 = filter_input(INPUT_POST, 'ced');
			$cel 	 = filter_input(INPUT_POST, 'cell');
			$email 	 = filter_input(INPUT_POST, 'mail');
			$sex 	 = filter_input(INPUT_POST, 'sex');
			$fec_nac = filter_input(INPUT_POST, 'nac');
			$dir     = filter_input(INPUT_POST, 'dir');
			$fecha   = dateToSql($fec_nac);
			$user    = filter_input(INPUT_POST,'user');
			$pass    = filter_input(INPUT_POST,'pass');
			$rol     = filter_input(INPUT_POST,'rol');

			$per  = new PersonasModel();
			$resp = ""; 

			if($per->verify($ced) == false){
				if($per->insertMedico($nom, $ape , $ced, $cel, $email, $sex, $fecha, $dir, $user, $pass, $rol) == true){
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