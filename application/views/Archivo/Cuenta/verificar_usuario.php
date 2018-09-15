<div class="col-md-12 col-ms-12 col-xs-12 form" style="margin-top:3%">
	<form id="usuario" action="<?php echo base_url()?>Archivo/Cuenta/consultar_usuario" 
	method="post" style="width:80%; float: none; margin: 0 auto;">
		<div class="header">
			<h3>Cuenta</h3>
			<p>Crear Usuario</p>
		</div>
		<div class="sep"></div>
		<div class="inputs" align="center">	
			<div class="col-md-10 col-sm-9 col-xs-6 form-group" id="cedula_div">
				<input type="text" name="cedula" id="cedula" class="form-control fondo-input" placeholder="Cedula" style="width:100%">
			</div>
			<div class="col-md-2 col-sm-3 col-xs-6 form-group" id="boton_div" align="center">
				<input type="submit" name="submit" id="boton-enviar" class="btn btn-verde" value="Consultar" style="height:100%; width:70%"/>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="consulta_div"></div>
		</div>	
	</form>	
</div>
	
<script type="text/javascript">
	$(document).ready(function(){

		$("form").keypress(function(e){
	        if (e.which == 13) {
	            return false;
	        }
	    });

		document.getElementById('cedula').value='';

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
    
		$('#form, #fat, #usuario').submit(function(){
			
			$("#consulta_div").show();
			cedula=$('#cedula').val();
			
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#consulta_div').html(data);
				}
			}) 

			return false;
		});
	})
</script>