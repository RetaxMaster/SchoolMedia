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
                "text3"
            ], 
            "attrsx" :
            [
                "{$text1}",
                "{$text2}",
                "{$text3}"
            ], 
            "txts" : ' . $wpContentStr_Labels . '
        };
        
        // Variable global que recoge el parse de la respuesta del servidor en la consulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="' . $Lang . '";

 </script>

    <!-- JavaScripts External Files -->
    <script src="' . JS_DIR . '/cs_standars_functions.js"></script>

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
              <h6 class="text-center" id="text1" style="display: none;">{$text1}</h6>
              <h6 class="text-center">Todos los archivos</h6>
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

        <?php

        /* echo "<pre>";
        var_dump($Arry);
        echo "</pre>"; */
        
        ?>

        <div class="row">

          <?php if(count($Arry) < 1): ?>
          
          <div class="col-12 anotacion">
            Aún no hay archivos asociados
          </div>
          
          <?php endif; ?>

          <?php foreach($Arry as $file): ?>
            
            <?php if(isImage($file)): ?>
            
              <div class="col-sm-3 item-container">
                <a href="./download.php?Lang=<?php echo $Lang; ?>&wph=23&path=<?= $file ?>">
                  <div class="card no-dismissable">
                    <div class="image-container">
                      <img src="<?= $file ?>" alt="Imagen">
                    </div>
                  </div>
                </a>
              </div>

            <?php else: ?>
            
              <div class="col-sm-3 item-container">
                <a href="./download.php?Lang=<?php echo $Lang; ?>&wph=23&path=<?= $file ?>">
                  <div class="card no-dismissable">
                    <span><?= getPathFileName($file) ?></span>
                  </div>
                </a>
              </div>

            <?php endif; ?>
            
          <?php endforeach; ?>


        </div>

      </div>
    </section>

  </main>

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