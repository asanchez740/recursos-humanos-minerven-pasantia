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

	if ($("#opcion_div").length ){
    
		$("#modulo").change(function(){
			var modulo= $('#modulo').val();
			$("#submodulo_div").load("<?php echo base_url()?>Administrador/Administrador_sistemas/cargar_select_submodulo", {modulo:modulo});
			$('#opcion_div').show();
				$('#boton_div').show();
	   	})
   	}
</script>