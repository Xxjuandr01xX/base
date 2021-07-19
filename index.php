<?php
	require_once 'core/parametros.php';
	require_once 'core/routes.php';
	require_once 'core/session.php';

	$route      = new Route();
	$session    = new Session();
	$controller = $route->controller;
	$action     = $route->action;
	$session->Init();

	if(!file_exists($param['CONTROLLERS_PATH'].$controller || count($session->userData()) == 0) ){

		require_once $param['CONTROLLERS_PATH'].$param['DEFAULT_CONTROLLER'];

	}else{
		require_once $param['CONTROLLERS_PATH'].$controller;
	}

	$obj = new $controller();
	$obj->$action();
?>