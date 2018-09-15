<select class="selectpicker form-control" name="modulo" id="modulo" size="1" style="width:100% important!;">
	<option selected value="0">Seleccione: Módulo</option>
	<?php 
		foreach($res_consulta as $row =>$link){ 
			$link['descripcion'] = str_replace("_", " ", $link['descripcion']);
			echo '<option value="'.$link['id'].'" selected>'.$link['descripcion'].'</option>\n';
		}
	?>
</select> 

<script type="text/javascript">
	document.getElementById('modulo').value=0;

	$("#modulo").selectpicker({
		size: 4,
    	maxOptions: 1
    });

	$("#modulo").change(function (){
		var select = document.getElementById("modulo"),
		forEach = Array.prototype.forEach;
		if (select.value==0){
			$("#submodulo_div").hide();
			document.getElementById('submodulo').value=0;
			document.getElementById('opcion').value='';
			$("#opcion_div").hide();
		}
         
       $("#modulo option:selected").each(function (){
	    	modulo=$('#modulo').val();
	    	$("#submodulo_div").load("<?php echo base_url()?>Administrador/Administrador_sistemas/cargar_select_submodulo", {modulo: modulo, cedula:cedula});
    	});

        if (select.value!="" && select.value!= 0){
			$("#submodulo_div").show();
		}
   	})
</script>
