<?php
    class Conexion{
        private $host;       
        private $user;       
        private $pass;      
        private $db;        
        private $charset;   
        private $driver;
        
        public function __construct(){
            require_once 'parametros.php';
            $this->host     = $param['HOST'];       
            $this->user     = $param['USER'];
            $this->pass     = $param['PASS'];
            $this->db       = $param['DB'];
            $this->charset  = $param['CHARSET'];
            $this->driver   = $param['DRIVER'];
        }

        public function Link(){
			try{
				$mysqli = new mysqli($this->host,$this->user,$this->pass,$this->db);
				mysqli_set_charset($mysqli,'utf-8');
				return $mysqli;
			}catch(Exception $e){
				echo "[MENSAGE:===>] ".$e->getMensage()."</br> [LINE ==>] ".$e->getLine();
			}
        }
        
    }
    
?>