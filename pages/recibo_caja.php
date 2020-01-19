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
                "boxTitle"
            ], 
            "attrsx" :
            [
                "{$boxTitle}"
            ], 
            "txts" : ' . $wpContentStr_Labels . '
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="' . $Lang . '";

 </script>

    <!-- JavaScripts External Files -->
    <script src="' . JS_DIR . '/cs_standars_functions.js"></script>
    <script src="' . JS_DIR . '/cs_recibo_caja_conf_ajax.js"></script>
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

        <span id="boxTitle" style="display: none;">${boxTitle}</span>

        <!-- Titulo -->
        <div class="row">
          <div class="col-lg-12">
            <div class="cajaTitulo">
              <h6 class="text-center">RECIBO DE CAJA</h6>
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
                <h6>Datos del recibo</h6>
              </div>
              <form id="idFormCreacion" action="">
                <div class="form-row">
                  <div class="dropdown col-sm-4">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="ClienteDD" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Click para buscar
                    </button>
                    <div class="dropdown-menu" aria-labelledby="ClienteDD">
                      <input type="search" class="form-control form-control-sm inputBuscarProvi search-clientes" placeholder="Escriba para buscar..." aria-controls="">
                      <div class="results"></div>
                    </div>
                    <input type="hidden" name="cliente" id="Cliente" class="dropdown-value">
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">R.U.C.</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="ruc" name="ruc" placeholder="R.U.C.">
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
                      <label for="" class="col-sm-3 col-form-label">Nro. Ctto.</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="Ctto" name="Ctto" placeholder="Nro. Ctto.">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <div class="col-md-11">
                        <select class="form-control" id="facturas">
                          <option value="0">Facturas pendientes</option>
                          <option value="0">35</option>
                          <option value="0">42</option>
                        </select>
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
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <div class="col-md-11">
                        <select class="form-control" id="pagoAprobado">
                          <option value="0">Pago Aprobado</option>
                          <option value="0">SI</option>
                          <option value="0">NO</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Pais<span class="iconObligatorio">*<span></label>
                  <div class="col-sm-4">
                    <!-- Dropdown Seleccionar Pais -->
                    <div class="form-group">
                      <select id="country" name="pais" class="form-control required" disabled>
                        <option value="-1">{$country}</option>
                      </select>
                    </div>
                  </div>
                  <label for="" class="col-sm-2 col-form-label">Provincia<span class="iconObligatorio">*<span></label>
                  <div class="col-sm-4">
                    <!-- Dropdown Seleccionar Provincia -->
                    <div class="form-group">
                      <select id="Provincia" name="provincia" class="form-control required" disabled>
                        <option value="-1">{$Provincia}</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <div class="col-md-10">
                        <select class="form-control" id="pagadaTotalmente">
                          <option value="0">Factura pagada totalmente</option>
                          <option value="0">SI</option>
                          <option value="0">NO</option>
                        </select>
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
                <h6>Resumen de Pago</h6>
              </div>
              <div class="contenido-tabla">
                <div id="ContTablaVerTodos">
                  <table id="tablaVerTodos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Forma de pago</th>
                        <th>Observación de la Tx</th>
                        <th>Monto</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="#" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="#" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="#" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="#" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row padd">
                <div class="form-group row">

                  <div class="col-sm-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-12 col-form-label">Forma de pago</label>
                      <div class="col-sm-12">
                        <select id="fp" name="fp" class="form-control required">
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-12 col-form-label">Observacion</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="ObservacionPago" name="ObservacionPago" placeholder="Observacion">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-12 col-form-label">Monto</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="Monto" name="Monto" placeholder="Monto">
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="contBtnSuccess">
                    <button id="addPayment" class="btn btnSuccess"><i class="far fa-plus-square"></i>Añadir</button>
                  </div>
                </div>
              </div>
              <div class="form-row padd">
                <div class="col-lg-7 col-md-7">
                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Total facturado</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="facturado" name="facturado" placeholder="Total" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Total Abonado</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="Abonado" name="Abonado" placeholder="Subtotal" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Total en este Abono</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="Abono" name="Abono" placeholder="Subtotal" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Saldo pendiente</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="pendiente" name="pendiente" placeholder="Subtotal" disabled>
                    </div>
                  </div>
                </div>
              </div>
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