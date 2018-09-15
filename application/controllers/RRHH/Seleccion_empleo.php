<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Seleccion_empleo extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$ci        = &get_instance();
		$this->db2 = $ci->load->database('menu', TRUE);
		$this->db3 = $ci->load->database('sistemas', TRUE);
		$this->db4 = $ci->load->database('rrhh',TRUE);
		
		$this->load->model('Mcargos');
		$this->load->model('Munidades');
		$this->load->model('Msolicitudes');

	}

	public function index($data = '', $administrar = 0) {
		$data['error']   = 0;
		$data['mensaje'] = '';
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$this->load->view('RRHH/Seleccion y Empleo/ventanas_modales_seleccion_empleo');

		$this->load->view('RRHH/Seleccion y Empleo/'.$data["completar_proceso"], $data);
		$this->load->view('footer');
	}

	public function solicitud() {

		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$data1['id'] = $this->Mcargos->getCargos();
		$data1['nombre'] = $this->Mcargos->getCargos();
		//unidad
		$data1['id_u'] = $this->Munidades->getUnidades();
		$data1['nombre_u']= $this->Munidades->getUnidades();
		$this->load->view('RRHH/Seleccion y Empleo/solicitudes',$data1);
	}
	public function fuerzaLaboral()
	{
		$total;
			$post = $this->input->post();
			$id = $post['id'];
			$total=$this->Mcargos->getFuerzaLaboral($id);	
		//echo $total;
		echo $total;
	}
	public function insertarSolicitud()
	{
		$fecha=$this->funciones->fechaModi();
		$post = $this->input->post();
		$solicitud['id_unidad'] = $post['id_uni'];
		$solicitud['id_cargo'] = $post['cargo'];
		$solicitud['cantidad_s'] = $post['cantidad'];
		$solicitud['sexo'] = $post['sexo'];
		$solicitud['edad'] = $post['edad'];
		$solicitud['ambiente'] = $post['postamb'];
		$solicitud['necesidad'] = $post['neces'];
		$solicitud['habilidades'] = $post['habi'];
		$solicitud['fecha_solicitud']=$fecha;
		$solicitud['estatus']=$post['estatus'];
		//$solicitud['usr']=$post['usr'];
		//$solicitud['fecha_trans']=$post['fecha_t'];

		$n_solicitud = $this->Msolicitudes->insertar($solicitud);
		echo json_encode($n_solicitud);
		
	}

	public function seguimiento_solicitud() {

		$data["completar_proceso"] = 'seguimiento';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}

	}
	public function solicitudes() {

		$data["completar_proceso"] = 'solicitudes_recibidas';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}

	}
	public function pre_seleccion_personal() {

		$data["completar_proceso"] = 'seleccion_personal';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}

	}
	public function elegibles_aprobados() {

		$data["completar_proceso"] = 'elegibles_aprobados';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}

	}

	public function solicitudes_asignadas() {

		$data["completar_proceso"] = 'solicitudes_asignadas';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}

	}
	public function generarContratos() {

		$data["completar_proceso"] = 'solicitudes_asignadas_contratos';

		if ($this->input->post('control') == 1) {

		} else {
			$this->index($data);
		}

	}

}
