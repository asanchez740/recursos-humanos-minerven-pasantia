$(document).ready(function(){
	console.log("Informatica_solicitudes");
	var tr="tr";
	var tabla = $("#solicitudes_realizadas").DataTable({
				"lengthMenu":[[4,6,8,-1],[4,6,8,"Todo"]],
				"language":{
					"lengthMenu": "Mostrar _MENU_ registros por página",
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
				'paging':true,
				'info':true,
				'filter':true,
				'stateSave':true,
				'ajax':{
					"url":baseurl+"Informatica/Solicitud_personal/listaSolicitudes",
					"type":"POST",
					"data":{
						"id":0
					},
					dataSrc: ''
				},
				rowId:'id_solicitud_personal',
				'columns':[
				 {data:'id_solicitud_personal','sClass':'dt-body-center'},
				 {data:'nombre'},
				 {data:'nombre_u'},
				 {data:'cantidad_solicitada'},
				 {data:'edad_comprendida'},
				 {data:'fecha_solicitud'},
				 {data:'necesidad'},
				 {data:'descripcion_seguimiento_solicitud'},
				 {data:'n_estado'},
				 {"orderable": true,
				 	render:function(data,type,item){
				 		if (item.id_seguimiento_solicitud == 5 ) {// Gerente de area Aceptando Preseleccionados
				 			if ( item.n_estado == 1) {// en espera
				 				return '<img type="button" onclick="info_detalle(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');" title="Ver Información de la Solicitud" src="'+baseurl+'assets/css/imagenes/ver.png"> <a href="#" name="'+item.id_seguimiento_solicitud+'" id="'+item.id_solicitud_personal+'" class="enviar"><img id="btn_e" title="Enviar Solicitud" src="'+baseurl+'assets/css/imagenes/enviar.png"><img data-toggle="modal" data-target="#seguimiento" title="Hacer seguimiento a la Solicitud" src="'+baseurl+'assets/css/imagenes/seguimiento1.png"> <a href="seleccion_personal/'+item.id_solicitud_personal+'"><img title="Personal Pre-Seleccionado" src="'+baseurl+'assets/css/imagenes/entrevistas1.png"></a>';
				 			}else if (item.n_estado == 0) { //Rechazado
				 				return '<img type="button" onclick="info_detalle(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');" title="Ver Información de la Solicitud" src="'+baseurl+'assets/css/imagenes/ver.png"> <a href="#" name="'+item.id_seguimiento_solicitud+'" id="'+item.id_solicitud_personal+'" class="enviar"><img id="btn_e" title="Enviar Solicitud" src="'+baseurl+'assets/css/imagenes/enviar.png"><img data-toggle="modal" data-target="#seguimiento" title="Hacer seguimiento a la Solicitud" src="'+baseurl+'assets/css/imagenes/seguimiento1.png"> <a href="seleccion_personal/'+item.id_solicitud_personal+'"><img title="Personal Pre-Seleccionado" src="'+baseurl+'assets/css/imagenes/entrevistas1.png"></a>';
				 			}
				 		}else if (item.n_estado == 1) {//en espera
				 			return '<img type="button" onclick="info_detalle(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');" title="Ver Información de la Solicitud" src="'+baseurl+'assets/css/imagenes/ver.png"> <a href="#" name="aprobar" id="'+item.id_solicitud_personal+'" class="enviar"><img id="btn_e" title="Enviar Solicitud" src="'+baseurl+'assets/css/imagenes/enviar.png"> </a>  <a href="#" id="'+item.id_solicitud_personal+'" class="eliminar" name="rechazar"><img title="Rechazar Solicitud" src="'+baseurl+'assets/css/imagenes/rechazado.png"></a>';
				 		}else if (item.n_estado == 0) { //rechazado
				 			return '<img type="button" onclick="info_detalle(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');" title="Ver Información de la Solicitud" src="'+baseurl+'assets/css/imagenes/ver.png"> <a href="#" name="'+item.id_seguimiento_solicitud+'" id="'+item.id_solicitud_personal+'" class="enviar"><img id="btn_e" title="Enviar Solicitud" src="'+baseurl+'assets/css/imagenes/enviar.png"> </a>  <a href="#" id="'+item.id_solicitud_personal+'" class="eliminar" name="rechazar"><img title="Rechazar Solicitud" src="'+baseurl+'assets/css/imagenes/rechazado.png"></a>';
				 		}else if (item.n_estado == 2) { // Aprobado
							return '<img type="button" onclick="info_detalle(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');" title="Ver Información de la Solicitud" src="'+baseurl+'assets/css/imagenes/ver.png">  ';
				 		}else if (item.n_estado == 3) { // Guardado ******************************
							return '<img type="button" onclick="info_detalle(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');" title="Ver Información de la Solicitud" src="'+baseurl+'assets/css/imagenes/ver.png"> <a href="#" name="'+item.id_seguimiento_solicitud+'" id="'+item.id_solicitud_personal+'" class="enviar"><img id="btn_e" title="Enviar Solicitud" src="'+baseurl+'assets/css/imagenes/enviar.png"> </a>  <a href="#" id="'+item.id_solicitud_personal+'" class="eliminar" name="rechazar"><img title="Rechazar Solicitud" src="'+baseurl+'assets/css/imagenes/rechazado.png"></a>';
							///falta crear el eliminar solicitud
				 		}
				 	}
				 }
				],
				"columnDefs":[
				  {
				  	"targets":[8],
				  	"data":"n_estado",
				  	"render":function(data,type,row){
				  		if (data == 1) {
				  			return "<span style='font-size:13px;' class='label label-warning'>Pendiente</span>"
				  		}else if (data == 2) {
				  			return "<span style='font-size:13px;' class='label label-success'>Aprobado</span>"
				  		}else if (data == 3) {
				  			return "<span style='font-size:13px;' class='label label-info'>Guardado</span>"
				  		}else if (data == 0) {
				  			return "<span style='font-size:13px;' class='label label-danger'>Rechazado</span>"
				  		}
				  	}
				  },
				  {
				  	"targets":[0],
				  	"data":"id_solicitud_personal",
				  	"render":function(data,type,row){
				  		return "<span style='color:#006699'>"+data+"</span><br>"
				  	}
				  },
				  {
				  	"targets":[7],//[1,2,3,4,5,6,7] para mostrar todas las solicitudes
				  	"data":"descripcion_seguimiento_solicitud",
				  	"render":function(data,type,row){
				  		if (row.n_estado == 1) {
				  			//return "<span style='color:#f0ad4e;'>"+data+"</span><br>" con color
				  			return "<span style='color:#f0ad4e;'><i class='fa fa-user'></i>"+data+"</span><br>"
				  		}else if (row.n_estado == 2) {
				  			return "<span style='color:green;'>"+data+"</span><br>"
				  		}else if (row.n_estado == 3) {
				  			return "<span style='color:#5bc0de;'>"+data+"</span><br>"
				  		}else if (row.n_estado == 0) {
				  			return "<span style='color:red;'>"+data+"</span><br>"
				  		}
				  	}
				  },

				],
				"order":[[0,"asc"]],
	});
	
	$(document).on('click','.eliminar',function(){ //Rechazar solicitud
		console.log("entro a rechazar");
		var id_solicitud = $(this).attr('id');
		console.log(id_solicitud);
		$.post(baseurl+"Cacciones/botonEliminar",
			{
				id_solicitud: id_solicitud,
				estatus: false
			},
			function(data){
				console.log(data);
				if (data == 1) {
					alert("Eliminado Con Exito");
					tabla.ajax.reload();				
				}
		});		
		
	});
	$(document).on('click','.enviar',function(){ //Enviar Solicitud
		console.log("entro a enviar");
		var id_solicitud = $(this).attr('id');
		var id_seguimiento = $(this).attr('name');
		console.log("ID Solicitud: "+id_solicitud);
		console.log("Seguimiento: "+id_seguimiento);

		if (id_seguimiento == 0) { ///guardado
			$.post(baseurl+"Cacciones/botonEnviar",
	 		  	{
					id_solicitud: id_solicitud,
					id_seguimiento: 1,
					n_estado: 1,
					descripcion: 'Gerente de RRHH'
				},
				function(data){
					console.log(data);
					if (data == 1){
						alert("solicitud Aprobada");
						tabla.ajax.reload();	 			
					}
				});		
		}else{ // seguimiento 5- los pre-seleccionados
			$.post(baseurl+"Cacciones/botonEnviar",
	 		  	{
					id_solicitud: id_solicitud,
					id_seguimiento: 6,
					n_estado: 1,
					descripcion: 'Analista de S/E'
				},
				function(data){
					console.log(data);
					if (data == 1) {
						alert("solicitud Aprobada");
						tabla.ajax.reload();								
					}
				});		
		}
	});
});	
/*
$("#trE"+response).html(""); //borra una fila de la tabla
$("#trE"+response).hide(); //oculta parecido al de borrar
$("#tr"+response).show(); // muestra
*/
function info_detalle(n_solicitud,cargo,unidad,cantidad,sexo,edad,tipo_trabajo,necesidad,habilidades,n_estado)
{
	
	$('#text_solicitud').empty();
	$('#text_solicitud').append('Solicitud de Personal N°'+n_solicitud+' ');
	$('#txtunidad').val(unidad);
	$('#txtcargo').val(cargo);
	$('#txtcantidad').val(cantidad);
	$('#txtsexo').val(sexo);
	$('#txtedad').val(edad);
	$('#txttrabajar').val(tipo_trabajo);
	$('#txtnecesidad').val(necesidad);
	$('#txthabilidades').val(habilidades);
	console.log(n_estado);
	if (n_estado == 0 || n_estado == 3) {
		console.log("entro");
		$('#text_solicitud1').empty();
		$('#text_solicitud1').append('Solicitud de Personal N°'+n_solicitud+' ');
		$('#txtunidad1').val(unidad);
		$('#txtcargo1').val(cargo);
		$('#txtcantidad1').val(cantidad);
		$('#txtsexo1').val(sexo);
		$('#txtedad1').val(edad);
		$('#txttrabajar1').val(tipo_trabajo);
		$('#txtnecesidad1').val(necesidad);
		$('#txthabilidades1').val(habilidades);
		$('#verRechazo').modal('show');
		
		$("button").on("click",function(){ ///2) siguiente
					var name = $(this).attr('name');
					var id1 = $(this).attr('id');
					if (name=='btn_rechazo_soli') {
						console.log("entro modal actualizar")		
					}
		});
	}else{
		$('#ver').modal('show');	
	}
}
/*
function eliminar_solicitud(n_solicitud)//colocar el estatus en la table seguimiento y solicitudes en False
{									   // esta funcion es para la vista solicitudes hechas
	console.log("Solicitud Rechazada: "+n_solicitud);		
	$.post(baseurl+"Cacciones/botonEliminar",
 		  	{
				id_solicitud: n_solicitud,
				estatus: false
			},
			function(data){
				console.log(data);
										
				$("#tr"+n_solicitud).html(""); //eliminar las solicitudes enviada		
			});
}

function rechazar_solicitud(n_solicitud,id_seguimiento,estatus,table)
{
	var razon;
	console.log('entro');
	
	$('#modificar').modal('show');
	$('#mbtnIngresar').click(function(){
		razon = $('#txtRazon').val();
		console.log("razon: "+razon+"!");
		console.log(n_solicitud);
		console.log(id_seguimiento);
		console.log(estatus);
		$.post(baseurl+"Cacciones/botonRechazar",
	 		{
					id_solicitud: n_solicitud,
					id_seguimiento: id_seguimiento,
					n_estado: 0,
					estatus: estatus,
					razon : razon
			},
			function(data){
					console.log(data);
					

					if (data == 1) {
						alert("exito");
						
						$('#mbtnCerrarModal').click();
						$('#mbtnIngresar').empty();						
						//location.reload(); //Modo prueba
					}
			});
	});
}
*/

function validar(){
	var sw=1;
	if (!$('#txtRazon').val()) {
		alert("faltan campos");
		sw = 0;
	}
	if (sw == 1) {
		return 1;
	}else{
		return 0;
	}
}