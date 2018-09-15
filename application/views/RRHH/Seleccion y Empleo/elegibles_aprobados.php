
<?php $this->funciones->verificar_error($error, $mensaje);?>
<div align="center" style="padding:4% 0% 0% 0%;">

	<form method="post" style="width:85%;" class="form">

		<div class="header" align="center">
			<h3 style="font-weight: bold;">Generación de Contrato</h>
		</div>
    <div class="form-group" style="float: right;font-size: 20px;opacity: 0.8;">
      <label style="">Solicitud N° XXXXXXX</label>
    </div>
		<div class="sep"></div>
<div>
  <table class="table table-hover">
  <thead class="thead-dark" style="font-size: 20px">
    <tr>
      <th scope="col">Cedula</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Grado de Instrucción</th>
      <th scope="col">Profesión</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody style="font-weight: normal; font-family: verdana;">
    <tr class="seleccion_personal">
      <th scope="row">1</th>
      <td>Jose Enrrique</td>
      <td>Ruíz Pérez</td>
      <td>Universitario</td>
      <td>Ingeniero de Sistemas</td>
      <td>
      <a href="#"><img title="Ver Ponderacion" src="<?php echo base_url();?>assets/css/imagenes/enfocar(1).png"></a>
      <a href="#"><img title="Generar Contrato" src="<?php echo base_url();?>assets/css/imagenes/contrato.png"></a>
      </td>
    </tr>
    <tr class="seleccion_personal">
      <th scope="row">2</th>
      <td>Pedro Jose</td>
      <td>Castro Lopez</td>
      <td>Universitario</td>
      <td>Ingeniero en Informatica</td>
      <td>
      <a href="#"><img title="Ver Ponderacion" src="<?php echo base_url();?>assets/css/imagenes/enfocar(1).png"></a>
      <a href="#"><img title="Generar Contrato" src="<?php echo base_url();?>assets/css/imagenes/contrato.png"></a>
      </td>
    </tr>
  </tbody>
  </table>
  </div>
 <div class="form-group" align="right" style="padding: 10px;">
     <a href="solicitudes" type="button" class="btn guardar"><span class="glyphicon glyphicon-arrow-left" style="padding: 10px 10px;"></span><strong style="font-size: 20px;">Volver</strong> </a>
  </div>
  </form>
  </div>



 

