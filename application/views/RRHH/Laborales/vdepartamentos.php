<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Cargando Las Unidades</title>
	
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
	
</head>

<body>
	<br><br>
	<div class="container principal" >
		<div class="row">
			<article>
				<form action="#" name="inser_unidades" method="POST" class="form-horizontal" >
				<h2>Cargando Las Unidades</h2>		
				
					<div class="form-group">
						<label for="codigo" class="control-label col-md-3" >Código De la Unidad:</label>
						<div class="col-md-3">
							<input type="text" style="width: 270px;" class="form-control" id="codigo" name="txtcodigo" placeholder="Ingrese el código" required  >
						</div>
						<label for="descripcion" class="control-label col-md-1" style="width: 150px;" >Nombre Unidad:</label>
						<div class="col-md-3">
							<input type="text" style="width: 270px;" class="form-control" id="descripcion" name="txtnombre" placeholder="Ingrese el Nombre" required >	
						</div>
					</div>
					
					
					<div class="form-group">
						<label for="Observacion" class="control-label col-md-3" >Observacion:</label>
						<div class="col-md-3">
							<textarea rows="3" name="textDescripcion" cols="46" maxlength="255" style="color: black;height: 100px;" ></textarea>
						</div>
						<label for="unidad" class="control-label col-md-1" style="width: 150px;" >Unidad Padre:</label>
						<div class="col-md-3" style="margin-left: 0px; ">
							<select name="unidad"  class="form-control" id="sel_unidad">
									<option value="0">--Seleccione--</option>
									<?php foreach ($nombre_u->result() as $tupla ):?>
										<option value="<?php echo $tupla->id_u ?>" ><label><?php echo $tupla->id_u?> .-</label> <?php echo $tupla->nombre_u ?>
										</option>
									<?php endforeach?>
							</select>	
						</div>	
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-12 " style="text-align: right;">
								
								<button class="btn btn-primary" style="color: black;width: 100px;margin-right: 140px;" name="insertUnidad"  ><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
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
	<script type="text/javascript">
		$(document).ready(function(){

			function validarDatosPost(){
				var verificar=true;
				if (!document.inser_unidades.txtcodigo.value) {
				alert("Faltan Campos en el Formulario");
				document.inser_unidades.txtcodigo.focus();
				verificar = false;
				}else if (!document.inser_unidades.txtnombre.value) {
					alert("Faltan Campos en el Formulario");
					document.inser_unidades.txtnombre.focus();
					verificar = false;
					}else if (!document.inser_unidades.textDescripcion.value) {
							alert("Faltan Campos en el Formulario");
							document.inser_unidades.textDescripcion.focus();
							verificar = false;
						}else if(document.inser_unidades.unidad.value == 0){
							alert("Faltan Campos en el Formulario");
							verificar=false;							
						}
					if (verificar) {
						return 1;
					}else{
						return 0;
					}
			}
			function limpiar(){
				document.inser_unidades.txtcodigo.value='';
				document.inser_unidades.txtnombre.value='';
				document.inser_unidades.textDescripcion.value='';
				document.inser_unidades.unidad.value = 0;
				return 0;
			}
			
			$("button").on("click",function(e){
				var name = $(this).attr('name');
				var id1 = $(this).attr('id');
				var request;
				if (request) {
					request.abort();
				}
				if (name == "insertUnidad") {	
					var opcion = validarDatosPost();
					if (opcion) {
						var codigo = document.inser_unidades.txtcodigo.value;
						console.log("codigo: "+codigo);
						var nombre1 =document.inser_unidades.txtnombre.value;
						console.log("nombre: "+nombre1);
						var unidad = document.inser_unidades.unidad.value;
						console.log("Unidad Padre: "+unidad);
						var descripcion=document.inser_unidades.textDescripcion.value;
						console.log("Descripcion: "+descripcion);
						
						request = $.ajax({
						url:"<?php echo base_url('RRHH/Cargar_unidad/insertar')?>",
						type: "POST",
						data: "&postname=" + nombre1 + "&id=" + codigo + "&postunidad=" +unidad+ "&posdecrip=" + descripcion
						});

						request.done(function(response,textStatus,jqXHR){
							console.log(response);
							var id_unidad = response;
							//unidad
							console.log("|"+id_unidad+"| ");
							alert('Ingresado Correctamente');
							limpiar();
							$('#sel_unidad').append('<option value="'+id_unidad+'" >'+id_unidad+" .- "+nombre1+' </option>');
							
						});
						request.fail(function(jqXHR, textStatus,thrown){
							console.log("ERROR:" + textStatus);

						});
						request.always(function(){
							console.log("Termino la ejecucion del Ajax");
						});
						e.preventDefault();		
					}else{
						console.log("Faltan campos");
					}
					
				}
			});
			
		});
</script>
</body>
	
</html>