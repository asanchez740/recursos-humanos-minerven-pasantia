<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Personal_activo extends CI_Controller {

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
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('RRHH/Personal_activo/'.$data["completar_proceso"], $data);
		$this->load->view('footer');
	}

	public function datos_trabajador() {
		$data["completar_proceso"] = 'datos_trabajador';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}
	}

	public function cargar_input_personales() {
		$this->load->view('RRHH/Personal_activo/datos_personales');
	}

	public function cargar_input_laborales() {
		$this->load->view('RRHH/Personal_activo/datos_laborales');
	}

	public function cargar_input_academicos() {
		$this->load->view('RRHH/Personal_activo/datos_academicos');
	}
	public function cargar_input_familiar() {
		$this->load->view('RRHH/Personal_activo/carga_familiar');
	}


	public function cargar_select_unidad() {

		$this->load->model('personal_activo_model');
		$data['res_consulta'] = $this->personal_activo_model->consultar_departamentos();
		//var_dump($data);
		$this->load->view('RRHH/Personal_activo/cargar_departamentos', $data);
	}

}
