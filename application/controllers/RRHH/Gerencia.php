<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Gerencia extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$ci        = &get_instance();
		$this->db2 = $ci->load->database('menu', TRUE);
		$this->db3 = $ci->load->database('sistemas', TRUE);
		$this->load->model('Mseguimiento_solicitudes_personal');
	}

	public function index($data = '', $administrar = 0) {
		$data['error']   = 0;
		$data['mensaje'] = '';
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$this->load->view('RRHH/Gerencia/ventanas_modales_grrhh');
		$this->load->view('RRHH/Gerencia/'.$data["completar_proceso"], $data);
		$this->load->view('footer');
	}

	public function solicitudes_personal() {
		$data["completar_proceso"] = 'solicitud_personal';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}
	}
	public function listaSolicitudes(){

		$post = $this->input->post();
		$id_seguimiento = $post['id'];
		$resultado = $this->Mseguimiento_solicitudes_personal->getSeguimiento_solicitud_p($id_seguimiento,1);
		echo json_encode($resultado);						
	}
	public function listaSolicitudesContrato(){

		$post = $this->input->post();
		$id_seguimiento = $post['id'];
		$resultado = $this->Mseguimiento_solicitudes_personal->getSeguimiento_solicitud_s($id_seguimiento,8);
		echo json_encode($resultado);						
	}
	

	public function ingresarObservacion() // no se utiliza por los momentos
	{	
		$post = $this->input->post();
		$info['id_solicitud'] = $post['id_solicitud'];
		$info['id_seguimiento'] = $post['id_seguimiento'];
		$info['observacion'] = $post['observacion'];
		$resultado = $this->Mseguimiento_solicitudes_personal->updateObservacion($info);
		echo json_encode($resultado);
	}
}