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
                "text11",
                "text12"
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
                "{$text11}",
                "{$text12}"
            ], 
            "txts" : ' . $wpContentStr_Labels . '
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="' . $Lang . '";

 </script>

    <!-- JavaScripts External Files -->
    <script src="' . JS_DIR . '/cs_standars_functions.js"></script>
    <script src="' . JS_DIR . '/cs_rep_img_conf_ajax.js"></script>
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
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- MODAL TABLA DE IMAGENES -->
    <div class="modal fade bd-example-modal-lg" id="ModalVerImagenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                        <h2 class="estilo-titulo" id="text11">{$text11}</h2>
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="closeModal" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tabla -->
                            <div class="contTabla">
                                <div class="tituloTabla">
                                    <h6 id="text12">{$text12}</h6>
                                </div>
                                <div class="contenido-tabla">
                                    <div id="ContTablaVerTodos">
                                        <table id="tablaVerImagenes" class="table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="card tarjetaImagenes" style="">
                                                            <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body bodyTarjeta">
                                                                <h5 class="card-title">Titulo</h5>
                                                                <p class="">Tipo de plantilla</p>
                                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                <a href="#" class="btn btn-primary">Ver Más</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="card tarjetaImagenes" style="">
                                                            <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body bodyTarjeta">
                                                                <h5 class="card-title">Titulo</h5>
                                                                <p class="">Tipo de plantilla</p>
                                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                <a href="#" class="btn btn-primary">Ver Más</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="card tarjetaImagenes" style="">
                                                            <img src="../assets/img/person-study.jpg" class="card-img-top" alt="...">
                                                            <div class="card-body bodyTarjeta">
                                                                <h5 class="card-title">Titulo</h5>
                                                                <p class="">Tipo de plantilla</p>
                                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                <a href="#" class="btn btn-primary">Ver Más</a>
                                                            </div>
                                                        </div>
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
                        <div class="col-lg-6 col-md-6 col-sm-6"></div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="contBtnSuccess">
                                <button id="idBtnNuevo" class="btn btnSuccess" data-toggle="modal" data-target="#ModalVerTodos"><i class="far fa-plus-square"></i>Nuevo</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DATOS GENERALES DE CLIENTE -->
    <div class="modal fade bd-example-modal-lg" id="ModalVerTodos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                        <h2 class="estilo-titulo">Nuevo repositorio de imagen</h2>
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
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="nombre">URL de la imagen</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="imgURL" name="imgURL" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-2 col-form-label">Observaciones</label>
                                                    <div class="col-sm-10">
                                                        <textarea type="" class="form-control" id="observCliente" name="observCliente" placeholder="Observaciones"></textarea>
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