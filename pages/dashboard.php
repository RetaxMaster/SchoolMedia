
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
                "box1Title",
                "box1Text",
                "tbl1Col1",
                "tbl1Col2",
                "tbl1Col3",
                "seeMore1",
                "box2Title",
                "box2Text",
                "tbl2Col1",
                "tbl2Col2",
                "tbl2Col3",
                "seeMore2",
                "mw1Title",
                "tbl3Col1",
                "tbl3Col2",
                "tbl3Col3",
                "tbl3Col4",
                "btn1close",            
                "mw2Title",
                "tbl4Col1",
                "tbl4Col2",
                "tbl4Col3",
                "tbl4Col4",
                "btn2close"            
            ], 
            "attrsx" :
            [
                "{$box1Title}",
                "{$box1Text}",
                "{$tbl1Col1}",
                "{$tbl1Col2}",
                "{$tbl1Col3}",
                "{$seeMore1}",
                "{$box2Title}",
                "{$box2Text}",
                "{$tbl2Col1}",
                "{$tbl2Col2}",
                "{$tbl2Col3}",
                "{$seeMore2}",
                "{$mw1Title}",
                "{$tbl3Col1}",
                "{$tbl3Col2}",
                "{$tbl3Col3}",
                "{$tbl3Col4}",
                "{$btn1close}",           
                "{$mw2Title}",
                "{$tbl4Col1}",
                "{$tbl4Col2}",
                "{$tbl4Col3}",
                "{$tbl4Col4}",
               "{$btn2close}"           
            ], 
            "txts" : '.$wpContentStr_Labels.'
        };
        
        /* 
        // Se guardan todos los Placeholders y Hints
        var global_hintsObj={
            "components_ids" : 
            [
                "username",
                "passwd",
                "usernameRcvryPasswd"         
            ], 
            "attrsx" :
            [
                "placeholder",
                "placeholder",
                "placeholder"           
            ], 
            "txts" : .$wpContentStr_Hints.
        };

        Se guardan los textos de acuerdo a los mensajes
        var global_msgsObj={
            "components_ids" : 
            [
                "div_msg_in",
                "div_msg_in_succ",
                "div_msg_in_errn",
                "div_msg_cp",
                "div_msg_cp_succ",
                "div_msg_cp_errn" 
           ], 
            "attrsx" :
            [
                "{$div_msg_in}",
                "{$div_msg_in_succ}",
                "{$div_msg_in_errn}",
                "{$div_msg_cp}",
                "{$div_msg_cp_succ}",
                "{$div_msg_cp_errn}"            
            ], 
            "txts" : .$wpContentStr_Msgs.
        };*/

        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="'.$Lang.'";

// ********** Parametros de las graficas 1 ****** /
      data1 = {
        datasets: [{
            data: [77, 23, 0],
            backgroundColor: [
              "#fdc000",
              "#57af3e",
              "#ffffff"
            ]
        }],    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          "'.$wpContentArry_Msgs[0].' 65%",
          "'.$wpContentArry_Msgs[1].' 35%",
          "'.$wpContentArry_Msgs[2].' 100%"
        ]
      };
      
// ********** Parametros de las graficas 2 ****** /
      data2 = {
        datasets: [{
            data: [67, 33, 0],
            backgroundColor: [
                "#fdc000",
                "#57af3e",
                "#ffffff"
             ]
        }],    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            "'.$wpContentArry_Msgs[3].' 67%",
            "'.$wpContentArry_Msgs[4].' 33%",
            "'.$wpContentArry_Msgs[5].' 100%"
        ]
      };
      
      options = {
        cutoutPercentage: 50,
        legend: {
            display: true,
            position: "right"
        }
      };
      
      elementsArry=[];
      ';
      if ($nCtry>0) {
        $i=0;
        foreach ($CtryDataArry as $CtryItem) {
          if ($i==0) {
            echo "elementsArry=['$CtryItem'";
          }else{
            echo ",'$CtryItem'";
          }
          $i++;
        }
        echo "];";
      }

  echo '

 </script>

    <!-- JavaScripts External Files -->
    <script src="'.JS_DIR.'/cs_standars_functions.js"></script>
    <script src="'.JS_DIR.'/cs_main_ajax.js"></script>

</head>';?>
<!----------------------------------- BODY ------------------------------------->
  <body onload="javascript:init()">
    <!-- sidebar-wrapper  wp=2-->
    <? include(INCLUDES_DIR."/menu.php"); ?>  
    
    <!-- header | Barra suprior wp=3 -->
    <main class="page-content">
      <? include(INCLUDES_DIR."/soft_head.php"); ?>  

      <!-- Sección Dashboard -->
      <div class="container">
        <div class="row">
          <!-- Grafico Superior -->
          <div class="col-lg-12">            
            <div class="card">
              <div class="row">
                <div class="col-md-1 col-sm-1 bg-dark">
                  <h5 class="titulo-vertical" id="box1Title">{$box1Title}</h5>
                </div>
                <div class="col-md-5">
                  <div class="card-body">
                    <div class="dropdown">      
                      <span class="card-title" id="box1Text">{$box1Text}</span> 
                      <a href="#" class="dropdown-toggle card-title" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seleccione Pais:</a>              
                      <div id="ctry1" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button id="Todos" Value="0" class="dropdown-item" type="button">Todos</button>
                      </div>
                    </div>
                    <br>
                    <canvas id="myChart1"></canvas>
                   </div>
                </div>
                <div class="col-md-5">
                  <table class="table table-striped tablaDash table-hover">
                  <thead>
                        <tr>
                          <th scope="col" id="tbl1Col1">{$tbl1Col1}</th>
                          <th scope="col" id="tbl1Col2">{$tbl1Col2}</th>
                          <th scope="col" id="tbl1Col3">{$tbl1Col3}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <th scope="row"><span class="boggle2"></span></th>
                        <td>Tiger Nixon</td>
                        <td>12/10/2018</td>
                      </tr>
                      <tr>
                      <th scope="row"><span class="boggle1"></span></th>
                          <td>John Wall</td>
					                <td>12/10/2018</td>
                      </tr>
                      <tr>
                      <th scope="row"><span class="boggle1"></span></th>
                          <td>Mary Ann</td>
					                <td>15/10/2018</td>
                      </tr>
                      <tr>
                      </tbody>
                  </table>
                  <p><a id="seeMore1" class="verTodos" href="#" data-toggle="modal" data-target="#ModalVerTodos1">{$seeMore1}</a></p>
                </div>
              </div>              
            </div>
          </div> 
          <!-- Fin Grafico Superior -->
        </div>

        <div class="row">
          <!-- Grafico Superior -->
          <div class="col-lg-12">            
            <div class="card">
              <div class="row">
                <div class="col-md-1 col-sm-1 bg-dark">
                  <h5 class="titulo-vertical" id="box2Title">{$box2Title}</h5>
                </div>
                <div class="col-md-5">
                  <div class="card-body">                    
                    <div class="dropdown">      
                      <span class="card-title" id="box2Text">{$box2Text}</span> 
                      <a href="#" class="dropdown-toggle card-title" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seleccione Pais:</a>              
                      <div id="ctry2" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button">Todos</button>
                      </div>
                    </div>
                    <br>
                    <canvas id="myChart2"></canvas>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                  </div>
                </div>
                <div class="col-md-5">
                    <table class="table table-striped tablaDash table-hover">
                    <thead>
                      <tr>
                        <th scope="col" id="tbl2Col1">{$tbl2Col1}</th>
                        <th scope="col" id="tbl2Col2">{$tbl2Col2}</th>
                        <th scope="col" id="tbl2Col3">{$tbl2Col3}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><span class="boggle2"></span></th>
                        <td>Inversiones Cliente 1</td>
                        <td>25/08/2019</td>
                      </tr>
                      <tr>
                      <th scope="row"><span class="boggle1"></span></th>
                        <td>Inversiones Cliente 1</td>
                        <td>25/08/2019</td>
                      </tr>
                      <tr>
                      <th scope="row"><span class="boggle1"></span></th>
                        <td>Inversiones Cliente 1</td>
                        <td>25/08/2019</td>
                      </tr>
                      <tr>
                    </tbody>
                    </table>
                    <p><a class="verTodos" id="seeMore2" href="#" data-toggle="modal" data-target="#ModalVerTodos2">{$seeMore2}</a></p>
                </div>
              </div>              
            </div>
          </div> 
          <!-- Fin Grafico Superior -->
        </div>
        
        
      </div>

    </main>


    <!-- MODAL VER TODOS MW1 -->
    <div class="modal fade bs-example-modal-lg" id="ModalVerTodos1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
          	<center><h2 class="estilo-titulo" id="mw1Title">{$mw1Title}</h2></center>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="closeModal" aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
	            <div class="contenido-tabla">
	                 <div id="ContTablaVerTodos">
	                     <table id="tablaVerTodos1" class="table table-striped table-bordered table-hover" style="width:100%">
					        <thead>
					            <tr>
					                <th id="tbl3Col1">{$tbl3Col1}</th>
					                <th id="tbl3Col2">{$tbl3Col2}</th></th>
					                <th id="tbl3Col3">{$tbl3Col3}</th></th>
					                <th id="tbl3Col4">{$tbl3Col4}</th></th>
					            </tr>
					        </thead>
					        <tbody>
					            <tr>
					                <td>1</span></td>
					                <td>Tiger Nixon</td>
					                <td>12/10/2018</td>
					                <td>
                            <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="(in)Activar registro"><i class="fas fa-eye-slash"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Eliminar registro"><i class="fas fa-eraser"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Enviar por correo"><i class="fas fa-envelope-square"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Abrir en nueva ventana"><i class="fas fa-external-link-alt"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver Advertencia!"><i class="fas fa-exclamation-triangle"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Listado de características"><i class="fas fa-file-alt"></i></i></a>
					                </td>
					            </tr>
					            <tr>
                          <td>2</span></td>
					                <td>John Wall</td>
					                <td>12/10/2018</td>
					                <td>
                            <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="(in)Activar registro"><i class="fas fa-eye-slash"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Eliminar registro"><i class="fas fa-eraser"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Enviar por correo"><i class="fas fa-envelope-square"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Abrir en nueva ventana"><i class="fas fa-external-link-alt"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver Advertencia!"><i class="fas fa-exclamation-triangle"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Listado de características"><i class="fas fa-file-alt"></i></i></a>
					                </td>
					            </tr>
					            <tr>
                          <td>3</td>
					                <td>Mary Ann</td>
					                <td>15/10/2018</td>
					                <td>
                            <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="(in)Activar registro"><i class="fas fa-eye-slash"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Eliminar registro"><i class="fas fa-eraser"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Enviar por correo"><i class="fas fa-envelope-square"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Abrir en nueva ventana"><i class="fas fa-external-link-alt"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver Advertencia!"><i class="fas fa-exclamation-triangle"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Listado de características"><i class="fas fa-file-alt"></i></i></a>
					                </td>
					            </tr>
					            <tr>
                          <td>4</td>
					                <td>Amy Worth</td>
					                <td>18/10/2018</td>
					                <td>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="(in)Activar registro"><i class="fas fa-eye-slash"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Eliminar registro"><i class="fas fa-eraser"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Enviar por correo"><i class="fas fa-envelope-square"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Abrir en nueva ventana"><i class="fas fa-external-link-alt"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver Advertencia!"><i class="fas fa-exclamation-triangle"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Listado de características"><i class="fas fa-file-alt"></i></i></a>
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
          <div class="modal-footer">
            <button id="btn1close"type="button" class="btn btn-default" data-dismiss="modal">{$btn1close}</button>
          </div>
        </div>
      </div>
    </div>
     
     <!-- MODAL VER TODOS MW1 -->
     <div class="modal fade bs-example-modal-lg" id="ModalVerTodos2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
          	<center><h2 class="estilo-titulo" id="mw2Title">{$mw2Title}</h2></center>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="closeModal" aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
	            <div class="contenido-tabla">
	                 <div id="ContTablaVerTodos">
	                     <table id="tablaVerTodos2" class="table table-striped table-bordered table-hover" style="width:100%">
					        <thead>
					            <tr>
					                <th id="tbl4Col1">{$tbl4Col1}</th>
					                <th id="tbl4Col2">{$tbl4Col2}</th></th>
					                <th id="tbl4Col3">{$tbl4Col3}</th></th>
					                <th id="tbl4Col4">{$tbl4Col4}</th></th>
					            </tr>
					        </thead>
					        <tbody>
					            <tr>
					                <td>1</span></td>
					                <td>Tiger Nixon</td>
					                <td>12/10/2018</td>
					                <td>
                            <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="(in)Activar registro"><i class="fas fa-eye-slash"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Eliminar registro"><i class="fas fa-eraser"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Enviar por correo"><i class="fas fa-envelope-square"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Abrir en nueva ventana"><i class="fas fa-external-link-alt"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver Advertencia!"><i class="fas fa-exclamation-triangle"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Listado de características"><i class="fas fa-file-alt"></i></i></a>
					                </td>
					            </tr>
					            <tr>
                          <td>2</span></td>
					                <td>John Wall</td>
					                <td>12/10/2018</td>
					                <td>
                            <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="(in)Activar registro"><i class="fas fa-eye-slash"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Eliminar registro"><i class="fas fa-eraser"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Enviar por correo"><i class="fas fa-envelope-square"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Abrir en nueva ventana"><i class="fas fa-external-link-alt"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver Advertencia!"><i class="fas fa-exclamation-triangle"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Listado de características"><i class="fas fa-file-alt"></i></i></a>
					                </td>
					            </tr>
					            <tr>
                          <td>3</td>
					                <td>Mary Ann</td>
					                <td>15/10/2018</td>
					                <td>
                            <a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="(in)Activar registro"><i class="fas fa-eye-slash"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Eliminar registro"><i class="fas fa-eraser"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Enviar por correo"><i class="fas fa-envelope-square"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Abrir en nueva ventana"><i class="fas fa-external-link-alt"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver Advertencia!"><i class="fas fa-exclamation-triangle"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Listado de características"><i class="fas fa-file-alt"></i></i></a>
					                </td>
					            </tr>
					            <tr>
                          <td>4</td>
					                <td>Amy Worth</td>
					                <td>18/10/2018</td>
					                <td>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="fas fa-edit"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="far fa-newspaper"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="(in)Activar registro"><i class="fas fa-eye-slash"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Eliminar registro"><i class="fas fa-eraser"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Enviar por correo"><i class="fas fa-envelope-square"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Abrir en nueva ventana"><i class="fas fa-external-link-alt"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Ver Advertencia!"><i class="fas fa-exclamation-triangle"></i></a>
					                	<a href="" data-toggle="tooltip" data-placement="top" title="Listado de características"><i class="fas fa-file-alt"></i></i></a>
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
          <div class="modal-footer">
            <button id="btn2close"type="button" class="btn btn-default" data-dismiss="modal">{$btn2close}</button>
          </div>
        </div>
      </div>
    </div>
   <!-------------------------------------------------- FOOTER -------------------------------------------->
    <?
    include_once(INCLUDES_DIR."/footer.php"); 
    ?>   

  </body>
</html>