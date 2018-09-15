function consultarins() {
	var select = document.getElementById("tconsulta"),
	forEach = Array.prototype.forEach;
	
	if (select.value==0){
		document.getElementById('guardar').style.display='none';
		document.getElementById('operadora').style.display='none';
		document.getElementById('datepicker').style.display='none';
		document.getElementById('nombre').style.display='none';
		document.getElementById('todos').style.display='none';
		document.getElementById('fechas').style.display='none';
		document.getElementById('nombre').value='';
		document.getElementById('operadora').value='';
	}

	if (select.value=="nombre"){
		document.getElementById('guardar').style.display='block';
		document.getElementById('operadora').style.display='none';
		document.getElementById('datepicker').style.display='block';
		document.getElementById('nombre').style.display='block';
		document.getElementById('todos').style.display='none';
		document.getElementById('fechas').style.display='none';
		document.getElementById('datepicker').value='';
		document.getElementById('operadora').value='';
	}
	
	if (select.value=="todos"){
		document.getElementById('guardar').style.display='block';
		document.getElementById('operadora').style.display='none';
		document.getElementById('datepicker').style.display='block';
		document.getElementById('todos').style.display='block';
		document.getElementById('nombre').style.display='none';
		document.getElementById('fechas').style.display='none';
		document.getElementById('nombre').value='';
		document.getElementById('datepicker').value='';
		document.getElementById('operadora').value='';
	}
	if (select.value=="actual"){
		document.getElementById('guardar').style.display='block';
		document.getElementById('operadora').style.display='none';
		document.getElementById('datepicker').style.display='none';
		document.getElementById('todos').style.display='block';
		document.getElementById('nombre').style.display='none';
		document.getElementById('fechas').style.display='none';
		document.getElementById('nombre').value='';
		document.getElementById('operadora').value='';
		document.getElementById('datepicker').value='';
	}
	if (select.value=="operadora"){
		document.getElementById('guardar').style.display='block';
		document.getElementById('operadora').style.display='block';
		document.getElementById('datepicker').style.display='block';
		document.getElementById('todos').style.display='none';
		document.getElementById('nombre').style.display='none';
		document.getElementById('fechas').style.display='none';
		document.getElementById('nombre').value='';
		document.getElementById('operadora').value='';
		document.getElementById('datepicker').value='';
	}
}

function consultarest() {
	var select = document.getElementById("tconsulta"),
	forEach = Array.prototype.forEach;
	
	if (select.value==0){
		document.getElementById('guardar').style.display='none';
		document.getElementById('nombre').style.display='none';
		document.getElementById('todos').style.display='none';
		document.getElementById('nombre').value='';
	}

	if (select.value=="nombre"){
		document.getElementById('guardar').style.display='block';
		document.getElementById('nombre').style.display='block';
		document.getElementById('todos').style.display='none';
		document.getElementById('datepicker').value='';
	}
	
	if (select.value=="todos"){
		document.getElementById('guardar').style.display='block';
		document.getElementById('todos').style.display='block';
		document.getElementById('nombre').style.display='none';
		document.getElementById('nombre').value='';
	}
}

function consultarplan() {
	var select = document.getElementById("tconsulta"),
	forEach = Array.prototype.forEach;
	
	if (select.value==0){
		document.getElementById('guardar').style.display='none';
		document.getElementById('todos').style.display='none';
		document.getElementById('todos').value='';
		document.getElementById('datepicker').style.display='none';
		document.getElementById('datepicker').value='';
	}

	if (select.value=="fecha"){
		document.getElementById('guardar').style.display='block';
		document.getElementById('datepicker').style.display='block';
		document.getElementById('todos').style.display='none';
		document.getElementById('todos').value='';
	}
	
	if (select.value=="todos"){
		document.getElementById('guardar').style.display='block';
		document.getElementById('todos').style.display='block';
		document.getElementById('datepicker').style.display='none';
		document.getElementById('datepicker').value='';
		document.getElementById('todos').value='todos';
	}
}

function mensaje(msj,accion){
    alert ("Los datos "+msj+" han sido "+accion+" con éxito");
    return false;
}

function error(msj,accion){
    alert ("Error. Verifique que los datos ingresados "+msj+" han sido "+accion+" con éxito");
    return false;
}

function errorlog(){
    alert ("Usted no esta autorizado para acceder al sistema");
    return false;
}

function valinsumo(){
	nombre=document.getElementById('nombre');
	cantidad=document.getElementById('cantidad');
	var select = document.getElementById("tipo"),
	forEach = Array.prototype.forEach;
	tipoi=document.getElementById('tipoi');
	destino=document.getElementById('destino');
	observacion=document.getElementById('observacion');
	datepicker=document.getElementById('datepicker');
	
	if(!confirm("¿Esta seguro de que desea ingresar la información suministrada?")){
		document.getElementById('control').value='0';
		return false;
	}
	
	if(nombre.value == null || nombre.value.length == 0 || /^\s+$/.test(nombre.value)){
		alert ("Por favor verifique el valor ingresado en el campo Nombre"); 
		document.getElementById('control').value='0';
		return false;
	}
	if(cantidad.value == 0 || cantidad.value.length == 0 || /^\s+$/.test(cantidad.value)){
		alert ("Por favor verifique el valor ingresado en el campo Cantidad"); 
		document.getElementById('control').value='0';
		return false;
	}
	if(destino.value == null || destino.value.length == 0 || /^\s+$/.test(destino.value)){
		alert ("Por favor verifique el valor ingresado en el campo Destino"); 
		document.getElementById('control').value='0';
		return false;
	}
	if (select.value==0){
		alert ("Por favor verifique el valor ingresado en el campo Tipo"); 
		document.getElementById('control').value='0';
		return false;
	}
	if(datepicker.value == null || datepicker.value.length == 0 || /^\s+$/.test(datepicker.value)){
		alert ("Por favor verifique el valor ingresado en el campo fecha");
		document.getElementById('control').value='0';
		return false;
	}	
	document.getElementById('control').value='1';
	return true;
}

function valconsinsumo(){
	var select = document.getElementById("tconsulta"),
	forEach = Array.prototype.forEach;
	nombre=document.getElementById('nombre');
	datepicker=document.getElementById('datepicker');
	
	if (select.value=="nombre"){
		if(nombre.value == null || nombre.value.length == 0 || /^\s+$/.test(nombre.value)){
			alert ("Por favor verifique el valor ingresado en el campo Nombre"); 
			return false;
		}
	}
	
	if(datepicker.value == null || datepicker.value.length == 0 || /^\s+$/.test(datepicker.value)){
		if(select.value!="actual"){
		alert ("Por favor verifique el valor ingresado en el campo fecha");
		return false;
		}
	}	
	return true;
}

function valninsumo(){
	nombre=document.getElementById('nombre');
	var select = document.getElementById("tipo"),
	forEach = Array.prototype.forEach;
	descripcion=document.getElementById('descripcion');
	
	if(!confirm("¿Esta seguro de que desea ingresar la información suministrada?")){
		document.getElementById('control').value='0';
		return false;
	}
	
	
	if(nombre.value == null || nombre.value.length == 0 || /^\s+$/.test(nombre.value)){
		alert ("Por favor verifique el valor ingresado en el campo Nombre"); 
		document.getElementById('control').value='0';
		return false;
	}
	if(descripcion.value == null || descripcion.value.length == 0 || /^\s+$/.test(descripcion.value)){
		alert ("Por favor verifique el valor ingresado en el campo Descripción"); 
		document.getElementById('control').value='0';
		return false;
	}
	if (select.value==0){
		alert ("Por favor verifique el valor ingresado en el campo Tipo"); 
		document.getElementById('control').value='0';
		return false;
	}	
	document.getElementById('control').value='1';
	return true;
}

function valconsninsumo(){
	var select = document.getElementById("tconsulta"),
	forEach = Array.prototype.forEach;
	nombre=document.getElementById('nombre');
	datepicker=document.getElementById('datepicker');
	
	if (select.value=="nombre"){
		if(nombre.value == null || nombre.value.length == 0 || /^\s+$/.test(nombre.value)){
			alert ("Por favor verifique el valor ingresado en el campo Nombre"); 
			return false;
		}
	}
	
	if(datepicker.value == null || datepicker.value.length == 0 || /^\s+$/.test(datepicker.value)){
		alert ("Por favor verifique el valor ingresado en el campo fecha");
		return false;
	}	
	return true;
}

function valestandar(){
	nombre=document.getElementById('nombre');
	valor= document.getElementById('valor');
	
	if(!confirm("¿Esta seguro de que desea ingresar la información suministrada?")){
		document.getElementById('control').value='0';
		return false;
	}
	
	if(nombre.value == null || nombre.value.length == 0 || /^\s+$/.test(nombre.value)){
		alert ("Por favor verifique el valor ingresado en el campo Nombre"); 
		document.getElementById('control').value='0';
		return false;
	}
	if(valor.value == null || valor.value.length == 0 || /^\s+$/.test(valor.value)){
		alert ("Por favor verifique el valor ingresado en el campo Valor"); 
		document.getElementById('control').value='0';
		return false;
	}
	
	document.getElementById('control').value='1';
	return true;
}

function valconsestandar(){
	var select = document.getElementById("tconsulta"),
	forEach = Array.prototype.forEach;
	nombre=document.getElementById('nombre');
	
	if (select.value=="nombre"){
		if(nombre.value == null || nombre.value.length == 0 || /^\s+$/.test(nombre.value)){
			alert ("Por favor verifique el valor ingresado en el campo Nombre"); 
			return false;
		}
	}
	
	return true;
}

function valplan(){
	valor= document.getElementById('cantidad');
	datepicker=document.getElementById('datepicker'); 
	
	if(!confirm("¿Esta seguro de que desea ingresar la información suministrada?")){
		document.getElementById('control').value='0';
		return false;
	}
	
	if(valor.value == null || valor.value.length == 0 || /^\s+$/.test(valor.value)){
		alert ("Por favor verifique el valor ingresado en el campo cantidad"); 
		document.getElementById('control').value='0';
		return false;
	}
	if(datepicker.value == null || datepicker.value.length == 0 || /^\s+$/.test(datepicker.value)){
		alert ("Por favor verifique el valor ingresado en el campo fecha");
		document.getElementById('control').value='0';
		return false;
	}	
	
	document.getElementById('control').value='1';
	return true;
}

function valconsplan(){
	var select = document.getElementById("tconsulta"),
	forEach = Array.prototype.forEach;
	datepicker=document.getElementById('datepicker');
	
	if (select.value=="fecha"){
		if(datepicker.value == null || datepicker.value.length == 0 || /^\s+$/.test(datepicker.value)){
			alert ("Por favor verifique el valor ingresado en el campo Fecha");
			return false;
		}	
	}
	
	return true;
}

function valconsplan(){
	var select = document.getElementById("tconsulta"),
	forEach = Array.prototype.forEach;
	nombre=document.getElementById('nombre');
	todos=document.getElementById('todos');
	
	if (select.value=="nombre"){
		if(nombre.value == null || nombre.value.length == 0 || /^\s+$/.test(nombre.value)){
			alert ("Por favor verifique el valor ingresado en el campo Nombre"); 
			return false;
		}
	}
	
	if (select.value=="todos"){
		if(todos.value == null || todos.value.length == 0 || /^\s+$/.test(todos.value)){
			alert ("Por favor verifique el valor ingresado en el campo Todos"); 
			return false;
		}
	}
	
	return true;
}

function valindicador(){
	
	var select = document.getElementById("operadora"),
	forEach = Array.prototype.forEach;
	tprocesadas=document.getElementById('tprocesadas');
	consumo=document.getElementById('consumo');
	datepicker=document.getElementById('datepicker'); 
	
	if(!confirm("¿Esta seguro de que desea ingresar la información suministrada?")){
		document.getElementById('control').value='0';
		return false;
	}
	
	if (select.value==0){
		alert ("Por favor verifique el valor ingresado en el campo operadora"); 
		document.getElementById('control').value='0';
		return false;
	}
	
	if(datepicker.value == null || datepicker.value.length == 0 || /^\s+$/.test(datepicker.value)){
		alert ("Por favor verifique el valor ingresado en el campo fecha");
		document.getElementById('control').value='0';
		return false;
	}

	if(consumo.value == null || consumo.value.length == 0 || /^\s+$/.test(consumo.value)){
		alert ("Por favor verifique el valor ingresado en el campo consumos"); 
		document.getElementById('control').value='0';
		return false;
	}	

	if(tprocesadas.value == null || tprocesadas.value.length == 0 || /^\s+$/.test(tprocesadas.value)){
		alert ("Por favor verifique el valor ingresado en el campo toneladas procesadas"); 
		document.getElementById('control').value='0';
		return false;
	}	
	document.getElementById('control').value='1';
	return true;
}
