<?php 

class Funciones{

	function __construct(){
		$this->ci =&get_instance();
		date_default_timezone_set("Etc/GMT+4");
	}

	function verificar_error($error, $mensaje){

		if($error==1){
			echo $mensaje;
			exit();
		} 
		if($error==2){
			$mensaje=validation_errors();
			echo $mensaje;
			exit();
		}
	}
	
	function fecha(){	
		
		$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
						   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

		$arrayDias = array( 'Domingo', 'Lunes', 'Martes',
						   'Miercoles', 'Jueves', 'Viernes', 'Sabado');

		$fecha= $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
		return $fecha;		
	}	
	function fechaModi(){
		$arrayMeses = array('01', '02', '03', '04', '05', '06',
						   '07', '08', '09', '10', '11', '12');

		$arrayDias = array( 'Domingo', 'Lunes', 'Martes',
						   'Miercoles', 'Jueves', 'Viernes', 'Sabado');

		//$fecha= $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
		$fecha = date('d')."/".$arrayMeses[date('m')-1]."/".date('Y');
		return $fecha;		
	}
	
	function yearselec($fecha){
		$input_array= explode("/",$fecha);
		$year =$input_array[2];
		
		return $year;
	}
	
	function cambiofecha($fecha){

		$input_array= explode("/",$fecha);
		$fecha =$input_array[2].'-'.$input_array[1].'-'.$input_array[0];

		return $fecha;
	}

	function reducir_frase($palabra){	
		echo $palabra;
	$pos= strpos($palabra,' ');
	if ($pos > 0){
		$reducir= substr($palabra,0,$pos);
	}else{
		$reducir= $palabra;
	}	
	return $reducir;		
}	

	
}