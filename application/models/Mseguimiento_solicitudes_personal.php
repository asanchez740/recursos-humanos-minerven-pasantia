<?php 

class Mseguimiento_solicitudes_personal extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}
	public function getSeguimiento_solicitud_s($id_seguimiento,$n_estados)//solicitudes realizadas con id_seguimiento=5
	{
		//$s = $this->db3->get_where('rrhh_seguimientos_solicitudes_personal',
		//	array('id_seguimiento_solicitud' => $id_seguimiento,'estatus' =>'true'));
		//return $s->result();
		$s="SELECT * from rrhh_seguimientos_solicitudes_personal a INNER JOIN rrhh_solicitudes_personal b ON a.id_solicitud_personal = b.id_solicitud INNER JOIN cargos c ON b.id_cargo = c.id INNER JOIN unidades u ON b.id_unidad= u.id_u where (a.id_seguimiento_solicitud=$id_seguimiento OR a.id_seguimiento_solicitud=$n_estados) AND (a.n_estado !=2 ) AND a.estatus=TRUE";
		//$s="SELECT * from rrhh_seguimientos_solicitudes_personal a INNER JOIN rrhh_solicitudes_personal b ON a.id_solicitud_personal = b.id_solicitud INNER JOIN cargos c ON b.id_cargo = c.id INNER JOIN unidades u ON b.id_unidad= u.id_u where (a.id_seguimiento_solicitud=6 OR a.id_seguimiento_solicitud=8) AND (a.n_estado !=2 ) AND a.estatus=TRUE";
		$result=$this->db3->query($s);		
		return $result->result_array();

	
	}
	public function getSeguimiento_solicitud_p($id_seguimiento,$n_estados)
	{
		//$s = $this->db3->get_where('rrhh_seguimientos_solicitudes_personal',
		//	array('id_seguimiento_solicitud' => $id_seguimiento,'estatus' =>'true'));
		//return $s->result();
		$s="SELECT * from rrhh_seguimientos_solicitudes_personal a INNER JOIN rrhh_solicitudes_personal b ON a.id_solicitud_personal = b.id_solicitud INNER JOIN cargos c ON b.id_cargo = c.id INNER JOIN unidades u ON b.id_unidad= u.id_u where a.id_seguimiento_solicitud=$id_seguimiento AND (a.n_estado =0 OR a.n_estado =$n_estados) AND a.estatus=TRUE ";

		$result=$this->db3->query($s);		
		return $result->result_array();

		/*$this->db3->select('*');
		$this->db3->from('rrhh_seguimientos_solicitudes_personal a');
		$this->db3->join('rrhh_solicitudes_personal b','a.id_solicitud_personal = b.id_solicitud');
		$this->db3->join('cargos c',' b.id_cargo = c.id  ');
		$this->db3->join('unidades u',' b.id_unidad = u.id_u');
		$this->db3->where('a.id_seguimiento_solicitud',$id_seguimiento);
		$this->db3->or_where('a.n_estado',$n_estados);
		$this->db3->or_where('a.n_estado',0);
		$this->db3->where('a.estatus','true');
		
		$result = $this->db3->get();
		
		return $result->result(); */
	}
	public function getSeguimiento_solicitud($id_seguimiento,$n_estados)
	{
		//$s = $this->db3->get_where('rrhh_seguimientos_solicitudes_personal',
		//	array('id_seguimiento_solicitud' => $id_seguimiento,'estatus' =>'true'));
		//return $s->result();
		$this->db3->select('*');
		$this->db3->from('rrhh_seguimientos_solicitudes_personal a');
		$this->db3->join('rrhh_solicitudes_personal b','a.id_solicitud_personal = b.id_solicitud');
		$this->db3->join('cargos c',' b.id_cargo = c.id  ');
		$this->db3->join('unidades u',' b.id_unidad = u.id_u');
		$this->db3->where('a.id_seguimiento_solicitud',$id_seguimiento);
		$this->db3->where('a.estatus','true');
		
		$result = $this->db3->get();
		
		return $result->result();
	}
	public function listado_Seguimiento_solicitud() // muestra todas las solicitudes realizadas
	{
		
		$this->db3->select('*');
		$this->db3->from('rrhh_seguimientos_solicitudes_personal a');
		$this->db3->join('rrhh_solicitudes_personal b','a.id_solicitud_personal = b.id_solicitud');
		$this->db3->join('cargos c',' b.id_cargo = c.id  ');
		$this->db3->join('unidades u',' b.id_unidad = u.id_u');
		$this->db3->where('a.estatus','true');

		
		$result = $this->db3->get();
		
		return $result->result();
	}

	public function insertar($solicitud,$seguimiento){//ingresa a la tabla rrhh_seguimientos_solicitudes_personal	
		$fecha=$this->funciones->fechaModi();
		$campos= array(
			'id_solicitud_personal'=>$seguimiento['id_solicitud'],
			'id_seguimiento_solicitud'=>$seguimiento['id_seguimiento'],
			'descripcion_seguimiento_solicitud'=>$seguimiento['descrip_segui'],
			'fecha_entrada'=>$fecha,
			//'fecha_salida'=>$solicitud[''],
			'estatus'=>$solicitud['estatus'],
			'n_estado'=>$seguimiento['n_estado']
			
		);
		if ($this->db3->insert('rrhh_seguimientos_solicitudes_personal',$campos)) {
			return 1;
		} else {
			return 0;
		}
	}
	public function update_solicitud($solicitud){
		//actualiza el n_estado de la solicitud cuando se presiona el botton enviar
		
		$a=$solicitud['id_solicitud'];
		$b=$solicitud['id_seguimiento'];
		$c=$solicitud['n_estado'];
		$d=$solicitud['descrip_segui'];
		
		$sql ="UPDATE rrhh_seguimientos_solicitudes_personal SET n_estado=$c WHERE id_solicitud_personal=$a AND id_seguimiento_solicitud=$b";
		if ($this->db3->query($sql)) {
			return 1;
		} else {
			return 0;
		}
	}
	public function update($id_solicitud) //se utiliza cuando se eliman de la tabla solicitudes
	{
		$sql="UPDATE rrhh_seguimientos_solicitudes_personal SET estatus=false  WHERE id_solicitud_personal=$id_solicitud ";
		//falta colocarla en false en solicitudes personal

		if ($this->db3->query($sql)) {
			return 1;
		} else {
			return 0;
		}
	}
	
	public function updateObserv($info){///cuando se regresan las solicitudes se update descrip,estado
		
		$descrip = $info['razon'];
		$id_solicitud = $info['id_solicitud'];
		$id_seguimiento = $info['id_seguimiento'];
		$id_segui_n = $info['id_seguimiento'];
		$estado =$info['n_estado'];

		$sql="UPDATE rrhh_seguimientos_solicitudes_personal SET (descripcion_seguimiento_solicitud,n_estado) =('$descrip',$estado) WHERE id_solicitud_personal=$id_solicitud and id_seguimiento_solicitud=$id_seguimiento";
		if ($this->db3->query($sql)) {
			return 1;
		} else {
			return 0;
		}	
	}
	public function updateFecha($id_solicitud,$id_seguimiento,$fecha){
		
		$sql="UPDATE rrhh_seguimientos_solicitudes_personal SET fecha_salida ='$fecha' WHERE id_solicitud_personal=$id_solicitud and id_seguimiento_solicitud=$id_seguimiento ";
		if ($this->db3->query($sql)) {
			return 1;
		} else {
			return 0;
		}		
	}
	public function eliminar2($solicitud){// para eliminar cuando se regresan
		$id = $solicitud;
		

		$sql="DELETE FROM rrhh_seguimientos_solicitudes_personal WHERE id_solicitud_personal=$id";

		if ($this->db3->query($sql)) {
			return 1;
		} else {
			return 0;
		}
	}
	public function eliminar($solicitud){// para eliminar cuando se regresan
		$id = $solicitud['id_solicitud'];
		$id_seg = $solicitud['id_seguimiento'];

		$sql="DELETE FROM rrhh_seguimientos_solicitudes_personal WHERE id_solicitud_personal=$id AND id_seguimiento_solicitud=$id_seg ";

		if ($this->db3->query($sql)) {
			return 1;
		} else {
			return 0;
		}
	}
}
?>
