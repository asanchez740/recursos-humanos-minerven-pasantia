<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Login extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$ci        = &get_instance();
		$this->db2 = $ci->load->database('menu', TRUE);
		$this->db3 = $ci->load->database('sistemas', TRUE);
	}

	public function index($data = 0) {
		$this->load->view('login/header');
		$this->load->view('login/index', $data);
		$this->load->view('login/footer');
	}

	public function ingresar($data = '') {

		if ($this->input->post("submit")) {
			$this->form_validation->set_rules('usuario', 'Usuario', 'required|min_length[3]|trim|alpha');
			$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[3]');
			$this->form_validation->set_message('required', "<script>alert('Error: El campo %s es obligatorio');</script>");

			$this->form_validation->set_message('alpha', "<script>alert('Error: El campo %s debe estar compuesto solo por letras');</script>");
			$this->form_validation->set_message('min_length', "<script>alert('Error: El campo %s debe tener mas de 3 caracteres');</script>");
			$usuario               = $this->input->post('usuario');
			$password              = $this->input->post('password');
			$consulta              = $this->input->post('tconsulta');
			$operadora             = $this->input->post('operadora');
			$consultar['usuario']  = $usuario;
			$consultar['password'] = $password;

			if ($this->form_validation->run() != false) {
				$this->load->model('login_model');
				$login = $this->login_model->obtener_datos_login_por_usuario($consultar);

				if (empty($db_password)) {
					$db_password = false;
				}

				if ($login != false) {
					$username    = $login['0']['uslogin'];
					$db_password = $login['0']['clave_parte_uno'];
					$alt         = $login['0']['clave_parte_dos'];
					$cedula      = $login['0']['cedula'];

					if ($login['0']['estatus'] == FALSE) {
						$data["mensaje"] = "<script>alert('Error: Usuario inactivo');</script>";
						$this->index($data);
						return;
					}

					$password = hash('sha512', $password);
					$password = hash('sha512', $password.$alt);

					if ($db_password != $password) {
						$data["mensaje"] = "<script>alert('Error: Datos ingresados incorrectos');</script>";
						$this->index($data);
						return;
					}

					$consultar['cedula'] = $cedula;

					if ($login['0']['cedula'] == '100') {
						$nombre = 'Administrador';

					} else {
						$this->load->model('cuenta_usuario_model');
						$login    = $this->cuenta_usuario_model->consultar_nombre_usuario_por_cedula($consultar);
						$nombre   = $login['0']['nom_trabajador'];
						$nombre   = $this->funciones->reducir_frase($nombre);
						$apellido = $login['0']['ape_trabajador'];
						$apellido = $this->funciones->reducir_frase($apellido);
						$nombre   = $nombre.' '.$apellido;
						$nombre   = mb_strtolower($nombre);
						$nombre   = mb_convert_case($nombre, MB_CASE_TITLE, "utf8");
					}

					$usuario_data = array(
						'usuario'  => $nombre,
						'nombre'   => $username,
						'cedula'   => $cedula,
						'logueado' => TRUE
					);

					$this->session->set_userdata($usuario_data);
					redirect(base_url().'sistema');

				} else {
					$data['mensaje'] = "<script>alert('Error: Datos ingresados incorrectos');</script>";
					$this->index($data);
				}

			} else {
				$this->index($data);
			}
		}
	}
}