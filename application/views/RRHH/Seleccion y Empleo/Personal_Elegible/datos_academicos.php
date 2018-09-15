<div class="sep"></div>

		<div class="inputs" align="left">	
				
		</div>
		<div class="inputs" align="center">	
			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="estudio_div">
			<select class="selectpicker form-control" name="estudio" id="estudio" size="1" style="width:100% important!;">
				<option selected value="0">Seleccione: Grado de Institución</option>
				<option value="1" selected>Primaria</option>
				<option value="2" selected>Secundaria</option>
				<option value="3" selected>Bachillerato</option>
				<option value="4" selected>Superior</option>
	
			</select>
			</div>
			<div class="col-md-3 col-sm-12 form-group" id="tit_estudio_div">
				<input type="text" name="tit_estudio" id="tit_estudio" class="form-control fondo-input" placeholder="Título Obtenido" style="width:100%">
			</div>			
			<div class="col-md-3 col-sm-12 form-group" id="nom_inst_div">
				<input type="text" name="nom_inst" id="nom_inst" class="form-control fondo-input" placeholder="Nombre de la Institución" style="width:100%">
			</div>
			<div class="col-md-3 col-sm-12 form-group" id="dir_inst_div">
				<input type="text" name="dir_inst" id="dir_inst" class="form-control fondo-input" placeholder="Dirección de la Institución" style="width:100%">
			</div>

			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="fec_ini_div">
			<input type="text" name="fec_ini" id="fec_ini" value="" placeholder="Fecha de Inicio" autofocus readonly style="width:100%;height: 30px;padding-left: 5%"/>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="fec_ter_div">
			<input type="text" name="fec_term" id="fec_term" value="" placeholder="Fecha de Termino" autofocus readonly style="width:100%;height: 30px;padding-left: 5%"/>
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="error_div"></div>
			<input type="hidden" id="control" name="control"  value="1" />
		</div>
<!--	<div align="center">	
		<div class="col-md-2 col-sm-12 col-xs-12 form-group" id="boton_div" align="center" style="margin-left:83%">
				<input type="submit" name="submit" id="boton-enviar" class="btn btn-verde" value="Actualizar" style="height:100%; width:100%"/>
		</div>
	</div>-->
<script type="text/javascript">
	$(document).ready(function(){

		$("form").keypress(function(e) {
	        if (e.which == 13){
	            return false;
	        }
	    });
	    document.getElementById('estudio').value=0;
	    document.getElementById('tit_estudio').value='';
	    document.getElementById('nom_inst').value='';
	    document.getElementById('dir_inst').value='';

	    $("#estudio").selectpicker({
			size: 4,
    		maxOptions: 1
     	});    	

	   
     	$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#fec_ini").datepicker({
				firstDay: 1
		});

		$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#fec_term").datepicker({
				firstDay: 1
		});
			

		document.getElementById('cedula_aca').value='';
		$("#cedula_aca").autocomplete({
			source: function(request, response){
				$.ajax({
					url:"<?php echo base_url()?>autocomplete/search_by_cedula",
					data: {term:$("#cedula_aca").val()},
					dataType: "json",
					type: "POST",
					success: function(data){
						response(data);
					}
				});
			},
			minLength: 2
		});
     

		
    
		

	})
</script>	

	

