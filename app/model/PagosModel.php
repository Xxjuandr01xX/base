<?php
	/**
	 * 
	 */
	class PagosModel extends Model{
		
		function __construct(){
			parent::__construct();
		}

		public function getAll(){
			return $this->get_all('med_pagos');
		}
	}

?>