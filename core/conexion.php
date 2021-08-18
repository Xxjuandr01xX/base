<?php
    class Conexion{
        private $host;       
        private $user;       
        private $pass;      
        private $db;        
        private $charset;   
        private $driver;
        
        public function __construct(){
            $this->host     = "localhost";       
            $this->user     = "root";
            $this->pass     = "";
            $this->db       = "medica";
            $this->charset  = "utf-8";
            $this->driver   = "mysqli";
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