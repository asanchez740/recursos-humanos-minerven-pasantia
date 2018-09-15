<?php 
/**
* 
*/
class Mprofesiones_cargo extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function getProfesiones()
	{
		return $this->db3->get('profesiones');
		//return json_encode($this->db3->get('profesiones'));
	}
	
	public function insertar($profesiones)
	{
		$campos = array(
			'id_profesion' => $profesiones['id_profesion'],
			'id_cargo' => $profesiones['id_cargo'],
		); 
		if ($this->db3->insert('profesiones_cargo',$campos)) {
			echo $profesiones['id_profesion'];
		}else{
			echo false;
		}
	}
	public function eliminar($id_profesion)
	{
		$sql= "DELETE FROM profesiones_cargo WHERE id_profesion=$id_profesion";
		if ($this->db3->query($sql)) 
		{
			echo $id_profesion;
		}else{
			echo false;
		}
		
	}
}
?>
