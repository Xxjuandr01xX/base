<?php
	defined('BASEPATH')or exit('No acceda de forma inapropiada');

	class Pagos extends Controller{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$session = new Session();
			$session->Init();
			$this->render('pagos/index',["titulo" => "Gestion de Pagos"]);
		}

		public function listadoPagos(){
			$table = "";
			$pagos = new PagosModel();
			if(count($pagos->getAll()) < 1){
				$table = "<button class = 'w-100 btn btn-warning p-5 rounded-0'>No hay Pagos Registrados</button>";
			}else{
				$table = "<table class = 'table table-stripped table-hover table-bordered' id = 'pagos-dataTable'>";
				$table .= '<thead>'.
					'<tr>'.
						'<td>Motivo</td>'.
						'<td>Monto</td>'.
						'<td>Fecha</td>'.
						'<td>Ver</td>'
					.'</tr>'
				.'</thead><thead>';
				foreach($pagos->geAll() as $pg){
					$table .= "<tr>".
								"<td>".$pg->motivo."</td>".
								"<td>".$pg->monto."</td>".
								"<td>".$pg->fec_pago."</td>".
								"<td>".
									"<a onclick = 'verPago(".$pg->id.")' class = 'btn btn-primary rounded-pill btn-sm'><span class = 'bi-check-lg'></span> Ver</a>"
								."</td>".
							  "</tr>";
				}
				$table .= "</tbody></table>";
			}
			echo $table;
		}


	}
?>