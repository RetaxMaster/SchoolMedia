<?php
// Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
    include_once("./phplib/dbmngmt.php"); // Se carga la libreria de admin de DB
    include_once(LIBRARY_DIR."/ajax_valid_conn.php"); // Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
    include_once(LIBRARY_DIR."/companie.php"); // Se incluyen las funciones de control de paises
    $enabled=(isset($_GET["enbd"])) ? $_GET["enbd"] : -1; // se recuperan los parametros de la consulta
    comp_recoveryAllList($n, $Arry, $enabled, true); // Se recuperan todos los registros de todos los paises, activos o no
    JSonformatedData($n,$Arry,$JSonDataObj); // Se hace el formato de Cadena embebido JSon para ser enviado. Pertenece a Shared
    echo $JSonDataObj; // Se devueve el objeto JSon
    /*echo '{
        "draw": 1,
        "recordsTotal": 1,
        "recordsFiltered": 1,
        "data": [
            ["25", "BM", "Bermudas", true]
        ]
    }';*/
