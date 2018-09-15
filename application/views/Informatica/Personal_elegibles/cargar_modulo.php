<select class="selectpicker form-control" name="unidad" id="unidad" size="1" style="width:100% important!;">
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

	$("#unidad").selectpicker({
		size: 4,
    	maxOptions: 1
    });

	
</script>