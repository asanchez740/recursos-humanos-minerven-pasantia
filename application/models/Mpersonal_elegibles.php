<?php 
/**
* 
*/
class Mpersonal_elegibles extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function listar_personal_elegible($id_solicitud)
	{
		//$sql = "SELECT * from rrhh_personal_elegible_seleccion a INNER JOIN rrhh_personal_elegible b ON a.cedula = b.cedula where a.id_solicitud=$id_solicitud";
		$sql = "SELECT * from rrhh_personal_elegible_seleccion a INNER JOIN rrhh_personal_elegible b ON a.cedula = b.cedula INNER JOIN profesiones c ON c.id_profesion = b.id_profesion INNER JOIN grados_instruccion D ON d.id_grado_instruccion = b.id_grado_instrucion where a.id_solicitud=$id_solicitud";
		$result=$this->db3->query($sql);		
		return $result->result_array();
	}
	public function insertar_personal_elegibles($personal_elegibles)
	{
		/*$campos = array(
			'id_padre'=> $unidades['postunidad'],
			'nombre_u' 	  => $unidades['postname'],
			'descripcion' => $unidades['posdecrip'],
			'tipo_unidad' => "Corporativa",
			'movimiento'  => "S",
			'codigo'	  => $unidades['id']
		); 
		$this->db3->insert('unidades',$campos);
		$sql = "select max(id_U) as id_u from unidades";
		$consulta = $this->db3->query($sql);
		$id = $consulta->row_array()['id_u'];
		
		return $id;
		*/
		echo "Entro a insertar Personal Elegibles";
	}
	public function update($ci){
		echo "Entro actualizar personal";
	}
	public function eliminar($ci){
		echo "Entro a Eliminar";
	}
}

?>