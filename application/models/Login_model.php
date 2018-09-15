<?php
class Login_model extends CI_Model{ 

	public function __construct(){
		parent::__construct();
	}
	
	public function obtener_datos_login_por_usuario($consultar){
		
		$consulta= "SELECT * 
					FROM usuarios 
					WHERE uslogin =?"; 
		
		$resultado=$this->db->query($consulta, $consultar['usuario']);
		//echo $this->db->last_query();

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}	
	}

	public function obtener_nombre_apellido_por_cedula($consultar){
		
		$consulta= "SELECT * 
					FROM privilegios 
					WHERE tabperso_percedu = ?";
		
		$resultado=$this->db2->query($consulta, $consultar['cedula']);
		
		if($resultado->num_rows()!=0){
			return $resultado->row();
		}else{
			return false;
		}
	}
}