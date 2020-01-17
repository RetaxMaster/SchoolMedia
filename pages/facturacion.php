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
    <script src="' . JS_DIR . '/cs_facturacion_conf_ajax.js"></script>
    <script src="' . JS_DIR . '/cs_ctry_ajax.js"></script>

    <style>
    .products {
        padding: 10px;
        border-bottom: 1px solid #ccc !important;
        cursor: pointer;
        transition: 0.3s all ease;
    }

    .products:hover {
        background: #efefef;
    }

    .all-products {
      max-height: 231px;
      overflow-y: auto;
      overflow-x: hidden;
    }
    </style>

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
              <h6 class="text-center">COTIZACIÓN</h6>
              <span id="boxTitle" style="display:none;">${boxTitle}</span>
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
        <!-- Dropdown Seleccionar Tipo Cliente -->
        <!-- <div class="row">
            <div class="col-lg-12">
              <div class="contDropdown">
              <div class="btn-group">
                  <button type="button" class="btn btn-primary">Tipo de cliente</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div id="dropTipoClientes" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <input type="search" class="form-control form-control-sm inputBuscarProvi" placeholder="Escriba para buscar..." aria-controls="">
                    <button class="dropdown-item" type="button">...</button>
                  </div>
                </div>
              </div>              
            </div>          
          </div> -->


        <div class="row">
          <div class="col-lg-12">
            <div class="contFormularioCreacion">
              <div class="tituloTabla">
                <h6>Datos del cliente</h6>
              </div>
              <form id="idFormCreacion" action="">
                <div class="form-row">
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">ID (FSid)</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="idCliente" name="idCliente" placeholder="ID Cliente" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Fecha</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="FechaFac" name="FechaFac" placeholder="Fecha Facturación" disabled>
                      </div>
                    </div>
                  </div>
                </div>

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
                        <input type="text" class="form-control" id="telefonoCliente" name="telefonoCliente" placeholder="Teléfono" disabled>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-lg-12">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Dirección</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="direccion" name="direccion" placeholder="Dirección" disabled></textarea>
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
                  <div class="col-8"></div>
                  <div class="col-lg-4 col-md-4">
                    <div class="contBtnSuccess">
                      <button type="button" id="Facturar" class="btn btnSuccess">Facturar</button>
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
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label">Prefactura</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="Prefactura" name="Prefactura" placeholder="Prefactura">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group row">
                      <div class="col-md-11">
                        <select class="form-control" id="ppagoCC">
                          <option value="0">Plazo de pago</option>
                          <option value="1">Contado</option>
                          <option value="2">Crédito</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
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

        <div class="modal fade bd-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <center>
                  <h2 class="estilo-titulo">Editar registro</h2>
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
                                <label for="editCant">Cantidad de productos</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control required" id="editCant" name="editCant" placeholder="Cantidad de productos">
                                </div>
                                <label for="editCant">Precio unitario</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control required" id="editPrecio" name="editPrecio" placeholder="Precio unitario">
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
                                    <button type="button" id="saveEdit" class="btn btnSuccess">Guardar</button>
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
                        <th>Total</th>
                        <th>Total-Imp</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="products-selected">
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
              <div class="form-group row">
                <label for="SearchArticle" class="col-12 col-form-label">Busca un producto o servicio</label>
                <div class="col-12">
                  <input type="text" class="form-control" id="SearchArticle" name="SearchArticle" placeholder="Busca un producto o servicio">
                </div>
              </div>
              <div class="all-products">
                <!-- <div class="products">
                  <span>Nombre del producto</span>
                </div> -->
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="ModalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <center>
                  <h2 class="estilo-titulo">Agregar usuario</h2>
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

                                <label for="" class="col-sm-2 col-form-label">Usuario<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Pais -->
                                  <div class="form-group">
                                    <select id="iduser" name="iduser" class="form-control required">
                                      <option value="-1">{$iduser}</option>
                                      <option value="1">Valor estático temporal</option>
                                    </select>
                                  </div>
                                </div>

                                <label for="" class="col-sm-2 col-form-label">Impuesto aplicable<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Pais -->
                                  <div class="form-group">
                                    <select id="imp" name="imp" class="form-control required">
                                      <option value="-1">{$fp}</option>
                                    </select>
                                  </div>
                                </div>

                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                  <div class="contBtnSuccess">
                                    <button type="button" id="saveCom" class="btn btnSuccess" data-dismiss="modal">Guardar</button>
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
                    <tbody id="allComisiones"></tbody>
                  </table>
                </div>
              </div>
              <div class="row padd">
                <div class="col-lg-12">
                  <div class="contBtnSuccess">
                    <button id="addComision" class="btn btnSuccess" data-toggle="modal" data-target="#ModalUsuarios" data-placement="top"><i class="far fa-plus-square"></i>Comisión</button>
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
                    <tbody id="lista-impuestos">
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="form-row padd">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Observación</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="observacion" name="observacion" placeholder="Observación"></textarea>
                    </div>
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

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="contBtnSuccess">
              <button id="Cotizar" class="btn btnSuccess" type="button"><i class="far fa-plus-square"></i>Cotizar</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <form action="./facturacion_conf.php?Lang=<?php echo $Lang; ?>&wph=32" style="display: none;">
      <textarea id="data" name="data"><?= $_POST["data"] ?></textarea>
    </form>

  </main>


  <? include_once(INCLUDES_DIR . "/footer.php"); ?>

  <script>
    $('.contable i').css('color', '#fbb616');
    $('.contable a').addClass('activeMenu');
    $('.contable').addClass('active');
  </script>

</body>

</html>