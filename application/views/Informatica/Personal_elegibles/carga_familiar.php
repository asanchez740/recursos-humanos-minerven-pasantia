<div class="sep"></div>

		<div class="inputs" align="left">	
				<div class="col-md-12 col-sm-12 form-group" id="cedula_fam_div">
				<input type="text" name="cedula_fam id="cedula_fam" class="form-control fondo-input" placeholder="Cedula" style="width:20%;margin-left:0%"> <span style="padding-left:1%;cursor:pointer;" id="buscar_icono" name='buscar_icono' class="glyphicon glyphicon-search"  style="cursor:pointer; color:white;"></span>
				</div><br>
		</div>
		<div class="inputs" align="center">	
			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="parentesco_div">
			<select class="selectpicker form-control" name="parentesco" id="parentesco" size="1" style="width:100% important!;">
				<option selected value="0">Seleccione: Parentesco</option>
				<option value="1" selected>Madre</option>
				<option value="2" selected>Padre</option>
				<option value="3" selected>Hijo(a)</option>
	
			</select>
			</div>
			<div class="col-md-3 col-sm-12 form-group" id="ced_par_div">
				<input type="text" name="ced_par" id="ced_par" class="form-control fondo-input" placeholder="Cédula del Familiar" style="width:100%">
			</div>			
			<div class="col-md-3 col-sm-12 form-group" id="nom_par_div">
				<input type="text" name="nom_par" id="nom_par" class="form-control fondo-input" placeholder="Nombre del Familiar" style="width:100%">
			</div>
			<div class="col-md-3 col-sm-12 form-group" id="ape_par_div">
				<input type="text" name="ape_par" id="ape_par" class="form-control fondo-input" placeholder="Apellido del Familiar" style="width:100%">
			</div>
            <div class="col-md-3 col-sm-12 col-xs-12 form-group" id="nac_par_div">
			<select class="selectpicker form-control" name="nac_par" id="nac_par" size="1" style="width:100% important!;">
				<option selected value="0">Seleccione: Nacionalidad</option>
				<option value="V" selected>Venezoalna</option>
				<option value="E" selected>Extranjera</option>
	
			</select>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="fec_nac_par_div">
			<input type="text" name="fec_nac_par" id="fec_nac_par" value="" placeholder="Fecha de Nacimiento del Familiar" autofocus readonly style="width:100%;height: 30px;padding-left: 5%"/>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="sexo_par_div">
			<select class="selectpicker form-control" name="sexo_par" id="sexo_par" size="1" style="width:100% important!;">
				<option selected value="0">Seleccione: Sexo</option>
				<option value="F" selected>Femenino</option>
				<option value="M" selected>Masculino</option>
	
			</select>
			</div>
			
			
			<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="error_div"></div>
			<input type="hidden" id="control" name="control"  value="1" />
		</div>
	<div align="center">	
		<div class="col-md-2 col-sm-12 col-xs-12 form-group" id="boton_div" align="center" style="margin-left:83%">
				<input type="submit" name="submit" id="boton-enviar" class="btn btn-verde" value="Actualizar" style="height:100%; width:100%"/>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){

		$("form").keypress(function(e) {
	        if (e.which == 13){
	            return false;
	        }
	    });
	    document.getElementById('cedula_fam').value=0;
	    document.getElementById('parentesco').value=0;
	    document.getElementById('ced_par').value='';
	    document.getElementById('nom_par').value='';
	    document.getElementById('ape_par').value='';
	    document.getElementById('nac_par').value=0;
	    document.getElementById('sexo_par').value=0;

	    $("#parentesco").selectpicker({
			size: 4,
    		maxOptions: 1
     	});

     	$("#nac_par").selectpicker({
			size: 4,
    		maxOptions: 1
     	}); 

     	$("#sexo_par").selectpicker({
			size: 4,
    		maxOptions: 1
     	});    	

	   
     	$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#fec_nac_par").datepicker({
				firstDay: 1
		});

		
			

		
		$("#cedula_fam").autocomplete({
			source: function(request, response){
				$.ajax({
					url:"<?php echo base_url()?>autocomplete/search_by_cedula",
					data: {term:$("#cedula_fam").val()},
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

	

