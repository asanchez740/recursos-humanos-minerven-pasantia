<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Cargar_unidad extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$ci        = &get_instance();
		$this->db2 = $ci->load->database('menu', TRUE);
		$this->db3 = $ci->load->database('sistemas', TRUE);
		$this->load->model('Munidades');
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

	public function Cargar_unidad() {
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');

		$data['id_u'] = $this->Munidades->getUnidades();
		$data['nombre_u']= $this->Munidades->getUnidades();
		$this->load->view('RRHH/Laborales/vdepartamentos',$data);
	}

	public function insertar()
	{
			$post = $this->input->post();
			$unidad['postname'] = $post['postname'];
			$unidad['id'] = $post['id'];
			$unidad['postunidad'] = $post['postunidad'];
			$unidad['posdecrip'] = $post['posdecrip'];
			
			$id_unidad = $this->Munidades->insertarUnidades($unidad);	
			
			echo $id_unidad;
			
		
	}
	public function listar(){
		$this->Munidades->getUnidades();
	}
}
