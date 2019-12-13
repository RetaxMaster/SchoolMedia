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
                "boxTitle",
                "boxText",
                "tblCol1",
                "tblCol2",
                "tblCol3",
                "tblCol4",
                "tblCol5",
                "tblCol6",
                "tblCol7",
                "tblCol8",
                "idBtnNuevo"
            ], 
            "attrsx" :
            [
                "{$boxTitle}",
                "{$boxText}",
                "{$tblCol1}",
                "{$tblCol2}",
                "{$tblCol3}",
                "{$tblCol4}",
                "{$tblCol5}",
                "{$tblCol6}",
                "{$tblCol7}",
                "{$tblCol8}",
                "{$idBtnNuevo}"
            ], 
            "txts" : ' . $wpContentStr_Labels . '
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="' . $Lang . '";

 </script>

    <!-- JavaScripts External Files -->
    <script src="' . JS_DIR . '/cs_standars_functions.js"></script>
    <script src="' . JS_DIR . '/cs_conv_cont_conf_ajax.js"></script>
    <script src="' . JS_DIR . '/cs_ctry_ajax.js"></script>


</head>'; ?>
<!------------------------------------ BODY ------------------------------------->

<body onload="javascript:init()">
  <!-- sidebar-wrapper  -->
  <? include(INCLUDES_DIR . "/menu.php"); ?>

  <!-- header | Barra suprior -->
  <main class="page-content">
    <? include(INCLUDES_DIR . "/soft_head.php"); ?>

    <!-- Seccion Paises -->
    <section id="idSecInterior">
      <div class="container">

        <!-- Titulo -->
        <div class="row">
          <div class="col-lg-12">
            <div class="cajaTitulo">
              <h6 id="boxTitle" class="text-center">{$boxTitle}</h6>
            </div>
          </div>
        </div>

        <!-- Logo Paises -->
        <div class="row">
          <div class="col-lg-12">
            <div class="contIcono">
              <i class="fas fa-globe"></i>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Tabla -->
            <div class="contTabla">
              <div class="tituloTabla">
                <h6 id="boxText">{$boxText}</h6>
              </div>
              <div class="contenido-tabla">
                <div id="ContTablaVerTodos">
                  <table id="tablaVerTodos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th id="tblCol1">{$tblCol1}</th>
                        <th id="tblCol2">{$tblCol2}</th>
                        <th id="tblCol3">{$tblCol3}</th>
                        <th id="tblCol4">{$tblCol4}</th>
                        <th id="tblCol5">{$tblCol5}</th>
                        <th id="tblCol6">{$tblCol6}</th>
                        <th id="tblCol7">{$tblCol7}</th>
                        <th id="tblCol8">{$tblCol8}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
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

        <!-- MODAL DATOS GENERALES DE CLIENTE -->
        <div class="modal fade bd-example-modal-lg" id="ModalVerTodos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <center>
                  <h2 class="estilo-titulo">Nuevo valor</h2>
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
                                <label for="" class="col-sm-2 col-form-label">Contrato<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control required" id="codctto" name="codctto" placeholder="Contrato">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Cliente<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Pais -->
                                  <div class="form-group">
                                    <select id="cliente" name="cliente" class="form-control required">
                                      <option value="-1">{$cliente}</option>
                                    </select>
                                  </div>
                                </div>
                                <label for="" class="col-sm-2 col-form-label">Tipo de cliente<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Pais -->
                                  <div class="form-group">
                                    <select id="tipo" name="tipo" class="form-control required">
                                      <option value="-1">{$tipo}</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Fecha inicio</label>
                                <div class="col-sm-4">
                                  <input type="date" class="form-control" id="fini" name="fini" placeholder="Fecha inicio" value="<?= date("Y-m-d") ?>">
                                </div>
                                <label for="" class="col-sm-2 col-form-label">Fecha fin<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <input type="date" class="form-control required" id="ffin" name="ffin" placeholder="Fecha fin" value="<?= date("Y-m-d") ?>">
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
                                    <select id="Provincia" name="provincia" class="form-control required">
                                      <option value="-1">{$Provincia}</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Ciclo pub<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Pais -->
                                  <div class="form-group">
                                    <select id="ciclopub" name="ciclopub" class="form-control required">
                                      <option value="1">1</option>
                                    </select>
                                  </div>
                                </div>
                                <label for="" class="col-sm-2 col-form-label">Ciclo valor<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Provincia -->
                                  <div class="form-group">
                                    <select id="ciclovalor" name="ciclovalor" class="form-control required">
                                      <option value="1">1</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Cantidad contratada<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <input type="number" class="form-control" id="cantcur" name="cantcur" placeholder="Cantidad contratada">
                                </div>
                                <label for="" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-3">
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="enabled" value="1">
                                    <label class="custom-control-label" for="customCheck1">Convenios y contratos disponibles habilitados <span class="iconObligatorio">*</span> (Si/No)</label>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-lg-2 col-form-label">Descripción</label>
                                <div class="col-lg-10">
                                  <textarea type="" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
                                </div>
                              </div>
                              <div class="row" id="uploadDocs">
                                <label class="col-sm-2 col-form-label" for="nombre">Adjunta archivos:</label>
                                <div class="col-sm-4">
                                  <div class="input-group">
                                    <input type="file" class="form-control-file" id="documents" multiple>
                                  </div>
                                </div>
                                <div class="col-sm-12 mb-5">
                                  <div class="items-container row" id="all-images">
                                    <!-- <div class="col-sm-4 item-container">
                                        <div class="card">
                                          <span>Item</span>
                                        </div>
                                      </div> -->
                                  </div>
                                  <div class="all-documents">
                                    <a href="./files_conf.php?Lang=<?php echo $Lang; ?>&wph=23" target="_blank">
                                      <button type="button" class="btn btn-primary">Ver documentos cargados</button>
                                    </a>
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

      </div>
    </section>

  </main>

  <!-------------------------------------------------- FOOTER -------------------------------------------->
  <?
  include_once(INCLUDES_DIR . "/footer.php");
  ?>

</body>

</html>