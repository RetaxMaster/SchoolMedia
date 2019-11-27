<?php

// ****************************************************************
// Este archivo contiene la rutina de secuencia para validar un usuario 
// antes de enviar el formulario para inicio de sesion 
// *****************************************************************
    include_once("./phplib/dbmngmt.php"); // Se carga la libreria de admin de DB
    include_once(LIBRARY_DIR."/admin_wpHeader.php");
    include_once(LIBRARY_DIR."/admin_wpContent.php");
    include_once(LIBRARY_DIR."/stringmngmt.php");
    include_once(LIBRARY_DIR."/shared.php"); // contiene la funcion errorWindow($MSG1)
    include_once(LIBRARY_DIR."/adminUser.php");

    $Lang=$_GET["Lang"]; // Sino hay un idioma prefijado se fija en es.
    $id_wph=$_GET["wph"]; // Sino hay una pagina prefijada se define en 0 (pagina de login)
    if (!isset($Lang)) {$Lang="es";} // Por defecto en español
    if (!isset($id_wph)) {$id_wph=0;}
    $un=$_GET["un"]; // Recoge el nombre de usuario.
    if (!isset($un)) {echo '[{"validated" : -1}]'; exit;} // Sino trae parametro se envia error y se detiene ejecucion
    // Se asigna el id de usuario correspondiente, si responde nulo, se cierra la ejecucion de la rutina
    if (is_null(GetIDFromUN($un))){
        echo '[{"validated" : -1}]'; // no tiene entrada en la DB
        exit;
    }
    $iUID=GetIDFromUN($un);
    switch (VerifyUserBloqued($iUID)){ //  asi el resultado es cero esta bloqueado, si es 1 esta activo, se recupera clave solo de usuario activo
        case 0: // usuario bloqueado ya que en el paso anterior se reconocio que existia
            echo '[{"validated" : 0}]'; // no tiene entrada en la DB
            exit;
        case 1:
            $usereMail=RecoveryUserMainMail($iUID);
            // Pagina 1 corresponde a la Plantilla de eMail, lo tipos de componentes 0 corresponden a los textos
            GetWPHeaderByid_Lang($id_wph,$Lang,$wpHeader,$nWPH); // Se recupera el titulo de la pagina y los parametros de cabecera
            GetWPContentByid_Lang_compKind($id_wph,$Lang,0,$wpContentLabels,$nWPC); // Recuperacion de los registros que continene labels (0)
            extractColumn($wpContentLabels,4,$wpContentArry_Labels); // extrae solo la columna 4 de los textos de los labels 
            $tempPasswd=substr(GenerateNewPasswd(),0,12); //ENCRYPT_DECRYPT( Se crea un password temporal truncado a 12 caracteres
            $encryptedTempPasswd=Encrypt($tempPasswd); // Se encrypta para poder ser almacenado en la DB
            UpdateUserPasswd_id($iUID,$encryptedTempPasswd); // se actualiza el nev password encryptado
            // Si la pagina no devolvio resultados o tiene menos de 4 componentes hay un error en los parametros
            // puede que hayan tratado de acceder a informacion no permitida, por lo que debe suspenderse de inmediato toda carga
            if (($nWPC<4) or ($nWPH<1)) {echo '[{"validated" : -2}]'; exit;}
            $sendTo=$usereMail;  
            $subject=$wpHeader[1];
            $bodyMessage="
            <html>\r\n
                <head>\r\n
                    <title>".$wpHeader[1].".:.".SITE_NAME."></title>\r\n
                </head>\r\n
                <body>\r\n
                    <p align='left'><img src='http://www.esdca.net/schoolMedia/page/images/webpage/logo-school-media.png' width='35%' height='35%'></p>\r\n
                    <p align='justify'>".utf8_decode($wpContentArry_Labels[0])."</p>\r\n
                    <p align='justify'><strong>".utf8_decode($wpContentArry_Labels[1])."</strong> ".utf8_decode($tempPasswd)."</p>\r\n
                    <p align='justify'><strong>".utf8_decode($wpContentArry_Labels[2])."</strong> ".utf8_decode($wpContentArry_Labels[3])."</p>\r\n
                    <hr>\r\n
                    <p>".utf8_decode($wpContentArry_Labels[4])."</p>\r\n
                </body>\r\n
                </html>\r\n";
            $cabeceras = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";//'Content-type: text/html; charset=iso-8859-1' . "\r\n";  ;
            $cabeceras .= 'From: School Media Support<support@schoolmediapanama.com>' . "\r\n";
            if (@mail("$sendTo","$subject","$bodyMessage","$cabeceras"))
            {
                if ($Lang=='es') {
                    echo '[{"validated" : 1}]'; // Se proceso satisfactoriamente el email
                    break;
                 }else{
                    echo '[{"validated" : -2}]';
                }
            }
        default:
            echo '[{"validated" : -3}]'; // El usuairo se encuentra duplicado, debe revisarse la DB
    }
?>
