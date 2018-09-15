<?php $this->funciones->verificar_error($error, $mensaje); ?>

<div align="center" style="padding:2% 0% 0% 0%;">
	<form id="crear_submodulo" action="<?php echo base_url()?>Administrador/Administrador_sistemas/crear_submodulo" 
	method="post" style="width:80%;" class="form">
		<div class="header">
			<h3>Administrador de Sistemas</h3>
			<p>Crear Submódulo</p>
		</div>
		<div class="sep"></div>
		<div class="inputs" align="center">		
			<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="modulo_div"></div>
			<div class="col-md-6 col-sm-12 col-xs-12 form-group" id="submodulo_div">
				<input type="text" name="submodulo" id="submodulo"
				class="form-control fondo-input" placeholder="Submódulo" style="width:100%" autofocus/>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12 form-group" id="crear_div" align="center">
				<input type="submit" name="submit" class="btn btn-verde" value="Crear" align="center" style="height:100%; width:70%"/>
			</div>				
		</div>	
		<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="error_div"></div>
		<input type="hidden" id="control" name="control"  value="1" />
	</form>	
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$("#modulo_div").load("<?php echo base_url()?>Administrador/Administrador_sistemas/cargar_select_modulo");
		document.getElementById('submodulo').value='';
    
		$('#form, #fat, #crear_submodulo').submit(function(){
			
			$.ajax({ 
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#error_div').html(data);
				}
			}) 

			return false;
		});

	})
</script>
