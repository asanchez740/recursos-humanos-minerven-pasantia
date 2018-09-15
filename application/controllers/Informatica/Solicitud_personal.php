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
		$this->db4 = $ci->load->database('rrhh', TRUE);
		$this->load->model('Mseguimiento_solicitudes_personal');
		$this->load->model('Mpersonal_elegibles');
	}

	public function index($data = '', $administrar = 0) {
		$data['error']   = 0;
		$data['mensaje'] = '';
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$this->load->view('Informatica/ventanas_modales_informatica');
		$this->load->view('Informatica/'.$data["completar_proceso"], $data);
	}

	public function listado_Realizadas() {
		$data["completar_proceso"] = 'listado_solicitudes';
		if ($this->input->post('control') == 1) {
		} else {
			$this->index($data);
		}
	}
	public function seleccion_personal($id) {
		$id_seguimiento['id']=$id;
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$this->load->view('Informatica/ventanas_modales_informatica');
		$this->load->view('Informatica/seleccion_personal',$id_seguimiento);


	}
	public function listaSolicitudes(){

		$post = $this->input->post();
		$id_seguimiento = $post['id'];
		$resultado = $this->Mseguimiento_solicitudes_personal->getSeguimiento_solicitud_s($id_seguimiento,5);
		echo json_encode($resultado);
	}
	public function listarPersonal()
	{
		$post = $this->input->post();
		$id_solicitud = $post['id'];
		$resultado = $this->Mpersonal_elegibles->listar_personal_elegible($id_solicitud);
		echo json_encode($resultado);
	}


	public function solicitudes()
	{
		$data["completar_proceso"] = 'solicitudes';

		if ($this->input->post('control') == 1) {
		} else {
			$this->index($data);
		}	
	}

	public function cargar_input_personales() {
		$this->load->view('Informatica/Personal_elegibles/datos_personales');
	}

	public function cargar_input_academicos() {
		$this->load->view('Informatica/Personal_elegibles/datos_academicos');
	}
	public function cargar_input_familiar() {
		$this->load->view('Informatica/Personal_elegibles/carga_familiar');
	}
	public function cargar_input_exp_laboral() {
		$this->load->view('Informatica/Personal_elegibles/exp_laboral');
	}
	public function cargar_input_cursos_realizados() {
		$this->load->view('Informatica/Personal_elegibles/cursos_realizados');
	}

	public function cargar_select_unidad() {

		$this->load->model('Personal_Elegibles_model');
		$data['res_consulta'] = $this->Personal_Elegibles_model->consultar_departamentos();
		//var_dump($data);
		$this->load->view('Informatica/Personal_elegibles/cargar_departamentos', $data);
	}

}
//18960484