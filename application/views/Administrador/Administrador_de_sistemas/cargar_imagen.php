<?php $this->funciones->verificar_error($error, $mensaje); ?>

<div class="col-md-12 col-ms-12 col-xs-12 form" style="margin-top:3%">
	<form enctype="multipart/form-data" id="usuario" action="<?php echo base_url()?>Administrador/Administrador_sistemas/cargar_imagen" 
	method="post" style="width:80%; float: none; margin: 0 auto;" accept-charset="utf-8">
		<div class="header">
			<h3>Administrador</h3>
			<p>Cargar Imagen</p>
		</div>
		<div class="sep"></div>
		<div class="inputs" align="center">
			<input id="userfile" name="userfile" type="file" multiple data-max-file-count="1">
			<div class="col-md-1 col-md-offset-11 col-sm-2 col-sm-offset-10 col-xs-3 col-xs-offset-9 form-group" id="boton_div" align="center" style="padding:1% 0% 0% 0%;" >
				<input type="submit" name="submit" id="boton-enviar" class="btn btn-verde" value="Cargar" style="width:100%"/>
			</div>
			<input type="hidden" id="control" name="control"  value="1" />
		</div>	
	</form>	
</div>

<?php /*
<div>
	<?php 
		$imagenes = scandir('./uploads/galeria');

		foreach ($imagenes as $key => $value){
			if(is_file("./uploads/galeria/$value")){
		    	?><img src="<?php echo base_url(); ?>uploads/galeria/<?php echo $value; ?>" height="42" width="42" />
	    	<?php }
	 	} 
	?>
</div>
*/?>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#userfile").fileinput({
       	 	language: 'es',
	        uploadUrl: '<?php echo base_url()?>Administrador/Administrador_sistemas/cargar_imagen',
	        allowedFileExtensions: ['jpg', 'png']
	    });

		$("form").keypress(function(e){
	        if (e.which == 13){
	            return false;
	        }
	    });
	})
</script>