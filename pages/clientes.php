<?php

//------------------------------------------------ HEAD HTML ------------------------------------------------->
include_once(INCLUDES_DIR . "/meta_head.php");
echo '<!-- Custom JavaScripts Functions Needs
    ================================================== -->
    <!-- JavaScripts Global Vars -->
    <script>

    function init(){
      setCookie("' . $sUID . '"); 
      setCookie("' . $sUSS . '");
      onPageStart(); 
    }

// Se guardan todos los labels
        var global_txtObj={
            "components_ids" : 
            [
                "text1",
                "text2",
                "text3",
                "text4",
                "text5",
                "text6",
                "text7",
                "text8",
                "text9",
                "text10"
            ], 
            "attrsx" :
            [
                "{$text1}",
                "{$text2}",
                "{$text3}",
                "{$text4}",
                "{$text5}",
                "{$text6}",
                "{$text7}",
                "{$text8}",
                "{$text9}",
                "{$text10}"
            ], 
            "txts" : ' . $wpContentStr_Labels . '
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="' . $Lang . '";

 </script>

    <!-- JavaScripts External Files -->
    <script src="' . JS_DIR . '/cs_standars_functions.js"></script>
    <script src="' . JS_DIR . '/cs_clientes_conf_ajax.js"></script>
    <script src="' . JS_DIR . '/cs_ctry_ajax.js"></script>

</head>'; ?>
<!------------------------------------ BODY ------------------------------------->

<body onload="javascript:init()">
  <!-- sidebar-wrapper  -->
  <? include(INCLUDES_DIR . "/menu.php"); ?>

  <!-- header | Barra suprior -->
  <main class="page-content">
    <? include(INCLUDES_DIR . "/soft_head.php"); ?>

    <!-- Sección Provincias -->
    <section id="idSecInterior">
      <div class="container">

        <!-- Titulo -->
        <div class="row">
          <div class="col-lg-12">
            <div class="cajaTitulo">
              <h6 class="text-center" id="text1">{$text1}</h6>
            </div>
          </div>
        </div>



        <!-- Logo Clientes -->
        <div class="row">
          <div class="col-lg-12">
            <div class="contIcono">
              <i class="fa fa-handshake"></i>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Tabla -->
            <div class="contTabla">
              <div class="tituloTabla">
                <h6 id="text2">{$text2}</h6>
              </div>
              <div class="contenido-tabla">
                <!-- Dropdown Seleccionar Paises -->
                <div class="form-group">
                  <label for="selectCtry" class="col-sm-3 col-form-label" id="text3">{$text3}</label><br>
                  <select id="selectCtry" name="locality" class="form-control col-sm-3">
                    <option value="-1" id="selectCtry">{$selectCtry}</option>
                  </select>
                </div>

                <!-- Dropdown Seleccionar Tipo Cliente -->
                <div class="form-group">
                  <label for="tipoCliente" class="col-sm-3 col-form-label" id="text4">{$text4}</label><br>
                  <select id="tipoCliente" name="locality" class="form-control col-sm-3">
                    <option value="-1">Seleccione</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-12">
            <!-- Tabla -->
            <div class="contTabla">
              <div class="tituloTabla">
                <h6 id="text5">{$text5}</h6>
              </div>
              <div class="contenido-tabla">
                <div id="ContTablaVerTodos">
                  <table id="tablaVerTodos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th id="text6">{$text6}</th>
                        <th id="text7">{$text7}</th>
                        <th id="text8">{$text8}</th>
                        <th id="text9">{$text9}</th>
                        <th id="text10">{$text10}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                          <a href="" data-toggle="tooltip" data-placement="top" title="Accion cliente"><i class="fa fa-handshake"></i></a>
                          <!-- <a href="" data-toggle="tooltip" data-placement="top" title="Activar registro"><i class="fas fa-toggle-off"></i></a> -->
                          <a href="" data-toggle="tooltip" data-placement="top" title="Activar registro">
                            <div class="custom-control custom-switch contcheckboxActivar">
                              <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                              <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                    <!-- tfoot>
                          <tr>
                              <th>Col 1</th>
                              <th>Col 2</th>
                              <th>Col 3</th>
                              <th>Acciones</th>
                          </tr>
                      </tfoot !-->
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="contBtnSuccess">
              <button id="idBtnNuevo" class="btn btnSuccess" data-toggle="modal" data-target="#ModalVerTodos"><i class="far fa-plus-square"></i>Nuevo</button>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- MODAL DATOS GENERALES DE CLIENTE -->
  <div class="modal fade bd-example-modal-lg" id="ModalVerTodos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h2 class="estilo-titulo">Datos Generales de "Nombre Cliente"</h2>
          </center>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="closeModal" aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <!-- Sección formulario de datos  -->
          <section id="">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <form id="idFormDetalles" action="">
                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">id</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="idCliente" name="idCliente" placeholder="id" disabled>
                          </div>
                          <label for="" class="col-sm-2 col-form-label">R.U.C.<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="rucCliente" name="rucCliente" placeholder="R.U.C">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Razón Social<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="razSocCliente" name="razSocCliente" placeholder="Razón Social">
                          </div>
                          <label for="" class="col-sm-2 col-form-label">Dirección</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="dirCliente" name="dirCliente" placeholder="Dirección">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Pais<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <!-- Dropdown Seleccionar Pais -->
                            <div class="form-group">
                              <select id="country" name="locality" class="form-control">
                                <option value="-1">{$country}</option>
                              </select>
                            </div>
                          </div>
                          <label for="" class="col-sm-2 col-form-label">Provincia<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <!-- Dropdown Seleccionar Provincia -->
                            <div class="form-group">
                              <select id="Provincia" name="locality" class="form-control">
                                <option value="-1">{$Provincia}</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Código internacional</label>
                          <div class="col-sm-4">
                            <!-- Dropdown Seleccionar -->
                            <div class="form-group">
                              <select id="CodPais1" name="locality" class="form-control">
                                <option value="-1">Selecciona</option>
                              </select>
                            </div>
                          </div>
                          <label for="" class="col-sm-2 col-form-label">Teléfono</label>
                          <div class="col-sm-2">
                            <input type="number" class="form-control" id="telCliente" name="telCliente" placeholder="Teléfono">
                          </div>
                          <div class="col-sm-2">
                            <label class="sr-only" for="extCliente">Username</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Ext</div>
                              </div>
                              <input type="number" class="form-control" id="extCliente" placeholder="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Código internacional</label>
                          <div class="col-sm-4">
                            <!-- Dropdown Seleccionar -->
                            <div class="form-group">
                              <select id="CodPais2" name="locality" class="form-control">
                                <option value="-1">Selecciona</option>
                              </select>
                            </div>
                          </div>
                          <label for="" class="col-sm-2 col-form-label">Celular</label>
                          <div class="col-sm-4">
                            <input type="number" class="form-control" id="celCliente" name="telCliente" placeholder="Celular">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-4">
                            <label class="sr-only" for="httpCliente"></label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">HTTP</div>
                              </div>
                              <input type="text" class="form-control" id="httpCliente" placeholder="">
                            </div>
                          </div>
                          <label for="" class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-4">
                            <label class="sr-only" for="emailCliente"></label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                              </div>
                              <input type="text" class="form-control" id="emailCliente" placeholder="eMail">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Clasificación de cliente<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <!-- Dropdown Seleccionar -->
                            <div class="form-group">
                              <select id="clasificacionCliente" name="locality" class="form-control">
                                <option value="-1">Selecciona</option>
                              </select>
                            </div>
                          </div>
                          <label for="" class="col-sm-2 col-form-label">Calificación del cliente<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <i class="fas fa-star fa-2x starCalifCliente"></i>
                            <i class="fas fa-star fa-2x starCalifCliente"></i>
                            <i class="fas fa-star fa-2x starCalifCliente"></i>
                            <i class="fas fa-star fa-2x starCalifCliente"></i>
                            <i class="fas fa-star fa-2x starCalifCliente"></i>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Observaciones</label>
                          <div class="col-sm-10">
                            <textarea type="" class="form-control" id="observCliente" name="observCliente" placeholder="Observaciones"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Tipo de cliente<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <!-- Dropdown Seleccionar Pais -->
                            <div class="form-group">
                              <select id="tipoCliente2" name="locality" class="form-control">
                                <option value="-1">Selecciona</option>
                              </select>
                            </div>
                          </div>
                          <label for="" class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-3">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck1">
                              <label class="custom-control-label" for="customCheck1">Cliente habilitado <span class="iconObligatorio">*</span> (Si/No)</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="contBtnCancel">
                              <button type="button" id="idBtnLimpiar" class="btn btnCancel">Limpiar</button>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="contBtnSuccess">
                              <button type="submit" id="idBtnAceptar" class="btn btnSuccess">Guardar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <?
  include_once(INCLUDES_DIR . "/footer.php");
  ?>

  <!-- ESTILO MENU SELECCIONADO -->
  <script>
    $('.relClientes i').css('color', '#fbb616');
    $('.relClientes a').addClass('activeMenu');
    $('.relClientes').addClass('active');
  </script>

</body>

</html>