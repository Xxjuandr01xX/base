<?php
	
	define('BASEPATH', true);

	require_once 'core/parametros.php';
	require_once 'core/session.php';
	require_once 'core/funciones.php';
	require_once 'core/funcionesDb.php';
	require_once 'core/controller.php';

	if(!isset($_GET['op']) || empty($_GET['op'])){
		header('location:?op=login/index');
	}else{
		$op = explode('/', $_GET['op']);
		$controller = $op[0];
		$accion     = $op[1];
		if(file_exists('app/controller/'.$controller.'.php') || !empty($_SESSION)){
			require_once 'app/controller/'.$controller.'.php';
		}else{
			require_once 'app/controller/login.php';
		}
		$obj = new $controller();
		if(!method_exists($obj, $accion)){
			$accion = 'index';
		}
		$obj->$accion();
	}
	
?>