<?php
// Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
    include_once("./phplib/dbmngmt.php"); // Se carga la libreria de admin de DB
    include_once(LIBRARY_DIR."/ajax_valid_conn.php"); // Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
    include_once(LIBRARY_DIR."/format_pub.php"); // Se incluyen las funciones de control de formatos publicitarios
    fp_recoveryAllList($nfPub,$fPubArry); // Se recuperan todos los registros de todos los paises, activos o no
    JSonformatedData($nfPub,$fPubArry,$JSonDataObj); // Se hace el formato de Cadena embebido JSon para ser enviado. Pertenece a Shared
    echo $JSonDataObj; // Se devueve el objeto JSon
?>