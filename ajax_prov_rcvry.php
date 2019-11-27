<?php
// Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
    $enabled=(isset($_GET["enbd"])) ? $_GET["enbd"] : -1;  
    $table_req=(isset($_GET["tReq"])) ? $_GET["tReq"] : -1;
    $ctryID=(isset($_GET["ctryID"])) ? $_GET["ctryID"] : -1;
    include_once("./phplib/dbmngmt.php"); // Se carga la libreria de admin de DB
    include_once(LIBRARY_DIR."/ajax_valid_conn.php"); // Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
    include_once(LIBRARY_DIR."/provincias.php"); // Se incluyen las funciones de control de paises
 // Se recogen los parametros de la consulta
    switch ($table_req) {
        case 0 : 
            pv_recoveryAllListEnabled_Lst($nProv,$ProvArry,$ctryID,$enabled);
            break;
        case 1 :
            pv_recoveryAllListEnabled_Lst($nProv,$ProvArry,$ctryID,$enabled); // Se recuperan todos los registros de todos los paises, activos o no
            break;
    }
    JSonformatedData($nProv,$ProvArry,$JSonDataObj); // Se hace el formato de Cadena embebido JSon para ser enviado. Pertenece a Shared
    echo $JSonDataObj; // Se devueve el objeto JSon
    /*echo '{
        "draw": 1,
        "recordsTotal": 1,
        "recordsFiltered": 1,
        "data": [
            ["25", "BM", "Bermudas", true]
        ]
    }';*/
?>