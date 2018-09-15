$(document).ready(function(){
	console.log("Entro Consultoria Juridica/Accept o Rechazar Contrato: "+baseurl);
	console.log("ID Solicitud : "+id_solicitud);
	//$("#solicitud_personal").empty();
	$('#soli_n').append('Solicitud N°'+id_solicitud+' ');
	$("#selec_personal_contrato tbody").empty(); //borrar todo
	$.post(baseurl+"Informatica/Solicitud_personal/listarPersonal",
	{
		id:id_solicitud
	},
	 function(data){
	 	var c = JSON.parse(data);
		$.each(c,function(i,item){
		console.log(c);
			$('#selec_personal_contrato tbody').append(
				'<tr id=tr'+item.cedula+' >'+
				'<td>'+item.cedula+ '</td>'+
				'<td>'+item.nombres+'</td>' +
				'<td>'+item.apellidos+'</td>' +
				'<td>'+item.descripcion_grado_instruccion+'</td>' +
				'<td>'+item.nombre_profesion+'</td>' +		
				'<td> <a href="#" onclick="verContrato(\''+item.id_solicitud_personal+'\',\''+item.id_seguimiento_solicitud+'\',\''+item.n_estado+'\',\''+item.cedula+'\');" name="btn-ver"><img title="Ver Contrato" src="'+baseurl+'assets/css/imagenes/contratoPdf.png"></a> </td>' +
				'</tr>'    
			);
		});//-------------------
			$("#selec_personal_contrato").DataTable();
	}); 
	
	
	

});
function verContrato(id_solicitud,id_seguimiento,n_solicitud,cedula)
{
	$('#text_contrato').empty();
	$('#text_contrato').append('Datos del Contrato del Nº de Cedula: '+cedula+' ');
	$('#verContrato').modal('show');	
}
