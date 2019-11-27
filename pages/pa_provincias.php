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
                "selectCtry",
                "boxText",
                "tblCol1",
                "tblCol2",
                "tblCol3",
                "tblCol4"
            ], 
            "attrsx" :
            [
                "{$boxTitle}",
                "{$selectCtry}",
                "{$boxText}",
                "{$tblCol1}",
                "{$tblCol2}",
                "{$tblCol3}",
                "{$tblCol4}"
            ], 
            "txts" : '.$wpContentStr_Labels.'
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="'.$Lang.'";
        global_defaultCtry="'.$wpContentArry_Labels[1].'"; /* Define el valor por defecto de la lista */

 </script>

    <!-- JavaScripts External Files -->
    <script src="'.JS_DIR.'/cs_standars_functions.js"></script>
    <script src="'.JS_DIR.'/cs_ctry_ajax.js"></script>
    <script src="'.JS_DIR.'/cs_prov_conf_ajax.js"></script>

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

          <!-- Dropdown Seleccionar Paises -->
          <div class="row">
            <div class="col-lg-12">
              <div class="contDropdown">
                <select id="selectCtry" name="locality" onchange="loadProv(this)">
                  <option value="-1">{$selectCtry}</option>
                </select>
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
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td></span></td>
                              <td></td>
                              <td></td>
                              <td>
                                <a href="" data-toggle="tooltip" data-placement="top" title="(in)Activar registro"><i class="fas fa-toggle-off"></i></a>
                                <a href="" data-toggle="tooltip" data-placement="top" title="Activar registro"><i class="fas fa-toggle-on"></i></a>
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