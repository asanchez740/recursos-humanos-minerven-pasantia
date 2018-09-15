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
		$this->load->view('Consultoria_juridica/ventanas_modales_consultoria_juridica');
		$this->load->view('Consultoria_juridica/'.$data["completar_proceso"], $data);
		$this->load->view('footer');
	}

	public function solicitud_personal() {
		$data["completar_proceso"] = 'solicitud_personal';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}
	}

	public function listado() {
		$data["completar_proceso"] = 'listado_solicitudes';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}
	}
	public function elegibles_aprobados($id) {
		$id_seguimiento['id']=$id;
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$this->load->view('Consultoria_juridica/ventanas_modales_consultoria_juridica');
		$this->load->view('Consultoria_juridica/elegibles_aprobados',$id_seguimiento);


	}
	public function seguimiento_solicitud() {

		$data["completar_proceso"] = 'seguimiento';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}

	}
	public function seleccion_personal() {

		$data["completar_proceso"] = 'seleccion_personal';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}

	}
}