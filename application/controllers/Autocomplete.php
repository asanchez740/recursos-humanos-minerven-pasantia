<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
   
class Autocomplete extends CI_Controller{

   	public function __construct(){
    	parent::__construct();
   	}

   	public function search_by_name(){
		$term = $this->input->post('term', TRUE);
		$this->load->model('autocomplete_model');
		$search_data= $this->autocomplete_model->get_by_name($term); 
		
		if(empty($search_data)){
			$search_data[0]['insumo']='no se ha encontrado coincidencia';
		}
		
		$auto=array();
		$i= 0;
		
		foreach ($search_data as $row =>$link){
			$i++;
			array_push($auto, array("id"=>$i, "label"=>$link["insumo"], "value" =>$link["insumo"]));
		} 
		
		echo json_encode($auto);
   	}

  	public function search_by_cedula(){
		$term = $this->input->post('term', TRUE);
		$this->load->model('autocomplete_model');
		$search_data= $this->autocomplete_model->get_by_cedula($term); 
		
		if(empty($search_data)){
			$search_data[0]['ced_trabajador']='no se ha encontrado coincidencia';
		}
		
		$auto=array();
		$i= 0;
		
		foreach ($search_data as $row =>$link){
			$i++;
			array_push($auto, array("id"=>$i, "label"=>$link["ced_trabajador"], "value" =>$link["ced_trabajador"]));
		} 
		
		echo json_encode($auto);
   	}
}