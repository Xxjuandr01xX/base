<?php
	/**
	  * PARAMETROS DE CONEXION CON MYSQL.
	  */
    $param['HOST']      = "localhost"; 
    $param['USER']      = "root"; 
    $param['PASS']      = ""; 
    $param['DB']        = "prueba"; 
    $param['CHARSET']   = "utf-8"; 
    $param['DRIVER']    = "mysql"; 
	/**
	  *NOMBRE PARA CONTROLADOR POR DEFECTO
	  */
	$param['DEFAULT_CONTROLLER'] = "";
	$param['DEFAULT_METHOD']     = "";
	/**
	  *VARIABLES PARA MANIPULACION DE URL Y
	  *METODOS DE PETICIONES
	  */
	$param['URI'] 			 = $_SERVER['REQUEST_URI'];
	$param['REQUEST_METHOD'] = $_SERVER['REQUEST_METHOD'];
	/**
	  *RUTAS POR DEFECTO DE CARPETAS PARA :
	  * - URL.
	  * - CONTROLADORES.
	  * - VISTAS.
	  * - MODELOS.
	  */
	$param['BASE_PATH']        = "";
	$param['CONTROLLERS_PATH'] = "";
	$param['VIEWS_PATH']       = "";
	$param['MODEL_PATH']       = "";

	define('__APPNAME__','NOMBRE DE MI APP');
?>