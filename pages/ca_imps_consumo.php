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
                "text1",
                "text2",
                "text3",
                "text4",
                "text5",
                "text6",
                "text7"
            ], 
            "attrsx" :
            [
                "{$text1}",
                "{$text2}",
                "{$text3}",
                "{$text4}",
                "{$text5}",
                "{$text6}",
                "{$text7}"
            ], 
            "txts" : '.$wpContentStr_Labels.'
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="'.$Lang.'";

 </script>

    <!-- JavaScripts External Files -->
    <script src="'.JS_DIR.'/cs_standars_functions.js"></script>
    <script src="'.JS_DIR.'/cs_imps_consumo_conf_ajax.js"></script>
    <script src="'.JS_DIR.'/cs_ctry_ajax.js"></script>

</head>';?>
<!------------------------------------ BODY ------------------------------------->
  <body onload="javascript:init()">
    <!-- sidebar-wrapper  -->
    <? include(INCLUDES_DIR."/menu.php"); ?>  
    
    <!-- header | Barra suprior -->
    <main class="page-content">
      <? include(INCLUDES_DIR."/soft_head.php"); ?>  


      <!-- Sección Paises -->

      <section id="idSecInterior">

        <div class="container">



          <!-- Titulo -->

          <div class="row">

            <div class="col-lg-12">

              <div class="cajaTitulo">

                <h6 id="text1" class="text-center">{$text1}</h6>

              </div>

            </div>

          </div>



          <!-- Logo Paises -->

          <div class="row">

            <div class="col-lg-12">

              <div class="contIcono">

                <i class="fas fa-percentage"></i>

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
                            <th id="text3" >{$text3}</th>
                            <th id="text5" >{$text5}</th>
                            <th id="text4" >{$text4}</th>
                            <th id="text6" >{$text6}</th>
                            <th id="text7" >{$text7}</th>
                          </tr>

                      </thead>

                      <tbody>

                          <tr>

                            <td></td>

                            <td></td>

                            <td></td>

                            <td></td>

                            <td>

                              <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>

                              <a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>

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

          <div class="row">

            <div class="col-lg-12">

              <div class="contBtnSuccess">

                <button id="idBtnNuevo" class="btn btnSuccess"><i class="far fa-plus-square"></i>Nuevo</button>

              </div>

            </div>

          </div>

        </div> 

      </section> 



      <!-- Sección formulario de creación  -->

      <section id="secFormCreacion">

        <div class="container">

          <div class="row">

            <div class="col-lg-12">

              <div class="contFormularioCreacion">

                <div class="tituloTabla">

                  <h6>Creación o edición de Impuesto</h6>

                </div> 

                <form id="idFormCreacion" action="">

                  <div class="row">

                    <div class="col-lg-6 col-md-6">

                      <div class="form-group row">

                        <label for="" class="col-sm-3 col-form-label">ID</label>

                        <div class="col-sm-9">

                          <input type="text" class="form-control" id="idImp" name="idImp" placeholder="ID" disabled>

                        </div>

                      </div>

                      <!-- Dropdown Seleccionar Paises -->
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Pais</label>
                          <div class="col-sm-9">
                            <select id="selectCtry" name="locality" class="form-control">
                              <option value="-1">{$selectCtry}</option>
                            </select>
                          </div>          
                        </div>          

                      <div class="form-group row">

                        <label for="" class="col-sm-3 col-form-label">Valor Impuesto (%)</label>

                        <div class="col-sm-9">

                          <input type="text" class="form-control" id="valImpuesto" name="valImpuesto" placeholder="Ej. 7/10/12">

                        </div>

                      </div>



                      <div class="form-group row">

                        <label for="" class="col-sm-3 col-form-label">Nombre Impuesto</label>

                        <div class="col-sm-9">

                          <input type="text" class="form-control" id="nomImpuesto" name="nomImpuesto" placeholder="Ej. I.T.B.M.S., exento, etc.">

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6">

                      <div class="contBtnCancel">

                        <button type="button" id="idBtnCancelar" class="btn btnCancel">Cancelar</button>

                      </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">

                      <div class="contBtnSuccess">

                        <button type="submit" id="idBtnAceptar" class="btn btnSuccess">Aceptar</button>

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