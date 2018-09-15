<div class=" loginBox">
	<img src="<?php echo base_url();?>assets/css/imagenes/minervenlogo.png" class=" img-rounded" >
	<form action="<?php echo base_url();?>Login/ingresar" method="post">
		<br>
	    <div class="input-group">
	      	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	      	<input id="usuario" type="text" class="form-control" name="usuario" placeholder="Usuario" required >
    	</div>
	    <br>
    	<div class="input-group">
      		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      		<input id="password" type="password" class="form-control" name="password" placeholder="Clave" required >
    	</div>
    	<br>
		<input class="btn btn-primary col-md-offset-6" type="submit" name="submit"  value="Ingresar">
		<br>	
		
	</form>
</div>
<?php if (isset($mensaje)) {echo $mensaje;
}
?>
<h3><?php echo validation_errors();?></h3>

