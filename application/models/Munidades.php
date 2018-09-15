<?php 
/**
* 
*/
class Munidades extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function getUnidades()
	{
		return $this->db3->get('unidades');
	}
	public function insertarUnidades($unidades)
	{
		$campos = array(
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
	}
}

?>