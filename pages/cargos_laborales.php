
<?php

//------------------------------------------------ HEAD HTML ------------------------------------------------->
    include_once(INCLUDES_DIR."/meta_head.php"); 
    echo '<!-- Custom JavaScripts Functions Needs
    ================================================== -->
    <!-- JavaScripts Global Vars -->
    <script>

    function init(){
      setCookie("'.$sUID.'"); 
      setCookie("'.$sUSS.'");
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
                "idBtnNuevo",
                "txtForm1",
                "txtForm2",
                "txtForm3",
                "txtForm4",
                "idBtnCancelar",
                "idBtnAceptar"
            ], 
            "attrsx" :
            [
                "{$boxTitle}",
                "{$boxText}",
                "{$tblCol1}",
                "{$tblCol2}",
                "{$tblCol3}",
                "{$idBtnNuevo}",
                "{$txtForm1}",
                "{$txtForm2}",
                "{$txtForm3}",
                "{$txtForm4}",
                "{$idBtnCancelar}",
                "{$idBtnAceptar}"
            ], 
            "txts" : '.$wpContentStr_Labels.'
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="'.$Lang.'";
        global_default="'.$wpContentArry_Labels[4].'";  /* Define el valor por defecto de la lista */

 </script>

    <!-- JavaScripts External Files -->
    <script src="'.JS_DIR.'/cs_standars_functions.js"></script>
    <script src="'.JS_DIR.'/cs_crgos_ajax.js"></script>
    <script src="'.JS_DIR.'/cs_dptos_ajax.js"></script>

</head>';?>
<!------------------------------------ BODY ------------------------------------->
<body onload="javascript:init()">
    <!-- sidebar-wrapper  -->
    <? include(INCLUDES_DIR."/menu.php"); ?>  
    
    <!-- header | Barra suprior -->
    <main class="page-content">
      <? include(INCLUDES_DIR."/soft_head.php"); ?>  

      <!-- Sección Provincias -->
      <section id="idSecInterior">
        <div class="container">

          <!-- Titulo -->
          <div class="row">
            <div class="col-lg-12">
              <div class="cajaTitulo">
                <h6 class="text-center" id="boxTitle">{$boxTitle} </h6>
              </div>
            </div>
          </div>

          <!-- Logo Paises -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contIcono">
                <i class="fas fa-users"></i>
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
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
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
                <button id="idBtnNuevo" class="btn btnSuccess" onclick="new_Record('show','formnewRecord')">{$idBtnNuevo}</button>
              </div>
            </div>
          </div>
        </div> 
      </section> 

      <!-- Seccion formulario de creacion  -->
      <section id="secFormCreacion">
        <div class="container" id="formnewRecord" style="display: hide;">
          <div class="row">
            <div class="col-lg-12">
              <div class="contFormularioCreacion">
                <div class="tituloTabla">
                  <h6 id="txtForm1">{$txtForm1}</h6>
                </div> 
                <form id="idFormCreacion" action="">
                  <div class="row">
                    <div class="col-lg-6 col-md-6">
                      <div class="form-group row">
                        <label for="" class="col-sm-6 col-form-label"  id="txtForm2">{$txtForm2}</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="idDepar" name="idDepar" placeholder="ID" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-6 col-form-label" id="txtForm3">{$txtForm3}</label>
                        <div class="col-lg-6">
                          <select id="selectCtry" name="selectCtry">
                            <option value="-1">Select</option>
                          </select>
                        </div>          
                      </div>          
                      <div class="form-group row">
                        <label for="" class="col-sm-6 col-form-label" id="txtForm4">{$txtForm4}</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Texto del placeholder">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="contBtnCancel">
                        <button type="button" id="idBtnCancelar" class="btn btnCancel" onclick="new_Record('hide','formnewRecord')">{$idBtnCancelar}</button>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="contBtnSuccess">
                        <button type="submit" id="idBtnAceptar" class="btn btnSuccess">{$idBtnAceptar}</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
     <!-------------------------------------------------- FOOTER -------------------------------------------->
    <?
    include_once(INCLUDES_DIR."/footer.php"); 
    ?>   

  </body>

</html>