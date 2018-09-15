<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Solicitudes</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
	<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/solicitud.js"></script>
</head>
<body>
	
	<br><br>
	<div class="container principal" >
		<div class="row">
			<article>
				 
				<form action="" method="POST" class="form-horizontal" name="inser_solicitudes">
					 
					<h2>Personal Requerido</h2>
					
					<div class="form-group">
						<label for="departamento" class="control-label col-md-3" >Unidad:</label>
						<div class="col-md-3">
							<select name="unidad"  class="form-control" id="sel_unidad">
								<option value="0">--Seleccione Unidad--</option>
									<?php foreach ($nombre_u->result() as $tupla ):?>
										<option value="<?php echo $tupla->id_u ?>" ><label><?php echo $tupla->id_u?> .-</label> <?php echo $tupla->nombre_u ?>
										</option>
									<?php endforeach?>
									
							</select>	
						</div>	
						<label for="descripcion" class="control-label col-md-1" >Cargo:</label>
						<div class="col-md-3">
							<select name="cargo" class=" form-control  " id="sel_cargo" required >
								<option value="0" >--Seleccione Cargo--</option>
								<?php foreach ($nombre->result() as $tupla ):?>
										<option name = "<?php echo $tupla->nombre ?>" value="<?php echo $tupla->id ?>" >
											<label><?php echo $tupla->id?>.-</label> <?php echo $tupla->nombre ?>
										</option>
									<?php endforeach?>
							</select>	
						</div>	

					</div>
					
					<div class="form-group">
						<label for="gerencia_txt" class="control-label col-md-3" >Cantidad Solicitada:</label>
						
						<div class="col-md-3">
							<select name="cantidad_fl" class=" form-control  " id="sel_cantidad_s" required >
							<option value="0" selected="0">--Seleccione Cantidad--</option>
							</select>	
						</div>	
						<label  class="control-label col-md-1" >Sexo:</label>
							<div class=" col-md-2 ">
									<label for="mas">
										<input type="radio" name="sexo" value="ma" id="mas"> <strong>Masculino</strong>
									</label>
							</div>
							<div class=" col-md-2">
									<label for="fe">
										<input type="radio" name="sexo" value="fe" id="fem"><strong> Femenino</strong>
									</label>
							</div>
					</div>
					
					<div class="form-group">
						<label for="descripcion" class="control-label col-md-3" >Edad:</label>
						<div class="col-md-1">
							<input type="text" style="width: 115px; padding-right: 0px;" class="form-control" id="edad_de" name="txtdescrip" placeholder="De:" required >	
						</div>
						<div class="col-md-1">
							<input type="text" style="width: 115px; margin-left: 55px;" class="form-control" id="edad_a" name="txtdescrip" placeholder="A:" required >	
						</div>
						<label for="" class="control-label col-md-2" >Trabajar De:</label>
					
						<div class="col-md-3">
							<select name="trabajo_de" class=" form-control" id="trabao_d" required >
							<option value="0" >--Seleccione--</option>
							<option value="normal" >Normal</option>
							<option value="pie" >De Pie</option>
							<option value="Equipo" >En Equipo</option>
							<option value="Oficina" >En Oficina</option>
							<option value="Subterraneo" >Subterraneo</option>
							</select>	
						</div>	

	
					</div>
					
					<div class="form-group">
						<label for="necesidad" class="control-label col-md-3" >Necesidad:</label>
						<div class="col-md-3">
							<textarea rows="3" cols="50" name="text_necesidad" maxlength="100" placeholder="Explique Brevemente Su necesidad:" required></textarea>
						</div>	
						<label for="descripcion" class="control-label col-md-1" >Habilidades:</label>
						<div class="col-md-3">
							<textarea rows="3" cols="46" name="text_hablidades" maxlength="100" placeholder="Habilidades Requeridas:" required ></textarea>
						</div>	

					</div>
					<br>
					
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-12 " style="text-align: right;">
								
								<button class="btn btn-primary" style="color: black;" name="guardar" id="0" ><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
								
								<button class=" btn btn-primary" name="enviar" id="1" style="color:black; width: 100px;margin-right: 185px;" ><span class="glyphicon glyphicon-send" </span> Enviar</button>

							</div>
						</div>	
					</div>
				</form>
			</article>	
		</div>
	</div>
	
	<footer>
		<div class="container">
			
		</div>
	</footer>
	<script>
		var baseurl="<?php echo base_url();?>";
		
	</script>
</body>
</html>