<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Solicitud_personal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$ci        = &get_instance();
		$this->db2 = $ci->load->database('menu', TRUE);
		$this->db3 = $ci->load->database('sistemas', TRUE);
	}

	public function index($data = '', $administrar = 0) {
		$data['error']   = 0;
		$data['mensaje'] = '';
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$this->load->view('Presidencia/ventanas_modales_presidencia');
		$this->load->view('Presidencia/'.$data["completar_proceso"], $data);
		$this->load->view('footer');
	}
	public function listado() {
		$data["completar_proceso"] = 'listado_solicitudes';

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

	

	
}