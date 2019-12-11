<?php
// Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
include_once("./phplib/dbmngmt.php"); // Se carga la libreria de admin de DB
include_once(LIBRARY_DIR . "/ajax_valid_conn.php"); // Se valida que el usuario que realiza la solicitud se encuentre logged y que la session siga activa
$enabled = (isset($_GET["enbd"])) ? $_GET["enbd"] : -1; // se recuperan los parametros de la consulta

if (isset($_POST["mode"]) && !empty($_POST["mode"])) {

    switch ($_POST["mode"]) {

            // Filtros por algún campo

        case 'filterClients':
            include_once(LIBRARY_DIR . "/clients.php");
            $query = $_POST["query"];

            clients_recoveryAllByAnyField($n, $Arry, "tbl_cagenclients.rs", $query, $enabled, true, "LIMIT 10");
            break;

        case 'filterClientsByCtry':
            include_once(LIBRARY_DIR . "/clients.php");
            $tipoCliente = $_POST["tipoCliente"];

            $extraWhere = hasValue($tipoCliente) ? "AND tbl_cagenclients.id_tipo = $tipoCliente" : "";
            
            clients_recoveryAllByAnyField($n, $Arry, "tbl_cagenclients.id_pais", $_POST["pais"], $enabled, true, $extraWhere);
            break;

        case 'filterClientsByType':
            include_once(LIBRARY_DIR . "/clients.php");
            $pais = $_POST["pais"];

            $extraWhere = hasValue($pais) ? "AND tbl_cagenclients.id_pais = $pais" : "";

            clients_recoveryAllByAnyField($n, $Arry, "tbl_cagenclients.id_tipo", $_POST["tipoCliente"], $enabled, true, $extraWhere);
            break;

        case 'filterProdServByCtry':
            include_once(LIBRARY_DIR . "/productos.php");
            prdcts_recoveryAllByAnyField($n, $Arry, "tbl_caprods.id_pais", $_POST["pais"], true);
            break;

        case 'filterClientsContByCtry':
            include_once(LIBRARY_DIR . "/cclients.php");
            $tipoCliente = $_POST["tipoCliente"];

            $extraWhere = hasValue($tipoCliente) ? "AND tbl_cagenclients.id_tipo = $tipoCliente" : "";
            
            cclients_recoveryAllByAnyField($n, $Arry, "tbl_cacclients.id_pais", $_POST["pais"], $enabled, true, $extraWhere);
            break;

        case 'filterClientsContByType':
            include_once(LIBRARY_DIR . "/cclients.php");
            $pais = $_POST["pais"];

            $extraWhere = hasValue($pais) ? "AND tbl_cacclients.id_pais = $pais" : "";

            cclients_recoveryAllByAnyField($n, $Arry, "tbl_cagenclients.id_tipo", $_POST["tipoCliente"], $enabled, true, $extraWhere);
            break;

        case 'filterTracksByCtry':
            include_once(LIBRARY_DIR . "/tracks.php");
            $tipoCliente = $_POST["tipoCliente"];

            $extraWhere = hasValue($tipoCliente) ? "AND tbl_cagenclients.id_tipo = $tipoCliente" : "";

            track_recoveryAllByAnyField($n, $Arry, "tbl_cagenclients.id_pais", $_POST["pais"], true, $extraWhere);
            break;

        case 'filterTracksByType':
            include_once(LIBRARY_DIR . "/tracks.php");
            $pais = $_POST["pais"];

            $extraWhere = hasValue($pais) ? "AND tbl_cagenclients.id_pais = $pais" : "";

            track_recoveryAllByAnyField($n, $Arry, "tbl_cagenclients.id_tipo", $_POST["tipoCliente"], true, $extraWhere);
            break;

        case 'filterLocAtsByCtry':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            $prov = $_POST["prov"];
            $tpub = $_POST["tpub"];

            $extraWhere = "";
            $extraWhere .= hasValue($prov) ? "AND tbl_calocats.id_prov = $prov " : "";
            $extraWhere .= hasValue($tpub) ? "AND tbl_calocats.id_tpub = $tpub " : "";

            locs_recoveryAllByAnyField($n, $Arry, "tbl_calocats.id_pais", $_POST["pais"], $enabled, true, $extraWhere);
            break;

        case 'filterLocAtsByProv':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            $pais = $_POST["pais"];
            $tpub = $_POST["tpub"];

            $extraWhere = "";
            $extraWhere .= hasValue($pais) ? "AND tbl_calocats.id_pais = $pais " : "";
            $extraWhere .= hasValue($tpub) ? "AND tbl_calocats.id_tpub = $tpub " : "";

            locs_recoveryAllByAnyField($n, $Arry, "tbl_calocats.id_prov", $_POST["prov"], $enabled, true, $extraWhere);
            break;

        case 'filterLocAtsByTpub':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            $pais = $_POST["pais"];
            $prov = $_POST["prov"];

            $extraWhere = "";
            $extraWhere .= hasValue($pais) ? "AND tbl_calocats.id_pais = $pais " : "";
            $extraWhere .= hasValue($prov) ? "AND tbl_calocats.id_prov = $prov " : "";

            locs_recoveryAllByAnyField($n, $Arry, "tbl_calocats.id_tpub", $_POST["tpub"], $enabled, true, $extraWhere);
            break;

        // Obtención de todos los registros de alguna tabla (Usualmente para rellenar un select)

        case 'getClientName':
            include_once(LIBRARY_DIR . "/clients.php");
            clients_recoveryOneByAnyField($n, $Arry, "tbl_cagenclients.id_client", $_POST["id"], $enabled, true);
            break;

        /* case 'getCtryCode':
            include_once(LIBRARY_DIR . "/cods_ints_tlfs.php");
            citlf_recoveryBy_paisID($n, $Arry, $_POST["ctryId"], 1);
            break; */

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

        case 'getImp':
            include_once(LIBRARY_DIR . "/impuestos_consumo.php");
            caimps_recoveryAllList($n, $Arry, $enabled, true);
            break;

        case 'getimpbyctry':
            include_once(LIBRARY_DIR . "/impuestos_consumo.php");
            caimps_recoveryAllByAnyField($n, $Arry, $_POST["field"], $_POST["val"], $enabled, 1);
            break;

        case 'getClients':
            include_once(LIBRARY_DIR . "/clients.php");
            clients_recoveryAllList($n, $Arry, $enabled, true);
            break;

        case 'getContacto':
            include_once(LIBRARY_DIR . "/cclients.php");
            cclients_recoveryAllList($n, $Arry, $enabled, true);
            break;

        case 'getContactoByClient':
            include_once(LIBRARY_DIR . "/cclients.php");
            cclients_recoveryAllByAnyField($n, $Arry, $_POST["field"], $_POST["val"], $enabled, true);
            break;

        case 'getProceso':
            include_once(LIBRARY_DIR . "/procs_crm.php");
            procs_recoveryAllList($n, $Arry, true);
            break;

        case 'getSubproceso':
            include_once(LIBRARY_DIR . "/subprocs_crm.php");
            subprocs_recoveryAllList($n, $Arry, true);
            break;

        case 'gettpub':
            include_once(LIBRARY_DIR . "/format_pub.php");
            fp_recoveryAllList($n, $Arry);
            break;

        case 'getcargo':
            include_once(LIBRARY_DIR . "/crgo_laboral.php");
            crgo_recoveryAllList($n, $Arry);
            break;

        case 'getcargobydepto':
            include_once(LIBRARY_DIR . "/crgo_laboral.php");
            crgo_recoveryToShowByID_Dpto($n, $Arry, $_POST["val"]);
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

        case 'getCompanies':
            include_once(LIBRARY_DIR . "/companie.php");
            comp_recoveryAllList($n, $Arry, $enabled, true);
            break;

        case 'getUsers':
            include_once(LIBRARY_DIR . "/adminUser.php");
            RecoveryAllUsers($Arry, $n, $enabled, true);
            break;

        case 'getctrycode':
            include_once(LIBRARY_DIR . "/cods_ints_tlfs.php");
            citlf_recoveryAllListFormatted($n, $Arry);
            break;

        case 'getFactsHdrs':
            include_once(LIBRARY_DIR . "/fctr_hdr.php");
            fcthdr_recoveryAllList($n, $Arry, true);
            break;

        case 'getCots':
            include_once(LIBRARY_DIR . "/cot_hdrs.php");
            cothdrs_recoveryAllList($n, $Arry, true);
            break;

        case 'getFormasPago':
            include_once(LIBRARY_DIR . "/formas_pago.php");
            fps_recoveryAllList($n, $Arry, $enabled, true);
            break;

        // Obtención de registros por su id
        case 'getClientData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/clients.php");
            clients_recoveryOneByAnyField($n, $Arry, "id_client", $id, $enabled);
            break;

        case 'getClientContData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/cclients.php");
            cclients_recoveryOneByAnyField($n, $Arry, "id_cclient", $id, $enabled);
            break;

        case 'getSegClientsData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/tracks.php");
            track_recoveryOneByAnyField($n, $Arry, "id_track", $id);
            break;

        case 'getRepImgData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/pubs.php");
            pubs_recoveryOneByAnyField($n, $Arry, "id_pub", $id);
            break;

        case 'getCapsResData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/capacitadores.php");
            caps_recoveryOneByAnyField($n, $Arry, "id_cap", $id);
            break;

        case 'getPlansAcadData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/planes.php");
            plans_recoveryOneByAnyField($n, $Arry, "id_plan", $id, $enabled);
            break;

        case 'getDispPlansData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/disponibilidad.php");
            disp_recoveryOneByAnyField($n, $Arry, "id_dispa", $id, $enabled);
            break;

        case 'getDispCapData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/disp_cap.php");
            dispcap_recoveryOneByAnyField($n, $Arry, "id_dispcappais", $id, $enabled);
            break;

        case 'getMatCapData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/cappapa.php");
            cappapa_recoveryOneByAnyField($n, $Arry, "id_cappapais", $id, $enabled);
            break;

        case 'getPerfilData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/adminUser.php");
            RecoveryUserProfile_id($id, $Arry, $n);
            break;

        case 'getCentOpData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/companie.php");
            comp_recoveryOneByAnyField($n, $Arry, "id_company", $id, $enabled);
            break;

        case 'getOcupEspaciosData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/loc_ats.php");
            locs_recoveryOneByAnyField($n, $Arry, "id_locat", $id, $enabled);
            break;

        case 'getProdServData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/productos.php");
            prdcts_recoveryOneByAnyField($n, $Arry, "id_prod", $id);
            break;

        case 'getConvContData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/contratos.php");
            ctrts_recoveryOneByAnyField($n, $Arry, "id_ctto", $id, $enabled);
            break;

        // Insertado de datas

        case 'uploadInfo':
            include_once(LIBRARY_DIR . "/clients.php");
            $rs = isset($_POST["razSocCliente"]) ? $_POST["razSocCliente"] : "";
            $ruc = isset($_POST["rucCliente"]) ? $_POST["rucCliente"] : "";
            $addrs = isset($_POST["dirCliente"]) ? $_POST["dirCliente"] : "";
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $id_prov = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $id_ctrycodefijo = isset($_POST["CodPaisTel"]) ? $_POST["CodPaisTel"] : "";
            $tel = isset($_POST["telCliente"]) ? $_POST["telCliente"] : "";
            $ext = isset($_POST["extCliente"]) ? $_POST["extCliente"] : "";
            $id_ctrycodecel = isset($_POST["CodPaisCel"]) ? $_POST["CodPaisCel"] : "";
            $cel = isset($_POST["celCliente"]) ? $_POST["celCliente"] : "";
            $website = isset($_POST["httpCliente"]) ? $_POST["httpCliente"] : "";
            $id_tipo = isset($_POST["TipoCliente"]) ? $_POST["TipoCliente"] : "";
            $id_clasific = isset($_POST["Clasif"]) ? $_POST["Clasif"] : "";
            $id_calif = isset($_POST["Calif"]) ? $_POST["Calif"] : "";
            $descrip = isset($_POST["observCliente"]) ? $_POST["observCliente"] : "";
            $enabled = isset($_POST["clienteHabilitado"]) ? 1 : 0;
            clients_createRecord($rs, $ruc, $addrs, $id_pais, $id_prov, $email, $id_ctrycodefijo, $tel, $ext, $id_ctrycodecel, $cel, $website, $id_tipo, $id_clasific, $id_calif, $descrip, $enabled);
            die();
            break;

        case 'uploadClientContInfo':
            include_once(LIBRARY_DIR . "/cclients.php");
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $id_prov = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
            $id_client = isset($_POST["cliente"]) ? $_POST["cliente"] : "";
            $id_tpub = isset($_POST["tpub"]) ? $_POST["tpub"] : "";
            $nom = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $ape = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $id_ctrycodefijo = isset($_POST["CodPaisTel"]) ? $_POST["CodPaisTel"] : "";
            $tel = isset($_POST["telCliente"]) ? $_POST["telCliente"] : "";
            $ext = isset($_POST["extCliente"]) ? $_POST["extCliente"] : "";
            $id_ctrycodecel = isset($_POST["CodPaisCel"]) ? $_POST["CodPaisCel"] : "";
            $cel = isset($_POST["telCliente"]) ? $_POST["telCliente"] : "";
            $id_cargo = isset($_POST["cargo"]) ? $_POST["cargo"] : "";
            $id_dptoemp = isset($_POST["depto"]) ? $_POST["depto"] : "";
            $descrip = isset($_POST["observCliente"]) ? $_POST["observCliente"] : "";
            $principal = isset($_POST["principal"]) ? 1 : 0;
            $enabled = isset($_POST["clienteHabilitado"]) ? 1 : 0;
            cclients_createRecord($id_pais, $id_prov, $id_client, $id_tpub, $nom, $ape, $email, $id_ctrycodefijo, $tel, $ext, $id_ctrycodecel, $cel, $id_cargo, $id_dptoemp, $principal, $descrip, $enabled);
            die();
            break;

        case 'uploadOcupEspaciosInfo':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $id_prov = isset($_POST["provincia2"]) ? $_POST["provincia2"] : "";
            $id_client = isset($_POST["tcliente"]) ? $_POST["tcliente"] : "";
            $id_tpub = isset($_POST["tpub2"]) ? $_POST["tpub2"] : "";
            $cod = isset($_POST["cod"]) ? $_POST["cod"] : "";
            $cara = isset($_POST["cara"]) ? $_POST["cara"] : "";
            $wide = isset($_POST["weight"]) ? $_POST["weight"] : "";
            $high = isset($_POST["heigth"]) ? $_POST["heigth"] : "";
            $enabled = isset($_POST["enabledPunb"]) ? 1 : 0;
            locs_createRecord($id_pais, $id_prov, $id_client, $id_tpub, $cod, $cara, $wide, $high, $enabled);
            die();
            break;

        case 'uploadRepImgInfo':
            include_once(LIBRARY_DIR . "/pubs.php");
            $id_client = isset($_POST["cliente"]) ? $_POST["cliente"] : "";
            $descrip = isset($_POST["observCliente"]) ? $_POST["observCliente"] : "";
            $urlimg = uploadImage($_FILES["imgURL"], "images/publicidades");
            pubs_createRecord($id_client, $descrip, $urlimg);
            die();
            break;

        case 'uploadListValsInfo':
            include_once(LIBRARY_DIR . "/list_vals.php");
            $descrip = isset($_POST["observCliente"]) ? $_POST["observCliente"] : "";
            lv_createRecord($descrip);
            die();
            break;

        case 'uploadCapsResInfo':
            include_once(LIBRARY_DIR . "/capacitadores.php");
            $id_user = isset($_POST["iduser"]) ? $_POST["iduser"] : "";
            $formacad = isset($_POST["formacad"]) ? $_POST["formacad"] : "";
            $skills = isset($_POST["skills"]) ? $_POST["skills"] : "";
            $certif = isset($_POST["certificaciones"]) ? $_POST["certificaciones"] : "";
            $exp = isset($_POST["experiencias"]) ? $_POST["experiencias"] : "";
            $otros = isset($_POST["otros"]) ? $_POST["otros"] : "";
            caps_createRecord($id_user, $formacad, $skills, $certif, $exp, $otros);
            die();
            break;

        case 'uploadPlansAcadInfo':
            include_once(LIBRARY_DIR . "/planes.php");
            $tiempodura = isset($_POST["tiempodura"]) ? $_POST["tiempodura"] : "";
            $id_modalidad = isset($_POST["modalidad"]) ? $_POST["modalidad"] : "";
            $temario = isset($_POST["temario"]) ? $_POST["temario"] : "";
            $prerrequisitos = isset($_POST["Prerrequisitos"]) ? $_POST["Prerrequisitos"] : "";
            $perfil = isset($_POST["perfil"]) ? $_POST["perfil"] : "";
            $objetivos = isset($_POST["objetivos"]) ? $_POST["objetivos"] : "";
            $título = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
            $fcreac = date("Y-m-d");
            $lstenabled = isset($_POST["enabled"]) ? 1 : 0;
            plans_createRecord($tiempodura, $id_modalidad, $temario, $prerrequisitos, $perfil, $objetivos, $título, $fcreac, $lstenabled);
            die();
            break;

        case 'uploadDispPlansInfo':
            include_once(LIBRARY_DIR . "/disponibilidad.php");
            $id_plan = isset($_POST["idplan"]) ? $_POST["idplan"] : "";
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $id_prov = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
            $enabled = isset($_POST["enabled"]) ? 1 : 0;
            disp_createRecord($id_plan, $id_pais, $id_prov, $enabled);
            die();
            break;

        case 'uploadDispCapInfo':
            include_once(LIBRARY_DIR . "/disp_cap.php");
            $id_cap = isset($_POST["id_cap"]) ? $_POST["id_cap"] : "";
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $id_prov = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
            $enabled = isset($_POST["enabled"]) ? 1 : 0;
            dispcap_createRecord($id_cap, $id_pais, $id_prov, $enabled);
            die();
            break;

        case 'uploadMatCapInfo':
            include_once(LIBRARY_DIR . "/cappapa.php");
            $validate = validateMatCap($_POST);
            if ($validate["status"]) {
                die();
                $id_cap = isset($_POST["id_cap"]) ? $_POST["id_cap"] : "";
                $idplan = isset($_POST["idplan"]) ? $_POST["idplan"] : "";
                $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
                $id_prov = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
                $enabled = isset($_POST["enabled"]) ? 1 : 0;
                cappapa_createRecord($idplan, $id_cap, $id_pais, $id_prov, $enabled);
                die();
            }
            else {
                die($validate["message"]);
            }
            break;

        case 'uploadCentOpInfo':
            include_once(LIBRARY_DIR . "/companie.php");
            $rs = isset($_POST["razSocCliente"]) ? $_POST["razSocCliente"] : "";
            $ruc = isset($_POST["ruc"]) ? $_POST["ruc"] : "";
            $addrs = isset($_POST["address"]) ? $_POST["address"] : "";
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $id_prov = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $id_ctrycodefijo = isset($_POST["CodPaisTel"]) ? $_POST["CodPaisTel"] : "";
            $tel = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
            $enabled = isset($_POST["enabled"]) ? 1 : 0;
            comp_createRecord($rs, $ruc, $addrs, $id_pais, $id_prov, $email, $id_ctrycodefijo, $tel, $enabled);
            die();
            break;

        case 'uploadProdServInfo':
            include_once(LIBRARY_DIR . "/productos.php");
            $cod = isset($_POST["code"]) ? $_POST["code"] : "";
            $descrip = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $stock = isset($_POST["stock"]) ? $_POST["stock"] : "";
            $tiposp = isset($_POST["servprod"]) ? $_POST["servprod"] : "";
            $puvp = isset($_POST["puventa"]) ? $_POST["puventa"] : "";
            $id_imp = isset($_POST["imp"]) ? $_POST["imp"] : "";
            $costu = isset($_POST["cu"]) ? $_POST["cu"] : "";
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            prdcts_createRecord($cod, $descrip, $stock, $tiposp, $puvp, $id_imp, $costu, $id_pais);
            die();
            break;

        case 'uploadConvContInfo':
            include_once(LIBRARY_DIR . "/contratos.php");
            $codctto = isset($_POST["codctto"]) ? $_POST["codctto"] : "";
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $id_prov = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
            $id_client = isset($_POST["cliente"]) ? $_POST["cliente"] : "";
            $id_tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : "";
            $fini = isset($_POST["fini"]) ? $_POST["fini"] : "";
            $ffin = isset($_POST["ffin"]) ? $_POST["ffin"] : "";
            $ciclopub = isset($_POST["ciclopub"]) ? $_POST["ciclopub"] : "";
            $ciclomsgvalor = isset($_POST["ciclovalor"]) ? $_POST["ciclovalor"] : "";
            $cantcur = "";
            $descrip = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $enabled = isset($_POST["enabled"]) ? 1 : 0;
            ctrts_createRecord($codctto, $id_pais, $id_prov, $id_client, $id_tipo, $fini, $ffin, $ciclopub, $ciclomsgvalor, $cantcur, $descrip, $enabled);
            die();
            break;

        case 'uploadPerfilInfo':
            include_once(LIBRARY_DIR . "/adminUser.php");
            $id_companyA = isset($_POST["company"]) ? $_POST["company"] : "";
            $id_cargoA = isset($_POST["cargo"]) ? $_POST["cargo"] : "";
            $urlfotoA = uploadImage($_FILES["foto"], "images/users");
            $nomA = isset($_POST["nom"]) ? $_POST["nom"] : "";
            $apeA = isset($_POST["ape"]) ? $_POST["ape"] : "";
            $emailA = isset($_POST["email"]) ? $_POST["email"] : "";
            $id_ctrycodefijoA = isset($_POST["CodPaisTel"]) ? $_POST["CodPaisTel"] : "";
            $telA = isset($_POST["telCliente"]) ? $_POST["telCliente"] : "";
            $extA = isset($_POST["extCliente"]) ? $_POST["extCliente"] : "";
            $id_ctrycodecelA = isset($_POST["CodPaisCel"]) ? $_POST["CodPaisCel"] : "";
            $celA = isset($_POST["celCliente"]) ? $_POST["celCliente"] : "";
            $observA = isset($_POST["observCliente"]) ? $_POST["observCliente"] : "";
            $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "";
            CreateUserProfile($id_companyA, $id_cargoA, $urlfotoA, $nomA, $apeA, $emailA, $id_ctrycodefijoA, $telA, $extA, $id_ctrycodecelA, $celA, $observA, $sexo);
            die();
            break;

        case 'uploadSegClientesInfo':
            include_once(LIBRARY_DIR . "/tracks.php");
            $id_cclient = isset($_POST["contacto"]) ? $_POST["contacto"] : "";
            $id_client = isset($_POST["client"]) ? $_POST["client"] : "";
            $id_user = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
            $id_proc = isset($_POST["etapa"]) ? $_POST["etapa"] : "";
            $id_subproc = isset($_POST["accion"]) ? $_POST["accion"] : "";
            $descrip = isset($_POST["actividad"]) ? $_POST["actividad"] : "";
            $fcontact = date("Y-m-d");
            track_createRecord($id_cclient, $id_client, $id_user, $id_proc, $id_subproc, $descrip, $fcontact);
            die();
            break;

        case 'uploadLstValsInfo':
            include_once(LIBRARY_DIR . "/list_vals.php");
            $id_client = isset($_POST["cliente"]) ? $_POST["cliente"] : "";
            $descrip = isset($_POST["observCliente"]) ? $_POST["observCliente"] : "";
            $urlimg = uploadImage($_FILES["imgURL"], "images/publicidades");
            lv_createRecord($id_client, $descrip, $urlimg);
            die();
            break;


        //Actualizado de datas

        case 'updateInfo':
            include_once(LIBRARY_DIR . "/clients.php");
            $idToUpdate = $_POST["idToUpdate"];
            clients_updateRecord([
                "rs" => isset($_POST["razSocCliente"]) ? $_POST["razSocCliente"] : "",
                "ruc" => isset($_POST["rucCliente"]) ? $_POST["rucCliente"] : "",
                "addrs" => isset($_POST["dirCliente"]) ? $_POST["dirCliente"] : "",
                "id_pais" => isset($_POST["pais"]) ? $_POST["pais"] : "",
                "id_prov" => isset($_POST["provincia"]) ? $_POST["provincia"] : "",
                "email" => isset($_POST["email"]) ? $_POST["email"] : "",
                "id_ctrycodefijo" => isset($_POST["CodPaisTel"]) ? $_POST["CodPaisTel"] : "",
                "tel" => isset($_POST["telCliente"]) ? $_POST["telCliente"] : "",
                "ext" => isset($_POST["extCliente"]) ? $_POST["extCliente"] : "",
                "id_ctrycodecel" => isset($_POST["CodPaisCel"]) ? $_POST["CodPaisCel"] : "",
                "cel" => isset($_POST["celCliente"]) ? $_POST["celCliente"] : "",
                "website" => isset($_POST["httpCliente"]) ? $_POST["httpCliente"] : "",
                "id_tipo" => isset($_POST["TipoCliente"]) ? $_POST["TipoCliente"] : "",
                "id_clasific" => isset($_POST["Clasif"]) ? $_POST["Clasif"] : "",
                "id_calific" => isset($_POST["Calif"]) ? $_POST["Calif"] : "",
                "descrip" => isset($_POST["observCliente"]) ? $_POST["observCliente"] : "",
                "enabled" => isset($_POST["clienteHabilitado"]) ? 1 : 0
            ], $idToUpdate);
            die();
            break;

        case 'updateClientContInfo':
            include_once(LIBRARY_DIR . "/cclients.php");
            $idToUpdate = $_POST["idToUpdate"];
            cclients_updateRecord([
                "id_pais" => isset($_POST["pais"]) ? $_POST["pais"] : "",
                "id_prov" => isset($_POST["provincia"]) ? $_POST["provincia"] : "",
                "id_client" => isset($_POST["cliente"]) ? $_POST["cliente"] : "",
                "id_tpub" => isset($_POST["tpub"]) ? $_POST["tpub"] : "",
                "nom" => isset($_POST["nombre"]) ? $_POST["nombre"] : "",
                "ape" => isset($_POST["apellido"]) ? $_POST["apellido"] : "",
                "email" => isset($_POST["email"]) ? $_POST["email"] : "",
                "id_ctrycodefijo" => isset($_POST["CodPaisTel"]) ? $_POST["CodPaisTel"] : "",
                "tel" => isset($_POST["telCliente"]) ? $_POST["telCliente"] : "",
                "ext" => isset($_POST["extCliente"]) ? $_POST["extCliente"] : "",
                "id_ctrycodecel" => isset($_POST["CodPaisCel"]) ? $_POST["CodPaisCel"] : "",
                "cel" => isset($_POST["telCliente"]) ? $_POST["telCliente"] : "",
                "id_cargo" => isset($_POST["cargo"]) ? $_POST["cargo"] : "",
                "id_dptoemp" => isset($_POST["depto"]) ? $_POST["depto"] : "",
                "principal" => isset($_POST["principal"]) ? $_POST["observCliente"] : "",
                "descrip" => isset($_POST["observCliente"]) ? 1 : 0,
                "enabled" => isset($_POST["clienteHabilitado"]) ? 1 : 0
            ], $idToUpdate);
            die();
            break;

        case 'updateRepImgInfo':
            include_once(LIBRARY_DIR . "/pubs.php");
            $idToUpdate = $_POST["idToUpdate"];
            pubs_updateRecord([
                "id_client" => isset($_POST["cliente"]) ? $_POST["cliente"] : "",
                "descrip" => isset($_POST["observCliente"]) ? $_POST["observCliente"] : "",
                "urlimg" => (isset($_FILES["imgURL"]) && !empty($_FILES["imgURL"]["tmp_name"])) ? uploadImage($_FILES["imgURL"], "images/publicidades") : ""
            ], $idToUpdate);
            die();
            break;

        case 'updateCapsResInfo':
            include_once(LIBRARY_DIR . "/capacitadores.php");
            $idToUpdate = $_POST["idToUpdate"];
            caps_updateRecord([
                "id_user" => isset($_POST["iduser"]) ? $_POST["iduser"] : "",
                "formacad" => isset($_POST["formacad"]) ? $_POST["formacad"] : "",
                "skills" => isset($_POST["skills"]) ? $_POST["skills"] : "",
                "certif" => isset($_POST["certificaciones"]) ? $_POST["certificaciones"] : "",
                "exp" => isset($_POST["experiencias"]) ? $_POST["experiencias"] : "",
                "otros" => isset($_POST["otros"]) ? $_POST["otros"] : ""
            ], $idToUpdate);
            die();
            break;

        case 'updatePlansAcadInfo':
            include_once(LIBRARY_DIR . "/planes.php");
            $idToUpdate = $_POST["idToUpdate"];
            plans_updateRecord([
                "tiempodura" => isset($_POST["tiempodura"]) ? $_POST["tiempodura"] : "",
                "id_modalidad" => isset($_POST["modalidad"]) ? $_POST["modalidad"] : "",
                "temario" => isset($_POST["temario"]) ? $_POST["temario"] : "",
                "prerrequisitos" => isset($_POST["Prerrequisitos"]) ? $_POST["Prerrequisitos"] : "",
                "perfil" => isset($_POST["perfil"]) ? $_POST["perfil"] : "",
                "objetivos" => isset($_POST["objetivos"]) ? $_POST["objetivos"] : "",
                "título" => isset($_POST["titulo"]) ? $_POST["titulo"] : "",
                "lstenabled" => isset($_POST["enabled"]) ? 1 : 0
            ], $idToUpdate);
            die();
            break;

        case 'updateDispPlansInfo':
            include_once(LIBRARY_DIR . "/disponibilidad.php");
            $idToUpdate = $_POST["idToUpdate"];
            disp_updateRecord([
                "id_plan" => isset($_POST["idplan"]) ? $_POST["idplan"] : "",
                "id_pais" => isset($_POST["pais"]) ? $_POST["pais"] : "",
                "id_prov" => isset($_POST["provincia"]) ? $_POST["provincia"] : "",
                "enabled" => isset($_POST["enabled"]) ? 1 : 0
            ], $idToUpdate);
            die();
            break;

        case 'updateDispCapInfo':
            include_once(LIBRARY_DIR . "/disp_cap.php");
            $idToUpdate = $_POST["idToUpdate"];
            dispcap_updateRecord([
                "id_cap" => isset($_POST["id_cap"]) ? $_POST["id_cap"] : "",
                "id_pais" => isset($_POST["pais"]) ? $_POST["pais"] : "",
                "id_prov" => isset($_POST["provincia"]) ? $_POST["provincia"] : "",
                "enabled" => isset($_POST["enabled"]) ? 1 : 0
            ], $idToUpdate);
            die();
            break;

        case 'updateMatCapInfo':
            include_once(LIBRARY_DIR . "/cappapa.php");
            $idToUpdate = $_POST["idToUpdate"];
            cappapa_updateRecord([
                "id_cap" => isset($_POST["id_cap"]) ? $_POST["id_cap"] : "",
                "id_plan" => isset($_POST["idplan"]) ? $_POST["idplan"] : "",
                "id_pais" => isset($_POST["pais"]) ? $_POST["pais"] : "",
                "id_prov" => isset($_POST["provincia"]) ? $_POST["provincia"] : "",
                "enabled" => isset($_POST["enabled"]) ? 1 : 0
            ], $idToUpdate);
            die();
            break;

        case 'updatePerfilInfo':
            include_once(LIBRARY_DIR . "/adminUser.php");
            $idToUpdate = $_POST["idToUpdate"];
            perfil_updateRecord([
                "id_company" => isset($_POST["company"]) ? $_POST["company"] : "",
                "id_cargo" => isset($_POST["cargo"]) ? $_POST["cargo"] : "",
                "urlfoto" => (isset($_FILES["foto"]) && !empty($_FILES["foto"]["tmp_name"])) ? uploadImage($_FILES["foto"], "images/users") : "",
                "nom" => isset($_POST["nom"]) ? $_POST["nom"] : "",
                "ape" => isset($_POST["ape"]) ? $_POST["ape"] : "",
                "email" => isset($_POST["email"]) ? $_POST["email"] : "",
                "id_ctrycodefijo" => isset($_POST["CodPaisTel"]) ? $_POST["CodPaisTel"] : "",
                "tel" => isset($_POST["telCliente"]) ? $_POST["telCliente"] : "",
                "ext" => isset($_POST["extCliente"]) ? $_POST["extCliente"] : "",
                "id_ctrycodecel" => isset($_POST["CodPaisCel"]) ? $_POST["CodPaisCel"] : "",
                "cel" => isset($_POST["celCliente"]) ? $_POST["celCliente"] : "",
                "observ" => isset($_POST["observCliente"]) ? $_POST["observCliente"] : "",
                "sexo" => isset($_POST["sexo"]) ? $_POST["sexo"] : ""
            ], $idToUpdate);
            die();
            break;

        case 'updateCentOpInfo':
            include_once(LIBRARY_DIR . "/companie.php");
            $idToUpdate = $_POST["idToUpdate"];
            comp_updateRecord([
                "rs" => isset($_POST["razSocCliente"]) ? $_POST["razSocCliente"] : "",
                "ruc" => isset($_POST["ruc"]) ? $_POST["ruc"] : "",
                "addrs" => isset($_POST["address"]) ? $_POST["address"] : "",
                "id_pais" => isset($_POST["pais"]) ? $_POST["pais"] : "",
                "id_prov" => isset($_POST["provincia"]) ? $_POST["provincia"] : "",
                "email" => isset($_POST["email"]) ? $_POST["email"] : "",
                "id_ctrycodefijo" => isset($_POST["CodPaisTel"]) ? $_POST["CodPaisTel"] : "",
                "tel" => isset($_POST["telefono"]) ? $_POST["telefono"] : "",
                "enabled" => isset($_POST["enabled"]) ? 1 : 0
            ], $idToUpdate);
            die();
            break;

        case 'updateOcupEspaciosInfo':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            $idToUpdate = $_POST["idToUpdate"];
            locs_updateRecord([
                "id_pais" => isset($_POST["pais"]) ? $_POST["pais"] : "",
                "id_prov" => isset($_POST["provincia2"]) ? $_POST["provincia2"] : "",
                "id_client" => isset($_POST["tcliente"]) ? $_POST["tcliente"] : "",
                "id_tpub" => isset($_POST["tpub2"]) ? $_POST["tpub2"] : "",
                "cod" => isset($_POST["cod"]) ? $_POST["cod"] : "",
                "cara" => isset($_POST["cara"]) ? $_POST["cara"] : "",
                "wide" => isset($_POST["weight"]) ? $_POST["weight"] : "",
                "high" => isset($_POST["heigth"]) ? $_POST["heigth"] : "",
                "enabled" => isset($_POST["enabledPunb"]) ? 1 : 0
            ], $idToUpdate);
            die();
            break;

        case 'updateProdServInfo':
            include_once(LIBRARY_DIR . "/productos.php");
            $idToUpdate = $_POST["idToUpdate"];
            prdcts_updateRecord([
                "cod" => isset($_POST["code"]) ? $_POST["code"] : "",
                "descrip" => isset($_POST["descripcion"]) ? $_POST["descripcion"] : "",
                "stock" => isset($_POST["stock"]) ? $_POST["stock"] : "",
                "tiposp" => isset($_POST["servprod"]) ? $_POST["servprod"] : "",
                "puvp" => isset($_POST["puventa"]) ? $_POST["puventa"] : "",
                "id_imp" => isset($_POST["imp"]) ? $_POST["imp"] : "",
                "costu" => isset($_POST["cu"]) ? $_POST["cu"] : "",
                "id_pais" => isset($_POST["pais"]) ? $_POST["pais"] : ""
            ], $idToUpdate);
            die();
            break;

        case 'updateConvContInfo':
            include_once(LIBRARY_DIR . "/contratos.php");
            $idToUpdate = $_POST["idToUpdate"];
            ctrts_updateRecord([
                "codctto" => isset($_POST["codctto"]) ? $_POST["codctto"] : "",
                "id_pais" => isset($_POST["pais"]) ? $_POST["pais"] : "",
                "id_prov" => isset($_POST["provincia"]) ? $_POST["provincia"] : "",
                "id_client" => isset($_POST["cliente"]) ? $_POST["cliente"] : "",
                "id_tipo" => isset($_POST["tipo"]) ? $_POST["tipo"] : "",
                "fini" => isset($_POST["fini"]) ? $_POST["fini"] : "",
                "ffin" => isset($_POST["ffin"]) ? $_POST["ffin"] : "",
                "ciclopub" => isset($_POST["ciclopub"]) ? $_POST["ciclopub"] : "",
                "ciclomsgvalor" => isset($_POST["ciclovalor"]) ? $_POST["ciclovalor"] : "",
                "cantcur" => "",
                "descrip" => isset($_POST["descripcion"]) ? $_POST["descripcion"] : "",
                "enabled" => isset($_POST["enabled"]) ? 1 : 0
            ], $idToUpdate);
            die();
            break;

        case 'updateSegClientesInfo':
            include_once(LIBRARY_DIR . "/tracks.php");
            $idToUpdate = $_POST["idToUpdate"];
            track_updateRecord([
                "id_cclient" => isset($_POST["contacto"]) ? $_POST["contacto"] : "",
                "id_client" => isset($_POST["client"]) ? $_POST["client"] : "",
                "id_user" => isset($_POST["usuario"]) ? $_POST["usuario"] : "",
                "id_proc" => isset($_POST["etapa"]) ? $_POST["etapa"] : "",
                "id_subproc" => isset($_POST["accion"]) ? $_POST["accion"] : "",
                "descrip" => isset($_POST["actividad"]) ? $_POST["actividad"] : ""
            ], $idToUpdate);
            die();
            break;

        case 'updateLstValsInfo':
            include_once(LIBRARY_DIR . "/list_vals.php");
            $idToUpdate = $_POST["idToUpdate"];
            lv_updateRecord([
                "id_client" => isset($_POST["cliente"]) ? $_POST["cliente"] : "",
                "descrip" => isset($_POST["observCliente"]) ? $_POST["observCliente"] : "",
                "urlimg" => (isset($_FILES["imgURL"]) && !empty($_FILES["imgURL"]["tmp_name"])) ? uploadImage($_FILES["imgURL"], "images/publicidades") : ""
            ], $idToUpdate);
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



