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

        case 'getCtryCode':
            include_once(LIBRARY_DIR . "/cods_ints_tlfs.php");
            citlf_recoveryBy_paisID($n, $Arry, $_POST["ctryId"], 1);
            break;

        case 'getClasifCli':
            include_once(LIBRARY_DIR . "/clasif_cuentas.php");
            cc_recoveryAllList($n, $Arry);
            break;

        case 'getTipoCli':
            include_once(LIBRARY_DIR . "/tipos_clients.php");
            tc_recoveryAllList($n, $Arry);
            break;

        case 'getCalifCli':
            include_once(LIBRARY_DIR . "/calific.php");
            cal_recoveryAllList($n, $Arry);
        break;

        case 'uploadInfo':
            include_once(LIBRARY_DIR . "/clients.php");
            $rs = $_POST["rucCliente"] or "";
            $ruc = $_POST["razSocCliente"] or "";
            $addrs = $_POST["dirCliente"] or "";
            $id_pais = $_POST["pais"] or "";
            $id_prov = $_POST["provincia"] or "";
            $email = $_POST["email"] or "";
            $id_ctrycodefijo = $_POST["CodPaisTel"] or "";
            $tel = $_POST["telCliente"] or "";
            $ext = $_POST["extCliente"] or "";
            $id_ctrycodecel = $_POST["CodPaisCel"] or "";
            $cel = $_POST["telCliente"] or "";
            $website = $_POST["httpCliente"] or "";
            $id_tipo = $_POST["TipoCliente"] or "";
            $id_clasific = $_POST["Clasif"] or "";
            $id_calif = $_POST["Calif"] or "";
            $descrip = $_POST["observCliente"] or "";
            $enabled = isset($_POST["clienteHabilitado"]) ? 1 : 0;
            clients_createRecord($rs, $ruc, $addrs, $id_pais, $id_prov, $email, $id_ctrycodefijo, $tel, $ext, $id_ctrycodecel, $cel, $website, $id_tipo, $id_clasific, $id_calif, $descrip, $enabled);
            die();
            break;

        case 'filterClientsContByCtry':
            include_once(LIBRARY_DIR . "/cclients.php");
            cclients_recoveryAllByAnyField($n, $Arry, "tbl_cacclients.id_pais", $_POST["pais"], $enabled, true);
            break;

        case 'filterClientsContByType':
            include_once(LIBRARY_DIR . "/cclients.php");
            cclients_recoveryAllByAnyField($n, $Arry, "tbl_cacclients.id_tipo", $_POST["tipoCliente"], $enabled, true);
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



