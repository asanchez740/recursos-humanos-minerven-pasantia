<select class="selectpicker form-control" name="opcion" id="opcion" size="1" style="width:100% important!;">
	<option selected value="0">Seleccione: Opción</option>
	<?php 
		foreach($res_consulta as $row =>$link){ 
			$link['descripcion'] = str_replace("_", " ", $link['descripcion']);
			echo '<option value="'.$link['id'].'" selected>'.$link['descripcion'].'</option>\n';
		}
	?>
</select>

<script type="text/javascript">
	document.getElementById('opcion').value=0;

	$("#opcion").selectpicker({
		size: 4,
    	maxOptions: 1
    });

	$(document).ready(function(){
		
		$("#opcion").change(function (){
			var select = document.getElementById("opcion"),
			forEach = Array.prototype.forEach;

	        if (select.value!="" && select.value!= 0){
				$("#boton_div").show();
			}
		})
	})
</script>