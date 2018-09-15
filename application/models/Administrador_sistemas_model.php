<?php
class Administrador_sistemas_model extends CI_Model{ 

	public function __construct(){
		parent::__construct();
	}
	
	public function consultar_todo_modulo($consultar){

		$consulta= "SELECT *  
		            FROM  modulos 
		            WHERE descripcion = ?";
		
		$resultado = $this->db2->query($consulta, array($consultar['nombre']));
		
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}	
	}
	
	public function cargar_modulo($carga){

		$consulta= "INSERT INTO modulos 
		            VALUES (?, ?, ?, ?, ?)";

		$fecha_trans = date('Y-m-d H:i:s');
		$resultado = $this->db2->query($consulta, array($carga['id'], $carga['nombre'], $fecha_trans, $this->session->userdata('cedula'), 'TRUE'));
	
		if(!$resultado){
			return false;	
		}else{
			return true;
		}	
	}
	
	public function consultar_id_modulo(){	

		$consulta= "SELECT MAX(id) AS maximo
					FROM modulos";
		
		$resultado = $this->db2->query($consulta);
		
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}
	}
	

   	public function consultar_modulos($consultar){

		$consulta= "SELECT DISTINCT(usuario_administrador.id_modulo) AS id, modulos.descripcion
		            FROM modulos, usuario_administrador
		            WHERE usuario_administrador.cedula=?
		            AND usuario_administrador.estatus=?	
		            AND usuario_administrador.id_modulo=modulos.id            
		            ORDER BY usuario_administrador.id_modulo ASC";

		$resultado = $this->db2->query($consulta, array($this->session->userdata('cedula'), $consultar['administrador']));
		//echo $this->db2->last_query();
		
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}		
   	}

   	public function consultar_todo_submodulo($consultar){
   	
		$consulta= "SELECT *  
		            FROM  submodulos 
		            WHERE id_modulos = ?
		            AND descripcion = ?
		            AND estatus = 'TRUE'";
		
		$resultado = $this->db2->query($consulta, array($consultar['modulo'], $consultar['submodulo']));
		
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}	
	}

	public function consultar_id_submodulo($consultar){	

		$consulta= "SELECT MAX(id) AS maximo
					FROM submodulos
					WHERE id_modulos = ?";
		
		$resultado = $this->db2->query($consulta, $consultar['modulo']);
		
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}
	}

	public function cargar_submodulo($carga){

		$consulta= "INSERT INTO submodulos 
		            VALUES (?, ?, ?, ?, ?, ?)";

		$fecha_trans = date('Y-m-d H:i:s');
		$resultado = $this->db2->query($consulta, array($carga['id'], $carga['submodulo'], $carga['modulo'], $fecha_trans, 
										$this->session->userdata('cedula'), 'TRUE'));
	
		//echo $this->db2->last_query();
		if(!$resultado){
			return false;
		}else{
			return true;
		}	
	}
   
    public function consultar_submodulos($consultar){

		$consulta= "SELECT DISTINCT(id),descripcion 
		            FROM submodulos
		            WHERE id_modulos = ?
		            AND estatus = 'TRUE' 		            
		            ORDER BY id ASC";

		$resultado = $this->db2->query($consulta, $consultar['modulo']);

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}		
    }
	
	public function consultar_opcion_activa($consultar){

		$consulta= "SELECT *  
		            FROM  opciones
		            WHERE id_modulos = ?
		            AND id_submodulos= ?
		            AND descripcion = ?
		            AND estatus = 'TRUE'"; 
		
		$resultado = $this->db2->query($consulta, array($consultar['modulo'], $consultar['submodulo'], $consultar['opcion']));

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}	
	}

	public function consultar_todo_opcion($consultar){

		$consulta= "SELECT *  
		            FROM  opciones
		            WHERE id_modulos = ?
		            AND id_submodulos= ?"; 
		
		$resultado = $this->db2->query($consulta, array($consultar['modulo'], $consultar['submodulo']));

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}	
	}

	public function consultar_opciones_usuarios($consultar){

		$consulta= "SELECT opciones.*  
		            FROM  opciones
		            WHERE id NOT IN (SELECT id_opciones 
		            				FROM privilegios 
		            				WHERE cedula=? 
		            				AND id_submodulos =?
		            				AND id_modulos = ?
		            				AND estatus='TRUE')
		            AND id_submodulos= ?
		            AND id_modulos = ?
		            AND estatus = 'TRUE'
		            ORDER BY id ASC";
		
		$resultado = $this->db2->query($consulta, array($consultar['cedula'], $consultar['submodulo'], $consultar['modulo'], 
										$consultar['submodulo'], $consultar['modulo']));

		//echo $this->db2->last_query();
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}		
   	}

   public function consultar_id_opcion($consultar){	

		$consulta= "SELECT MAX(id) AS maximo
					FROM opciones
					WHERE id_modulos = ?
					AND id_submodulos = ?";
		
		$resultado = $this->db2->query($consulta,array($consultar['modulo'], $consultar['submodulo']));
		
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}
	}
    
    public function consultar_datos_modulo($consultar){

		$consulta= "SELECT *
					FROM modulos
					WHERE id = ?";
		
		$resultado = $this->db2->query($consulta, $consultar['modulo']);
		
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}
	}

	public function consultar_datos_submodulo($consultar){

		$consulta= "SELECT *
					FROM submodulos
					WHERE id = ?";
		
		$resultado = $this->db2->query($consulta, $consultar['submodulo']);
		
		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}
	}

	public function cargar_opcion($carga){

    		$consulta= "INSERT INTO opciones 
    		            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    		$fecha_trans = date('Y-m-d H:i:s');
			$resultado = $this->db2->query($consulta, array($carga['id'], $carga['opcion'],$carga['submodulo'], $carga['modulo'], $fecha_trans, 
											$this->session->userdata('cedula'), 'TRUE', $carga['url']));
		
		if(!$resultado){
			return false;
		}else{
			return true;
		}	
	}

	public function cargar_privilegio($carga){

		$consulta= "INSERT INTO privilegios 
		            VALUES (?, ?, ?, ?, ?, ?, ?	)";

		$fecha_trans = date('Y-m-d H:i:s');
		$resultado = $this->db2->query($consulta, array($carga['cedula'], $carga['submodulo'], $carga['modulo'], $fecha_trans,  
										$this->session->userdata('cedula'), 'TRUE', $carga['opcion']));
		
		//echo $this->db2->last_query();
		if(!$resultado){
			return false;
		}else{
			return true;
		}	
	}

	public function consultar_privilegio_por_opcion($carga){

		$consulta= "SELECT *
					FROM privilegios
					WHERE cedula=?
					AND id_submodulos=?
					AND id_modulos=?
					AND id_opciones=?";

		$resultado = $this->db2->query($consulta, array($carga['cedula'], $carga['submodulo'], $carga['modulo'], $carga['opcion']));
		//echo $this->db2->last_query();

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}	
	}

	public function actualizar_estatus_activo_privilegio_por_modulo($actualizar){

		$consulta= "UPDATE privilegios 
					SET (estatus) 
					= (?)
					WHERE cedula=?
					AND id_modulos=?";
		
		$resultado = $this->db2->query($consulta, array('TRUE',$actualizar['cedula'], $actualizar['submodulo'], $actualizar['modulo'], 
										$actualizar['opcion']));
		
		//echo $this->db2->last_query();

		if(!$resultado){
			return false;
		}else{
			return true;
		}
	}

	public function consultar_permisos_activos($consultar){

		$consulta= "SELECT modulos.descripcion AS mod_des, modulos.id AS mod_id,
					submodulos.descripcion AS sub_des,  submodulos.id AS sub_id,
					opciones.descripcion AS op_des, opciones.id AS op_id,
					privilegios.cedula AS cedula
					FROM modulos, submodulos, opciones, privilegios 
					WHERE submodulos.id_modulos = modulos.id
		   			AND submodulos.id_modulos = opciones.id_modulos 
		   			AND submodulos.id = opciones.id_submodulos
		   			AND opciones.id_submodulos = privilegios.id_submodulos 
		   			AND opciones.id_modulos = privilegios.id_modulos
		   			AND opciones.id = privilegios.id_opciones
		   			AND privilegios.cedula = ? 
		   			AND modulos.estatus = 'TRUE'
		   			AND submodulos.estatus = 'TRUE' 
		   			AND opciones.estatus = 'TRUE' 
		   			AND privilegios.estatus = 'TRUE' 
		   			ORDER BY modulos.id, submodulos.id, opciones.id";
		
		$resultado = $this->db2->query($consulta, $consultar['cedula']);
		//echo $this->db2->last_query();

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}		
    }

   	public function consultar_estatus_opciones($consultar){

		$consulta= "SELECT modulos.descripcion AS mod_des, 
					submodulos.descripcion AS sub_des,
					opciones.descripcion AS op_des,
					privilegios .*
		            FROM  modulos, submodulos, opciones, privilegios
		            WHERE privilegios.cedula=?
		            AND privilegios.id_modulos=?
		            AND privilegios.id_submodulos=?
		            AND privilegios.id_modulos=modulos.id
		            AND privilegios.id_submodulos=submodulos.id
		            AND privilegios.id_modulos=opciones.id_modulos
		            AND privilegios.id_submodulos=opciones.id_submodulos
		            AND opciones.id=privilegios.id_opciones
		            ORDER BY privilegios.id_opciones ASC";
		
		$resultado = $this->db2->query($consulta, array($consultar['cedula'], $consultar['modulo'], $consultar['submodulo']));
		//echo $this->db2->last_query();

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}		
   	}

   	public function actualizar_estatus_privilegio($actualizar){

		$consulta= "UPDATE privilegios 
					SET (estatus) 
					= (?)
					WHERE cedula=?
					AND id_submodulos=?
					AND id_modulos=?
					AND id_opciones=?";
		
		$resultado = $this->db2->query($consulta, array($actualizar['permiso'], $actualizar['cedula'], $actualizar['submodulo'], 
										$actualizar['modulo'], $actualizar['opcion']));
		
		//echo $this->db2->last_query().'<br>';

		if(!$resultado){
			return false;
		}else{
			return true;
		}
	}

	public function consultar_nombre_usuario_por_cedula($consultar){

		$consulta= "SELECT nom_trabajador, ape_trabajador
		            FROM  pet_personal
		            WHERE ced_trabajador=?";
		
		$resultado = $this->db3->query($consulta, $consultar['cedula']);

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}		
   	}

   	public function consultar_administrador($consultar){

		$consulta= "SELECT estatus
		            FROM  usuario_administrador
		            WHERE cedula=?
		            AND id_modulo=?";
		
		$resultado = $this->db2->query($consulta, array($consultar['cedula'], $consultar['modulo']));
		//echo $this->db2->last_query();

		if(empty($resultado->result())){
			return false;
		}else{
			return $resultado->result_array();
		}		
   	}

   	public function consultar_usuario_administrador_por_estatus($consultar){

		$consulta= "SELECT id_modulo, estatus, cedula  
		            FROM usuario_administrador	
		            WHERE id_modulo=?
		            AND estatus=?
		            AND cedula<>?";

		$resultado = $this->db2->query($consulta, array($consultar['modulo'], 'A', $consultar['cedula']));
		//echo $this->db2->last_query();

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}		
   	}

   	public function consultar_usuario_administrador_por_cedula($consultar){

		$consulta= "SELECT id_modulo, estatus  
		            FROM usuario_administrador
		            WHERE cedula=?	
		            AND id_modulo=?";

		$resultado = $this->db2->query($consulta, array($consultar['cedula'], $consultar['modulo']));
		//echo $this->db2->last_query();

		if(!$resultado){
			return false;
		}else{
			return $resultado->result_array();
		}		
   	}

   	public function cargar_usuario_administrador($carga){

		$consulta= "INSERT INTO usuario_administrador 
		            VALUES (?, ?, ?, ?, ?)";

		$fecha_trans = date('Y-m-d H:i:s');

		$resultado = $this->db2->query($consulta, array($carga['cedula'], $carga['modulo'], $carga['es_admin'], $fecha_trans,  
										$this->session->userdata('cedula')));
		
		//echo $this->db2->last_query();

		if(!$resultado){
			return false;
		}else{
			return true;
		}	
	}

	public function actualizar_usuario_administrador($actualizar){

		$consulta= "UPDATE usuario_administrador
					SET (estatus) 
					= (?)
					WHERE cedula=?
					AND id_modulo=?";
		
		$resultado = $this->db2->query($consulta, array($actualizar['es_admin'],$actualizar['cedula'], $actualizar['modulo']));
		//echo $this->db2->last_query();

		if(!$resultado){
			return false;
		}else{
			return true;
		}
	}

	public function actualizar_usuario_administrador_inactivo($actualizar){

		$consulta= "UPDATE usuario_administrador
					SET (estatus) 
					= (?)
					WHERE cedula<>?
					AND cedula <>100
					AND id_modulo=?";
		
		$resultado = $this->db2->query($consulta, array('C', $actualizar['cedula'], $actualizar['modulo']));
		//echo $this->db2->last_query();

		if(!$resultado){
			return false;
		}else{
			return true;
		}
	}

	public function cargar_imagen($carga){

		$consulta= "INSERT INTO galeria_presentacion
		            VALUES (?, ?, ?, ?, ?, ?)";

		$fecha_trans = date('Y-m-d H:i:s');

		$resultado = $this->db3->query($consulta, array($carga['nombre_imagen'], $carga['tipo_imagen'], $carga['peso_imagen'], $fecha_trans,  
										$this->session->userdata('cedula'), $carga['estatus']));
		
		//echo $this->db3->last_query();

		if(!$resultado){
			return false;
		}else{
			return true;
		}	
	}
}