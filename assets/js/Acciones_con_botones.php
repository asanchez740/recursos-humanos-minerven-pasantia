render:function(data,type,item){
				 		if (item.n_estado == 1) {//en espera
				 			return '<button type="button" onclick="info_detalle(\''+item.id_solicitud_personal+'\',\''+item.nombre+'\',\''+item.nombre_u+'\',\''+item.cantidad_solicitada+'\',\''+item.sexo+'\',\''+item.edad_comprendida+'\',\''+item.ambiente_trabajo+'\',\''+item.necesidad+'\',\''+item.habilidades_requeridas+'\',\''+item.n_estado+'\');"> <img title="Ver Información de la Solicitud" src="'+baseurl+'assets/css/imagenes/ver.png"></button> <button type="button" name="enviar" id="'+item.id_solicitud_personal+'" class="enviar" ><img title="Enviar Solicitud" src="'+baseurl+'assets/css/imagenes/enviar.png"></button> <button type="button" name="delete" id="'+item.id_solicitud_personal+'" class="delete" ><img title="Rechazar Solicitud" src="'+baseurl+'assets/css/imagenes/rechazado.png"></button> ';
				 		}
				 	}