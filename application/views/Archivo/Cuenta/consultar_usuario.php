<?php $this->funciones->verificar_error($error, $mensaje);?>
<table id="opciones" role="grid" class="table table-striped table-bordered display hover" cellspacing="0" width="100%">
	<thead style="background-color:#ffffff">
		<tr>
			<th class="dt-head-center">NOMBRE</th>
			<th class="dt-head-center">APELLIDO</th>
			<th class="dt-head-center">USUARIO</th>
			<th class="dt-head-center">ESTATUS</th>
			<th class="dt-head-center" style="width:10%">MODIFICAR</th>
		</tr>
	</thead>

	<tbody align="center">
		<tr>
			<td><?php echo $res_consulta['0']['nombre'];?></td>
			<td><?php echo $res_consulta['0']['apellido'];?></td>

<?php if ($resultado == '') {
	$titulo_modal = 'Crear usuario'?><td>No existe</td>
	<?php } else {
	$titulo_modal = 'Eliminar usuario';?>
					<td><?php echo $resultado;?></td>
	<?php }?>
			<?php if ($estatus == FALSE AND $resultado != '') {
	$titulo_modal = 'Actualizar usuario';
	$estatus      = 'inactivo';?>
					<td><?php echo $estatus;?></td>
	<?php } elseif ($estatus == TRUE) {
	$titulo_modal = 'Eliminar usuario';
	$estatus      = 'activo';?>
					<td><?php echo $estatus;?></td>
	<?php } else {
	$estatus      = 'No existe';
	$titulo_modal = 'Crear usuario';?>
					<td><?php echo $estatus;?></td>
	<?php }?>

			<td><span id="modificar_usuario" name='modificar_usuario' onclick="modificar()" data-toggle="modal" data-target="#usuario_modal" class="glyphicon glyphicon-pencil"  style="cursor:pointer; color:gray"></span></td>
		</tr>
	</tbody>
</table>

<div class="modal fade" id="usuario_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding:15% 0% 0% 0%;">
	<div class="modal-dialog" role="document" style="overflow-y: initial !important">
		<div class="modal-content">
			<div class="modal-header" id="modal-header" align="left">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Cuenta <b> >> </b> <?php echo $titulo_modal;?>
			</div>
			<div class="modal-body" id="body-usuario" style="overflow-y: auto;"></div>
		</div>
	</div>
</div>

<script type="text/javascript" language="javascript" class="init">

	$('#opciones').DataTable({
		"language":{
			"lengthMenu": "Mostrar _MENU_ records por página",
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

	function modificar(){
		$("#body-usuario").load("<?php echo base_url()?>Archivo/Cuenta/procesar_usuario", {cedula:cedula})
	}

	$(".selectpicker").selectpicker({
		size: 3,
    	maxOptions: 1
    });
</script>
