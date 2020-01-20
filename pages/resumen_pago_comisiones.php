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
    <script src="' . JS_DIR . '/cs_resumen_pago_comisiones_conf_ajax.js"></script>
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
                            <h6 class="text-center">RESUMEN DE PAGO DE COMISIONES</h6>
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
                                <h6>Búsqueda de pago de comisiones</h6>
                            </div>
                            <form id="idFormCreacion" action="">

                                <div class="form-row">

                                    <div class="col-12 col-sm-6">
                                        <label for="" class="col-12 col-form-label">Pais</label>
                                        <div class="col-12">
                                            <!-- Dropdown Seleccionar Pais -->
                                            <div class="form-group">
                                                <select id="country" name="pais" class="form-control required">
                                                    <option value="-1">{$country}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="col-12 col-form-label" for="totalEmitido">Total emitido</label>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="totalEmitido" name="totalEmitido" placeholder="Total emitido">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col-12 col-sm-6">
                                        <label for="" class="col-12 col-form-label">Usuario</label>
                                        <div class="col-12">
                                            <!-- Dropdown Seleccionar Pais -->
                                            <div class="form-group">
                                                <select id="iduser" name="iduser" class="form-control required">
                                                    <option value="-1">{$iduser}</option>
                                                    <option value="1">Valor estático temporal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label class="col-12 col-form-label" for="totalPagado">Total pagado</label>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="totalPagado" name="totalPagado" placeholder="Total pagado">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col-12 col-sm-6">
                                        <label for="fechaInicio" class="col-12 col-form-label">Fecha inicio</label><br>
                                        <div class="col-12">
                                            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label for="fechaFin" class="col-12 col-form-label">Fecha fin</label><br>
                                        <div class="col-12">
                                            <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="contTabla">
                            <div class="tituloTabla">
                                <h6>Formas de pago</h6>
                            </div>
                            <div class="contenido-tabla">
                                <div id="FormaPago">
                                    <table id="tablaFormatoPago" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>País</th>
                                                <th>Nombre</th>
                                                <th>FACT ID</th>
                                                <th>Comision</th>
                                                <th>Pagado</th>
                                                <th>Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody id="lista-impuestos">
                                            <?php for ($x = 0; $x < 5; $x++) : ?>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row padd">
                                <div class="col-lg-12">
                                    <div class="contBtnSuccess">
                                        <button id="addComision" class="btn btnSuccess" data-toggle="modal" data-target="#ModalUsuarios" data-placement="top"><i class="far fa-plus-square"></i>Nuevo</button>
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