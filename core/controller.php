<?php
	class Controller {
		public function __construct(){
			require_once 'core/model.php';
			foreach(glob('app/model/*.php') as $require){
				require_once $require;
			}
		}

		public function render($views, $data){
			$path_view = "app/views/".$views.'.php';
			if(!file_exists($path_view)){
				echo "[ EL ARCHIVO ESPECIFICADO NO EXISTE, VERIFIQUE LA RUTA ]";
			}else{
				foreach($data as $id_assoc => $value){
					${$id_assoc} = $value;
				}
				require_once 'helper.php';
				require_once $path_view;
			}
		}
	} 
?>