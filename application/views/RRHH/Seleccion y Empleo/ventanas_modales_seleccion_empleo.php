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
                <h4 class="modal-title" id="myModalLabel" style="text-align: left; margin-left: 100px;">
                  <strong id="text_solicitud">Solicitud de Personal N°</strong></h4>
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
            <div class="container principal" >
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
        <button type="button" class=" btn btn-info" id="btn-guardar" style="background-color: #006454;" data-dismiss="modal">Guardar</button>
    </div>
      </div>  
  </div>
</div>  
<!--******************************************************************************************
********************************PONDERACION DE LA ENTREVISTA*****************************
*******************************************************************************************-->
<div class="modal fade" id="ponderacion" role="dialog">
    <div class="modal-dialog" style=" width: 70%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;"><strong> <?php echo "Ponderación de Jose Enrrique Ruíz Pérez"?></strong></h4>
        </div>
        <div class="modal-body" style="text-align: center;">
        <div align="center">
            <form method="post" style="width:90%;" class="form">


              <fieldset disabled>
              </fieldset>

            </form>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn guardar" data-dismiss="modal">Cerrar</button>
        </div>
      </div>

    </div>
  </div>


<!--******************************************************************************************
******************************************ASIGNAR SOLICITUD***********************************
*******************************************************************************************-->

<div class="modal fade" id="asignar_solicitud" role="dialog">
    <div class="modal-dialog" style=" width: 70% !important;">
      <div class="modal-content">
       <div class="modal-header" style="background-color: #2a8c46c4;color: white;font-family: 'Arial, Helvetica, sans-serif';">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: left; margin-left: 100px;">
                  <strong id="text_sol"></strong></h4>
        </div>
        <div class="modal-body" style="text-align: center;">
          <div align="center" style="padding: 1%">
              <form method="post" style="width:90%;">
                <fieldset disabled>
                  <div class="form-group">
                    <label style="padding: 0px 10px">Cargo</label>
                      <input type="text" id="txtcar" class="form-control fondo-input" style="width:40%"> 
                    <label class="espacio">Unidad</label>
                      <input type="text" id="txtuni" class="form-control fondo-input" style="width:40%">
                  </div>
                </fieldset>
                <br>
                <div class="form-group">
                  <label>Seleccione Analista</label>
                    <select class="selectpicker" style="width:50%;">
                      <option value="0">Seleccione Analista</option>
                      <option value="1">Analista01</option>
                      <option value="2">Analista02</option>
                      <option value="3">Analista03</option>
                    </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn guardar" data-dismiss="modal">Enviar</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<!--******************************************************************************************
******************************************SOLICITUD ENVIADA***********************************
*******************************************************************************************-->
<div class="modal fade" id="solicitud_enviada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;"><strong>Notificación</strong></h4>
              </div>
        <div class="modal-body" style="text-align: center;">
          <div align="center" style="padding: 1%">
            <form method="post" style="width:90%;" class="form">
     <h5>Solicitud Enviada Exitosamente  </h5>
           </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn guardar" data-dismiss="modal">Realizar otra Solicitud</button>
          <a href="../../Sistema" class="btn guardar"> <span id="usuario_icono" name='usuario_icono' class="glyphicon glyphicon-saved"  style="cursor:pointer; color:white;"></span> Finalizar</a>
        </div>
      </div>
    </div>
  </div>

<!--******************************************************************************************
******************************************SOLICITUD GUARDADA**********************************
*******************************************************************************************-->
<div class="modal fade" id="solicitud_guardada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;"><strong>Notificación</strong></h4>
              </div>
        <div class="modal-body" style="text-align: center;">
          <div align="center" style="padding: 1%">
            <form method="post" style="width:90%;" class="form">
     <h5>Guardado Exitosamente  </h5>
           </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn guardar" data-dismiss="modal">Realizar otra Solicitud</button>
          <a href="../../Sistema" class="btn guardar"> <span id="usuario_icono" name='usuario_icono' class="glyphicon glyphicon-saved"  style="cursor:pointer; color:white;"></span> Finalizar</a>
        </div>
      </div>
    </div>
  </div>

<!--******************************************************************************************
******************************** SEGUIMIENTO DE LA SOLICITUD**********************************
*******************************************************************************************-->

  <div class="modal fade" id="seguimiento" role="dialog">
    <div class="modal-dialog" style=" width: 80% !important;">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #859281;color: white;font-family: 'Arial, Helvetica, sans-serif';">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;font-family: 'Arial, Helvetica, sans-serif';"><strong>Seguimiento de Solicitud N°39</strong></h4>
        </div>
        <div class="modal-body" style="text-align: center;font-family: 'Arial, Helvetica, sans-serif';">
          <div align="center">
            <form method="post" style="width:90%;" class="form">
            <fieldset disabled>
    <table class="table table-hover">
    <thead class="thead-dark" style="text-align: center;font-family: 'Arial, Helvetica, sans-serif';">
      <tr class="encabezado-seguimiento">
        <th><label>Gerencia de Area:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-23"></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-23"></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Gerencia de RRHH:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-23"></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-25"></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Presidencia:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-25"></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-25"></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Jefe de S/E:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-25"></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-26"></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Analista S/E:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-26"></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-26"></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Gerente de Area *5:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-26"></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-28"></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Analista S/E *6:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-28"></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-28"></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Consultoria Juridica:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-28"></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-29"></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Analista S/E 8*:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-29"></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="2018-07-29"></th>
      </tr>
    </thead>
  </table>
      </fieldset>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn guardar" data-dismiss="modal">Cerrar</button>
        </div>
      </div>

    </div>
  </div>








</body>
</html>