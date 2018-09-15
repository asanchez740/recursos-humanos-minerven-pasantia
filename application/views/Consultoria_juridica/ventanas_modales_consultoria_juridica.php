<!--******************************************************************************************
********************************INFORMACION DE LA SOLICITUD***********************************
*******************************************************************************************-->
 <div class="modal fade" id="ver" role="dialog">
      <div class="modal-dialog" style=" width: 90% !important;">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #006699;color: white;color: white;font-family: 'Arial, Helvetica, sans-serif';">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="text_solicitud" style="text-align: left; margin-left: 100px;">Solicitud de Personal N°</h4>
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
          <button type="button" class=" btn btn-info" data-dismiss="modal">Cerrar</button>
                              <!-- class="btn guardar" -->
        </div>
      </div>

    </div>
  </div>
</body>
</html>
<!--******************************************************************************************
********************************INFORMACION DEL CONTRATO***********************************
*******************************************************************************************-->

<div class="modal fade" id="verContrato" role="dialog">
  <div class="modal-dialog" style=" width: 90% !important;">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #006454;color: white;font-family: 'Arial, Helvetica, sans-serif';">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="text_contrato" style="text-align: left;margin-left: 40px;color: white;font-family: 'Arial, Helvetica, sans-serif';"> </h4> 
        </div>
        <div class="modal-body"">
            <div class="container form1" >
              <div class="row">
                <article>
                  <form action="" method="POST" class="form-horizontal" name="inser_solicitudes">
                      <br>   
                      
                      <h2 style="font-size: 23px;">Información sobre el trabajo y salario </h2>
                        <div class="form-group">
                          <label for="sle_tipoC" style="width: 180px; " class="control-label col-md-1" >Tipo de Contrato:</label>
                          <div class="col-md-1 ">
                            <select name="tipo_Contr" class=" form-control" id="sle_tipoC" style="width: 170px;" >
                              <option value="0" >--Seleccione--</option>
                            </select> 
                          </div>  
                          <label for="sle_tiempo" style="width: 100px;margin-left: 90px;" class="control-label col-md-1" >A tiempo:</label>
                            <div class="col-md-1 ">
                              <select name="tiempor" class=" form-control" id="sle_tiempo" style="width: 145px;" >
                                <option value="0" >--Seleccione--</option>
                              </select> 
                            </div>  
                          <label for="sle_jornada" style="width: 150px;margin-left: 70px;" class="control-label col-md-1" >Jornada De Trabajo:</label>
                            <div class="col-md-1 ">
                              <select name="sle_jornada" class=" form-control" id="sle_jornada" style="width: 170px;" >
                                <option value="0" >--Seleccione--</option>
                              </select> 
                            </div>  
                          <label for="txt_horario" style="width: 50px; margin-left: 80px;" class="control-label col-md-1" >Horario:</label>
                          <div class="col-md-1">
                            <input type="text" style=" width:120px;margin-left: 10px;" class="form-control" id="txt_horario" name="tlf" placeholder="Ej:Fijo-8:00am-12:00pm - 1:30-5:30"> 
                          </div> 
                        </div>
                        <div class="form-group">
                          <label for="sle_tipoC" style="width: 180px; " class="control-label col-md-1" >Fecha de Inicio:</label>
                          <div class="col-md-1 ">
                            <input type="text" style=" width:170px;" class="form-control" id="txt_fecha" name="fecha" placeholder="Ej:23-10-2017"> 
                          </div> 
                          
                          <label for="sle_lugar" style="width: 150px;margin-left: 40px;" class="control-label col-md-1" >Lugar:</label>
                            <div class="col-md-1 ">
                              
                              <select name="sle_lugar" class=" form-control" id="sle_lugar" style="width: 145px;" >
                                <option value="0" >--El Callao--</option>
                              </select> 
                            </div>
                            <div class="col-md-5">
                              <textarea style="margin-left: 80px;" rows="2" cols="50" id="lugar" name="text_lugar" maxlength="100" placeholder="Minerven Planta Caratal, Planta Peru, Planta Revemin" ></textarea>
                            </div>    
                        </div>
                        <div class="form-group">
                          <label for="sle_tipoC" style="width: 180px; " class="control-label col-md-1" >Fecha de Culminacion:</label>
                          <div class="col-md-1 ">
                            <input type="text" style=" width:170px;" class="form-control" id="txt_fecha" name="fecha" placeholder="Ej:23-10-2017"> 
                          </div> 
                          <label for="txt_servicio" style="width:250px;margin-left: 120px; " class="control-label col-md-1" >Servicio que Debe Prestarse:</label>
                          <div class="col-md-5">
                              <textarea style="margin-left: px;" rows="2" cols="50" id="text_servicio" name="text_servicio" maxlength="100" placeholder="" ></textarea>
                          </div>    
                        </div>
                    
                  </form>
                </article>       
              </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class=" btn btn-info" style="background-color: #006454;" data-dismiss="modal">Cerrar</button>
    </div>
      </div>  
  </div>
</div>      
    
  <!--**************************************************************************************************
   ****************** Modal rechazando solicitudes ***************************************************
********************************************************************************************************-->
  <div class="modal fade" id="modificar" tabindex="-1" role="dialog" >
    <div class="modal-dialog " role="document">
      <div class="modal-content">
         <div class="modal-header" style="background-color: #e82525; color: white;color: white;font-family: 'Arial, Helvetica, sans-serif';">
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
          <button type="button" class="btn btn-danger" id="mbtnIngresar" >Actualizar</button>
        </div>
      </div>

    </div>
  </div>
   <!-- *************************************************************************************************
*********************************************************************************************************-->