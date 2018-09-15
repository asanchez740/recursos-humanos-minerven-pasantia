<?php 
/**
* 
*/
class Msolicitudes extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		//modelo de ingresar a la tabla seguimiento_solicitudes_personal
		$this->load->model('Mseguimiento_solicitudes_personal');
	}
	public function getSolicitudes()
	{
		return $this->db3->get('rrhh_solicitudes_personal');
	}
	
	public function insertar($solicitud)
	{
		$fecha=$this->funciones->fechaModi();
		$campos = array(
			'id_unidad' => $solicitud['id_unidad'],
			'id_cargo' => $solicitud['id_cargo'],
			'cantidad_solicitada' => $solicitud['cantidad_s'],
			'sexo'   => $solicitud['sexo'],
			'edad_comprendida' => $solicitud['edad'],
			'ambiente_trabajo' => $solicitud['ambiente'],
			'necesidad' => $solicitud['necesidad'],
			'habilidades_requeridas' => $solicitud['habilidades'],
			'fecha_solicitud'=>$fecha,
			'estatus' => 'TRUE'

			//'usuario_solicitud'=>$solicitud['usr']
			//'fecha_transaccion'=>$solicitud['fecha_trans']
		); 

		$this->db3->insert('rrhh_solicitudes_personal',$campos);
		$sql = "select max(id_solicitud) as id_solicitud from rrhh_solicitudes_personal";
		$consulta = $this->db3->query($sql);
		$id = $consulta->row_array()['id_solicitud'];
		
		$seg_solicitud['id_solicitud'] = $id;
		//INGRESAR A TABLA SEGUIMIENTO_SOLICITUDES_PERSONAL
		if ($solicitud['estatus'] == 1) {//ingresa a seguimiento dos veces
			$id_solicitud= $id;
			$id_seguimiento=0;
			$seg_solicitud['id_seguimiento'] = 0;
			$seg_solicitud['descrip_segui'] = 'Gerente de Area';
			$seg_solicitud['n_estado']=2; //Aprobado-Enviado
			$result = $this->Mseguimiento_solicitudes_personal->insertar($campos,$seg_solicitud);
			$seg_solicitud['id_seguimiento'] = 1;// En Espera/por enviar o rechazar
			$seg_solicitud['descrip_segui'] = 'Gerente de RRHH';
			$seg_solicitud['n_estado']=1;
			$fecha2=$this->funciones->fechaModi();
			$result2 = $this->Mseguimiento_solicitudes_personal->insertar($campos,$seg_solicitud);	
			if ($result2) {
				$sa= $this->Mseguimiento_solicitudes_personal->updateFecha($id_solicitud,$id_seguimiento,$fecha2);
			}
			//$sa= $this->Mseguimiento_solicitudes_personal->updateFecha($id_solicitud,$id_seguimiento,$fecha2);
		}else if ($solicitud['estatus'] == 0) {
			$seg_solicitud['id_seguimiento'] = 0;
			$seg_solicitud['descrip_segui'] = 'Gerente de Area';
			$seg_solicitud['n_estado']=3;// En Espera/por enviar o rechazar
			$result = $this->Mseguimiento_solicitudes_personal->insertar($campos,$seg_solicitud);
		}
		return $id;
	}
	public function update($id_solicitud)
	{					 
		
		$sql="UPDATE rrhh_solicitudes_personal SET estatus=false  WHERE id_solicitud=$id_solicitud ";

		if ($this->db3->query($sql)) {
			return 1;
		} else {
			return 0;
		}
	}
}
 ?>
