<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
   
class Cuenta extends CI_Controller{

   	public function __construct(){
		parent::__construct();
	    $ci= &get_instance();
		$this->db2= $ci->load->database('menu',TRUE);
		$this->db3= $ci->load->database('sistemas',TRUE);
    }

	public function index($data=0){
		$data['error']=0;
   		$data['mensaje']='';
		$this->load->view('contenedor');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('Archivo/Cuenta/'.$data["completar_proceso"], $data);
		$this->load->view('footer');
	}


	public function cargar_select_modulo(){
		$consultar['cedula'] = $this->session->userdata('cedula');
		$consultar['administrador'] = 'S';
        $this->load->model('administrador_sistemas_model');
		$data['res_consulta'] = $this->administrador_sistemas_model->consultar_modulos($consultar);
		$this->load->view('Administrador/Administrador_de_sistemas/cargar_modulo', $data);
	}

	public function consultar_usuario(){
		$data["completar_proceso"] = 'consultar_usuario';
		$this->form_validation->set_rules('cedula', 'Cedula', 'required|min_length[6]|trim|numeric');
		$this->form_validation->set_message('numeric',"<script>alert('Error: El campo %s debe poseer sólo números')</script>"); 
		$this->form_validation->set_message('required',"<script>alert('Error: El campo %s es obligatorio');</script>"); 
		$this->form_validation->set_message('min_length',"<script>alert('Error: El campo %s debe tener mas de 5 caracteres');</script>");
		$consulta['cedula'] = $this->input->post('cedula');
		
		if($this->form_validation->run()!=false){
			$this->load->model('cuenta_usuario_model');
			$consultar['res_consulta'] = $this->cuenta_usuario_model->consultar_nombre_usuario_por_cedula($consulta);
			
			if($consultar['res_consulta']!= FALSE){
				$consultar['resultado'] = $this->cuenta_usuario_model->consultar_cuenta_usuario_por_cedula($consulta);

				if($consultar['resultado']== FALSE){
					$consultar['resultado']='';
					$consultar['estatus']='';	

				}else{
					$consultar['estatus']=$consultar['resultado']['0']['estatus'];
					$consultar['resultado']=$consultar['resultado']['0']['uslogin'];
				}

				$consultar["error"]=0;
				$consultar["mensaje"]="";
				$this->load->view('Archivo/Cuenta/consultar_usuario', $consultar);

			}else{
				$data["error"]=1;
          		$data["mensaje"]="<script>alert('No existe en el sistema la cedula ingresada');</script>";
				$this->load->view('Archivo/Cuenta/consultar_usuario', $data);
			}	

		}else{
			$data["error"]=2;
			$data["mensaje"]="";
			$this->load->view('Archivo/Cuenta/consultar_usuario', $data);
		}
	}

	public function procesar_usuario(){
		$consultar['cedula']= $this->input->post('cedula');
		$this->load->model('cuenta_usuario_model');
		$consultar['resultado'] = $this->cuenta_usuario_model->consultar_cuenta_usuario_por_cedula($consultar);
		
		if($consultar['resultado']==FALSE){
			$consultar['resultado']=FALSE;
			$estatus='';

		}else{
			$estatus=$consultar['resultado']['0']['estatus'];
			$consultar['resultado']=$consultar['resultado']['0']['uslogin'];
		}

		$uslogin = $consultar['resultado'];

		if($consultar['resultado']==FALSE){
			$this->load->view('Archivo/Cuenta/crear_usuario', $consultar);

		}if($consultar['resultado']!=FALSE AND $estatus!=TRUE){
			$this->load->view('Archivo/Cuenta/actualizar_usuario', $consultar);

		}
		if($consultar['resultado']!=FALSE AND $estatus==TRUE){
			$this->load->view('Archivo/Cuenta/eliminar_usuario', $consultar);
		}
	}

	public function crear_usuario(){
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[6]|trim');
		$this->form_validation->set_message('required',"<script>alert('Error: El campo %s es obligatorio');</script>"); 
		$this->form_validation->set_message('min_length',"<script>alert('Error: El campo %s debe tener mas de 5 caracteres');</script>");
		$cargar['nombre'] = $this->input->post('nombre');
		$cargar['cedula'] = $this->input->post('cedula');
		
		if($this->form_validation->run()!=false){
			$clave= $cargar['cedula'];
			$clave= hash('sha512', $clave);
			$cargar['alt'] = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    		$cargar['clave'] = hash('sha512', $clave.$cargar['alt']);
    		$this->load->model('cuenta_usuario_model');
			$consultar['resultado'] = $this->cuenta_usuario_model->consultar_cuenta_usuario_por_cedula($cargar);

			if($consultar['resultado']== FALSE){
				$this->load->model('cuenta_usuario_model');
				$carga = $this->cuenta_usuario_model->crear_cuenta_usuario_por_cedula($cargar);

				if($carga == FALSE){
	    			echo "<script>alert('Error: No se ha podido crear el usuario');</script>";
	    			exit();

				}else{
					$this->load->model('cuenta_usuario_model');
					$carga = $this->cuenta_usuario_model->crear_cuenta_usuario_por_cedula($cargar);
					$cargar['submodulo'] = '17001';
					$cargar['modulo']='17000';
					$cargar['opcion']='1701';
					$this->load->model('administrador_sistemas_model');
					$administrar = $this->administrador_sistemas_model->cargar_privilegio($cargar);	
					//var_dump($administrar);

					if($administrar == FALSE){
		    			echo "<script>alert('Error: No se pudp cargar opción de cambiar clave');</script>";
		    			exit();
					}
					echo "<script>alert('Usuario creado Correctamente');</script>";
				}	

			}else{
				$cargar['estatus'] = TRUE;
				$this->load->model('cuenta_usuario_model');
				$actualiza = $this->cuenta_usuario_model->actualizar_cuenta_usuario_por_cedula($cargar);

				if ($actualiza == FALSE){
	    			echo "<script>alert('Error: No se pudo habilitar el usuario');</script>";
	    			exit();

				}else{
					echo "<script>alert('Usuario habilitado Correctamente');</script>";
				}
			}		

		}else{
			$this->index($data);
		}

	}

	public function eliminar_usuario(){
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[6]|trim');
		$this->form_validation->set_message('required',"<script>alert('Error: El campo %s es obligatorio');</script>"); 
		$this->form_validation->set_message('min_length',"<script>alert('Error: El campo %s debe tener mas de 5 caracteres');</script>");
		$actualizar['nombre'] = $this->input->post('nombre');
		$actualizar['cedula'] = $this->input->post('cedula');
		$actualizar['estatus'] = FALSE;
		
		if($this->form_validation->run()!=false){
			$this->load->model('cuenta_usuario_model');
			$actualiza = $this->cuenta_usuario_model->actualizar_cuenta_usuario_por_cedula($actualizar);

			if ($actualiza == FALSE){
    			echo "<script>alert('Error: No se pudo deshabilitar el usuario');</script>";
    			exit();

			}else{
				echo "<script>alert('Usuario deshabilitado Correctamente');</script>";
			}		

		}else{
			$this->index($data);
		}
	}

	public function verificar_usuario(){
		$data["completar_proceso"] = 'verificar_usuario';
		
		if($this->input->post("submit")){
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[4]|trim');
			$this->form_validation->set_message('required',"<script>alert('Error: El campo %s es obligatorio');</script>"); 
			$this->form_validation->set_message('min_length',"<script>alert('Error: El campo %s debe tener mas de 3 caracteres');</script>");
			$carga['nombre'] = $this->input->post('nombre');
			$consulta['nombre'] = $this->input->post('nombre');
			
			if($this->form_validation->run()!=false){
				$this->load->model('administrador_sistemas_model');
				$administrar = $this->administrador_sistemas_model->consultar_todo_modulo($carga);
				
				if($administrar != FALSE){
					$data["mensaje"]="<script>alert('Error: Nombre del módulo ya existe');</script>";
					$this->index($data);
					return;

				}else{
					$administrar = $this->administrador_sistemas_model->consultar_id_modulo();					
					$max =$administrar['0']['maximo'];
					$carga['id'] = $max + 1000;					
            		$administrar = $this->administrador_sistemas_model->cargar_modulo($carga);

            		if ($administrar == FALSE){
            			echo "<script>alert('Error: No se pudo cargar el módulo');</script>";
            			exit();

            		}else{
	            		$carga['cedula']=$this->session->userdata('cedula');
	            		$carga['es_admin']='S';
	            		$carga['modulo']=$carga['id'];
	            		$administrar = $this->administrador_sistemas_model->cargar_usuario_administrador($carga);

	            		if ($administrar == FALSE){
	            			echo "<script>alert('Error: No se pudo cargar el superusuario como administrador del modulo');</script>";
	            			$this->index($data);
	            		}

	            		$data["mensaje"]="<script>alert('Datos Cargados Correctamente');</script>";
						$this->index($data);
					}
				}		

			}else{
				$this->index($data);
			}

		}else{
			$this->index($data);
		}
	}

	public function cambiar_clave(){
		$data["completar_proceso"] = 'cambiar_clave';
		
		if($this->input->post('control')==1){
			$this->form_validation->set_rules('clave', 'Clave', 'required|min_length[4]|trim');
			$this->form_validation->set_rules('clave_nueva', 'Clave Nueva', 'required|min_length[4]|trim');
			$this->form_validation->set_rules('clave_nueva_repetida', 'Clave Nueva Repetida', 'required|min_length[4]|trim');
			$this->form_validation->set_message('required',"<script>alert('Error: El campo %s es obligatorio');</script>"); 
			$this->form_validation->set_message('min_length',"<script>alert('Error: El campo %s debe tener mas de 3 caracteres');</script>");
			$actualizar['clave'] = $this->input->post('clave');
			$actualizar['clave_nueva'] = $this->input->post('clave_nueva');
			$actualizar['clave_nueva_repetida'] = $this->input->post('clave_nueva_repetida');
			$consultar['usuario'] = $this->session->userdata('nombre');
			
			if($this->form_validation->run()!=false){
				$this->load->model('login_model');
				$login = $this->login_model->obtener_datos_login_por_usuario($consultar);
				
				if($login!=false){
					$db_clave= $login['0']['clave_parte_uno'];
					$alt= $login['0']['clave_parte_dos'];
					$clave= hash('sha512', $actualizar['clave']);
					$clave= hash('sha512', $clave.$alt);

					if($db_clave!=$clave){
						$data["error"]=1;
	            		$data["mensaje"]= "<script>alert('Error: Clave anterior inválida');</script>";
						$this->load->view('Archivo/Cuenta/cambiar_clave', $data);
					}

					if($actualizar['clave_nueva']!=$actualizar['clave_nueva_repetida']){
						$data["error"]=1;
	            		$data["mensaje"]= "<script>alert('Error: Clave nueva no coincide');</script>";
						$this->load->view('Archivo/Cuenta/cambiar_clave', $data);
					}
				}

				$actualizar['clave_nueva']= hash('sha512', $actualizar['clave_nueva']);
				$actualizar['alt'] = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
	    		$actualizar['clave_nueva'] = hash('sha512', $actualizar['clave_nueva'].$actualizar['alt']);
	    		$actualizar['cedula'] = $this->session->userdata('cedula');
				$this->load->model('cuenta_usuario_model');
				$actualiza = $this->cuenta_usuario_model->actualizar_clave_usuario($actualizar);

				if($actualiza == FALSE){
					$data["error"]=1;
	            	$data["mensaje"]="<script>alert('Error: No se pudo actualizar la clave');</script>";
					$this->load->view('Archivo/Cuenta/cambiar_clave', $data);

				}else{
					echo "<script>alert('Se ha actualizado la clave correctamente');</script>";
				}	

			}else{
				$data["error"]=2;
				$data["mensaje"]="";
				$this->load->view('Archivo/Cuenta/cambiar_clave', $data);
			}

		}else{
			$this->index($data);
		}
	}
}