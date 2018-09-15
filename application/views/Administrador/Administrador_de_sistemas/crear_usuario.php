<div align="center">
	<form id="modal_usuario" name="modal_usuario" action="<?php echo base_url()?>Archivo/Cuenta/crear_usuario" 
	method="post" class="reset-this">
		<div class="col-md-10 col-sm-12 col-xs-12 form-group" id="nombre_div">
			<input type="text" name="nombre" id="nombre" class="form-control fondo-input" placeholder="Nombre" style="height:100%; width:100%" autofocus/>
		</div>
		<div class="col-md-2 col-sm-12 col-xs-12 form-group" id="crear_div" align="center" style="padding:0.5% 0% 0% 0%;">
			<input type="submit" name="submit" class="btn btn-verde" value="Crear" align="center" autofocus style="height:100%; width:80%"/>
		</div>
		<input type="hidden" name="cedula" value="<?php echo $cedula; ?>" />
	</form>	
</div>
