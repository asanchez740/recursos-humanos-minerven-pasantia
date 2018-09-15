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
          <button type="button" class=" btn btn-info" data-dismiss="modal">Cerrar</button>
                              <!-- class="btn guardar" -->
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
        <div class="modal-header" style="background-color: #e82525; color: white;font-family: 'Arial, Helvetica, sans-serif';">
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
<!--******************************************************************************************
******************************** SEGUIMIENTO DE LA SOLICITUD**********************************
*******************************************************************************************-->

  <div class="modal fade" id="seguimiento" role="dialog">
    <div class="modal-dialog" style=" width: 80% !important;">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #859281; color: white;font-family: 'Arial, Helvetica, sans-serif';">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;"><strong>Seguimiento de Solicitud N° <?php echo "SP-000-001"?></strong></h4>
        </div>
        <div class="modal-body" style="text-align: center;">
          <div align="center">
            <form method="post" style="width:90%;" class="form">
            <fieldset disabled>
              <table class="table table-hover">
    <thead class="thead-dark">
      <tr class="encabezado-seguimiento">
        <th><label>Gerencia RRHH:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Presidencia:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Seleccion y Empleo:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Gerencia Solicitante:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value="<?php echo "20-05-2018"?>"></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Consultoria Jurídica:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
      </tr>
      <tr class="encabezado-seguimiento">
        <th><label>Seleccion y Empleo:</label></th>
        <th><label class="detalle-seguimiento">Entrada:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
        <th><label class="detalle-seguimiento">Salida:</label></th>
        <th><input type="text" class="form-control fondo-input" style="width:80%; font-size: 15px" value=""></th>
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

<!--******************************************************************************************
********************************INFORMACION PERSONAL DEL ELEGIBLE*****************************
*******************************************************************************************-->
<div class="modal fade" id="info_personal" role="dialog">
    <div class="modal-dialog" style=" width: 70% !important;">
      <div class="modal-content">
       <div class="modal-header" style="background-color: #006699;color: white;font-family: 'Arial, Helvetica, sans-serif';">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;"><strong> Roxana Endrina</strong></h4>
        </div>
        <div class="modal-body" style="text-align: center;">
        <div align="center">
            <form method="post" style="width:90%;" class="form1">
              <div class="inputs" align="center">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#datos">Datos Personales</a></li>
                  <li><a data-toggle="tab" href="#academicos">Datos Academicos</a></li>
                  <li><a data-toggle="tab" href="#exp_laboral">Experiencia Laboral</a></li>
                  <li><a data-toggle="tab" href="#cursos_realizados">Cursos Realizados</a></li>
                </ul>
              </div>
              <div class="sep" style="width: 90%"></div>
            <fieldset disabled>
              <div class="tab-content">
                <div id="datos" class="tab-pane fade in active">
                  <div id="datos"></div>
                </div>
                <div id="academicos" class="tab-pane fade">
                  <div id="academicos"></div>
                </div>
                <div id="exp_laboral" class="tab-pane fade">
                  <div id="exp_laboral"></div>
                </div>
                <div id="cursos_realizados" class="tab-pane fade">
                  <div id="cursos_realizados"></div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group" id="error_div"></div>

              <input type="hidden" id="control" name="control"  value="1" />
            </fieldset>
        <script type="text/javascript">
            $(document).ready(function(){
              $("#datos").load('<?php echo base_url()?>Informatica/Solicitud_personal/cargar_input_personales', {});
              $("#academicos").load('<?php echo base_url()?>Informatica/Solicitud_personal/cargar_input_academicos', {});
              $("#exp_laboral").load('<?php echo base_url()?>Informatica/Solicitud_personal/cargar_input_exp_laboral', {});
              $("#cursos_realizados").load('<?php echo base_url()?>Informatica/Solicitud_personal/cargar_input_cursos_realizados', {});
            })
        </script>
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

</body>
</html>