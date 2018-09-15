<?php 
/**
* 
*/
class Mcargos extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function getCargos()
	{
		return $this->db3->get('cargos');
	}
	public function getFuerzaLaboral($ide_cargo)
	{
		$total;
		
			//fuerzaLaboral = select fuerza_laboral from cargos where id=$ide_cargo
			$sql = "SELECT fuerza_laboral from cargos where id=$ide_cargo";
			$consulta = $this->db3->query($sql);
			$fuerzaLaboral = $consulta->row_array()['fuerza_laboral'];
			//totalPersonal = select count(*) from personal where id_cargo=$ide_cargo
			$sql = "SELECT count(*) from personal where id_cargo=$ide_cargo";
			$consulta = $this->db3->query($sql);
			$totalPersonal = $consulta->row_array()['count'];
			$total = $fuerzaLaboral-$totalPersonal; 
		
		return json_encode($total);
	}
	public function insertar($cargos)
	{
		$campos = array(
			'id_cargos' => $cargos['id'],
			'nombre' => $cargos['postname'],
			'descripcion' => $cargos['posdecrip'],
			'id_unidad'   => $cargos['postunidad'],
			'fuerza_laboral'=> $cargos['fulaboral']
		); 
		$this->db3->insert('cargos',$campos);
		$sql = "select max(id) as id from cargos";
		$consulta = $this->db3->query($sql);
		$id = $consulta->row_array()['id'];
		return $id;
	}
}
 ?>
