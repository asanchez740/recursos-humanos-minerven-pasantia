<select class="selectpicker form-control" name="submodulo" id="submodulo" size="1"  style="width:100% important!;">
	<option selected value="0">Seleccione: Submódulo</option>
	<?php 
		foreach($res_consulta as $row =>$link){ 
			$link['descripcion'] = str_replace("_", " ", $link['descripcion']);
			echo '<option value="'.$link['id'].'" selected>'.$link['descripcion'].'</option>\n';
		}
	?>
</select>

<script type="text/javascript">
	document.getElementById('submodulo').value=0;

	$("#submodulo").selectpicker({
		size: 4,
    	maxOptions: 1
    });
	
	$(document).ready(function(){
		
	    $("#submodulo").change(function () {
	   		cedula= document.getElementById("cedula").value;
	   		modulo= document.getElementById("modulo").value;

			var select = document.getElementById("submodulo"),
			forEach = Array.prototype.forEach;
			if (select.value==0){
				$("#opcion_div").hide();
				document.getElementById('opcion').value=0;
			}
	         
	       $("#submodulo option:selected").each(function (){
		    	submodulo=$('#submodulo').val();
		    	$("#opcion_div").load("<?php echo base_url()?>Administrador/Administrador_sistemas/cargar_select_opcion", {modulo:modulo, submodulo:submodulo, cedula:cedula, control:0});

	    	});

	        if (select.value!="" && select.value!= 0){
				$("#opcion_div").show();
			}
	   	})
		
	})
</script>
