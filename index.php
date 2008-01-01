<?php
	
	define('BASEPATH', true);

	require_once 'core/parametros.php';
	require_once 'core/session.php';
	require_once 'core/funciones.php';
	require_once 'core/controller.php';

	if(!isset($_GET['op']) || empty($_GET['op'])){
		header('location:?op=login/index');
	}else{
		$op = explode('/', $_GET['op']);
		$controller = $op[0];
		$accion     = $op[1];
		$controller_path = $param['CONTROLLERS_PATH'].$controller.'.php';
		if(!file_exists($controller_path)){
			require_once $param['CONTROLLERS_PATH'].'Login.php';
		}else{
			require_once $controller_path;
		}
		$obj = new $controller();
		if(!method_exists($obj, $accion)){
			$accion = 'index';
		}
		$obj->$accion();
	}
	
?>