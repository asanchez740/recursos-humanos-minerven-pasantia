$(document).ready(function(){
	console.log("Ingreso a Consultoria Juridica");
	
	var tabla = $("#gerencia_soliciud").DataTable({
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
					"url":baseurl+"RRHH/Gerencia/listaSolicitudes/",
					"type":"POST",
					"data":{
						"id":7
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
				 		if (item.n_estado == 1) {//en espera
				 			return '<img type="button" onclick="info_detalle(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');" title="Ver Información de la Solicitud" src="'+baseurl+'assets/css/imagenes/ver.png"><a href="elegibles_aprobados/'+item.id_solicitud_personal+'"><img title="Ver Personal Seleccionado" src="'+baseurl+'assets/css/imagenes/entrevistas1.png"></a><a href="#" onclick="verContrato(\''+item.id_solicitud_personal+'\',\''+item.id_seguimiento_solicitud+'\',\''+item.n_estado+'\');" name="btn-ver"><img title="Ver Contrato" src="'+baseurl+'assets/css/imagenes/contrato.png"></a> <a href="#" name="aprobar" id="'+item.id_solicitud_personal+'" class="enviar"><img id="btn_e" title="Aprobar Contrato" src="'+baseurl+'assets/css/imagenes/enviar.png">  <a href="#" id="'+item.id_solicitud_personal+'" class="rechazar" name="rechazar"><img title="Rechazar Contrato" src="'+baseurl+'assets/css/imagenes/rechazado.png"></a>';

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
				  		}else if (row.n_estado == 0) {
				  			return "<span style='color:red;'>"+data+"</span><br>"
				  		}
				  	}
				  },

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
				id_seguimiento: 8,
				n_estado: 1,
				descripcion: 'Analista S/E- Contrato en espera por Firma'
			},
			function(data){
				console.log(data);
				if (data == 1) {
					alert("solicitud Aprobada");
					tabla.ajax.reload();				
				}
				
			});
	});
		$(document).on('click','.rechazar',function(){ //Rechazar solicitud
		console.log("entro a rechazar");
		var id_solicitud = $(this).attr('id');
		console.log(id_solicitud);
		
		$('#modificar').modal('show');
		$('#mbtnIngresar').click(function(){
				razon = $('#txtRazon').val();
				console.log("razon: "+razon+"!");
				console.log(id_solicitud);
				console.log(2);
				console.log(true);
				$.post(baseurl+"Cacciones/botonRechazar",
			 		{
							id_solicitud: id_solicitud,
							id_seguimiento: 7,
							n_estado: 0,
							estatus: true,
							razon : razon
					},
					function(data){
							console.log(data);
							if (data == 1) {
								$('#mbtnCerrarModal').click();
								alert("Rechazado Con Exito");
								$('#mbtnIngresar').empty();		
								tabla.ajax.reload();				
							}
					});
			});		
			
	});
});	
function verContrato(id_solicitud,id_seguimiento,n_solicitud)
{
	$('#text_contrato').empty();
	$('#text_contrato').append(' N° Solicitud '+id_solicitud+' ');
	$('#verContrato').modal('show');	
}
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
/*
function enviar_solicitud(n_solicitud,id_seguimiento,estatus)
{
	
	
	console.log("Solicitud Enviada");
	$.post(baseurl+"Cacciones/botonEnviar",
 		  	{
				id_solicitud: n_solicitud,
				id_seguimiento: 8,
				n_estado: 1,
				descripcion: 'Analista S/E'
			},
			function(data){
				console.log(data);
				if (data == 1) {
					alert("solicitud Aprobada");
					$("#tr"+n_solicitud).html("");//eliminar las solicitudes enviada		
				}
				
			});
					
}

function rechazar_solicitud(n_solicitud,id_seguimiento,estatus,table)
{
	var razon;
	console.log('entro rechazar');
	
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
					$("#tr"+n_solicitud).html("");//eliminar las solicitudes enviada	

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
