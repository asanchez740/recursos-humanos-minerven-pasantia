<!--******************************************************************************************
********************************INFORMACION DE LA SOLICITUD***********************************
*******************************************************************************************-->

  <div class="modal fade" id="ver" role="dialog">
    <div class="modal-dialog" style=" width: 90% !important;">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #006699;color: white;font-family: 'Arial, Helvetica, sans-serif';">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
            <h4 class="modal-title" id="myModalLabel" style="text-align: left; margin-left: 100px;"><strong id="text_solicitud">Solicitud de Personal N°</strong></h4>
        </div>
        <div class="modal-body"">
          <div>
            <form method="post" style="width:80%;" class="form1">
              <br>    
              <div class="form-group" >
                <label>Unidad:</label>
                  <input type="text" id="txtunidad" disabled class="form-control fondo-input" style="width:20%;">

                <label style="padding: 0px 10px">Cargo:</label>
                  <input type="text" id="txtcargo" disabled class="form-control fondo-input" style="width:20%;">

                <label style="margin-left: 5px;">Cantidad:</label>
                  <input type="text" id="txtcantidad" disabled class="form-control fondo-input" style="width:20%;margin-left:5px;">
              </div>
               <br>
              <div class="form-group" style="text-align: justify;">
                <label>Sexo:</label>
                  <input type="text" id="txtsexo" disabled class="form-control fondo-input" style="width:20%;margin-left: 15px;">                
                <label style="padding: 0px 10px">Edad:</label>
                  <input type="text" id="txtedad" disabled class="form-control fondo-input" style="width:20%;margin-left:5px;">
                <label style="margin-left: 5px;">Trabaja de:</label>
                  <input type="text" id="txttrabajar" disabled class="form-control fondo-input" style="width:20%">


              </div>
               <br>
              <div class="izquierda" style="font-family: 'Arial, Helvetica, sans-serif';">
              <p>Motivo de la Solicitud</p>
                <textarea id="txtnecesidad" disabled rows="4"  cols="60" ></textarea>
              </div>
              <div class="derecha" style="font-family: 'Arial, Helvetica, sans-serif';">
                <p>Habilidades Requeridas</p>
                <textarea id="txthabilidades" disabled rows="4"  cols="60" ></textarea>
              </div>
              
            </form>
                  </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn guardar btn btn-info" data-dismiss="modal">Cerrar</button>
                              <!-- class="btn guardar" -->
        </div>
      </div>

    </div>
  </div>

</body>
</html>

<!-- ****************** Modal rechazando solicitudes *********************************
*************************************************************************************-->
  <div class="modal fade" id="modificar" tabindex="-1" role="dialog" >
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #e82525;color: white;font-family: 'Arial, Helvetica, sans-serif';">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Motivos de Rechazo</h4>
        </div>
        <div class="modal-body"">
          <div>
              <div style="width: 90%;margin-left: 20px; font-family: 'Arial, Helvetica, sans-serif';">
                <textarea id="txtRazon" rows="4" maxlength="100" placeholder="Escriba su Rechazo de la Solicitud" cols="60"></textarea>
              </div>
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger" id="mbtnIngresar" >Ingresar</button>
        </div>
      </div>

    </div>
  </div>
<!--******************************************************************************************
********************************Modal cuando es rechazado***********************************
*******************************************************************************************-->

  <div class="modal fade" id="verRechazo" role="dialog">
    <div class="modal-dialog" style=" width: 90% !important;">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #006699;color: white;font-family: 'Arial, Helvetica, sans-serif';">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: left; margin-left: 100px;"><strong id="text_solicitud1">Solicitud de Personal N°</strong></h4>
        </div>
        <div class="modal-body"">
          <div>
            <form method="post" style="width:80%;" class="form">
              <br>    
              <div class="form-group" >
                <label>Unidad:</label>
                  <input type="text" id="txtunidad1" disabled class="form-control fondo-input" style="width:20%;">

                <label style="padding: 0px 10px">Cargo:</label>
                  <input type="text" id="txtcargo1" disabled class="form-control fondo-input" style="width:20%;">

                <label style="margin-left: 5px;">Cantidad:</label>
                  <input type="text" id="txtcantidad1"  class="form-control fondo-input" style="width:20%;margin-left:5px;">
              </div>
               <br>
              <div class="form-group" style="text-align: justify;">
                <label>Sexo:</label>
                  <input type="text" id="txtsexo1"  class="form-control fondo-input" style="width:20%;margin-left: 15px;">                
                <label style="padding: 0px 10px">Edad:</label>
                  <input type="text" id="txtedad1"  class="form-control fondo-input" style="width:20%;margin-left:5px;">
                <label style="margin-left: 5px;">Trabaja de:</label>
                  <input type="text" id="txttrabajar1"  class="form-control fondo-input" style="width:20%">


              </div>
               <br>
              <div class="izquierda" style="font-family: 'Arial, Helvetica, sans-serif';">
              <p>Motivo de la Solicitud</p>
                <textarea id="txtnecesidad1"  rows="4"  cols="60" ></textarea>
              </div>
              <div class="derecha" style="font-family: 'Arial, Helvetica, sans-serif';">
                <p>Habilidades Requeridas</p>
                <textarea id="txthabilidades1"  rows="4"  cols="60" ></textarea>
              </div>
              
            </form>
                  </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" name="btn_rechazo_soli" class="btn btn-info" data-dismiss="modal">Actualizar</button>
        </div>
      </div>

    </div>
  </div>
