$(document).ready(function(){
			var totalDisponible;
			console.log("Exitoso");
			
			///Funcion Fuerza Laboral Calculada: Fr-personalCargo
			$('#sel_cargo').change(function(e){
				var id_1;
				var cargo;
				var verif=1;
				//-----------Limpiando Select Option----------------
				$("#sel_cantidad_s").empty();
				$('#sel_cantidad_s').append('<option value="0" >'+"--Seleccione Cantidad--"+' </option>');


				
				$('#sel_cargo option:selected').each(function(){
					id1 = $('#sel_cargo').val();
					cargo = $('#sel_cargo option:selected').attr('name');
				});

				$.post(baseurl+"RRHH/Seleccion_empleo/fuerzaLaboral",
					{
						id: id1
					},
					function(data){
						console.log(data);

						totalDisponible=data;
						//-------------------Agregando al Selected de Cantidad
						for (var i = 1; i <= totalDisponible; i++) {
							$('#sel_cantidad_s').append('<option value="'+i+'" >'+i+' </option>');
						}
					});

			});	

			//Funcion enviar- Guardar
			$("button").on("click",function(e){
				var name = $(this).attr('name');
				var e_boton = $(this).attr('id');
				var request;
				
				if (name=='guardar' || name=='enviar') {
					var sw=validarCampos();
					if (sw) {
						var uni = document.inser_solicitudes.unidad.value;
						var cargo = document.inser_solicitudes.cargo.value;
						var cantidad_fl = document.inser_solicitudes.cantidad_fl.value;
						var sexo = document.inser_solicitudes.sexo.value;
						var edad = document.inser_solicitudes.edad_de.value;
						var edad2 = document.inser_solicitudes.edad_a.value;
						var total_edad= edad+"-"+edad2;
						var trabajar = document.inser_solicitudes.trabajo_de.value;
						var necesidad = document.inser_solicitudes.text_necesidad.value;
						var habilidad = document.inser_solicitudes.text_hablidades.value;

						$.post(baseurl+"RRHH/Seleccion_empleo/insertarSolicitud",
						{
							id: id1,
							id_uni: uni,
							cargo: cargo,
							cantidad: cantidad_fl,
							sexo: sexo,
							edad: total_edad,
							postamb: trabajar,
							neces:necesidad,
							habi: habilidad,
							estatus: e_boton
						},
						function(data){
							alert('Solicitud Realizada Correctamente');
							console.log(data);		
							//limpiar();
						});
					}else{
						console.log("Faltan campos");
					}				
				}
			});
});
function validarCampos(){
	var verificar=true;
	if (document.inser_solicitudes.unidad.value == 0) {
		alert("Faltan Campos en el Formulario");
		verificar = false;
	}else if (document.inser_solicitudes.cargo.value == 0) {
		alert("Faltan Campos en el Formulario");
		verificar = false;
	}else if (document.inser_solicitudes.cantidad_fl.value == 0) {
		alert("Faltan Campos en el Formulario");
		verificar = false;
	}else if(!document.inser_solicitudes.sexo.value){
		alert("Faltan Campos en el Formulario");
		verificar=false;							
	}else if (!document.inser_solicitudes.edad_de.value) {
		document.inser_solicitudes.edad_de.focus();
		alert("Faltan Campos en el Formulario");
		verificar = false;
	}else if (!document.inser_solicitudes.edad_a.value) {
		document.inser_solicitudes.edad_a.focus();
		alert("Faltan Campos en el Formulario");
		verificar = false;
	}else if (document.inser_solicitudes.trabajo_de.value == 0){
		alert("Faltan Campos en el Formulario");
		verificar = false;
	}else if (!document.inser_solicitudes.text_necesidad.value) {
		alert("Faltan Campos en el Formulario");
		verificar = false;
	}else if (!document.inser_solicitudes.text_hablidades.value) {
		alert("Faltan Campos en el Formulario");
		verificar = false;
	}

	if (verificar){
		return 1;
	}else{
		return 0;
	}
}
function limpiar()
{
	document.inser_solicitudes.unidad.value = 0;
	document.inser_solicitudes.cargo.value = 0;
	document.inser_solicitudes.cantidad_fl.value = 0;
	document.inser_solicitudes.sexo.value='';
	document.inser_solicitudes.edad_de.value='';
	document.inser_solicitudes.edad_a.value='';
	document.inser_solicitudes.trabajo_de.value=0;
	document.inser_solicitudes.text_necesidad.value='';
	document.inser_solicitudes.text_hablidades.value='';
}