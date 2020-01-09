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
    <script src="' . JS_DIR . '/cs_facturacion_conf_ajax.js"></script>
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
              <h6 class="text-center">FACTURACIÓN</h6>
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
            <div class="contFormularioCreacion">
              <div class="tituloTabla">
                <h6>Datos del cliente</h6>
              </div>
              <form id="idFormCreacion" action="">
                <div class="form-row">
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">ID (FSid)</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="idCliente" name="idCliente" placeholder="ID Cliente" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Nro. Ctto.</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="Ctto" name="Ctto" placeholder="Nro. Ctto.">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Fecha</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="Fecha" name="Fecha" placeholder="Fecha" disabled>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Razón Social</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="Razon" name="Razon" placeholder="Razón Social" disabled>
                      </div>
                      <div class="col-md-3">
                        <a class="aRazon" href="#"><i class="far fa-plus-square"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">R.U.C</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="ruc" name="ruc" placeholder="R.U.C" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Teléfono</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" disabled>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Dirección</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="direccion" name="direccion" placeholder="Dirección" disabled></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Cotización asociada</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="cotiza" name="cotiza" placeholder="Cotización asociada" disabled>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">País</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="pais" name="pais" placeholder="País" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Provincia</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="contBtnSuccess">
                      <button type="submit" id="idBtnAceptar" class="btn btnSuccess">Facturar</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-12">
            <div class="contFormularioCreacion">
              <div class="tituloTabla">
                <h6>Condiciones de Pago</h6>
              </div>
              <form id="idFormCreacion" action="">

                <div class="form-row">
                  <div class="col-lg-5 col-md-5">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Factura fiscal asociada</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="facturafiscal" name="facturafiscal" placeholder="Factura fiscal asociada">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <div class="col-md-11">
                        <select class="form-control" id="telefono">
                          <option value="0">Plazo de pago</option>
                          <option value="0">Contado</option>
                          <option value="0">Crédito</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Cantidad Días</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="dias" name="dias" placeholder="Cantidad Días">
                      </div>
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <!-- Tabla -->
            <div class="contTabla">
              <div class="tituloTabla">
                <h6>Detalles de Facturación</h6>
              </div>
              <div class="contenido-tabla">
                <div id="ContTablaVerTodos">
                  <table id="tablaVerTodos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Cant</th>
                        <th>Precio</th>
                        <th>Impuesto</th>
                        <th>Total-Imp</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                          <a href="" data-toggle="tooltip" data-placement="top" title="Accion cliente"><i class="fa fa-handshake"></i></a>
                          <a href="" data-toggle="tooltip" data-placement="top" title="Activar registro">
                            <div class="custom-control custom-switch contcheckboxActivar">
                              <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                              <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                          <a href="" data-toggle="tooltip" data-placement="top" title="Accion cliente"><i class="fa fa-handshake"></i></a>
                          <a href="" data-toggle="tooltip" data-placement="top" title="Activar registro">
                            <div class="custom-control custom-switch contcheckboxActivar">
                              <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                              <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                          <a href="" data-toggle="tooltip" data-placement="top" title="Accion cliente"><i class="fa fa-handshake"></i></a>
                          <a href="" data-toggle="tooltip" data-placement="top" title="Activar registro">
                            <div class="custom-control custom-switch contcheckboxActivar">
                              <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                              <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#ModalVerTodos" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                          <a href="" data-toggle="tooltip" data-placement="top" title="Accion cliente"><i class="fa fa-handshake"></i></a>
                          <a href="" data-toggle="tooltip" data-placement="top" title="Activar registro">
                            <div class="custom-control custom-switch contcheckboxActivar">
                              <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                              <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                          </a>
                        </td>
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
            <!-- Tabla -->
            <div class="contTabla">
              <div class="tituloTabla">
                <h6>Resumen de costos</h6>
              </div>
              <div class="contenido-tabla">
                <div id="ContTablaVerTodos">
                  <table id="resuCostos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Usuario</th>
                        <th>Nombre Comisión</th>
                        <th>Valor Porcentual</th>
                        <th>Comis. Total de línea</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row padd">
                <div class="col-lg-12">
                  <div class="contBtnSuccess">
                    <button id="idBtnNuevo" class="btn btnSuccess"><i class="far fa-plus-square"></i>Comisión</button>
                  </div>
                </div>
              </div>
              <div class="form-row padd">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Subtotal</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Subtotal" name="Subtotal" placeholder="Subtotal" disabled>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Total</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Total" name="Total" placeholder="Total" disabled>
                    </div>
                  </div>
                </div>
              </div>

              <div class="contenido-tabla">
                <div id="ContTablaVerTodos">
                  <table id="tablaImpuesto" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Impuesto</th>
                        <th>Valor (%)</th>
                        <th>B. impo x impu</th>
                        <th>Impu. total de línea</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="form-row padd">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Observación</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="observacion" name="observacion" placeholder="Observación" disabled></textarea>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="contBtnSuccess">
              <button id="idBtnNuevo" class="btn btnSuccess"><i class="far fa-plus-square"></i>Cotizar</button>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>


  <? include_once(INCLUDES_DIR . "/footer.php"); ?>


  <script>
    $('.contable i').css('color', '#fbb616');
    $('.contable a').addClass('activeMenu');
    $('.contable').addClass('active');
  </script>

</body>

</html>