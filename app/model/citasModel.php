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
			$sql = "INSERT INTO med_citas VALUES (NULL,'".$cod."','".$paciente."','".$medico."','".$fec."','00:00:00','".$mot."')";
			$res = $this->get_conection()->query($sql);
			if($res){
				$id      = mysqli_insert_id($this->get_conection());
				$fecha   = date('Y-m-d');
				$sql_II  = "INSERT INTO med_citas_hist VALUES (NULL,'$id','$fecha',1)";
				$res_II  = $this->get_conection()->query($sql_II);
				if($res_II){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		public function verificarCorrelativo($cod_cta){
			$respuesta = NULL;
			$cod = $this->get_where('med_citas',["cod_cita" => $cod_cta]);
			if(count($cod) == 0){
				$respuesta = true;
			}else{
				$respuesta = false;
			}
			return $respuesta;
		}


	}

?>