$(document).ready(function(){
	console.log("Entro Seleccion y Empleo -Recividas: "+baseurl);
	
	$("#seleccion_empleo tbody").empty(); //borrar todo

	$.post(baseurl+"RRHH/Gerencia/listaSolicitudes",
		  {
			id: 3
		  },
		  function(data){
			var c = JSON.parse(data);
			$.each(c,function(i,item){
			console.log(c);
				$('#seleccion_empleo tbody').append(
					'<tr id=tr'+item.id_solicitud_personal+' >'+
					'<td>'+item.id_solicitud_personal+ '</td>'+
					'<td>'+item.nombre+'</td>' +
					'<td>'+item.nombre_u+'</td>' +
					'<td>'+item.cantidad_solicitada+'</td>' +
					'<td>'+item.fecha_solicitud+'</td>' +
					'<td>'+item.descripcion_seguimiento_solicitud+'</td>' +
					'<td style="text-align: center;"> <img type="button" onclick="info_detalle(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');" title="Ver Información de la Solicitud" src="'+baseurl+'assets/css/imagenes/ver.png"> <a><img type="button" onClick="asignar_solicitud(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');" title="Asignar Solicitud" src="'+baseurl+'assets/css/imagenes/asignar.png"></a></td>'+
					'</tr>'    
				);
			});//-------------------
			$("#seleccion_empleo").DataTable();
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
	$('#ver').modal('show');	
	
}
function asignar_solicitud(n_solicitud,cargo,unidad,cantidad,sexo,edad,tipo_trabajo,necesidad,habilidades,n_estado)
{
	
	$('#text_sol').empty();
	$('#text_sol').append('Solicitud de Personal N°'+n_solicitud+' ');
	$('#txtuni').val(unidad);
	$('#txtcar').val(cargo);
	$('#asignar_solicitud').modal('show');	
	

}