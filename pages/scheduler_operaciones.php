<!------------------------------------ 
Nombre:  tbl_opcalanunts
Alias: tbl_0100
    id_calanunt
    id_ctto
    id_clientanun
    id_clientesc
    id_locat
    cara
    id_pub
    finicio
    ffin
    id_usersup
    id_userinst
    id_uservend
    estatus

Nombre: tbl_opcalinsts
Alias: tbl_0101
    id_calinst
    id_ctto
    id_clientanun
    id_clientesc
    id_locat
    cara
    id_lstval
    finicio
    ffin
    id_usersup
    id_userinst
    id_uservend
    estatus
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
                "text10",
                "text11",
                "text12",
                "text13"
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
                "{$text12}",
                "{$text13}"
           ], 
            "txts" : ' . $wpContentStr_Labels . '
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="' . $Lang . '";

 </script>

    <!-- JavaScripts External Files -->
    <script src="' . JS_DIR . '/cs_standars_functions.js"></script>
    <script src="' . JS_DIR . '/cs_op_scheduler_conf_ajax.js"></script>
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
              <i class="far fa-calendar-alt"></i>
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

                <!-- Seleccionar Fecha -->
                <div class="form-group">
                  <div class="col-lg-3">
                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                  </div>
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

                <div id="text5" style="display:none;">${text5}</div>


                <!-- Dropdown Seleccionar Estatus de la instalacion -->
                <div class="form-group">
                  <label for="" class="col-sm-2 col-form-label">Estatus de la instalación<span class="iconObligatorio">*<span></label>
                  <select id="statusInstallVal1" name="statusInstallVal1" class="form-control col-sm-4">
                    <option value="-1" selected disabled>Seleccione</option>
                    <option value="0">Reservado</option>
                    <option value="1">Asignado para instalar</option>
                    <option value="2">Por supervisar instalación</option>
                    <option value="3">Rechazada la instalación</option>
                    <option value="4">Aprobado por Receptor</option>
                    <option value="5">Informe elaborado y enviado</option>
                    <option value="6">Cerrado por el Receptor</option>
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
                <h6 id="text6">{$text6}</h6>
              </div>
              <div class="contenido-tabla">
                <div id="ContTablaVerTodos">
                  <table id="calendarioCapacitaciones" class="table table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th id="text7">{$text7}</th>
                        <th id="text8">{$text8}</th>
                        <th id="text9">{$text9}</th>
                        <th id="text10">{$text10}</th>
                        <th id="text11">{$text11}</th>
                        <th id="text12">{$text12}</th>
                        <th id="text13">{$text13}</th>
                      </tr>
                    </thead>
                    <tbody id="calendarBody">
                      <tr>

                        <?php

                        //Obtenemos en qué día inicia el mes
                        $timestamp = mktime(0, 0, 0, date("m"), 1, date("Y"));
                        $iniciaEnDia = date("w", $timestamp);

                        //Obtenemos cuántos días tiene mes y sumamos el día en el quen inicia para saltar esas fechas
                        $diasDelMes = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) + $iniciaEnDia;
                        $rows = ceil($diasDelMes / 7); // Filas que se generaran para el calendario
                        $celdasQueSeDebenGenerar = $rows * 7; //Celdas que se generarán para el calendario

                        for ($i = 1; $i <= $celdasQueSeDebenGenerar; $i++) {

                          if ($i > $iniciaEnDia && $i <= $diasDelMes) {
                            $dia = $i - $iniciaEnDia;

                            echo '<td>
                                <div id="day" class="text-center">' . $dia . '</div>
                                <div class="text-center">
                                    <button id="idBtnNuevo" class="form-control btn btnSuccess btn-razSoc" data-toggle="modal" data-target="#Modal_tbl_0100"><i class="far fa-plus-square"></i></button>
                                    <button id="idBtnDetalles" class="form-control btn btnSuccess btn-razSoc" data-toggle="modal" data-target="#Modal_ProgInstall"><i class="fas fa-list-ul"></i></i></button>
                                </div>  
                              </td>';
                          } else {
                            echo "<td></td>";
                          }

                          if ($i % 7 == 0)
                            echo "</tr><tr>";
                        }

                        ?>

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
  <!-- ********************************************** -->
  <!-- MODAL Instalacion de Publicidad -->
  <!-- ********************************************** -->

  <div class="modal fade bd-example-modal-lg" id="Modal_tbl_0100" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h2 class="estilo-titulo">Registro de trabajo para Publicidad</h2>
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
                            <input type="text" class="form-control" id="idActivityPub" name="idActivityPub" placeholder="id" disabled>
                          </div>
                          <label for="" class="col-sm-2 col-form-label">Contrato Nro.</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="id_cttoPub" name="id_cttoPub" placeholder="Ctto Num">
                          </div>
                        </div>

                        <div class="form-group row">
                          <!-- Dropdown Seleccionar Anunciante -->
                          <label for="" class="col-sm-2 col-form-label">Anunciante<span class="iconObligatorio">*<span></label>
                          <select id="anunciantePub" name="anunciantePub" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                          <!-- Dropdown Seleccionar Receptor -->
                          <label for="" class="col-sm-2 col-form-label">Receptor<span class="iconObligatorio">*<span></label>
                          <select id="receptorPub" name="receptorPub" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                        </div>

                        <div class="form-group row">
                          <!-- Dropdown Seleccionar Locacion o ubicacion de donde se colocara el anuncio de acuerdo al campo COD de la tbl_0044 -->
                          <label for="" class="col-sm-2 col-form-label">Ubicación donde se instalará<span class="iconObligatorio">*<span></label>
                          <select id="locationPub" name="locationPub" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                          <!-- Dropdown Mostrar todas las Caras registradas bajo el mismo campo de COD de la tbl_0044 -->
                          <label for="" class="col-sm-2 col-form-label">Caras existentes<span class="iconObligatorio">*<span></label>
                          <select id="caraPub" name="caraPub" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                        </div>

                        <!-- Fotografía del arte gráfico que está registrada en le repositorio de imagenes -->
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Arte gráfico</label>
                          <div class="col-sm-10">
                            <textarea type="" class="form-control" id="observCliente" name="observCliente" placeholder="Sustituir este componente por una imagen que pueda abrirse en pantalla completa"></textarea>
                          </div>
                        </div>

                        <!-- Fecha de inicio o Instalación -->
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Fecha de Instalación</label>
                          <div class="col-sm-4">
                            <input type="date" class="form-control" id="finicioPub" name="finicioPub" value="<?php echo date('Y-m-d'); ?>">
                          </div>
                          <!-- Fecha de finalización o desinstalación -->
                          <label for="" class="col-sm-2 col-form-label">Fecha de finalización</label>
                          <div class="col-sm-4">
                            <input type="date" class="form-control" id="ffinPub" name="ffinPub" value="<?php echo date('Y-m-d'); ?>">
                          </div>
                        </div>

                        <!-- Usuarios de Schoolmedia: Instalador y Supervisor de id_user -->
                        <div class="form-group row">
                          <!-- Dropdown Seleccionar a quien se le asigna la instalacion -->
                          <label for="" class="col-sm-2 col-form-label">Instalador<span class="iconObligatorio">*<span></label>
                          <select id="installerPub" name="installerPub" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                          <!-- Dropdown Seleccionar quien supervisara la instalacion -->
                          <label for="" class="col-sm-2 col-form-label">Supervisor de Instalación<span class="iconObligatorio">*<span></label>
                          <select id="supervPub" name="supervPub" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                        </div>

                        <!-- Usuarios de Schoolmedia  que realizó la venta (id_user) -->
                        <div class="form-group row">
                          <!-- Dropdown Seleccionar a quien se le asigna la instalacion -->
                          <label for="" class="col-sm-2 col-form-label">Vendedor<span class="iconObligatorio">*<span></label>
                          <select id="sellerPub" name="sellerOub" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                          <!-- Dropdown Estatus de la instalacion -->
                          <label for="" class="col-sm-2 col-form-label">Estatus de la instalación<span class="iconObligatorio">*<span></label>
                          <select id="statusInstallPub" name="statusInstallPub" class="form-control col-sm-4">
                            <option value="-1" selected disabled>Seleccione</option>
                            <option value="0">Reservado</option>
                            <option value="1">Asignado para instalar</option>
                            <option value="2">Por supervisar instalación</option>
                            <option value="3">Rechazada la instalación</option>
                            <option value="4">Aprobado por Anunciante</option>
                            <option value="5">Informe elaborado y enviado</option>
                            <option value="6">Cerrado por el Anunciante</option>
                          </select>
                        </div>


                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="contBtnCancel">
                              <button type="button" id="idBtnLimpiarPub" class="btn btnCancel">Limpiar</button>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="contBtnSuccess">
                              <button type="submit" id="idBtnAceptarPub" class="btn btnSuccess">Guardar</button>
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

  <!-- ********************************************** -->
  <!-- MODAL Instalacion de Valores -->
  <!-- ********************************************** -->

  <div class="modal fade bd-example-modal-lg" id="Modal_tbl_0101" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h2 class="estilo-titulo">Registro de trabajo para Mensajes de Valores</h2>
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
                            <input type="text" class="form-control" id="idActivityVal" name="idActivityVal" placeholder="id" disabled>
                          </div>
                          <label for="" class="col-sm-2 col-form-label">Contrato Nro.</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="id_cttoVal" name="id_cttoVal" placeholder="Ctto Num">
                          </div>
                        </div>

                        <div class="form-group row">
                          <!-- Dropdown Seleccionar Anunciante -->
                          <label for="" class="col-sm-2 col-form-label">Anunciante<span class="iconObligatorio">*<span></label>
                          <select id="anuncianteVal" name="anuncianteVal" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                          <!-- Dropdown Seleccionar Receptor -->
                          <label for="" class="col-sm-2 col-form-label">Receptor<span class="iconObligatorio">*<span></label>
                          <select id="receptorVal" name="receptorVal" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                        </div>

                        <div class="form-group row">
                          <!-- Dropdown Seleccionar Locacion o ubicacion de donde se colocara el anuncio de acuerdo al campo COD de la tbl_0044 -->
                          <label for="" class="col-sm-2 col-form-label">Ubicación donde se instalará<span class="iconObligatorio">*<span></label>
                          <select id="locationVal" name="locationVal" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                          <!-- Dropdown Mostrar todas las Caras registradas bajo el mismo campo de COD de la tbl_0044 -->
                          <label for="" class="col-sm-2 col-form-label">Caras existentes<span class="iconObligatorio">*<span></label>
                          <select id="caraVal" name="caraVal" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                        </div>

                        <!-- Mensaje que se instalará -->
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Mensaje de Valor</label>
                          <div class="col-sm-10">
                            <textarea type="" class="form-control" id="lstval" name="lstval" placeholder="el campo descrip correspondiente al id_lstval"></textarea>
                          </div>
                        </div>

                        <!-- Fecha de inicio o Instalación -->
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Fecha de Instalación</label>
                          <div class="col-sm-4">
                            <input type="date" class="form-control" id="finicioVal" name="finicioVal" value="<?php echo date('Y-m-d'); ?>">
                          </div>
                          <!-- Fecha de finalización o desinstalación -->
                          <label for="" class="col-sm-2 col-form-label">Fecha de finalización</label>
                          <div class="col-sm-4">
                            <input type="date" class="form-control" id="ffinval" name="ffinVal" value="<?php echo date('Y-m-d'); ?>">
                          </div>
                        </div>


                        <!-- Usuarios de Schoolmedia: Instalador y Supervisor de id_user -->
                        <div class="form-group row">
                          <!-- Dropdown Seleccionar a quien se le asigna la instalacion -->
                          <label for="" class="col-sm-2 col-form-label">Instalador<span class="iconObligatorio">*<span></label>
                          <select id="installerVal" name="installerVal" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                          <!-- Dropdown Seleccionar quien supervisara la instalacion -->
                          <label for="" class="col-sm-2 col-form-label">Supervisor de Instalación<span class="iconObligatorio">*<span></label>
                          <select id="supervVal" name="supervVal" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                        </div>

                        <!-- Usuarios de Schoolmedia  que realizó la venta (id_user) -->
                        <div class="form-group row">
                          <!-- Dropdown Seleccionar a quien se le asigna la instalacion -->
                          <label for="" class="col-sm-2 col-form-label">Vendedor<span class="iconObligatorio">*<span></label>
                          <select id="sellerVal" name="sellerVal" class="form-control col-sm-4">
                            <option value="-1">Seleccione</option>
                          </select>
                          <!-- Dropdown Estatus de la instalacion -->
                          <label for="" class="col-sm-2 col-form-label">Estatus de la instalación<span class="iconObligatorio">*<span></label>
                          <select id="statusInstallVal" name="statusInstallVal" class="form-control col-sm-4">
                            <option value="-1" selected disabled>Seleccione</option>
                            <option value="0">Reservado</option>
                            <option value="1">Asignado para instalar</option>
                            <option value="2">Por supervisar instalación</option>
                            <option value="3">Rechazada la instalación</option>
                            <option value="4">Aprobado por Receptor</option>
                            <option value="5">Informe elaborado y enviado</option>
                            <option value="6">Cerrado por el Receptor</option>
                          </select>
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


  <!-- ********************************************** -->
  <!-- MODAL PLAN DE ACTIVIDADES DE: PROGRAMACION DE TRABAJO Instalacion de Publicidad -->
  <!-- ********************************************** -->
  <div class="modal fade bd-example-modal-lg" id="Modal_ProgInstall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h2 class="estilo-titulo">Registro de trabajo para Publicidad</h2>
          </center>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="closeModal" aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <!-- Sección formulario de datos  -->
          <section id="">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <!-- Tabla -->
                  <div class="contTabla">
                    <div class="tituloTabla">
                      <h6 id="text">Listado de trabajo</h6>
                    </div>
                    <div class="contenido-tabla">
                      <div id="ContTablaVerTodos">
                        <table id="tablaVerTodos" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th id="text">Nombre del Cliente</th>
                              <th id="text">Ubicación Instal.</th>
                              <th id="text">Cara</th>
                              <th id="text">Arte - Valor a instalar</th>
                              <th id="text">Contrato</th>
                              <th id="text">Fecha Instal.</th>
                              <th id="text">Fecha Fin</th>
                              <th id="text">Acciones</th>
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
                              <td>
                                <a href="#" data-toggle="modal" data-target="#Modal_tbl_0100" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
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
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="contBtnSuccess">
                          <button id="idBtnNuevo" class="btn btnSuccess" data-toggle="modal" data-target="#Modal_tbl_0100"><i class="far fa-plus-square"></i>Nuevo</button>
                        </div>
                      </div>
                    </div>
                  </div>
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


  <!-------------------------------------------------- FOOTER -------------------------------------------->
  <script>
    var celdasQueSeDebenGenerar = "<?= $celdasQueSeDebenGenerar ?>";
    var iniciaEnDia = "<?= $iniciaEnDia ?>";
    var diasDelMes = "<?= $diasDelMes ?>";
  </script>
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