<?php
class Cuenta_usuario_model extends CI_Model{ 

	public function __construct(){
		parent::__construct();
	}
	
	public function consultar_nombre_usuario_por_cedula($consultar){

		$consulta= "SELECT nom_trabajador, ape_trabajador, ced_trabajador
		            FROM  pet_personal
		            WHERE ced_trabajador=?";
		
		$resultado = $this->db3->query($consulta, $consultar['cedula']);
		//echo $this->db3->last_query();

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}		
   	}

   	public function consultar_cuenta_usuario_por_cedula($consultar){

		$consulta= "SELECT uslogin, cedula, estatus
		            FROM  usuarios
		            WHERE cedula=?";
		
		$resultado = $this->db->query($consulta, $consultar['cedula']);
		//echo $this->db->last_query();
		
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}		
   	}

   	public function crear_cuenta_usuario_por_cedula($carga){

		$consulta= "INSERT INTO usuarios 
		            VALUES (?, ?, ?, ?, ?, ?, ?)";

		$fecha_trans = date('Y-m-d H:i:s');
		$resultado = $this->db->query($consulta, array($carga['nombre'], $carga['cedula'], $carga['clave'], $carga['alt'], $fecha_trans, 
								 		$this->session->userdata('cedula'), 'TRUE'));
		
		if(!$resultado){
			return false;
		}else{
			return true;
		}	
	}

	public function actualizar_cuenta_usuario_por_cedula($actualizar){

		$consulta= "UPDATE usuarios 
					SET (fecha_trans, usuario, estatus) 
					= (?, ?, ?)
					WHERE cedula=?";
		
		$fecha_trans = date('Y-m-d H:i:s');
		$resultado = $this->db->query($consulta, array($fecha_trans, $this->session->userdata('cedula'), $actualizar['estatus'], 
										$actualizar['cedula']));
		
		//echo $this->db->last_query();

		if(!$resultado){
			return false;
		}else{
			return true;
		}
	}

	public function actualizar_clave_usuario($actualizar){

		$actualiza= "UPDATE usuarios 
					SET (clave_parte_uno, clave_parte_dos, fecha_trans, usuario) 
					= (?, ?, ?, ?)
					WHERE cedula=?";

		$fecha_trans = date('Y-m-d H:i:s');
		$resultado = $this->db->query($actualiza, array($actualizar['clave_nueva'], $actualizar['alt'], $fecha_trans, 
										$this->session->userdata('cedula'), $actualizar['cedula']));
		
		//echo $this->db->last_query();

		if(!$resultado){
			return false;
		}else{
			return true;
		}
	}
}