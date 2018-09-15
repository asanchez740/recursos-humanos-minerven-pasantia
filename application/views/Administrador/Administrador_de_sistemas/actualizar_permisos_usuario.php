<?php $this->funciones->verificar_error($error, $mensaje); ?>

<div align="center" style="padding:2% 0% 0% 0%;">
	<form id="permisos" name="permisos" action="<?php echo base_url()?>Administrador/Administrador_sistemas/actualizar_permisos_usuario"
	method="post" style="width:80%;" class="form">
		<div class="header">
			<h3>Administrador de Sistemas</h3>
			<p>Actualizar Permisos de Usuario</p>
		</div>
		<div class="sep"></div>
		<div class="inputs" align="center">	
			<div class="col-md-2 col-sm-12 form-group" id="cedula_div">
				<input type="text" name="cedula" id="cedula" class="form-control fondo-input" placeholder="Cedula" style="width:100%">
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="modulo_div" style="display:none;"></div>
			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="submodulo_div" style="display:none"></div>
			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="opcion_div" style="display:none"></div>
			<div class="col-md-1 col-sm-12 col-xs-12 form-group" id="boton_div" align="center" style="display:none; padding:0% 0.5% 0% 0%;" >
				<input type="submit" name="submit" id="boton-enviar" class="btn btn-verde" value="Agregar" style="width:100%"/>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="consulta_div"></div>
			<input type="hidden" id="control" name="control"  value="1" />
		</div>	
	</form>	
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$("form").keypress(function(e) {
	        if (e.which == 13){
	            return false;
	        }
	    });

		document.getElementById('cedula').value='';
		$("#submodulo_div").hide();
		$("#opcion_div").hide();

		$("#cedula").autocomplete({
			source: function(request, response){
				$.ajax({
					url:"<?php echo base_url()?>autocomplete/search_by_cedula",
					data: {term:$("#cedula").val()},
					dataType: "json",
					type: "POST",
					success: function(data){
						response(data);
					}
				});
			},
			minLength: 2
		});

		$("#cedula").blur(function (){
			cedula=$('#cedula').val();
			$("#consulta_div").load("<?php echo base_url()?>Administrador/Administrador_sistemas/consultar_opciones_activas", {cedula: cedula});
			$("#modulo_div").load("<?php echo base_url()?>Administrador/Administrador_sistemas/cargar_select_modulo_dependiente", {cedula:cedula});
			$("#modulo_div").show();
	   	})
    
		$('#form, #fat, #permisos').submit(function(){
			$("#consulta_div").show();
			cedula=$('#cedula').val();
			modulo=$('#modulo').val();
			submodulo=$('#submodulo').val();
			
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#consulta_div').html(data);
				}
			}); 

			$("#opcion_div").load('<?php echo base_url()?>Administrador/Administrador_sistemas/cargar_select_opcion', {submodulo: submodulo, cedula: cedula, modulo:modulo});

			return false;
		});

	})
</script>