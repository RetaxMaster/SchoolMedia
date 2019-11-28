<?php
// Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
include_once("./phplib/dbmngmt.php"); // Se carga la libreria de admin de DB
include_once(LIBRARY_DIR . "/ajax_valid_conn.php"); // Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
$enabled = (isset($_GET["enbd"])) ? $_GET["enbd"] : -1; // se recuperan los parametros de la consulta

if (isset($_POST["mode"]) && !empty($_POST["mode"])) {

    switch ($_POST["mode"]) {

        case 'filterClientsByCtry':
            include_once(LIBRARY_DIR . "/clients.php");
            clients_recoveryAllByAnyField($n, $Arry, "tbl_cagenclients.id_pais", $_POST["pais"], $enabled, true);
            break;

        case 'filterClientsByType':
            include_once(LIBRARY_DIR . "/clients.php");
            clients_recoveryAllByAnyField($n, $Arry, "tbl_cagenclients.id_tipo", $_POST["tipoCliente"], $enabled, true);
            break;
        
        default:
            die("No existe ese modo de consulta.");
            break;
            
    }

    JSonformatedData($n, $Arry, $JSonDataObj); // Se hace el formato de Cadena embebido JSon para ser enviado. Pertenece a Shared
    echo $JSonDataObj; // Se devueve el objeto JSon
    /*echo '{
        "draw": 1,
        "recordsTotal": 1,
        "recordsFiltered": 1,
        "data": [
            ["25", "BM", "Bermudas", true]
        ]
    }';*/
}
else {
    die("No se ha definido un modo de consulta.");
}



