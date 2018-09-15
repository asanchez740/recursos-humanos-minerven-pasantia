<select class="selectpicker form-control" name="unidad" id="unidad" size="1" style="width:100% important!;">
	<option selected value="0">Seleccione: Unidad</option>
	<?php 
		foreach($res_consulta as $row =>$link){
			echo '<option value="'.$link['cod_ubicacion'].'" selected>'.$link['nom_centro_costo'].'</option>\n';
		}
	?>
</select>


<script type="text/javascript">	
	document.getElementById('unidad').value=0;

	$("#unidad").selectpicker({
		size: 4,
    	maxOptions: 1
    });

	
</script>