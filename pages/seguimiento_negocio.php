<!------------------------------------ 
Nombre: tbl_crmtracks
Alias: tbl_0012
    id_track
    id_cclient
    id_client
    id_user
    id_proc
    id_subproc
    descrip
    fcontact
------------------------------------->
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
                "idBtnNuevo",
                "text11",
                "text12",
                "text13",
                "text14",
                "text15",
                "text16",
                "text17",
                "idBtnLimpiar",
                "idBtnAceptar",
                "idBtnClose",
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
              "{$idBtnNuevo}",
              "{$text11}",
              "{$text12}",
              "{$text13}",
              "{$text14}",
              "{$text15}",
              "{$text16}",
              "{$text17}",
              "{$idBtnLimpiar}",
              "{$idBtnAceptar}",
              "{$idBtnClose}"
          ], 
            "txts" : ' . $wpContentStr_Labels . '
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="' . $Lang . '";
        global_default="' . $wpContentArry_Labels[4] . '";  /* Define el valor por defecto de la lista */

 </script>

    <!-- JavaScripts External Files -->
    <script src="' . JS_DIR . '/cs_standars_functions.js"></script>
    <script src="' . JS_DIR . '/cs_seg_clientes_conf_ajax.js"></script>
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
              <h6 id="text1" class="text-center">{$text1}</h6>
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
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></span></td>
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
              <button id="idBtnNuevo" class="btn btnSuccess" data-toggle="modal" data-target="#ModalVerTodos">{$idBtnNuevo}</button>
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
            <h2 class="estilo-titulo">"{$text}"</h2>
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
                          <label for="" class="col-sm-2 col-form-label" id="text11">{$text11}</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="id_track" name="id_track" placeholder="id" disabled>
                          </div>
                          <label for="" class="col-sm-2 col-form-label" id="text12">{$text12}<span class="iconObligatorio">*<span></label>
                          <!-- Dropdown Seleccionar cliente -->
                          <div class="dropdown col-sm-4">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="ClienteDD" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Click para buscar
                            </button>
                            <div class="dropdown-menu" aria-labelledby="ClienteDD">
                              <input type="search" class="form-control form-control-sm inputBuscarProvi search-clientes" placeholder="Escriba para buscar..." aria-controls="">
                              <div class="results"></div>
                            </div>
                            <input type="hidden" name="client" id="client" class="dropdown-value">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label" id="text13">{$text13}<span class="iconObligatorio">*<span></label>
                          <!-- Dropdown Seleccionar cliente -->
                          <div class="col-sm-4">
                            <div class="contDropdown">
                              <select id="contacto" name="contacto" class="form-control">
                                <option value="-1">{$contacto}</option>
                              </select>
                            </div>
                          </div>
                          <label for="" class="col-sm-2 col-form-label" id="text14">{$text14}<span class="iconObligatorio">*<span></label>
                          <!-- Dropdown Seleccionar cliente -->
                          <div class="col-sm-4">
                            <div class="contDropdown">
                              <select id="etapa" name="etapa" class="form-control">
                                <option value="-1">{$etapa}</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label" id="text15">{$text15}<span class="iconObligatorio">*<span></label>
                          <!-- Dropdown Seleccionar cliente -->
                          <div class="col-sm-4">
                            <div class="contDropdown">
                              <select id="accion" name="accion" class="form-control">
                                <option value="-1">{$accion}</option>
                              </select>
                            </div>
                          </div>
                          <label for="" class="col-sm-2 col-form-label" id="text17">{$text17}<span class="iconObligatorio">*<span></label>
                          <!-- Dropdown Seleccionar cliente -->
                          <div class="col-sm-4">
                            <div class="contDropdown">
                              <select id="usuario" name="usuario" class="form-control">
                                <option value="-1">{$usuario}</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label" id="text16">{$text16}</label>
                          <div class="col-sm-10">
                            <textarea type="" class="form-control" id="actividad" name="actividad" placeholder="Actividad realizada"></textarea>
                          </div>
                        </div>

                        <div class="row" id="action-buttons">
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="contBtnCancel">
                              <button type="button" id="idBtnLimpiar" class="btn btnCancel">{$idBtnLimpiar}</button>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="contBtnSuccess">
                              <button type="submit" id="idBtnAceptar" class="btn btnSuccess">{$idBtnAceptar}</button>
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
          <button type="button" class="btn btn-default" data-dismiss="modal" id="idBtnClose">{$idBtnClose}</button>
        </div>
      </div>
    </div>
  </div>


  <!-------------------------------------------------- FOOTER -------------------------------------------->
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