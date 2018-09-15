<div align="center">
	<form id="modal_usuario" name="modal_usuario" action="<?php echo base_url()?>Archivo/Cuenta/crear_usuario" 
	method="post" class="reset-this">
		<div class="col-md-10 col-sm-12 col-xs-12 form-group" id="nombre_div">
			<input type="text" name="nombre" id="nombre" class="form-control fondo-input" 
			placeholder="Nombre" style="height:100%; width:100%" autofocus/>
		</div>
		<input type="hidden" name="cedula" id="cedula" value="<?php echo $cedula; ?>" />
		<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="boton_div" align="right" style="padding:2% 0% 0% 0%;">
			<button type="button" class="btn btn-defecto" data-dismiss="modal">Close</button>
			<input type="submit" name="submit" id="guardar" class="btn btn-verde" value="Crear" />
		</div>
		<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="actualizar_div"></div>
	</form>		
</div>

<script type="text/javascript">
	$(document).ready(function(){
		
		$('#guardar').click(function(){
			
			$('#form, #fat, #modal_usuario').submit(function(){

				$.ajax({
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data){
						$('#actualizar_div').html(data);
					}
				}) 

				cedula=$('#cedula').val();
				$("#consulta_div").load("<?php echo base_url()?>Archivo/Cuenta/consultar_usuario", {cedula: cedula});
				return false;

			});

			$("#usuario_modal .close").click();
			$('.modal-backdrop').remove();
		});
	});
</script>
