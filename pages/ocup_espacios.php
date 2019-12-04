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
                "text10",
                "text11"
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
                "{$text10}",
                "{$text11}"
            ], 
            "txts" : ' . $wpContentStr_Labels . '
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="' . $Lang . '";

 </script>

    <!-- JavaScripts External Files -->
    <script src="' . JS_DIR . '/cs_standars_functions.js"></script>
    <script src="' . JS_DIR . '/cs_ocup_espacios_conf_ajax.js"></script>
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
                  <label for="Provincia" class="col-sm-3 col-form-label" id="text4">{$text4}</label><br>
                  <select id="Provincia" name="locality" class="form-control col-sm-3">
                    <option value="-1">Seleccione</option>
                  </select>
                </div>

                <!-- Dropdown Seleccionar Tipo Cliente -->
                <div class="form-group">
                  <label for="tpub" class="col-sm-3 col-form-label" id="text4">Tipo de publicidad</label><br>
                  <select id="tpub" name="locality" class="form-control col-sm-3">
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
                        <th id="text11">{$text11}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
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
            <h2 class="estilo-titulo">Datos de espacios publicitarios registrados</h2>
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
                          <label for="" class="col-sm-2 col-form-label">Tipo de publicidad<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <!-- Dropdown Seleccionar Pais -->
                            <div class="form-group">
                              <select id="tpub2" name="tpub2" class="form-control required">
                                <option value="-1">{$tpub2}</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">

                          <label for="" class="col-sm-2 col-form-label">Cliente<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <!-- Dropdown Seleccionar Pais -->
                            <div class="form-group">
                              <select id="tcliente" name="tcliente" class="form-control required">
                                <option value="-1">{$tcliente}</option>
                              </select>
                            </div>
                          </div>

                          <label for="" class="col-sm-2 col-form-label">Código</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="cod" name="cod" placeholder="Código">
                          </div>

                        </div>
                        <div class="form-group row">

                          <label for="" class="col-sm-2 col-form-label">Cara</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="cara" name="cara" placeholder="Cara">
                          </div>

                          <label for="" class="col-sm-1 col-form-label">Ancho</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="width" name="weight" placeholder="Ancho">
                          </div>

                          <label for="" class="col-sm-1 col-form-label">Alto</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="height" name="heigth" placeholder="Alto">
                          </div>

                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Pais<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <!-- Dropdown Seleccionar Pais -->
                            <div class="form-group">
                              <select id="country" name="pais" class="form-control required">
                                <option value="-1">{$country}</option>
                              </select>
                            </div>
                          </div>
                          <label for="" class="col-sm-2 col-form-label">Provincia<span class="iconObligatorio">*<span></label>
                          <div class="col-sm-4">
                            <!-- Dropdown Seleccionar Provincia -->
                            <div class="form-group">
                              <select id="Provincia2" name="provincia2" class="form-control required">
                                <option value="-1">{$Provincia2}</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-3">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck1" name="enabledPunb" value="1">
                              <label class="custom-control-label" for="customCheck1">Publicidad disponible <span class="iconObligatorio">*</span> (Si/No)</label>
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