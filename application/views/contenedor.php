<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Modulo RRHH</title>
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		
		<link href='<?php echo base_url();?>assets/css/imagenes/logo-pestaña.png' rel='shortcut icon' type='image/png'>
		<link type="text/css"  href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet"/>
		<link type="text/css"  href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"/>
		<link type="text/css"  href="<?php echo base_url();?>assets/css/bootstrap-select.css" rel="stylesheet">
		<link type="text/css"  href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet"/>
		<link type="text/css"  href="<?php echo base_url();?>assets/css/estilos.css" rel="stylesheet"/>
		<link type="text/css"  href="<?php echo base_url();?>assets/css/dropdowns.css" rel="stylesheet"/>
		<link type="text/css"  href="<?php echo base_url();?>assets/css/dropdowns_skin_discrete.css" rel="stylesheet"/>
		<link type="text/css"  href="<?php echo base_url();?>assets/css/dataTables.jqueryui.css" rel="stylesheet"/>
		<link type="text/css"  href="<?php echo base_url();?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
		
		<link type="text/css"  href="<?php echo base_url();?>assets/css/bootstrap-switch.css" rel="stylesheet" />
		<link type="text/css"  href="<?php echo base_url();?>assets/fileinput/css/fileinput.css" rel="stylesheet" />
		
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-switch.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/dropdowns.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/fileinput/js/plugins/piexif.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/fileinput/js/plugins/sortable.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/fileinput/js/plugins/purify.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/fileinput/js/fileinput.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/fileinput/themes/fa/theme.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/fileinput/js/locales/es.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/responsive.bootstrap.min.js"></script>
		<?php if($this->uri->segment(2) == 'Gerencia'){?>
			<script src="<?php echo base_url();?>assets/js/gerencia_solicitud.js" ></script>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
		<?php } ?>
		<?php if($this->uri->segment(1) == 'Presidencia'){?>
			<script src="<?php echo base_url();?>assets/js/presidencia_solicitud.js" ></script>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
		<?php } ?>	
		<?php if($this->uri->segment(3) == 'listado_Realizadas'){?>
			<script src="<?php echo base_url();?>assets/js/solicitudesRealizadas.js" ></script>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
		<?php } ?>	
		<?php if($this->uri->segment(3) == 'listado'){?> <!--Consultoria Juridica -->
			<script src="<?php echo base_url();?>assets/js/consultoria_solicitudes.js" ></script>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
		<?php } ?>	
		<?php if($this->uri->segment(3) == 'elegibles_aprobados'){?> <!--Consultoria Juridica -->
			<script src="<?php echo base_url();?>assets/js/consultoria_solicitudes_contratos.js" ></script>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
		<?php } ?>	
		<?php if($this->uri->segment(3) == 'seleccion_personal'){?>
			<script src="<?php echo base_url();?>assets/js/personalElegibles.js" ></script>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
		<?php } ?>	
		<?php if($this->uri->segment(3) == 'solicitudes'){?>
			<script src="<?php echo base_url();?>assets/js/jefeSeleccionEmpleo.js" ></script>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
		<?php } ?>
		<?php if($this->uri->segment(3) == 'pre_seleccion_personal'){?>
			<script src="<?php echo base_url();?>assets/js/seleccion_empleo_pre_personal.js" ></script>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
		<?php } ?>
		<?php if($this->uri->segment(3) == 'solicitudes_asignadas'){?>
			<script src="<?php echo base_url();?>assets/js/solicitudes_asignadas_usuario.js" ></script>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
		<?php } ?>
		
			<?php if($this->uri->segment(3) == 'generarContratos'){?>
			<script src="<?php echo base_url();?>assets/js/generarContrato.js" ></script>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
		<?php } ?>
	</head>

	<body class="fondo">
		<div class="container" style="width:100%; padding-left:0px; padding-right:0px">
<?php if (!$this->session->userdata('nombre')):?>
				<script>alert('Error: Debe iniciar sesión');
 window.location ="<?php echo base_url()?>login";
</script>
<?php endif;?>

