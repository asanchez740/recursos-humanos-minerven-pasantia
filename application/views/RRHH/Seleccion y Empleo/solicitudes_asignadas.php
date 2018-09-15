
<?php $this->funciones->verificar_error($error, $mensaje);?>
<div class="container" style="width: 100%;">
  <div class="row">
    <div align="center" style="padding:4% 0% 0% 0%;">

      <form action="#" method="post"  class="form" style="width: 94%;">

        <div class="header" align="left">
          <br>
          <h2 class="encabezado" style="font-size: 23px;font-weight: normal; font-family: 'Arial, Helvetica, sans-serif';">Solicitud de Personal Recibidas</h2>
        </div>
        <table id="seleccion_empleo" class="table table-bordered table-striped" style="font-size: 12px;" >
            <thead class="thead-dark">
              <tr class="encabezado-tablas">
                <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 4%;">#</th>
                <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 10%;">Cargo</th>
                <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 15%;">Departamento</th>
                <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 2%;">Cantidad</th>
                <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 8%;">Fecha</th>
                <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 15%;">Observacion</th>
                <th scope="col" style="font-size: 14px;color:white;background-color: #006699;width: 10%;text-align: center;">Acciones</th>
              </tr>
            </thead>
          <tbody style="font-family: 'Arial, Helvetica, sans-serif';">
          
          </tbody>
        </table>
      </form>
    </div>  
  </div>
    
</div>
<script>
    var baseurl="<?php echo base_url();?>";
    
</script>
