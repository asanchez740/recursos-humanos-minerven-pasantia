
<?php
class Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function modelo($modelo) {

		$modelo = "SELECT descripcion, fecha_trans
		            FROM  modulos";

		$resultado = $this->db2->query($modelo);
		//echo $this->db3->last_query();

		//		if (!$resultado) {
		//			return false;
		//		} else {
		return $resultado->result_array();

		//	}
	}

}