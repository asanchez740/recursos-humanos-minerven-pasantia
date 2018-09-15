<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Personal_elegible extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$ci        = &get_instance();
		$this->db2 = $ci->load->database('menu', TRUE);
		$this->db3 = $ci->load->database('sistemas', TRUE);
		$this->db3 = $ci->load->database('rrhh', TRUE);
		
	}

	public function index($data = '', $administrar = 0) {

		$data['error']   = 0;
		$data['mensaje'] = '';
		//$data2['id_personal']              = $this->Personal_Elegibles_model->getPersonal_elegible();
		//$data2['cedula_personal_elegible'] = $this->Personal_Elegibles_model->getPersonal_elegible();
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$this->load->view('RRHH/Seleccion y Empleo/Personal_Elegible/'.$data["completar_proceso"], $data);
		$this->load->view('footer');

	}
	public function listar() {
		$this->Personal_Elegibles_model->getPersonal_elegible();
	}
	public function insertar() {
		$post                     = $this->input->post();
		$personal['postname']     = $post['postname'];
		$personal['id_personal']  = $post['id_personal'];
		$personal['postpersonal'] = $post['postpersonal'];
		//$personal['posdecrip'] = $post['posdecrip'];

		$id_personal = $this->Personal_Elegibles_model->insertar_personal_elegible($personal);

		echo $id_personal;

	}

	public function elegibles() {
		$data["completar_proceso"] = 'datos_elegibles';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}
	}

	public function cargar_input_info_personal() {
		$this->load->view('RRHH/Seleccion y Empleo/Personal_Elegible/datos_personales');
	}
	public function cargar_input_info_academica() {
		$this->load->view('RRHH/Seleccion y Empleo/Personal_Elegible/datos_academicos');
	}
	public function cargar_input_exp_laboral() {
		$this->load->view('RRHH/Seleccion y Empleo/Personal_Elegible/experiencia_laboral');
	}
	public function cargar_input_cursos_realizados() {
		$this->load->view('RRHH/Seleccion y Empleo/Personal_Elegible/cursos_realizados');
	}
}
