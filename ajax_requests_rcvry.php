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
            $rs = $_POST["razSocCliente"] or "";
            $ruc = $_POST["rucCliente"] or "";
            $addrs = $_POST["dirCliente"] or "";
            $id_pais = $_POST["pais"] or "";
            $id_prov = $_POST["provincia"] or "";
            $email = $_POST["email"] or "";
            $id_ctrycodefijo = $_POST["CodPaisTel"] or "";
            $tel = $_POST["telCliente"] or "";
            $ext = $_POST["extCliente"] or "";
            $id_ctrycodecel = $_POST["CodPaisCel"] or "";
            $cel = $_POST["celCliente"] or "";
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

        case 'getClients':
            include_once(LIBRARY_DIR . "/clients.php");
            clients_recoveryAllList($n, $Arry, $enabled, true);
            break;

        case 'gettpub':
            include_once(LIBRARY_DIR . "/format_pub.php");
            fp_recoveryAllList($n, $Arry);
            break;

        case 'getcargo':
            include_once(LIBRARY_DIR . "/crgo_laboral.php");
            crgo_recoveryAllList($n, $Arry);
            break;

        case 'getdepto':
            include_once(LIBRARY_DIR . "/dpto_empres.php");
            dpto_recoveryAllList($n, $Arry);
            break;

        case 'getPlans':
            include_once(LIBRARY_DIR . "/planes.php");
            plans_recoveryAllList($n, $Arry, $enabled);
            break;

        case 'getCaps':
            include_once(LIBRARY_DIR . "/capacitadores.php");
            caps_recoveryAllList($n, $Arry, true);
            break;

        case 'getUsers':
            include_once(LIBRARY_DIR . "/adminUser.php");
            RecoveryAllUsers($Arry, $n);
            break;

        case 'uploadClientContInfo':
            include_once(LIBRARY_DIR . "/cclients.php");
            $id_pais = $_POST["pais"] or "";
            $id_prov = $_POST["provincia"] or "";
            $id_client = $_POST["cliente"] or "";
            $id_tpub = $_POST["tpub"] or "";
            $nom = $_POST["nombre"] or "";
            $ape = $_POST["apellido"] or "";
            $email = $_POST["email"] or "";
            $id_ctrycodefijo = $_POST["CodPaisTel"] or "";
            $tel = $_POST["telCliente"] or "";
            $ext = $_POST["extCliente"] or "";
            $id_ctrycodecel = $_POST["CodPaisCel"] or "";
            $cel = $_POST["telCliente"] or "";
            $id_cargo = $_POST["cargo"] or "";
            $id_dptoemp = $_POST["depto"] or "";
            $descrip = $_POST["observCliente"]or "";
            $principal = isset($_POST["principal"]) ? 1 : 0;
            $enabled = isset($_POST["clienteHabilitado"]) ? 1 : 0;
            cclients_createRecord($id_pais, $id_prov, $id_client, $id_tpub, $nom, $ape, $email, $id_ctrycodefijo, $tel, $ext, $id_ctrycodecel, $cel, $id_cargo, $id_dptoemp, $principal, $descrip, $enabled);
            die();
            break;

        case 'filterLocAtsByProv':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            locs_recoveryAllByAnyField($n, $Arry, "tbl_calocats.id_prov", $_POST["pais"], $enabled, true);
            break;

        case 'filterLocAtsByTpub':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            locs_recoveryAllByAnyField($n, $Arry, "tbl_calocats.id_tpub", $_POST["tipoCliente"], $enabled, true);
            break;

        case 'uploadOcupEspaciosInfo':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            $id_pais = $_POST["pais"] or "";
            $id_prov = $_POST["provincia2"] or "";
            $id_client = $_POST["tcliente"] or "";
            $id_tpub = $_POST["tpub2"] or "";
            $cod = $_POST["cod"] or "";
            $cara = $_POST["cara"] or "";
            $wide = $_POST["weight"] or "";
            $high = $_POST["heigth"] or "";
            $enabled = isset($_POST["enabledPunb"]) ? 1 : 0;
            locs_createRecord($id_pais, $id_prov, $id_client, $id_tpub, $cod, $cara, $wide, $high, $enabled);
            die();
            break;

        case 'uploadRepImgInfo':
            include_once(LIBRARY_DIR . "/pubs.php");
            $id_client = $_POST["cliente"] or "";
            $descrip = $_POST["observCliente"] or "";
            $urlimg = $_POST["imgURL"] or "";
            pubs_createRecord($id_client, $descrip, $urlimg);
            die();
            break;

        case 'uploadListValsInfo':
            include_once(LIBRARY_DIR . "/list_vals.php");
            $descrip = $_POST["observCliente"] or "";
            lv_createRecord($descrip);
            die();
            break;

        case 'uploadCapsResInfo':
            include_once(LIBRARY_DIR . "/capacitadores.php");
            $id_user = $_POST["iduser"] or "";
            $formacad = $_POST["formacad"] or "";
            $skills = $_POST["skills"] or "";
            $certif = $_POST["certificaciones"] or "";
            $exp = $_POST["experiencias"] or "";
            $otros = $_POST["otros"] or "";
            caps_createRecord($id_user, $formacad, $skills, $certif, $exp, $otros);
            die();
            break;

        case 'uploadPlansAcadInfo':
            include_once(LIBRARY_DIR . "/planes.php");
            $tiempodura = $_POST["tiempodura"] or "";
            $id_modalidad = $_POST["modalidad"] or "";
            $temario = $_POST["temario"] or "";
            $prerrequisitos = $_POST["Prerrequisitos"] or "";
            $perfil = $_POST["perfil"] or "";
            $objetivos = $_POST["objetivos"] or "";
            $título = $_POST["titulo"] or "";
            $fcreac = date("Y-m-d");
            $lstenabled = isset($_POST["enabled"]) ? 1 : 0;
            plans_createRecord($tiempodura, $id_modalidad, $temario, $prerrequisitos, $perfil, $objetivos, $título, $fcreac, $lstenabled);
            die();
            break;

        case 'uploadDispPlansInfo':
            include_once(LIBRARY_DIR . "/disponibilidad.php");
            $id_plan = $_POST["idplan"] or "";
            $id_pais = $_POST["pais"] or "";
            $id_prov = $_POST["provincia"] or "";
            $enabled = isset($_POST["enabled"]) ? 1 : 0;
            disp_createRecord($id_plan, $id_pais, $id_prov, $enabled);
            die();
            break;

        case 'uploadDispCapInfo':
            include_once(LIBRARY_DIR . "/disp_cap.php");
            $id_cap = $_POST["id_cap"] or "";
            $id_pais = $_POST["pais"] or "";
            $id_prov = $_POST["provincia"] or "";
            $enabled = isset($_POST["enabled"]) ? 1 : 0;
            dispcap_createRecord($id_cap, $id_pais, $id_prov, $enabled);
            die();
            break;

        case 'uploadMatCapInfo':
            include_once(LIBRARY_DIR . "/cappapa.php");
            $id_cap = $_POST["id_cap"] or "";
            $idplan = $_POST["idplan"] or "";
            $id_pais = $_POST["pais"] or "";
            $id_prov = $_POST["provincia"] or "";
            $enabled = isset($_POST["enabled"]) ? 1 : 0;
            cappapa_createRecord($idplan, $id_cap, $id_pais, $id_prov, $enabled);
            die();
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



