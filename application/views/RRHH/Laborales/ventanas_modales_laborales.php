<div class="modal fade" id="profesiones" role="dialog">
  <div class="modal-dialog" style=" width: 70% !important;font-family: 'Arial, Helvetica, sans-serif';">
    <div class="modal-content" >
       <div class="modal-header" style="background-color: #859281;color: white;font-family: 'Arial, Helvetica, sans-serif';">
        <h3 class="modal-title" id="myModalLabel" style="text-align: left;color: black">
          <strong id="id_cargo">Asignar Profesiones al Cargo: </strong>
        </h3>
      </div>
        <div class="modal-body" style="text-align: center;">
          <div align="center" style="padding: 1%">
            <div class="container-fluid">
              <div class="form-group panel panel-warning izquierda" style="border-radius: 2px;box-shadow:0px 0px 0px 3px rgba( 0,0,0,0.7 ),0px 4px 20px rgba( 0,0,0,0.33 ); color: black;" >
                <div class="panel-heading" style="text-align: left;"> Profesiones </div>
                <div class="panel-body" id="visor2" >
                  <table id="agregar_modal" class="table table-hover">
                    <tbody class="detalle" >

                      <?php foreach ($nombre_profesion->result() as $tupla ):?>
                        <tr id="tr<?php echo $tupla->id_profesion ?>">
                          <th scope="row">
                           <label> <?php echo $tupla->nombre_profesion ?></label>  <button id="<?php echo $tupla->id_profesion ?>" class="btn btn-primary" name="insertarprofesion" value="<?php echo $tupla->nombre_profesion ?>">Agregar</button>
                          </th> 
                        </tr>
                      <?php endforeach?>

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group panel panel-warning derecha" style="border-radius: 2px;box-shadow:0px 0px 0px 3px rgba( 0,0,0,0.7 ),0px 4px 20px rgba( 0,0,0,0.33 ); color: black;">
                  <div class="panel-heading" style="text-align: left;"s > Profesiones-Cargo </div>
                    <div class="panel-body"  id="visor2">
                      <table id="eliminar_modal" class="table table-hover">
                        <tbody class="detalle"  >
                     
                        </tbody>
                      </table>
                    </div>
              </div>
            </div>
          </div>
        </div>
      <div class="modal-footer">
          <button type="button" name="cerrarModal" class="btn guardar" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>