<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Ccargar_cargos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$ci        = &get_instance();
		$this->db2 = $ci->load->database('menu', TRUE);
		$this->db3 = $ci->load->database('sistemas', TRUE);
		$this->load->model('Munidades');
		$this->load->model('Mcargos');
		$this->load->model('Mprofesiones_cargo');
	}

	public function index($data = '', $administrar = 0) {
		$data['error']   = 0;
		$data['mensaje'] = '';
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$this->load->view('RRHH/Laborales/ventanas_modales_laborales');
		$this->load->view('RRHH/Laborales/'.$data["completar_proceso"], $data);
		$this->load->view('footer');
	}


	public function Cargar_cargo() {
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$data['nombre_u']= $this->Munidades->getUnidades();
		$data['id_u']   = $this->Munidades->getUnidades();

		$data['id_profesion'] = $this->Mprofesiones_cargo->getProfesiones();
		$data['nombre_profesion'] = $this->Mprofesiones_cargo->getProfesiones();
		$this->load->view('RRHH/Laborales/ventanas_modales_laborales',$data);
		$this->load->view('RRHH/Laborales/vcargos',$data);
		
	}
	public function guardar()
	{
			$post = $this->input->post();
			
			$cargo['id']=$post['id'];
			$cargo['postname'] = $post['postname'];
			$cargo['fulaboral'] = $post['fulaboral'];
			$cargo['postunidad'] = $post['postunidad'];
			$cargo['posdecrip'] = $post['posdecrip'];
			$idcargo = $this->Mcargos->insertar($cargo);
			
			echo $idcargo;	
	}

	public function profesiones_cargo() {
		$data["completar_proceso"] = 'Profesiones_cargo';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}
	}

}
