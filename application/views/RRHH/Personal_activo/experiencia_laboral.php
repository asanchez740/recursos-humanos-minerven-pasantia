<div class="sep"></div>

		<div class="inputs" align="left">	
				
		</div>
		<div class="inputs" align="center">	

			<div class="col-md-3 col-sm-12 form-group" id="cargo_exp">
				<input type="text" name="cargo_exp" id="cargo_exp" class="form-control fondo-input" placeholder="Cargo Desempeñado" style="width:100%">
			</div>
			<div class="col-md-3 col-sm-12 form-group" id="desc_exp">
				<input type="text" name="desc_exp" id="desc_exp" class="form-control fondo-input" placeholder="Descripcion" style="width:100%">
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
	<div align="center">	
		<div class="col-md-2 col-sm-12 col-xs-12 form-group" align="center" style="margin-left:83%">
				<button class="btn guardar">Agregar</button>
		</div>
	</div><!--
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
</script>	-->

	

