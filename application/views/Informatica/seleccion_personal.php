
<div align="center" style="padding:4% 0% 0% 0%;">

	<form method="post" style="width:90%;" class="form">

		<div class="header" align="left">
      <h2 class="encabezado" style="font-size: 23px;font-weight: normal; font-family: 'Arial, Helvetica, sans-serif';">Selección de Personal Elegible</h2>
		</div>
    <div>
      	<table id="selec_personal" class="table table-bordered table-striped" style="font-size: 12px;text-align: center;">
        <thead class="thead-dark">
          <tr class="encabezado-tablas" style="text-align: center;">
            <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 10%; text-align: center;">Cedula</th>
            <th scope="col" style="font-size: 14px;color:white; background-color: #006699;width: 10%;text-align: center;">Nombre</th>
            <th scope="col" style="font-size: 14px;color:white; background-color: #006699;width: 10%;text-align: center;">Apellidos</th>
            <th scope="col" style="font-size: 14px;color:white; background-color: #006699;width: 15%;text-align: center;">Grado de Instrucción</th>
            <th scope="col" style="font-size: 14px;color:white; background-color: #006699;width: 15%;text-align: center;">Profesión</th>
            <th scope="col" style="font-size: 14px;color:white; background-color: #006699;width: 20%;text-align: center;">Acciones</th>
            
          </tr>
        </thead>
        <tbody style="font-weight: normal; font-family: 'Arial, Helvetica, sans-serif';">
          
        </tbody>
        </table>
        <div class="form-group" align="right" style="font-family: 'Arial, Helvetica, sans-serif';">
          <a href="<?php echo base_url();?>Informatica/Solicitud_personal/listado_Realizadas" type="button" class="btn guardar" style="background-color: #337ab7;" ><span class="glyphicon glyphicon-arrow-left" style="padding: 10px 10px;"></span>Volver </a>
          
        </div>
    </div>
  </form>
</div>

  <script>
    var baseurl="<?php echo base_url();?>";
    var id_solicitud="<?php echo $id; ?>";
    
  </script>
