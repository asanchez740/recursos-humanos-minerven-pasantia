<?php $this->funciones->verificar_error($error, $mensaje);?>

<div align="center" style="padding:2% 0% 0% 0%;">

	<form id="datos_trab" action="<?php echo base_url()?>RRHH/Personal_activo/datos_trabajador"
	method="post" style="width:80%;" class="form">

		<div class="header" align="center">
			<h3>Personal Elegible</h3>
			<p>Datos del Aspirante</p>
		</div>

		<div class="sep"></div>
		<div class="inputs" align="center">
		   	<ul class="nav nav-tabs">
  				<li class="active"><a data-toggle="tab" href="#datos">Datos Personales</a></li>
  				<li><a data-toggle="tab" href="#academicos">Datos Académicos</a></li>
  				<li><a data-toggle="tab" href="#exp_laboral">Eperiencia Laboral</a></li>
  				<li><a data-toggle="tab" href="#cursos_realizados">Cursos Realizados</a></li>
  				
			</ul>
		</div>

		<div class="tab-content">
  			<div id="datos" class="tab-pane fade in active">
    			<div id="datos"></div>
  			</div>
  			<div id="academicos" class="tab-pane fade">
   				<div id="academicos"></div>
  			</div>
  			<div id="exp_laboral" class="tab-pane fade">
   				<div id="exp_laboral"></div>
  			</div>
  			<div id="cursos_realizados" class="tab-pane fade">
   				<div id="cursos_realizados"></div>
  			</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="error_div"></div>

		<input type="hidden" id="control" name="control"  value="1" />

	</form>

</div>

<script type="text/javascript">

	$(document).ready(function(){

		$("#datos").load('<?php echo base_url()?>RRHH/Personal_elegible/cargar_input_info_personal', {});
		$("#academicos").load('<?php echo base_url()?>RRHH/Personal_elegible/cargar_input_info_academica', {});
		$("#exp_laboral").load('<?php echo base_url()?>RRHH/Personal_elegible/cargar_input_exp_laboral', {});
		$("#cursos_realizados").load('<?php echo base_url()?>RRHH/Personal_elegible/cargar_input_cursos_realizados', {});
	})


</script>
