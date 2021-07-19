<?php
	class Controller {
		public function __construct(){
			foreach(glob('../app/model/*.php') as $require){
				require_once $require;
			}
		}

		public function render($views, $data){
			$path_viwe = "../app/view/".$view.'.php';
			if(!file_exists($path_viwe)){
				echo "[ EL ARCHIVO ESPECIFICADO NO EXISTE, VERIFIQUE LA RUTA ]";
			}else{
				foreach($data as $id_assoc => $value){
					{$id_assoc} = $value;
				}
				require_once 'helper.php';
				require_once $path_viwe;
			}
		}
	} 
?>