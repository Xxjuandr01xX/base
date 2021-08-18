<?php

/**
	 * 
	 */
	class CitasModel extends Model{
		
		function __construct(){
			parent::__construct();
		}

		public function getAll(){
			return $this->get_all('med_citas');
		}

		public function getEstatusCita($id_cita){
			$estatus_id = "";
			$estatus    = "";
			foreach ($this->get_where('med_citas_hist',["id_cita_fk" => $id_cita]) as $data) {
				$estatus_id = $data->id_estatus_fk;
				foreach ($this->get_where('med_citas_estatus',["id" => $estatus_id]) as $sts) {
					$estatus = $sts->descripcion;
				}
			}
			return $estatus;
		}

		public function ctaInsert($cod,$paciente,$medico,$fec,$hor,$mot){
			
		}


	}

?>