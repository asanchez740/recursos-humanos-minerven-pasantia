<div align="center">
	<form id="modal_permiso" name="modal_permiso" action="<?php echo base_url()?>Administrador/Administrador_sistemas/modal_modificar_privilegio" method="post" class="reset-this">

		<?php if($this->session->userdata('cedula')==100){  ?>

			<div class="col-md-6 col-sm-12 col-xs-12 form-group" id="admin_div" align="right" style="padding:2% 0% 0% 0%;">
				<span style="color: #777;" >Administrador</span>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-12 form-group" id="boton_admin_div" align="center" style="padding:2% 0% 0% 0%;">
				<input type="checkbox" id="admin" name="admin" class="bootstrap-switch" <?php if($administrador['0']['estatus']=='A'){ ?> checked <?php } ?> >
			</div>

		<?php } ?>

		<?php foreach($res_consulta as $row =>$link){  

			$link['op_des'] = str_replace("_", " ", $link['op_des']); ?>

			<div class="col-md-6 col-sm-6 col-xs-12 form-group" id="opcion_div" align="right" style="padding:2% 0% 0% 0%;">
				<span style="color: #777;"><?php echo $link['op_des'];?></span>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12 form-group" id="boton_div" align="center" style="padding:2% 0% 0% 0%;">
				<input type="checkbox" name="botones" class="bootstrap-switch" id="botones" value="" <?php if($link['estatus']=='TRUE'){ ?> checked <?php } ?> >
			</div>
			<input type="hidden" name="permiso[]" value="">
			<input type="hidden" name="opcion[]" value="<?php echo $link['id_opciones'];?>">
		
		<?php } ?>

		<input type="hidden" name="cedula" value="<?php echo $res_consulta['0']['cedula'];?>">
		<input type="hidden" name="modulo" value="<?php echo $link['id_modulos'];?>">
		<input type="hidden" name="submodulo" value="<?php echo $link['id_submodulos'];?>">
		<input type="hidden" id="switch" name="switch" value="">
		<input type="hidden" name="control" value="1">
		<input type="hidden" name="compara" value="<?php echo $administrador['0']['estatus'] ?>">
		<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="boton_div" align="right" style="padding:2% 0% 0% 0%;">
			<button type="button" class="btn btn-defecto" data-dismiss="modal">Close</button>
			<input type="submit" name="submit" id="guardar" class="btn btn-verde" value="Guardar" />
		</div>
		<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="actualizar_div" ></div>
		
	</form>	
</div>

<script type="text/javascript">
	$(document).ready(function(){
		
		$(".bootstrap-switch").bootstrapSwitch();
		var i = 0;
		var arreglo = [];
		var puente='';
		var admin='';

		$('#guardar').click(function(){

			$('input[name^="botones"]').each(function(){

				if($(this).is(':checked')){
					arreglo[i] = "on";
		        }else{
		        	arreglo[i] = "off";
		        }
				i++;
				$(this).remove();
	        });

        	if($("#admin").is(':checked')){
				admin = "on";
	        }else{
	        	admin = "off";
	        }

			i=0; 

	        $('input[name^="permiso"]').each(function(){
	        	$(this).val(arreglo[i]);
				i++;
	        });

	        if ($("#switch").length ){
	        	$('#switch').val(admin);
	        }else{
				$("#switch" ).remove();
	        }

			$('#form, #fat, #modal_permiso').submit(function(){
				$.ajax({
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data) {
						$('#actualizar_div').html(data);
					}
				}) 

				cedula=$('#cedula').val();
				modulo=$('#modulo').val();
				submodulo=$('#submodulo').val();
				$("#opcion_div").load('<?php echo base_url()?>Administrador/Administrador_sistemas/cargar_select_opcion', 
										{submodulo: submodulo, cedula: cedula, modulo:modulo});
				$("#consulta_div").load("<?php echo base_url()?>Administrador/Administrador_sistemas/consultar_opciones_activas", {cedula: cedula});
				return false;

			});

			$("#privilegios_modal .close").click();
			$('.modal-backdrop').remove();

		});
	})
</script>