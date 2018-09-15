$(document).ready(function(){
	console.log("Entro Personal Elegible : "+baseurl);
	console.log("ID Solicitud : "+id_solicitud);
	//$("#solicitud_personal").empty();
	$("#selec_personal tbody").empty(); //borrar todo
	$.post(baseurl+"Informatica/Solicitud_personal/listarPersonal",
	{
		id:id_solicitud
	},
	 function(data){
	 	var c = JSON.parse(data);
		$.each(c,function(i,item){
		console.log(c);
			$('#selec_personal tbody').append(
				'<tr id=tr'+item.cedula+' >'+
				'<td>'+item.cedula+ '</td>'+
				'<td>'+item.nombres+'</td>' +
				'<td>'+item.apellidos+'</td>' +
				'<td>'+item.descripcion_grado_instruccion+'</td>' +
				'<td>'+item.nombre_profesion+'</td>' +		
				'<td><a href="#"><img data-toggle="modal" data-target="#info_personal" title="Ver Iformacion detallada del Aspirante" src="'+baseurl+'assets/css/imagenes/ver.png"></a><a href="#"><img data-toggle="modal" data-target="#ponderacion" title="Ponderación del Aspirante" src="'+baseurl+'assets/css/imagenes/ponderacion1.png"></a><a href="#"><img title="Aprobar Aspirante" src="'+baseurl+'assets/css/imagenes/aprobado.png"></a><a href="#"><img title="Rechazar Aspirante" src="'+baseurl+'assets/css/imagenes/rechazado.png"></a></td>' +
				'</tr>'    
			);
		});//-------------------
			$("#selec_personal").DataTable();
	}); 
});