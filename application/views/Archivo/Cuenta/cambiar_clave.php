<?php $this->funciones->verificar_error($error, $mensaje); ?>

<div class="col-md-12 col-ms-12 col-xs-12 form" style="margin-top:3%">
	<form id="usuario" action="<?php echo base_url()?>Archivo/Cuenta/cambiar_clave" 
	method="post" style="width:80%; float: none; margin: 0 auto;">
		<div class="header">
			<h3>Cuenta</h3>
			<p>Modificar Contraseña</p>
		</div>
		<div class="sep"></div>
		<div class="inputs" align="center">	
			<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="clave_anterior_div">
				<input type="password" name="clave" id="clave" class="form-control fondo-input" placeholder="Clave anterior" style="width:100%">
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="clave_nueva_div">
				<input type="password" name="clave_nueva" id="clave_nueva" class="form-control fondo-input" placeholder="Clave nueva" style="width:100%">
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="clave_nueva_repetida_div">
				<input type="password" name="clave_nueva_repetida" id="clave_nueva_repetida" class="form-control fondo-input" placeholder="Repita Clave nueva" style="width:100%">
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12 form-group" id="boton_div" align="center">
				<input type="submit" name="submit" id="boton-enviar" class="btn btn-verde" value="Modificar" style="height:100%; width:100%"/>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="error_div"></div>
			<input type="hidden" id="control" name="control"  value="1" />
		</div>	
	</form>		
</div>
	
<script type="text/javascript">
	$(document).ready(function(){
    
		$('#form, #fat, #usuario').submit(function(){
			
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
