$(document).ready(function(){
	console.log("SeleccionyEmpleo / ASIGNADAS / : "+baseurl);

	var tabla = $("#seleccion_empleo").DataTable({
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
					"url":baseurl+"RRHH/Gerencia/listaSolicitudes",
					"type":"POST",
					"data":{
						"id": 4
					},
					dataSrc: ''
				},
				rowId:'id_solicitud_personal',
				'columns':[
				 {data:'id_solicitud_personal','sClass':'dt-body-center'},
				 {data:'nombre'},
				 {data:'nombre_u'},
				 {data:'cantidad_solicitada'},
				 {data:'fecha_solicitud'},
				 {data:'descripcion_seguimiento_solicitud'},
				 {"orderable": true, 'sClass':'dt-body-center',
				 	render:function(data,type,item){
				 			return '<a href="#"><img type="button" onclick="info_detalle(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');" title="Ver Información de la Solicitud" src="'+baseurl+'assets/css/imagenes/ver.png"></a><a href="#" name="aprobar" id="'+item.id_solicitud_personal+'" class="enviar"><img id="btn_e" title="Enviar Solicitud" src="'+baseurl+'assets/css/imagenes/enviar.png"> </a> <a href="#"><img data-toggle="modal" data-target="#seguimiento" title="Hacer seguimiento a la Solicitud" src="'+baseurl+'assets/css/imagenes/seguimiento1.png"></a><a href="pre_seleccion_personal"><img title="Personal Pre-Seleccionado" src="'+baseurl+'assets/css/imagenes/entrevistas1.png"></a>';
				 	}
				 }
				],
				"order":[[0,"asc"]],
	});
	$(document).on('click','.enviar',function(){ //Enviar Solicitud
		console.log("entro a enviar");
		var id_solicitud = $(this).attr('id');
		console.log(id_solicitud);
		$.post(baseurl+"Cacciones/botonEnviar",
 		  	{
				id_solicitud: id_solicitud,
				id_seguimiento: 5,
				n_estado: 1,
				descripcion: 'Gerente de Area'
			},
			function(data){
				console.log(data);
				if (data == 1) {
					alert("solicitud Aprobada");
					tabla.ajax.reload();				
				}
				
			});

		
	});

});

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
	if (n_estado == 0) {
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
					if (name == 'btn_rechazo_soli') {
						console.log("entro modal actualizar")		
					}
		});
	}else{
		$('#ver').modal('show');	
	}
}