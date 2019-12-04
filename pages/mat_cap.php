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
                "idBtnNuevo"
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
    <script src="' . JS_DIR . '/cs_mat_cap_conf_ajax.js"></script>
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
                                <div id="ContTablaVerTodos">
                                    <table id="tablaVerTodos" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th id="text3">{$text3}</th>
                                                <th id="text4">{$text4}</th>
                                                <th id="text5">{$text5}</th>
                                                <th id="text6">{$text6}</th>
                                                <th id="text7">{$text7}</th>
                                                <th id="text8">{$text8}</th>
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
                        <h2 class="estilo-titulo">Datos Capacitadores por curso</h2>
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
                                                    <label for="" class="col-sm-2 col-form-label">Capacitador<span class="iconObligatorio">*<span></label>
                                                    <div class="col-sm-4">
                                                        <!-- Dropdown Seleccionar Pais -->
                                                        <div class="form-group">
                                                            <select id="id_cap" name="id_cap" class="form-control required">
                                                                <option value="-1">{$id_cap}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-2 col-form-label">Plan<span class="iconObligatorio">*<span></label>
                                                    <div class="col-sm-10">
                                                        <!-- Dropdown Seleccionar Pais -->
                                                        <div class="form-group">
                                                            <select id="idplan" name="idplan" class="form-control required">
                                                                <option value="-1">{$country}</option>
                                                            </select>
                                                        </div>
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
                                                    <div class="col-sm-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="enabled" value="1">
                                                            <label class="custom-control-label" for="customCheck1">Habilitado <span class="iconObligatorio">*</span> (Si/No)</label>
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