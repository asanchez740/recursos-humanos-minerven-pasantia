<?php

class Dynamic_menu {

    private $ci;              
    private $id_menu = 'id="menu"';
    private $class_menu = 'class="menu"';
    private $class_parent = 'class="parent"';
    private $class_last  = 'class="last"';

    function __construct()
    {
		$this->ci = &get_instance();
		$this->db3 = $this->ci->load->database('menu',TRUE);
    }

    function obtener_modulos_admin()
    {      
        $i=0;
        $consultar['indice']=$i;

        $consulta= "SELECT * 
                    FROM modulos 
                    WHERE estatus = 'TRUE'";
        
        $query=$this->db3->query($consulta);

         if ($query->num_rows() > 0)
        {

            foreach ($query->result() as $row)
            {   
                $i=$consultar['indice'];
                //echo $row->id.$row->descripcion.'<br>';
                $menu[$i]['id']= $row->id;
                $menu[$i]['title']= $row->descripcion;
                $menu[$i]['url']= '#';
                $menu[$i]['parent']= '0';
                $menu[$i]['is_parent']= TRUE;
                $menu[$i]['tipo']= 0; // Es módulo
                $i++;
                $consultar['id_modulos']= $row->id;
                $consultar['indice']=$i;
                
                list($menu, $consultar)=$this->obtener_submodulos_admin($consultar, $menu);
                //echo $consultar['indice'];
            }
        }
        $query->free_result();  
        return $menu;

    } 

    function obtener_submodulos_admin($consultar, $menu)
    {   
        $consulta= "SELECT *
                    FROM submodulos
                    WHERE estatus = 'TRUE'
                    AND submodulos.id_modulos = ? ";

        $query1=$this->db3->query($consulta, $consultar['id_modulos']);
       
         if ($query1->num_rows() > 0)
        {

            foreach ($query1->result() as $row)
            {   
                $consultar['id_submodulos_aux']= $row->id;

                //echo $row->id.$row->descripcion.'<br>';
                $i=$consultar['indice'];
                $menu[$i]['id']= $row->id;
                $menu[$i]['title']= $row->descripcion;
                $menu[$i]['url']= '';
                $menu[$i]['parent']= $consultar['id_modulos'];
                $menu[$i]['is_parent']= TRUE;
                $menu[$i]['tipo']= 1; // Es submódulo
                $consultar['id_submodulos']= $row->id;
                //echo $menu[$i]['title'].$menu[$i]['is_parent'].'<br>';
                $i++;
                $consultar['indice']=$i;
                list($menu, $consultar)=$this->obtener_opciones_admin($consultar, $menu);
            }
        }
        else
        {
            $i=$consultar['indice'];
            //$menu[$i]['id']= $row->id;
            $menu[$i]['title']= 'No existe submódulo';
            $menu[$i]['url']= 'Url inválida';
            //$menu[$i]['parent']= $consultar['id_submodulos'];
            $menu[$i]['is_parent']= FALSE;
            $menu[$i]['tipo']= 1; // Es opción
            $i++;
            $consultar['indice']=$i;
        }

        $query1->free_result();  
        return array($menu, $consultar);
    } 

    function obtener_opciones_admin($consultar, $menu)
    {   

        $consulta="SELECT *
                    FROM opciones 
                    WHERE estatus = 'TRUE'
                    AND opciones.id_modulos = ?
                    AND opciones.id_submodulos = ?";

        $query2=$this->db3->query($consulta, array($consultar['id_modulos'], $consultar['id_submodulos']));
       
       
         if ($query2->num_rows() > 0)
        {

            foreach ($query2->result() as $row)
            {   
                //echo $row->id.'<br>';
                //echo $row->id.$row->descripcion.'<br>';
                $i=$consultar['indice'];
                $menu[$i]['id']= $row->id;
                $menu[$i]['title']= $row->descripcion;
                $menu[$i]['url']= $row->url;
                $menu[$i]['parent']= $consultar['id_submodulos'];
                $menu[$i]['is_parent']= FALSE;
                $menu[$i]['tipo']= 2; // Es opción
                $i++;
                $consultar['indice']=$i;

            }
        }
        else
        {
            $i=$consultar['indice'];
            //$menu[$i]['id']= $row->id;
            $menu[$i]['title']= 'No existe opción';
            $menu[$i]['url']= 'Url inválida';
            //$menu[$i]['parent']= $consultar['id_submodulos'];
            $menu[$i]['is_parent']= FALSE;
            $menu[$i]['tipo']= 2; // Es opción
            $i++;
            $consultar['indice']=$i;
        }

        $query2->free_result();  
        return array($menu, $consultar);
    }

    function obtener_modulos($consultar)
    {      
        $i=0;
        $consultar['indice']=$i;

        $consulta= "SELECT DISTINCT(id), descripcion 
                    FROM modulos, privilegios 
                    WHERE modulos.estatus = 'TRUE' 
                    AND privilegios.cedula = ? 
                    AND modulos.id = privilegios.id_modulos
                    AND privilegios.estatus = 'TRUE'";
        
        $query=$this->db3->query($consulta, 
                                array($consultar['cedula']));

         if ($query->num_rows() > 0)
        {

            foreach ($query->result() as $row)
            {   
                $i=$consultar['indice'];
                //echo $row->id.$row->descripcion.'<br>';
                $menu[$i]['id']= $row->id;
                $menu[$i]['title']= $row->descripcion;
		        $menu[$i]['url']= '';
                $menu[$i]['parent']= '0';
                $menu[$i]['is_parent']= TRUE;
                $menu[$i]['tipo']= 0; // Es módulo
                $i++;
                $consultar['id_modulos']= $row->id;
                $consultar['indice']=$i;
                list($menu, $consultar)=$this->obtener_submodulos($consultar, $menu);
                //echo $consultar['indice'];
            }
        }
        $query->free_result();    
        return $menu;

    }  

    function obtener_submodulos($consultar, $menu)
    {   
        
        $consulta= "SELECT DISTINCT(id), descripcion 
                    FROM submodulos, privilegios 
                    WHERE submodulos.id_modulos = ? 
                    AND submodulos.estatus = 'TRUE' 
                    AND privilegios.cedula = ?
                    AND privilegios.estatus = 'TRUE' 
                    AND privilegios.id_modulos =?
                    AND privilegios.id_modulos = submodulos.id_modulos 
                    ORDER BY submodulos.id ASC";

        $query1=$this->db3->query($consulta, 
                                array($consultar['id_modulos'], $consultar['cedula'], $consultar['id_modulos']));
       
         if ($query1->num_rows() > 0)
        {
            
            foreach ($query1->result() as $row)

            {   $consultar['id_submodulos_aux']= $row->id;

                $permiso=$this->verificar_permisos($consultar);

                if ($permiso=='TRUE'){

                    //echo $row->id.$row->descripcion.'<br>';
                    $i=$consultar['indice'];
                    $menu[$i]['id']= $row->id;
                    $menu[$i]['title']= $row->descripcion;
		            $menu[$i]['url']= '';
                    $menu[$i]['parent']= $consultar['id_modulos'];
                    $menu[$i]['is_parent']= TRUE;
                    $menu[$i]['tipo']= 1; // Es submódulo
                    $consultar['id_submodulos']= $row->id;
                    $i++;
                    $consultar['indice']=$i;
                    list($menu, $consultar)=$this->obtener_opciones($consultar, $menu);

                }

            }
        }
        $query1->free_result();    
        return array($menu, $consultar);
    }

     function obtener_opciones($consultar, $menu)
    {   

        $consulta=  "SELECT opciones.* 
                    FROM opciones,privilegios 
                    WHERE opciones.id = privilegios.id_opciones 
                    AND opciones.id_modulos = privilegios.id_modulos 
                    AND opciones.id_submodulos = privilegios.id_submodulos
                    AND privilegios.cedula = ? 
                    AND opciones.id_modulos = ? 
                    AND opciones.id_submodulos = ? 
                    AND privilegios.estatus = 'TRUE' 
                    ORDER BY opciones.id ASC";

        $query2=$this->db3->query($consulta, 
                                array($consultar['cedula'], $consultar['id_modulos'], $consultar['id_submodulos']));
    
         if ($query2->num_rows() > 0)
        {
           
            foreach ($query2->result() as $row)
            {   
                //echo $row->id.'<br>';
                //echo $row->id.$row->descripcion.'<br>';
                $i=$consultar['indice'];
                $menu[$i]['id']= $row->id;
                $menu[$i]['title']= $row->descripcion;
                $menu[$i]['url']= $row->url;
                $menu[$i]['parent']= $consultar['id_submodulos'];
                $menu[$i]['is_parent']= FALSE;
                $menu[$i]['tipo']= 2; // Es opción
                $i++;
                $consultar['indice']=$i;
            }
        }
        $query2->free_result();    
        return array($menu, $consultar);
    }

     function verificar_permisos($consultar)
    {
        $consulta= "SELECT *
                    FROM privilegios 
                    WHERE id_modulos = ? 
                    AND estatus = 'TRUE' 
                    AND cedula = ?
                    AND id_submodulos =?";

        $query3=$this->db3->query($consulta, 
                            array($consultar['id_modulos'], $consultar['cedula'], $consultar['id_submodulos_aux']));
       
         if ($query3->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function build_menu()
    {   
        $consultar['nombre']= $this->ci->session->userdata('nombre');
        
        if($consultar['nombre']=='admin'){
            $registros=$this->obtener_modulos_admin();

        }
        else{
            $consultar['cedula']= $this->ci->session->userdata('cedula');
            $registros=$this->obtener_modulos($consultar);
        }

		$html_out = ' <div class="dropdowns">';
        $html_out .= '<a class="toggleMenu" href="#">Menu</a>';
        $html_out .= '<ul class="nav">';
        $contador=1;
        $contador_aux=1;
        $tipo_anterior=0;

        foreach ($registros as $menu)
        {   
            $menu['title'] = str_replace("_", " ", $menu['title']);

            if ($menu['tipo']==0 AND $tipo_anterior==0)   
            {
                $html_out .= '<li>';
            }
            if ($menu['tipo']==0 AND $tipo_anterior==1)   
            {
                $html_out .= '</ul>';
                $html_out .= '<li>';
            }
            if ($menu['tipo']==0 AND $tipo_anterior==2)   
            {   
                $html_out .= '</ul>';
                $html_out .= '<li>';
                $html_out .= '</ul>';
            }
          
            if ($menu['tipo'] == 1 AND $tipo_anterior==2)
            {
                $html_out .= '</ul>';
            }

            if ($menu['tipo'] == 1 AND $tipo_anterior!=2)
            {
                $html_out .= '<ul>';
            }

            if ($menu['tipo'] == 2 AND $tipo_anterior!=2)
            {
                $html_out .= '<ul>';
                $contador_aux=0;
            }

            $html_out .= '<li>';
            $html_out .= anchor(base_url().$menu['url'], $menu['title']);
            
            $tipo_anterior=$menu['tipo'];
      
        }

        $html_out .='</ul>';
        $html_out .= '</div>';
        return $html_out;
    }  

}
// ------------------------------------------------------------------------
// End of Dynamic_menu Library Class.

// ------------------------------------------------------------------------
/* End of file Dynamic_menu.php */
/* Location: ../application/libraries/Dynamic_menu.php */  
