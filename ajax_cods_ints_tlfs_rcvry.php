<?php
// Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
    include_once("./phplib/dbmngmt.php"); // Se carga la libreria de admin de DB
    include_once(LIBRARY_DIR."/ajax_valid_conn.php"); // Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
    include_once(LIBRARY_DIR."/cods_ints_tlfs.php"); // Se incluyen las funciones de control de paises
    $codVisible=(isset($_GET['cv'])) ? $_GET['cv'] : 0; // se recuperan los parametros de la consulta
    citlf_recoveryAllList($n,$Arry,$codVisible); // Se recuperan todos los registros de todos los codigos internacionales de paises
    // si codVisible es 1, se recupera el codigo del pais como dato del arreglo, si es cero, se recupera el nombre del pais 
    // como texto o nombre del pais
    JSonformatedData($n,$Arry,$JSonDataObj); // Se hace el formato de Cadena embebido JSon para ser enviado. Pertenece a Shared
    echo $JSonDataObj; // Se devueve el objeto JSon
?>