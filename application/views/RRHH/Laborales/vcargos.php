<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ingresando Cargos</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vprincipal.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/modalprofesiones.css">
</head>
<body>
	
	<br> <br>
	<div class="container principal" >
		<div class="row">
			<article>
			 
				<form action="" method="POST" class="form-horizontal" name="inser_unidades">
					<h2>Cargando los cargos</h2>
					<div class="form-group">
						<label for="codigo_c" class="control-label col-md-3" >Código Del Cargo:</label>
						<div class="col-md-3">
							<input type="text" class="form-control" id="codigo_c" style="width: 270px;" name="txtcodigo" placeholder="Ingrese el código" required  >
						</div>
						<label for="descripcion" class="control-label col-md-1" >Nombre:</label>
						<div class="col-md-3">
							<input type="text" style="width: 270px;" class="form-control" id="descripcion" name="txtnombre" placeholder="Ingrese el nombre" required >	
						</div>
					</div>
					
					<div class="form-group">
						<label for="floboral" class="control-label col-md-3" >Fuerza Laboral:</label>
						<div class="col-md-3">
							<input type="text" style="width: 270px;" class="form-control" id="floboral" name="txt_f_laboral" placeholder="Fuerza Laboral Permitida" required >	
						</div>

						<label for="unidad" class="control-label col-md-1" style="margin-left: 0px;" >Unidad :</label>
							
						<div class="col-md-3" style="margin-left: 0px; ">
							<select name="unidad"  class="form-control" id="sel_unidad">
								<option value="0">--Seleccione--</option>
									<?php foreach ($nombre_u->result() as $tupla ):?>
										<option id="<?php echo $tupla->id_u ?>" value="<?php echo $tupla->id_u ?>" >
											<label><?php echo $tupla->id_u?>.-</label> <?php echo $tupla->nombre_u ?>
										</option>
									<?php endforeach?>
							</select>	
						</div>	
					</div>
					<div class="form-group">
						<label for="floboral" class="control-label col-md-3" >Descripción:</label>
						<div class="col-md-3">
							<textarea rows="3" name="textDescripcion" cols="46" maxlength="150" style="color: black;height: 100px;" required ></textarea>
						</div>
					</div>
				
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-12 " style="text-align: right;">
								
								<button class="btn btn-primary" style="color: black;width: 100px;margin-right: 185px;" name="insertCargo" id="1" ><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
								
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
		function agregar_m_e(id_p,nombre_p,id_cargo){//1ro
				console.log("funciona Eliminar");
				//suponiendo que pase por parametro el id eliminado 	
					request = $.ajax({
							url:"<?php echo base_url('RRHH/Cprofesiones_cargo/eliminarProfesiones')?>",
							type: "POST",
							data: "&id=" + id_p
							});
							request.done(function(response,textStatus,jqXHR){
								console.log("response eliminar: "+response);
								/*
								$("#trE"+response).html("");
					   			$('#agregar_modal tbody').append('<tr id="tr'+id_p+'"><th scope="row"><label> '+nombre_p+'</label><button id="'+id_p+'" class="btn btn-primary" name="insertarprofesion" onClick="agregar_m_a(\''+id_p+'\',\''+nombre_p+'\',\''+id_cargo+'\');">Agregar</button></th></tr>');
					   			*/
					   			$("#trE"+response).hide();
					   			
					   			$("#tr"+response).show();

							});
							request.fail(function(jqXHR, textStatus,thrown){
								console.log("ERROR:" + textStatus);
							});
							request.always(function(){
								console.log("Termino la ejecucion del Ajax Eliminar");
							});
			}
			function agregar_m_eliminar(id_profesion,nombre_profesion,id_cargo)
			{
				/*
				$('#tr'+id_profesion).html("");
				$('#eliminar_modal tbody').append('<tr id="trE'+id_profesion +'"><th scope="row"><label> '+nombre_profesion+'</label><button id="'+id_profesion+'" class="btn btn-danger" name="elimi_profesion" onClick="agregar_m_e(\''+id_profesion+'\',\''+nombre_profesion+'\',\''+id_cargo+'\');">Eliminar</button></th></tr>');
				*/
				$('#tr'+id_profesion).hide();
				jQuery('<tr id="trE'+id_profesion +'"><th scope="row"><label> '+nombre_profesion+'</label><button id="'+id_profesion+'" class="btn btn-danger" name="elimi_profesion" onClick="agregar_m_e(\''+id_profesion+'\',\''+nombre_profesion+'\',\''+id_cargo+'\');">Eliminar</button></th></tr>').appendTo('#eliminar_modal tbody');
			}

			
			/*function agregar_m_a(id_p,nombre_p,id_cargo){//2do
				console.log("funciona Agregar2");
					request = $.ajax({
							url:"<?php echo base_url('RRHH/Cprofesiones_cargo/insertarProfesiones')?>",
							type: "POST",
							data: "&id=" + id_p + "&id_cargo=" + id_cargo 
							});
							request.done(function(response,textStatus,jqXHR){
								console.log("response Agregar: "+response);
								//
								$('#tr'+response).html("");
					   			$('#eliminar_modal tbody').append('<tr id="trE'+id_p+'"><th scope="row"><label> '+nombre_p+'</label><button id="'+id_p+'" class="btn btn-danger" name="elimi_profesion" onClick="agregar_m_e(\''+id_p+'\',\''+nombre_p+'\',\''+id_cargo+'\');">Eliminar</button></th></tr>');
					   			//
					   			$('#tr'+response).hide();
					   			jQuery('<tr id="trE'+id_p+'"><th scope="row"><label> '+nombre_p+'</label><button id="'+id_p+'" class="btn btn-danger" name="elimi_profesion" onClick="agregar_m_e(\''+id_p+'\',\''+nombre_p+'\',\''+id_cargo+'\');">Eliminar</button></th></tr>').appendTo('#eliminar_modal tbody');
					   			$('#trE'+response).show();

							});
							request.fail(function(jqXHR, textStatus,thrown){
								console.log("ERROR:" + textStatus);
							});
							request.always(function(){
								console.log("Termino la ejecucion del Ajax Eliminar");
							});
			}*/
			function profesionesCargos(id_cargo1,nombre1) {
					$("#id_cargo").empty();
					$('#id_cargo').append(' Asignar Profesiones al Cargo: '+id_cargo1+' '+nombre1 +' ');
					$('#profesiones').modal('show');
				$("button").on("click",function(){ ///2) siguiente
					var name = $(this).attr('name');
					var id1 = $(this).attr('id');
					var nombre_profesion= $(this).attr('value');

					if (name == 'insertarprofesion') {
						console.log("entro Agregar");
						console.log("id: "+id1);
									//necesito el cargo
						request = $.ajax({
						url:"<?php echo base_url('RRHH/Cprofesiones_cargo/insertarProfesiones')?>",
						type: "POST",
						data: "&id=" + id1 + "&id_cargo=" + id_cargo1 
						});
						request.done(function(response,textStatus,jqXHR){
							console.log("response:"+response);
							id_profesion = response;
							console.log("|Id profesion: "+id_profesion+"|"+"Nombre Profesion: "+nombre_profesion);
							//funcion agrega a tabla eliminar
							agregar_m_eliminar(id1,nombre_profesion,id_cargo1);
						});
						request.fail(function(jqXHR, textStatus,thrown){
							console.log("ERROR:" + textStatus);
						});
						request.always(function(){
							console.log("Termino la ejecucion de ajax modal1");
						});
					}
					if(name == 'cerrarModal'){
						location.reload();
					}
				});
			}
		$(document).ready(function(){
			//funcion profesionesCargos(){}
			$("button").on("click",function(e){ ///2) siguiente
				var name = $(this).attr('name');
				var id1 = $(this).attr('id');
				var nombre_profesion= $(this).attr('value')
				
				var id_cargo=1;
				var cont=0;
				var nombre1="Cargo1";
				var request;
				if (request) {
					request.abort();
				} 
				if (name == "insertCargo") {	
					
					//$('#profesiones').modal('show');
					var opcion = validarDatosPost();
					if (opcion) {
						var codigo = document.inser_unidades.txtcodigo.value;
						console.log("Codigo: "+codigo);
						nombre1 = document.inser_unidades.txtnombre.value;
						console.log("Nombre: "+nombre1);
						var flaboral = document.inser_unidades.txt_f_laboral.value;
						console.log("laboral: "+flaboral);
						var unidad = document.inser_unidades.unidad.value;
						console.log("Unidad: "+unidad+"+");
						var descripcion=document.inser_unidades.textDescripcion.value;
						console.log("Descripcion: "+descripcion);

						request = $.ajax({
						url:"<?php echo base_url('RRHH/Ccargar_cargos/guardar')?>",
						type: "POST",
						data: "&postname=" + nombre1 + "&id=" + codigo + "&fulaboral=" + flaboral + "&postunidad=" +unidad+ "&posdecrip=" + descripcion
						});

						request.done(function(response,textStatus,jqXHR){
							console.log(response);
							id_cargo = response;
							console.log("|"+id_cargo+"|");
							alert("Ingresado Correctamente");
							limpiar2();
							sw = 1;
							console.log("Ahora: "+sw+"ID"+id_cargo);
							if (sw == 1) {
								console.log("podemos utiliza la modal");
								console.log("Id Cargo: "+id_cargo+" "+"Cargo: "+nombre1);
								profesionesCargos(id_cargo,nombre1);
							}
						});
						request.fail(function(jqXHR, textStatus,thrown){
							console.log("ERROR:" + textStatus);
						});
						request.always(function(){
							console.log("Termino la ejecucion del Ajax");
							//$('#profesiones').modal('show');
							//$('#myModal').modal('hide');
						});
						e.preventDefault();		
					}else{
						console.log("Faltan campos");
					}
				}
				
			});
			function validarDatosPost(){
				var verificar=true;
				if (!document.inser_unidades.txtcodigo.value) {
				alert("El campo Codigo es requerido");
				document.inser_unidades.txtcodigo.focus();
				verificar = false;
				}else if (!document.inser_unidades.txtnombre.value) {
					alert("El campo Nombre es requerido");
					document.inser_unidades.txtnombre.focus();
					verificar = false;
					}else if (!document.inser_unidades.txt_f_laboral.value) {
						alert("El campo Fuerza Laboral es requerido");
						document.inser_unidades.txt_f_laboral.focus();
						verificar = false;
						}else if(document.inser_unidades.unidad.value == 0){
							alert("Faltan Campos en el Formulario");
							verificar=false;							
							}else if (!document.inser_unidades.textDescripcion.value) {
								alert("El campo Descripcion es requerido");
								document.inser_unidades.textDescripcion.focus();
								verificar = false;
								}
					
					if (verificar) {
						//$('#myModal').modal('show');
						//document.inser_unidades.submit();
						return 1;
					}else{
						return 0;
					}
			}
			function limpiar2(){
					document.inser_unidades.txtcodigo.value='';
					document.inser_unidades.txtnombre.value='';
					document.inser_unidades.txt_f_laboral.value='';
					document.inser_unidades.textDescripcion.value='';
					document.inser_unidades.unidad.value = 0;
					document.inser_unidades.textDescripcion.value='';
					return 1;
			}
		});	
</script>

</body>

</html>