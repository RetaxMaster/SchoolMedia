<?php

// ****************************************************************
// Este archivo contiene la rutina de secuencia para validar un usuario 
// antes de enviar el formulario para inicio de sesion 
// *****************************************************************
    $un=$_GET["un"]; // Recoge el nombre de usuario.
    $cp=$_GET["cp"]; // Recoge el password pseudo encriptado
    if (!isset($un)) {echo '[{"validated" : -1}]'; exit;} // Sino trae parametro se envia error y se detiene ejecucion
    if (!isset($cp)) {echo '[{"validated" : -1}]'; exit;} // sino trae parametro se coloca vacio
    // Se cargan las librerias requeridas
    include_once("./phplib/dbmngmt.php"); // Se carga la libreria de admin de DB
    include_once(LIBRARY_DIR."/adminUser.php");
    include_once(LIBRARY_DIR."/shared.php");
    include_once(LIBRARY_DIR."/login_out.php");
    // Se asigna el id de usuario correspondiente, si responde nulo, se cierra la ejecucion de la rutina
    if (is_null(GetIDFromUN($un))){
        echo '[{"validated" : -1}]';
        exit;
    }else{
        $iUID=GetIDFromUN($un);
    }
    $cp=ENCRYPT_DECRYPT($cp);                                    
    if (ValidateLoggedPasswd($iUID,$cp)) {
        // Cierra todas las sesiones del usuario y Responder con valor de preaprobado y 
        //DeleteLoggedCon($iUID); // cierra todas las conexiones actuales
        CreateNewLoggedSesion($iUID,time()+3600,$_ENV["REMOTE_ADDR"],$_ENV["REQUEST_URI"],$USS);
        echo '[{"validated" : 1}, {"session" : '.$USS.'}]'; // se responde con validado en 1, y el ID de la session
    }else{                                                                       
        echo '[{"validated" : 0}, {"session" : 0}]'; // se responde con invalido en 0, no se debe disparar el formulario para hacer sesion
    }
?>



