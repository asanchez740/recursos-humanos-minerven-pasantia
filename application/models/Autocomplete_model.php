<?php
class Autocomplete_model extends CI_Model { 

	public function __construct(){
		parent::__construct();
		$ci= &get_instance();
		$this->db3= $ci->load->database('sistemas',TRUE);
	}

	public function get_by_cedula($term){

		$consulta= "SELECT DISTINCT ced_trabajador
					FROM pet_personal
					WHERE TO_CHAR(ced_trabajador, '999999999999') LIKE ?
					ORDER BY ced_trabajador ASC LIMIT 3"; 
		
		$term='%'.$term.'%';
		$resultado = $this->db3->query($consulta, $term);
		
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}	
	}
}
	
