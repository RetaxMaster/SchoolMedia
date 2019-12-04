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
    <script src="' . JS_DIR . '/cs_recibo_conf_ajax.js"></script>
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
                                <label for="" class="col-sm-2 col-form-label">Cabecera de factura<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Pais -->
                                  <div class="form-group">
                                    <select id="idfact" name="idfact" class="form-control required">
                                      <option value="-1">{$idfact}</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Cotización aprobada<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Pais -->
                                  <div class="form-group">
                                    <select id="idcot" name="idcot" class="form-control required">
                                      <option value="-1">{$idcot}</option>
                                      <option value="1">Cotización genérica</option>
                                    </select>
                                  </div>
                                </div>
                                <label for="" class="col-sm-2 col-form-label">Forma de pago<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Pais -->
                                  <div class="form-group">
                                    <select id="fp" name="fp" class="form-control required">
                                      <option value="-1">{$fp}</option>
                                      <option value="1">Forma de pago genérica</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nombre de la forma de pago</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="descrip" name="descrip" placeholder="Nombre de la forma de pago">
                                </div>
                                <label for="" class="col-sm-2 col-form-label">Fecha</label>
                                <div class="col-sm-4">
                                  <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Descripción de la forma de pago</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="txdescrip" name="txdescrip" placeholder="Descripción de la forma de pago">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Monto</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="monto" name="monto" placeholder="Monto">
                                </div>
                                <label for="" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-3">
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="enabled" value="1">
                                    <label class="custom-control-label" for="customCheck1">Aprobado <span class="iconObligatorio">*</span> (Si/No)</label>
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