<?php $this->funciones->verificar_error($error, $mensaje); ?>

<div> 

	<div class="col-md-12 col-sm-12 col-xs-12 form-group" align="left">
		<span><b>Usuario(a):</b></span><?php echo ' '.$trabajador['0']['nom_trabajador'].' '.$trabajador['0']['ape_trabajador'] ; ?>
	</div>

	<table id="opciones" role="grid" class="table table-striped table-bordered display hover" cellspacing="0" width="100%">
		<thead style="background-color:#ffffff">
			<tr>
				<th class="dt-head-center">MÓDULO</th>
				<th class="dt-head-center">SUBMÓDULO</th>
				<th class="dt-head-center">OPCIÓN</th>
				<th class="dt-head-center" style="width:10%">MODIFICAR</th>
			</tr>
		</thead>

		<tbody align="center">
			<?php foreach($res_consulta as $row =>$link){
				
				$link['mod_des'] = str_replace("_", " ", $link['mod_des']);
				$link['sub_des'] = str_replace("_", " ", $link['sub_des']);
				$link['op_des'] = str_replace("_", " ", $link['op_des']);
			?>
				<tr>
					<td><?php echo $link['mod_des']; ?></td>
					<td><?php echo $link['sub_des'];?></td>
					<td><?php echo $link['op_des'];?></td>
					<td><span id="modificar_opciones" name='modificar_opciones' onclick="modificar(<?php echo $link['mod_id']; ?>, <?php echo $link['sub_id']; ?>, <?php echo $link['op_id']; ?>, <?php echo $link['cedula']; ?> )" data-toggle="modal" data-target="#privilegios_modal" class="glyphicon glyphicon-pencil"  style="cursor:pointer; color:gray;"></span></td>
				</tr>
				
			<?php } ?>

		</tbody>
	</table>

</div>

<div class="modal fade" id="privilegios_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding:8% 0% 0% 0%;">
	<div class="modal-dialog" role="document" style="overflow-y:initial !important">
		<div class="modal-content">
			<div class="modal-header" id="modal-header" align="left">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Opciones
			</div>
			<div class="modal-body" id="modal-body" style="overflow-y:auto; height: 260px;"></div>
		</div>
	</div>
</div>

<script type="text/javascript" language="javascript" class="init">

	$('#opciones').DataTable({
		"language":{
			"lengthMenu": "Mostrar _MENU_ registros por página",
			"zeroRecords": "No existe registros asociados a la busqueda",
			"info": "Página _PAGE_ de _PAGES_",
			"infoEmpty": "No existe registro disponible",
			"infoFiltered": "(filtrado de _MAX_ registros en total)",
			"search":"Buscar:",
			"paginate": {
				"first":      "Primero",
				"last":       "Último",
				"next":       "Siguiente",
				"previous":   "Anterior"
			}
		},
		"lengthMenu": [4,8,12],
		responsive: true
	});

	$(".selectpicker").selectpicker({
		size: 3,
    	maxOptions: 1
    });

	function modificar(modulo, submodulo, opcion, cedula){
		$("#modal-body").load("<?php echo base_url()?>Administrador/Administrador_sistemas/modificar_privilegio_opcion", {modulo: modulo, submodulo:submodulo, opcion:opcion, cedula:cedula});
	}

</script> 
