<div class="sep"></div>
<div class="inputs" align="left">
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="cedula">
		<input type="text" name="nombre" id="nombre" class="form-control fondo-input" placeholder="Cedula" style="width:100%">
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="nombre_div">
		<input type="text" name="nombre" id="nombre" class="form-control fondo-input" placeholder="Nombres" style="width:100%">
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="apellido_div">
		<input type="text" name="apellido" id="apellido" class="form-control fondo-input" placeholder="Apellidos" style="width:100%">
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="sexo_div">
			<select class="selectpicker form-control" name="sexo" id="sexo" size="1" style="width:100%;">
				<option selected value="0">Seleccione: Sexo</option>
				<option value="F" selected>Femenino</option>
				<option value="M" selected>Masculino</option>
	
			</select>
			</div>
</div>
<div class="inputs" align="left">
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="fecha_trab_div">			
		<input type="text" name="datepicker" id="datepicker" value="" placeholder="Fecha de Nacimiento" autofocus readonly style="width:100%;height: 30px;padding-left: 5%">
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="sangre_div">
			<select class="selectpicker form-control" name="sangre" id="sangre" size="1" style="width:100% important!;">
				<option selected value="0">Seleccione: Tipo de Sangre</option>
				<option value="1" selected>OR+</option>
				<option value="2" selected>OR-</option>
				<option value="3" selected>B+</option>
				<option value="4" selected>B-</option>	
			</select>
	</div>

	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="civil_div">
		<select class="selectpicker form-control" name="civil" id="civil" size="1" style="width:100%;">
			<option selected value="0">Seleccione: Estado Civil</option>
			<option value="1" selected>Soltero(a)</option>
			<option value="2" selected>Casado(a)</option>
			<option value="3" selected>Viudo(a)</option>
		</select>
	</div>	
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="nac_div">
		<select class="selectpicker form-control" name="nac" id="nac" size="1" style="width:100%;">
			<option selected value="0">Seleccione: Nacionalidad</option>
			<option value="V" selected>Venezolana</option>
			<option value="E" selected>Extrajera</option>
		</select>
	</div>	

</div>
<div class="inputs" align="left">
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="pais_div">
		<select class="selectpicker form-control" name="pais" id="pais" size="1" style="width:100%;">
			<option selected value="0">Seleccione: País</option>
			<option value="01" selected>Venezuela</option>
		</select>
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="estado_div">
		<select class="selectpicker form-control" name="estado" id="estado" size="1" style="width:100%;">
			<option selected value="0">Seleccione: Estado</option>
			<option value="01" selected>Amazonas</option>
			<option value="02" selected>Bolívar</option>
		</select>
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="municipio_div">
		<select class="selectpicker form-control" name="municipio" id="municipio" size="1" style="width:100%;">
			<option selected value="0">Seleccione: Municipio</option>
			<option value="01" selected>Caroní</option>
			<option value="02" selected>El Callao</option>
			<option value="03" selected>Heres</option>
			<option value="04" selected>Piar</option>
		</select>
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="ciudad_div">
		<select class="selectpicker form-control" name="ciudad" id="ciudad" size="1" style="width:100%;">
			<option selected value="0">Seleccione: Ciudad</option>
			<option value="01" selected>Puerto Ordaz</option>
			<option value="02" selected>San Felix</option>
			<option value="03" selected>Upata</option>
			<option value="04" selected>Ciudad Bolívar</option>
		</select>
	</div>
</div>
<div class="inputs" align="left">
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="profesion_div">
		<select class="selectpicker form-control" name="profesion" id="profesion" size="1" style="width:100%;">
			<option selected value="0">Seleccione: Profesión</option>
		</select>
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="direccion_div">
		<input type="text" name="direccion" id="direccion" class="form-control fondo-input" placeholder="Direccion" style="width:100%">
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="celular_div">
		<input type="text" name="celular" id="celular" class="form-control fondo-input" placeholder="Celular" style="width:100%">
	</div>
	<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="telefono_div">
		<input type="text" name="telefono" id="telefono" class="form-control fondo-input" placeholder="Teléfono de Residencia" style="width:100%">
	</div>
</div>
<div class="inputs" align="left">
	
</div>
			
			

	
<!--	<div align="center">	
		<div class="col-md-2 col-sm-12 col-xs-12 form-group" id="boton_div" align="center" style="margin-left:83%">
				<input type="submit" name="submit" id="boton-enviar" class="btn btn-verde" value="Actualizar" style="height:100%; width:100%">
		</div>
	</div>-->
<script type="text/javascript">
	$(document).ready(function(){

		$("form").keypress(function(e) {
	        if (e.which == 13){
	            return false;
	        }
	    });
	   
	    document.getElementById('sexo').value=0;
	    document.getElementById('sangre').value=0;
	    document.getElementById('nac').value=0;
	    document.getElementById('civil').value=0;
	    document.getElementById('pais').value=0;
	    document.getElementById('estado').value=0;
	    document.getElementById('municipio').value=0;
	    document.getElementById('ciudad').value=0;
	    document.getElementById('profesion').value=0;
	    document.getElementById('direccion').value='';
	    document.getElementById('celular').value='';
	    document.getElementById('telefono').value='';

	    $("#sexo").selectpicker({
			size: 4,
    		maxOptions: 1
     	});
     	$("#sangre").selectpicker({
			size: 4,
    		maxOptions: 1
     	});

     	$("#civil").selectpicker({
			size: 4,
    		maxOptions: 1
     	});

     	$("#nac").selectpicker({
			size: 4,
    		maxOptions: 1
     	});

     	$("#pais").selectpicker({
			size: 4,
    		maxOptions: 1
     	});

     	$("#estado").selectpicker({
			size: 4,
    		maxOptions: 1
     	});

     	$("#municipio").selectpicker({
			size: 4,
    		maxOptions: 1
     	});

     	$("#ciudad").selectpicker({
			size: 4,
    		maxOptions: 1
     	});

     	$("#profesion").selectpicker({
			size: 4,
    		maxOptions: 1
     	});

     	$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#datepicker").datepicker({
				firstDay: 1
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
     

		
    
		
    
	});
	
}
</script>	

	

