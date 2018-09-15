<?php
class Personal_activo_model extends CI_Model{ 

	public function __construct(){
		parent::__construct();
	}
	
	public function consultar_departamentos(){

		$consulta= "SELECT *  
		            FROM sct_centros_costo";
		
		$resultado = $this->db3->query($consulta);
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}	
	}
	
	
}