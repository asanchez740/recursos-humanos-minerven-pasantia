<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	/*
	public function index() {
	echo '....';
	$this->load->model('Modelo');
	$data['title'] = 'TITULO';
	$this->load->view('blog', $data);
	}

	public function comentarios() {
	echo 'MIRA ESTO';
	}

	public function shoes($sandals, $id) {
	echo $sandals;
	echo $id;
	}

	public function multi() {
	$data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
	$data['title']     = "Minerven";
	$data['heading']   = "My Real Heading";
	$this->load->view('blogview', $data);
	}
	 */

	/************    CODIGO PARA CARGAR ARCHIVOS*****************************/

	public function index() {
		$this->load->view('upload_form', array('error' => ' '));
	}
	function do_upload() {
		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']
		                      = '100';
		$config['max_width']  = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		} else {
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_success', $data);
		}

	}
}
?>