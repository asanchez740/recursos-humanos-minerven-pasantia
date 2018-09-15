<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Sistema extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('contenedor');
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('header');
		$this->load->view('slider');
		
		$this->load->view('footer');

	}
	public function presentacion() {

		if ($this->input->post("submit")) {
			$this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email|trim');
			$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[3]');
			$this->form_validation->set_message('required', 'El campo %s es obligatorio');
			$this->form_validation->set_message('alpha', 'El campo %s debe estar compuesto solo por letras');
			$this->form_validation->set_message('min_length[3]', 'El campo %s debe tener mas de 3 caracteres');
			$this->form_validation->set_message('valid_email', 'El campo %s debe ser un email correcto');
			$email     = $this->input->post('email');
			$password  = $this->input->post('password');
			$consulta  = $this->input->post('tconsulta');
			$operadora = $this->input->post('operadora');
			$email     = bin2hex($email);

			if ($this->form_validation->run() != false) {
				$ci        = &get_instance();
				$this->db2 = $ci->load->database('default', TRUE);
				$this->load->model('login_model');
				$login = $this->login_model->obtener_por_correo($email);

				if ($login != '') {

					switch ($login->estatus_trabajador) {

						case 'gerente':

							if ($consulta == 'registrar') {
								redirect(base_url().'registro');

							} else {
								redirect(base_url().'sistema');
							}
							break;

						case 'empleado':

							if ($consulta == 'registrar') {
								$data["mensaje"] = "No posee permisos para accesar a este módulo";
								$this->load->view('login/header');
								$this->load->view('login/index', $data);
								$this->load->view('login/footer');

							} else {
								redirect(base_url().'sistema');
							}
							break;
					}

				} else {
					$data["mensaje"] = "Usuario ingresado no existe en el sistema";
					$this->load->view('login/header');
					$this->load->view('login/index', $data);
					$this->load->view('login/footer');
				}

			} else {
				$data["mensaje"] = "Validación incorrecta";
				$this->load->view('login/header');
				$this->load->view('login/index', $data);
				$this->load->view('login/footer');
			}
		}
	}

	public function salir() {
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->output->set_header('Pragma: no-cache');
		$this->session->sess_destroy();
		$direccion = base_url();
		redirect($direccion);
	}
}
