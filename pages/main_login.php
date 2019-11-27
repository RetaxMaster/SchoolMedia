<?php
    // ------------------------------------------------ HEAD HTML ------------------------------------------------->
    include_once(INCLUDES_DIR."/meta_head.php"); 
    echo '<!-- Custom JavaScripts Functions Needs
    ================================================== -->
    <!-- JavaScripts Global Vars -->
    <script>
// Se guardan todos los labels
        var global_txtObj={
            "components_ids" : 
            [
                "titleBanner",
                "titlelogin",
                "div_btnliTxt",
                "forgotp_lnk",
                "btnprecvry",
                "btnpforgotten"            
            ], 
            "attrsx" :
            [
                "{$titleBanner}",
                "{$titlelogin}",
                "{$div_btnliTxt}",
                "{$forgotp_lnk}",
                "{$btnprecvry}",
                "{$btnpforgotten}"           
            ], 
            "txts" : '.$wpContentStr_Labels.'
        };
        
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
            "txts" : '.$wpContentStr_Hints.'
        };

        // Se guardan los textos de acuerdo a los mensajes
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
            "txts" : '.$wpContentStr_Msgs.'
        };

        // Variable global que recoge el parse de la respuesta del servidor en la cosnulta de Ajax, se inicializa en null
        ajaxResponse = null;
        globalLang="'.$Lang.'";

    </script>

    <!-- JavaScripts External Files -->
    <script src="'.JS_DIR.'/cs_standars_functions.js"></script>
    <script src="'.JS_DIR.'/cs_login_ajax.js"></script>

</head>';?>
<body onload="javascript:onPageStart()">

    <!-- ----------<strong>Ingresando a la plataforma.</strong> Por favor espere...]-------------------------------- SECCIÓN PRINCIPAL --------------------------------------------->
    
    <section class="principal">  
        <div class="container-fluid">
            <div class="row .no-gutters">
                <div class="col-lg-9 col-md-7 xsNone padOff">
                    <div class="banner" style="background-image: url(<?php echo IMG_WEBPAGE_DIR; ?>/fondo-login.jpg);">
                        <h4 id="titleBanner" class="titleBanner">{$titleBanner}</h4>
                    </div>  
                </div>
                <div class="col-lg-3 col-md-5 padOff">
                    <!-- --------------------------- LOGO SHOOL MEDIA ---------< ?php echo $wpContent[0][4]; ?>-------------------------->
                    <div class="contLogo">
                        <img src="<?php echo IMG_WEBPAGE_DIR; ?>/logo-school-media.png" alt="">
                    </div>   

                    <!-- --------------------------- FORMULARIO LOGIN ----------------< ?php echo $wpContent[1][4]; ?>------------------->
                    <div class="form-login">
                        <h2 id="titlelogin" class="text-center title-login">{$titlelogin}</h2>
                        <br>
                        <!-- formulario login -->
                        <form id="IdFormLogin" method="POST" action="./main.php?Lang=<?php echo $Lang;?>&wph=2">
                            <label class="sr-only" for="inlineFormInputGroupUsername2">{$userName}</label>
                            <div id="div_userName" class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="{$userName}" required>
                                <input type="hidden" id="id_uss" name="id_uss" value='-1'>
                            </div>
                            <br>
                            <div id='div_p' class="form-group">                                
                                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="{$passwd}" required>
                            </div>
                            <br>
                            <!-- Mensaje de ingreso !-->
                            <div id='div_msg_in' class="alert alert-primary alert-dismissible fade show" role="alert">
                                {$div_msg_in}
                                <!-- button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button -->
                            </div>
                            <!-- Mensaje Successful !-->
                            <div id='div_msg_in_succ' class="alert alert-success alert-dismissible fade show" role="alert">
                                {$div_msg_in_succ}
                                <!-- button type="button" class="close" data-dismiss="alert" aria-label="Close"  onclick="logInDenied()"><span aria-hidden="true">&times;</span></button -->
                            </div>
                            <!-- Mensaje de Error !-->
                            <div id='div_msg_in_errn' class="alert alert-danger alert-dismissible fade show" role="alert">
                                {$div_msg_in_errn}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="restoreLogin()"><span aria-hidden="true">&times;</span></button>
                            </div>
                             <!-- Mensaje de ingreso !-->
                             <div id='div_msg_cp' class="alert alert-primary alert-dismissible fade show" role="alert">
                                {$div_msg_cp}
                                <!-- button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button -->
                            </div>
                            <!-- Mensaje Successful !-->
                            <div id='div_msg_cp_succ' class="alert alert-success alert-dismissible fade show" role="alert">
                                {$div_msg_cp_succ}
                                <!-- button type="button" class="close" data-dismiss="alert" aria-label="Close"  onclick="logInDenied()"><span aria-hidden="true">&times;</span></button -->
                            </div>
                            <!-- Mensaje de Error !-->
                            <div id='div_msg_cp_errn' class="alert alert-danger alert-dismissible fade show" role="alert">
                                {$div_msg_cp_errn}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="restoreLogin()"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <!-- Boton de aceptar e ingresar al sistema !-->
                            <div id='div_btnli' class="divBtnLogin">
                                <button id='div_btnliTxt' onclick="javascript:logInProccess();" type="button" class="btn btn-primary btn-login">{$div_btnliTxt}</button>
                            </div> 
                            <br>
                            <hr id="hr_line">
                            <p id="forgotp_lnk" class="p-olvido-pass">{$forgotp_lnk}<a id="btnprecvry" href="javascript:ChangePasswdProccess()">{$btnprecvry}</a></p>
                        </form>
    
                        <!-- formulario recuperar contraseña  -->
                        <form id="IdFormResetPass" method="POST" action="#" style="display: none;">
                            <label class="sr-only" for="inlineFormInputGroupUsername2">{$Username}</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="usernameRcvryPasswd" name="usernameRcvryPasswd" placeholder="{$userName}">
                            </div>
                            <br><br>
                            <div class="divBtnLogin">
                                <button id="btnpforgotten" onclick="javascript:recoveryProcess();" type="button" class="btn btn-primary btn-login">{$btnpforgotten}</button>
                            </div> 
                        </form>
                    </div>  
                </div>
            </div>            
        </div>  
    </section>

    <footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 footer">
                <p class="text-center">Powered by: Soluciones DTP, SA. &copy; Copyright 2019. Todos los derechos Reservados.</p>
            </div>
        </div>
    </div>   
</footer>
     
     
    <!-------------------------------------------------- FOOTER -------------------------------------------->
    <?
    include_once(INCLUDES_DIR."/footer.php"); 
    ?>   
    
</body>
</html>