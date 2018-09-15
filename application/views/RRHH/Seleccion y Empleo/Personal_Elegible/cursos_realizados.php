<div class="sep"></div>

		
		<div class="inputs" align="center">	

			<div class="col-md-3 col-sm-12 form-group" id="tit_estudio_div">
				<input type="text" name="tit_estudio" id="tit_estudio" class="form-control fondo-input" placeholder="Título de Curso" style="width:100%">
			</div>
			<div class="col-md-3 col-sm-12 form-group" id="tit_estudio_div">
				<input type="text" name="tit_estudio" id="tit_estudio" class="form-control fondo-input" placeholder="Descripcion de Curso" style="width:100%">
			</div>			
			<div class="col-md-3 col-sm-12 form-group" id="nom_inst_div">
				<input type="text" name="nom_inst" id="nom_inst" class="form-control fondo-input" placeholder="Nombre de la Institución" style="width:100%">
			</div>
			<div class="col-md-3 col-sm-12 form-group" id="dir_inst_div">
				<input type="text" name="dir_inst" id="dir_inst" class="form-control fondo-input" placeholder="Dirección de la Institución" style="width:100%">
			</div>

			<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="fec_ini_div">
			<input type="text" name="fec_ini" id="fec_ini" value="" placeholder="Fecha de Inicio" autofocus readonly style="width:100%;height: 30px;padding-left: 5%"/>
			</div>
				<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="fec_ter_div">
			<input type="text" name="fec_term" id="fec_term" value="" placeholder="Fecha de Termino" autofocus readonly style="width:100%;height: 30px;padding-left: 5%"/>
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="error_div"></div>
			<input type="hidden" id="control" name="control"  value="1" />
		</div> 
		<br><br>

		<div style="margin-top: 30px" align="right">
			<button class="btn btn-primary" style="color: black;width: 150px;" onclick="completado();" name="guardar" id="0" ><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
			
		</div>
	
		<!--
		<div class="col-md-2 col-sm-12 col-xs-12 form-group" align="center" style="margin-left:83%">
				<button class="btn btn-warning">Agregar</button>
				<button class="btn guardar">Guardar</button>
		</div>
		<div class="col-md-2 col-sm-12 col-xs-12 form-group" align="center" style="margin-left:83%">
			<button class="btn guardar">Guardar</button>
		</div>
	-->
	<script>
		function completado(){
			alert("Ingresado Correctamente");
		}
	</script>
	