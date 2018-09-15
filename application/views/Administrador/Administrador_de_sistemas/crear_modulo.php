<?php $this->funciones->verificar_error($error, $mensaje); ?>

<div align="center" style="padding:2% 0% 0% 0%;">
			
	<form id="crear_modulo" action="<?php echo base_url()?>Administrador/Administrador_sistemas/crear_modulo" 
	method="post" style="width:80%;" class="form">
		
		<div class="header">
			<h3>Administrador de Sistemas</h3>
			<p>Crear Módulo</p>
		</div>
		
		<div class="sep"></div>
		
		<div class="inputs" align="center">
					
			<div class="col-md-10 col-sm-12 col-xs-12 form-group" id="nombre_div">
				<input type="text" name="nombre" id="nombre" class="form-control fondo-input" placeholder="Nombre" style="width:100%" autofocus/>
			</div>

			<div class="col-md-2 col-sm-12 col-xs-12 form-group" id="crear_div" align="center">
				<input type="submit" name="submit" class="btn btn-verde" value="Crear" align="center" autofocus style="height:100%; width:70%"/>
			</div>
						
		</div>	

		<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="error_div"></div>

		<input type="hidden" id="control" name="control"  value="1" />
			
	</form>
				
</div>

<script type="text/javascript">

	$(document).ready(function(){
    
		$('#form, #fat, #crear_modulo').submit(function(){
			
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
