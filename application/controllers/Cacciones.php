<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Cacciones extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$ci        = &get_instance();
		$this->db2 = $ci->load->database('menu', TRUE);
		$this->db3 = $ci->load->database('sistemas', TRUE);
		$this->load->model('Mseguimiento_solicitudes_personal');
		$this->load->model('Msolicitudes');
		
	}

	public function index($data = '', $administrar = 0) {
		
	}

	public function botonEnviar() {

		$post = $this->input->post();
		$solicitud['id_solicitud'] = $post['id_solicitud'];
		$solicitud['id_seguimiento'] = $post['id_seguimiento'];
		$solicitud['n_estado'] = $post['n_estado'];
		$solicitud['descrip_segui'] = $post['descripcion']; 
		$estatus['estatus'] = TRUE;
		$se = $solicitud['id_seguimiento'];
		$se2 = $solicitud['n_estado'];
		$result = $this->Mseguimiento_solicitudes_personal->insertar($estatus,$solicitud);
		if ($result == 1) {
			if($se == 0){ //guardado
				$solicitud['n_estado'] =2;
				$solicitud['id_seguimiento'] =0;	
				$id_solicitud=$solicitud['id_solicitud'];
				$fecha2=$fecha=$this->funciones->fechaModi();
				$this->Mseguimiento_solicitudes_personal->updateFecha($id_solicitud,$id_seguimiento,$fecha2);
				$result = $this->Mseguimiento_solicitudes_personal->update_solicitud($solicitud);	
			}else{ // aprobados
				$solicitud['n_estado'] = $se2+1;
				$solicitud['id_seguimiento'] =$se-1;// el actual lo coloque aprobado
				$id_solicitud=$solicitud['id_solicitud'];
				$id_seguimiento=$solicitud['id_seguimiento'];
				$fecha2=$fecha=$this->funciones->fechaModi();
				$this->Mseguimiento_solicitudes_personal->updateFecha($id_solicitud,$id_seguimiento,$fecha2);
				$result = $this->Mseguimiento_solicitudes_personal->update_solicitud($solicitud);	
			}
		}
		echo $result;

		
	}
	public function BotonRechazar(){
		//boton rechazar solicitudes de las otras vistas
		//se pasa el id_solicitud id_seguimiento_solicitud se elimina de la tabla con esos datos
		//luego se actualiza el (id_seguimiento_solicitud-1) n_estado=0 para poder modificar la solictud 
		// para poder enviarla nuevamente

		$post = $this->input->post();
	
		$solicitud['id_solicitud'] = $post['id_solicitud'];
		$solicitud['id_seguimiento'] = $post['id_seguimiento'];

		$solicitud['n_estado'] = $post['n_estado'];
		$solicitud['estatus'] = $post['estatus'];
		$solicitud['razon'] = $post['razon'];
		$se = $solicitud['id_seguimiento'];
		$result = $this->Mseguimiento_solicitudes_personal->eliminar($solicitud);
		if ($result) {
			$solicitud['id_seguimiento'] = $se-1;
			//$solicitud['n_estado'] = $post['n_estado'];
			$result = $this->Mseguimiento_solicitudes_personal->updateObserv($solicitud);
		}
		echo $result;
	}

	public function botonEliminar(){ 
		//para la vista 1 solicitudes realizadas que se muestran todas las solicitudes
		/// se coloca en false en la tabla solictud y en la de seguimiento si se eliminan todas
		$post = $this->input->post();
		$id_seguimiento = $post['id_solicitud'];

		$resul = $this->Msolicitudes->update($id_seguimiento);
		if ($resul) {
			$resul = $this->Mseguimiento_solicitudes_personal->eliminar2($id_seguimiento);
		}
		echo $resul;
	}
}