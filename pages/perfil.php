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
    <script src="' . JS_DIR . '/cs_perfil_conf_ajax.js"></script>
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
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
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
                                  <input type="text" class="form-control" id="idCliente" name="idCliente" placeholder="id" readonly>
                                </div>
                                <label for="" class="col-sm-2 col-form-label">Foto<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <input type="file" class="form-control-file required" id="foto" name="foto">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Compañía<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Compañía -->
                                  <div class="form-group">
                                    <select id="company" name="company" class="form-control required">
                                      <option value="-1">{$company}</option>
                                    </select>
                                  </div>
                                </div>
                                <label for="" class="col-sm-2 col-form-label">Sexo<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Compañía -->
                                  <div class="form-group">
                                    <select id="sexo" name="sexo" class="form-control required">
                                      <option value="M">Masculino</option>
                                      <option value="F">Femenino</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nombre<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control required" id="nom" name="nom" placeholder="Nombre">
                                </div>
                                <label for="" class="col-sm-2 col-form-label">Apellido<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control required" id="ape" name="ape" placeholder="Apellido">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Código internacional</label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar -->
                                  <div class="form-group">
                                    <select id="CodPais1" name="CodPaisTel" class="form-control">
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
                                    <input type="number" name="extCliente" class="form-control" id="extCliente" placeholder="">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Código internacional</label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar -->
                                  <div class="form-group">
                                    <select id="CodPais2" name="CodPaisCel" class="form-control">
                                      <option value="-1">Selecciona</option>
                                    </select>
                                  </div>
                                </div>
                                <label for="" class="col-sm-2 col-form-label">Celular</label>
                                <div class="col-sm-4">
                                  <input type="number" class="form-control" id="celCliente" name="celCliente" placeholder="Celular">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Email<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <input type="email" class="form-control required" id="email" name="email" placeholder="Email">
                                </div>
                                <label for="" class="col-sm-2 col-form-label">Departamento<span class="iconObligatorio">*<span></label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar Provincia -->
                                  <div class="form-group">
                                    <select id="depto" name="depto" class="form-control required">
                                      <option value="-1">{$depto}</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Cargo</label>
                                <div class="col-sm-4">
                                  <!-- Dropdown Seleccionar -->
                                  <div class="form-group">
                                    <select id="cargo" name="cargo" class="form-control">
                                      <option value="-1">Selecciona</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Observaciones</label>
                                <div class="col-sm-10">
                                  <textarea type="" class="form-control" id="observCliente" name="observCliente" placeholder="Observaciones"></textarea>
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