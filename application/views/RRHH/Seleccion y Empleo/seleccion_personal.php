<?php $this->funciones->verificar_error($error, $mensaje);?>
<div align="center" style="padding:4% 0% 0% 0%;">

  <form action="#" method="post" style="width:94%;" class="form">
  	<div  align="left">
  		<h2 style="font-weight: normal; font-family: 'Arial, Helvetica, sans-serif';">Selección de Personal Elegible</h2>
  	</div>
  
      <table id="seleccion_empleo" class="table table-bordered table-striped" style="font-size: 12px;" >
      <thead class="thead-dark">
        <tr class="encabezado-tablas">
          <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 4%;">Cedula</th>
          <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 10%;">Nombre</th>
          <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 15%;">Apellido</th>
          <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 2%;">Sexo</th>
          <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 15%;">Grado de Instrucción</th>
          <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 10%;">Profesión</th>
          <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 15%;">Experiencia</th>
          <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 10%;">Selección</th>
        </tr>
      </thead>
      <tbody style="font-family: 'Arial, Helvetica, sans-serif';">
        <tr>
          <th scope="row">123456789</th>
          <td>Jose Enrrique</td>
          <td>Ruíz Pérez</td>
          <td>Masculino</td>
          <td>Universitario</td>
          <td>Ingeniero de Sistemas</td>
          <td>Desarroll con PHP, Codeigniter, Postgresql ...</td>
          <td>
          <input type="checkbox"  style="height: 20px;width: 20px;margin-left: 50px;" name="" class="form-control">
          </td>
        </tr>
        <tr>
          <th scope="row">987654321</th>
          <td>Pedro Jose</td>
          <td>Castro Lopez</td>
          <td>Masculino</td>
          <td>Universitario</td>
          <td>Ingeniero en Informatica</td>
          <td>Programador</td>
          <td>
          <input type="checkbox"  style="height: 20px;width: 20px;margin-left: 50px;" name="" class="form-control">
          </td>
        </tr>
        <tr>
          <th scope="row">2113221</th>
          <td>Miguel Jose</td>
          <td>Castro Perez</td>
          <td>Masculino</td>
          <td>Universitario</td>
          <td>Ingeniero en Redes</td>
          <td>Redes y Comunicaciones</td>
          <td>
          <input type="checkbox"  style="height: 20px;width: 20px;margin-left: 50px;" name="" class="form-control">
          </td>
        </tr>
      </tbody>
    </table>
    <div class="form-group" align="center" style="padding: 10px;font-weight: normal; font-family: 'Arial, Helvetica, sans-serif';">
      <button type="button" class=" btn guardar" style="width: 17%;background-color: #337ab7;"><span class="glyphicon glyphicon-open" style="padding: 10px 20px"></span> Enviar Elegibles </button>
      <a href="solicitudes_asignadas" type="button" class="btn guardar" style="background-color: #337ab7;"><span class="glyphicon glyphicon-arrow-left" style="padding: 10px 10px;"></span> Volver </a>
    </div>
  </form> 
</div>
