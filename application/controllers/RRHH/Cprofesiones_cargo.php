<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Cprofesiones_cargo extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$ci        = &get_instance();
		$this->db2 = $ci->load->database('menu', TRUE);
		$this->db3 = $ci->load->database('sistemas', TRUE);
		
		$this->load->model('Mprofesiones_cargo');
	}
	public function index() {
		
	}
	public function getProfesiones()
	{
		return $this->db3->get('profesiones');
	}
	public function insertarProfesiones()
	{
		$post = $this->input->post();
		$profesion['id_profesion']=$post['id'];
		$profesion['id_cargo']=$post['id_cargo'];
		$result = $this->Mprofesiones_cargo->insertar($profesion);
		echo $result;
	}
	public function eliminarProfesiones()
	{
		$post = $this->input->post();
		$profesion=$post['id'];
		$result = $this->Mprofesiones_cargo->eliminar($profesion);
		echo $result;
	}	
}
	
?>