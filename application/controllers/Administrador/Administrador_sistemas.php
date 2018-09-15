<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
   
class Administrador_sistemas extends CI_Controller{ 

   	public function __construct(){					 
    	parent::__construct();
    	$ci= &get_instance();
		$this->db2= $ci->load->database('menu',TRUE);
		$this->db3= $ci->load->database('sistemas',TRUE);
   	}

   	public function index($data='', $administrar=0){
   		$data['error']=0;
   		$data['mensaje']='';
		$this->load->view('contenedor');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('Administrador/Administrador_de_sistemas/'.$data["completar_proceso"], $data);
		$this->load->view('footer');
	}

	public function crear_modulo(){
		$data["completar_proceso"] = 'crear_modulo';
		
		if($this->input->post('control')==1){
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[4]|trim');
			$this->form_validation->set_message('required',"<script>alert('Error: El campo %s es obligatorio');</script>"); 
			$this->form_validation->set_message('min_length',"<script>alert('Error: El campo %s debe tener mas de 3 caracteres');</script>");
			$carga['nombre'] = $this->input->post('nombre');
			$consulta['nombre'] = $this->input->post('nombre');
			
			if($this->form_validation->run()!=false){
				$this->load->model('administrador_sistemas_model');
				$administrar = $this->administrador_sistemas_model->consultar_todo_modulo($carga);
				
				if($administrar != FALSE){
					$data["error"]=1;
	            	$data["mensaje"]="<script>alert('Error: Nombre del módulo ya existe');</script>";
					$this->load->view('Administrador/Administrador_de_sistemas/crear_modulo', $data);
				
				}else{
					$administrar = $this->administrador_sistemas_model->consultar_id_modulo();					
					$max =$administrar['0']['maximo'];
					$carga['id'] = $max + 1000;					
            		$administrar = $this->administrador_sistemas_model->cargar_modulo($carga);

            		if ($administrar == FALSE){
            			$data["error"]=1;
	            		$data["mensaje"]="<script>alert('Error: No se pudo cargar el módulo');</script>";
						$this->load->view('Administrador/Administrador_de_sistemas/crear_modulo', $data);
            		
            		}else{
	            		$carga['cedula']=$this->session->userdata('cedula');
	            		$carga['es_admin']='S';
	            		$carga['modulo']=$carga['id'];
	            		$administrar = $this->administrador_sistemas_model->cargar_usuario_administrador($carga);

	            		if ($administrar == FALSE){
	            			$data["error"]=1;
	            			$data["mensaje"]="<script>alert('Error: No se pudo cargar el superusuario como administrador del modulo');</script>";
							$this->load->view('Administrador/Administrador_de_sistemas/crear_modulo', $data);
	            		}

	            		echo "<script>alert('Datos Cargados Correctamente');</script>";	
					}
				}		
			}else{
				$data["error"]=2;
				$data["mensaje"]="";
				$this->load->view('Administrador/Administrador_de_sistemas/crear_modulo', $data);
			}
		
		}else{
			$this->index($data);
		}
	}

	public function crear_submodulo(){		
		$data["completar_proceso"] = 'crear_submodulo';
		
		if($this->input->post('control')==1){
			$this->form_validation->set_rules('submodulo', 'Submodulo', 'required|min_length[4]|trim');
			$this->form_validation->set_message('required',"<script>alert('Error: El campo %s es obligatorio');</script>"); 
			$this->form_validation->set_message('min_length',"<script>alert('Error: El campo %s debe tener mas de 3 caracteres');</script>");
			$consultar['submodulo'] = $this->input->post('submodulo');
			$consultar['modulo'] = $this->input->post('modulo');
			
			if($this->form_validation->run()!=false){
				$this->load->model('administrador_sistemas_model');
				$administrar = $this->administrador_sistemas_model->consultar_todo_submodulo($consultar);

				if($administrar != false){
					$data["error"]=1;
	            	$data["mensaje"]="<script>alert('Error: Nombre del submódulo ya existe');</script>";
					$this->load->view('Administrador/Administrador_de_sistemas/crear_submodulo', $data);

				}else{
					$administrar = $this->administrador_sistemas_model->consultar_id_submodulo($consultar);
					$max =$administrar['0']['maximo']; 	

					if($max>0){
			   			$consultar['id'] = $max + 1;

					}else{
			  			$consultar['id'] = $consultar['modulo'] + 1;
					}

					$administrar = $this->administrador_sistemas_model->cargar_submodulo($consultar);

					if ($administrar == FALSE){
            			$data["error"]=1;
	            		$data["mensaje"]="<script>alert('Error: No se pudo cargar el submódulo');</script>";
						$this->load->view('Administrador/Administrador_de_sistemas/crear_submodulo', $data);

            		}else{
            			echo "<script>alert('Datos Cargados Correctamente');</script>";
            		}
				}

			}else{
				$data["error"]=2;
				$data["mensaje"]="";
				$this->load->view('Administrador/Administrador_de_sistemas/crear_submodulo', $data);
			}

		}else{
			$this->index($data);
		}
	}
	
	public function crear_opcion(){
	    $data["completar_proceso"] = 'crear_opcion';
	        
		if($this->input->post('control')==1){
			$this->form_validation->set_rules('modulo', 'Modulo', 'required|min_length[4]|trim');
			$this->form_validation->set_rules('submodulo', 'Submodulo', 'required|min_length[4]|trim');
			$this->form_validation->set_rules('opcion', 'Opcion', 'required|min_length[4]|trim');
			$this->form_validation->set_message('required',"<script>alert('Error: El campo %s es obligatorio');</script>"); 
			$this->form_validation->set_message('min_length',"<script>alert('Error: El campo %s debe tener mas de 3 caracteres');</script>");
			$consultar['modulo'] = $this->input->post('modulo');
			$consultar['submodulo'] = $this->input->post('submodulo');
			$consultar['opcion'] = $this->input->post('opcion');

			if($this->form_validation->run()!=false){
				$this->load->model('administrador_sistemas_model');
				$administrar = $this->administrador_sistemas_model->consultar_opcion_activa($consultar);	

				if($administrar != false){
					$data["error"]=1;
	            	$data["mensaje"]="<script>alert('Error: Nombre de la opción ya existe');</script>";
					$this->load->view('Administrador/Administrador_de_sistemas/crear_opcion', $data);
				
				}else{
					$administrar = $this->administrador_sistemas_model->consultar_id_opcion($consultar);
					$max =$administrar['0']['maximo'];
					
					if($max>0){
			   			$consultar['id'] = $max + 1;

					}else{
			  			$consultar['id'] = $consultar['modulo'] / 10;
					}

					$desc_modulo = $this->administrador_sistemas_model->consultar_datos_modulo($consultar);
					$desc_submodulo = $this->administrador_sistemas_model->consultar_datos_submodulo($consultar);
					$desc_modulo = $desc_modulo['0']['descripcion'];
					$desc_submodulo = $desc_submodulo['0']['descripcion'];
					$submodulo_form = str_replace(' ', '_', $desc_submodulo);
					$consultar['opcion'] = str_replace(' ', '_', $consultar['opcion']);
					$consultar['opcion']=mb_strtolower($consultar['opcion']);
					$consultar['url'] = $desc_modulo.'/'.$submodulo_form.'/'.$consultar['opcion'];
					$administrar = $this->administrador_sistemas_model->cargar_opcion($consultar);

					if 	($administrar == FALSE){
            			$data["error"]=1;
	            		$data["mensaje"]="<script>alert('Error: No se pudo cargar la opción');</script>";
						$this->load->view('Administrador/Administrador_de_sistemas/crear_opcion', $data);
            		
            		}else{
            			echo "<script>alert('Datos Cargados Correctamente');</script>";
            		}
				}

			}else{
				$data["error"]=2;
				$data["mensaje"]="";
				$this->load->view('Administrador/Administrador_de_sistemas/crear_opcion', $data);
			}

		}else{
			$this->index($data);
		}
	}

	public function cargar_select_modulo(){
		$consultar['cedula'] = $this->session->userdata('cedula');
		$consultar['administrador'] = 'S';
        $this->load->model('administrador_sistemas_model');
		$data['res_consulta'] = $this->administrador_sistemas_model->consultar_modulos($consultar);
		$this->load->view('Administrador/Administrador_de_sistemas/cargar_modulo', $data);
	}
	
	public function cargar_select_modulo_dependiente(){
		$consultar['cedula'] = $this->input->post('cedula');
        $this->load->model('administrador_sistemas_model');

        if($this->session->userdata('cedula')=='100'){
        	$consultar['administrador'] = 'S';

        }else{
        	$consultar['administrador'] = 'A';
        }

		$data['res_consulta'] = $this->administrador_sistemas_model->consultar_modulos($consultar);
		$this->load->view('Administrador/Administrador_de_sistemas/cargar_modulo_dependiente', $data);
	}

	public function cargar_select_submodulo(){
		$data['modulo'] = $this->input->post('modulo');
        $this->load->model('administrador_sistemas_model');
		$data['res_consulta'] = $this->administrador_sistemas_model->consultar_submodulos($data);
		$this->load->view('Administrador/Administrador_de_sistemas/cargar_submodulo_dependiente', $data);
	}

	public function cargar_select_opcion(){
		$data['modulo']  = $this->input->post('modulo');
		$data['submodulo']  = $this->input->post('submodulo');
		$data['cedula']  = $this->input->post('cedula');
        $this->load->model('administrador_sistemas_model');
		$data['res_consulta'] = $this->administrador_sistemas_model->consultar_opciones_usuarios($data);
		$this->load->view('Administrador/Administrador_de_sistemas/cargar_opcion_dependiente', $data);
	}

	public function actualizar_permisos_usuario(){
		$data["completar_proceso"] = 'actualizar_permisos_usuario';

		if($this->input->post('control')==1){
			$this->form_validation->set_rules('cedula', 'Cedula', 'required|min_length[6]|trim|numeric');
			$this->form_validation->set_message('numeric',"<script>alert('Error: El campo %s debe poseer sólo números');</script>"); 
			$this->form_validation->set_message('required',"<script>alert('Error: El campo %s es obligatorio');</script>"); 
			$this->form_validation->set_message('min_length',"<script>alert('Error: El campo %s debe tener mas de 5 caracteres');</script>");
			$consultar['cedula'] = $this->input->post('cedula');
			$consultar['modulo'] = $this->input->post('modulo');
			$consultar['submodulo'] = $this->input->post('submodulo');
			$consultar['opcion'] = $this->input->post('opcion');
			
			if($this->form_validation->run()!=false){
				$this->load->model('administrador_sistemas_model');
				$consulta = $this->administrador_sistemas_model->consultar_privilegio_por_opcion($consultar);

				if ($consulta == FALSE){
					$administrar = $this->administrador_sistemas_model->cargar_privilegio($consultar);
					
					if ($administrar == FALSE){
						$data["error"]=1;
						$data["mensaje"]="<script>alert('Error: No se pudo agregar la opción');</script>";
						$this->load->view('Administrador/Administrador_de_sistemas/consultar_opciones', $data);
        			
        			}else{
	        			echo "<script>alert('Datos Cargados Correctamente');</script>";
	        			$this->consultar_opciones_activas($consultar);
        			}	

        		}else{

        			$consultar['permiso']='TRUE';
        			$actualiza = $this->administrador_sistemas_model->actualizar_estatus_privilegio($consultar);

        			if ($actualiza == FALSE){
        				$data["error"]=1;
						$data["mensaje"]="<script>alert('Error: No se pudo actualizar la información');</script>";
						$this->load->view('Administrador/Administrador_de_sistemas/consultar_opciones', $data);

        			}else{
	        			echo "<script>alert('Datos Actualizados Correctamente');</script>";
						$this->consultar_opciones_activas($consultar);
        			}
        		}

			}else{

				$data["error"]=2;
				$data["mensaje"]="";
				$this->load->view('Administrador/Administrador_de_sistemas/consultar_opciones', $data);
			}

		}else{
			$this->index($data);
		}
	}

	public function consultar_opciones_activas($consultar=''){		

		if($consultar==''){
			$consultar['cedula']=$this->input->post('cedula');
		}

		$this->load->model('administrador_sistemas_model');
		$data['trabajador'] = $this->administrador_sistemas_model->consultar_nombre_usuario_por_cedula($consultar);
		$data['res_consulta'] = $this->administrador_sistemas_model->consultar_permisos_activos($consultar);	
		$data['consulta']=1;

		if($data['res_consulta'] == false){
			$data["error"]=1;
	        $data["mensaje"]="<script>alert('Error: No existe la cedula ingresada');</script>";
			$this->load->view('Administrador/Administrador_de_sistemas/consultar_opciones', $data);

		}else{
			$data["error"]=0;
	        $data["mensaje"]="";
			$this->load->view('Administrador/Administrador_de_sistemas/consultar_opciones', $data);
		}
		
	}

	public function modificar_privilegio_opcion(){		
		$consultar['modulo']=$this->input->post('modulo');
		$consultar['submodulo']=$this->input->post('submodulo');
		$consultar['opcion']=$this->input->post('opcion');
		$consultar['cedula']=$this->input->post('cedula');
		$this->load->model('administrador_sistemas_model');
		$data['res_consulta'] = $this->administrador_sistemas_model->consultar_estatus_opciones($consultar);
		$data['administrador'] = $this->administrador_sistemas_model->consultar_administrador($consultar);
		
		if($data['administrador']=='false'){
			$data['administrador']['0']['estatus']='C';
		}
		
		$this->load->view('Administrador/Administrador_de_sistemas/modificar_privilegio_opcion');
		$this->load->view('Administrador/Administrador_de_sistemas/modificar_permisos', $data);
	}

	public function modal_modificar_privilegio(){	

		if($this->input->post('control')=="1"){
			
			if($this->session->userdata('cedula')!='100'){
				$consultar['admin']='no';

			}else{
				$consultar['admin']=$this->input->post('switch');
				$consultar['compara']=$this->input->post('compara');

				if(($consultar['compara']=='A' AND $consultar['admin']=='on') OR ($consultar['compara']=='C' AND $consultar['admin']=='off')){
					$cambio='no';

				}else{
					$cambio='si';
				}
			}

			$this->load->model('administrador_sistemas_model');
			$permiso=$this->input->post('permiso');
			$opcion=$this->input->post('opcion');
			$consultar['modulo']=$this->input->post('modulo');
			$consultar['cedula']=$this->input->post('cedula');
			$consultar['submodulo']=$this->input->post('submodulo');
			$actualizar['modulo']=$this->input->post('modulo');
			$actualizar['submodulo']=$this->input->post('submodulo');
			$actualizar['cedula']=$this->input->post('cedula');
		    $cuenta = sizeof($permiso);
		    $i=0;
 		
		    if($consultar['admin']=='no' OR $cambio=='no'){
		     	
		     	for ($i = 0; $i < $cuenta; $i++){
			    	$actualizar['permiso'] = $permiso[$i];
					$actualizar['opcion'] = $opcion[$i];

					if ($actualizar['permiso']=='on'){
						$actualizar['permiso']= TRUE;
					}

					else{
						$actualizar['permiso']= FALSE;
					}

			        $actualiza = $this->administrador_sistemas_model->actualizar_estatus_privilegio($actualizar);

					if ($actualiza == FALSE){
		    			echo "<script>alert('Error: No se pudo actualizar la información');</script>";
		    			exit();
					}
			    }

		    }else{ 

				if($consultar['admin']=='on'){
					$consultar['es_admin']='A';

				}else{
					$consultar['es_admin']='C';
				}

				$consulta = $this->administrador_sistemas_model->consultar_usuario_administrador_por_cedula($consultar);

				if($consulta == FALSE){
					$administrar = $this->administrador_sistemas_model->cargar_usuario_administrador($consultar);
					
					if($administrar == FALSE){
	        			echo "<script>alert('Error: No se pudo agregar el usuario como administrador');</script>";
	        			exit();
	    			}
	    		}

    			$consulta = $this->administrador_sistemas_model->consultar_usuario_administrador_por_estatus($consultar);

    			if($consulta!=FALSE){
    				$analizar=$consulta['0']['cedula'];

    			}else{
    				$analizar=$consultar['cedula'];
    			}

    			if($consultar['cedula']!=$analizar AND $consultar['es_admin']=='A'){
    				$actualiza = $this->administrador_sistemas_model->actualizar_usuario_administrador($consultar);

    				if ($actualiza == FALSE){
	        			echo "<script>alert('Error: No se pudo actualizar el usuario como administrador');</script>";
	        			exit();
        			}

    				$consultar['permiso']='TRUE';	
    				$this->refrescar_privilegios($consultar);
        			$consultar['cedula']=$analizar;
    				$consultar['es_admin']='C';
        			$actualiza = $this->administrador_sistemas_model->actualizar_usuario_administrador($consultar);

	    			if ($actualiza == FALSE){
	        			echo "<script>alert('Error: No se pudo actualizar el usuario como administrador');</script>";
	        			exit();
	    			}
    				
    				$consultar['cedula']=$analizar;
    				$consultar['permiso']='FALSE';
    				$this->refrescar_privilegios($consultar);
    			}

    			if($consultar['cedula']==$analizar){

    				if($consultar['es_admin']=='A'){
    					$actualiza = $this->administrador_sistemas_model->actualizar_usuario_administrador($consultar);

	    				if ($actualiza == FALSE){
	        				echo "<script>alert('Error: No se pudo actualizar el usuario como administrador');</script>";
	        				exit();
	        			}

	        			$consultar['permiso']='TRUE';

    				}else{
	    				$actualiza = $this->administrador_sistemas_model->actualizar_usuario_administrador($consultar);

		    			if ($actualiza == FALSE){
		        			echo "<script>alert('Error: No se pudo actualizar el usuario como administrador');</script>";
		        			exit();
		    			}

		    			$consultar['permiso']='FALSE';
	    			}
	    			$this->refrescar_privilegios($consultar);
    			}
	    	}
    		echo "<script>alert('Datos Actualizados Correctamente');</script>";
  		}
	}

	public function refrescar_privilegios($consultar){
		$carga['permiso']=$consultar['permiso'];
		$data['res_submodulo'] = $this->administrador_sistemas_model->consultar_submodulos($consultar);

		foreach($data['res_submodulo'] as $row =>$link)
		{
			$consultar['submodulo']=$link['id'];
			$data['res_opcion'] = $this->administrador_sistemas_model->consultar_todo_opcion($consultar);

			foreach($data['res_opcion'] as $row1 =>$link1)
			{
				$carga['cedula']=$consultar['cedula'];
				$carga['modulo']=$consultar['modulo'];
				$carga['submodulo']=$link['id'];
				$carga['opcion']= $link1['id'];
				$administrar = $this->administrador_sistemas_model->consultar_privilegio_por_opcion($carga);

				if($administrar == FALSE){
        			$administrar = $this->administrador_sistemas_model->cargar_privilegio($carga);

    			}else{
					$administrar = $this->administrador_sistemas_model->actualizar_estatus_privilegio($carga);
				}
		
				if($administrar == FALSE){
        			echo "<script>alert('Error: No se pudo actualizar los privilegios');</script>";
        			exit();
    			}
			}
		}	
	}

	public function cargar_imagen(){
		$data["completar_proceso"] = 'cargar_imagen';

		if($this->input->post('control')==1){

			$carga['nombre_imagen']=$_FILES['userfile']['name'];
			$carga['tipo_imagen']=$_FILES['userfile']['type'];
			$carga['peso_imagen']=$_FILES['userfile']['size'];
			$carga['estatus']='A';
			$config['upload_path']          = './uploads/galeria';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('userfile')){
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                $error = array('error' => $this->upload->display_errors());                
                //$this->load->view('upload', $error);
            }
            else{
                $data = array('upload_data' => $this->upload->data());
                $this->load->model('administrador_sistemas_model');
				$carga = $this->administrador_sistemas_model->cargar_imagen($carga);

				if ($carga == FALSE){
	            	$data["error"]=1;
		            $data["mensaje"]="<script>alert('Error: No se pudo cargar la imagen');</script>";
					$this->load->view('Administrador/Administrador_de_sistemas/cargar_imagen', $data);
	            		
	    		}else{
	        		echo "<script>alert('Datos Cargados Correctamente');</script>";
				$data["completar_proceso"] = 'cargar_imagen';
				$this->index($data);
				}
            }
    
		}else{
			$this->index($data);
		}
	}	
}
