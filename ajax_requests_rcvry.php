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
            include_once(LIBRARY_DIR . "/sqlExecuter.php");
            if (isset($_POST["val"]) && !empty($_POST["val"])) {
                $data = explode("--", $_POST["val"]);
                $proceso = $data[0];
                $client = $data[1];

                $sql = "SELECT id_tipo FROM tbl_cagenclients WHERE id_client = $client";
                executeSQL($n, $Arry2, $lastInsertId, $sql);
                $id_tipo = $Arry2[0]["id_tipo"];

                subprocs_recoveryAllByAnyField($n, $Arry, "tbl_crmsubprocs.id_proc", $proceso, true, "AND tbl_crmsubprocs.id_tipo = $id_tipo");
            }
            else {
                subprocs_recoveryAllList($n, $Arry, true);
            }
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
            $response["draw"] = 1;
            $response["recordsTotal"] = $n;
            $response["recordsFiltered"] = $n;
            $response["data"] = $Arry;
            echo json_encode($response);
            die();
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

        case 'getFormasPagoByCtry':
            include_once(LIBRARY_DIR . "/formas_pago.php");
            $id = $_POST["val"];
            fps_recoveryAllByAnyField($n, $Arry, "tbl_cafps.id_pais", $id, $enabled, true);
            break;

        case 'getcttos':
            include_once(LIBRARY_DIR . "/contratos.php");
            ctrts_recoveryAllList($n, $Arry, $enabled, true);
            break;

        case 'getlocations':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            locs_recoveryAllList($n, $Arry, $enabled, true);
            break;

        case 'getcttobyanunciante':
            include_once(LIBRARY_DIR . "/contratos.php");
            ctrts_recoveryAllByAnyField($n, $Arry, $_POST["field"], $_POST["val"], $enabled, true);
            break;

        case 'getlocationsbyreceptor':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            locs_recoveryAllByAnyField($n, $Arry, $_POST["field"], $_POST["val"], $enabled, true);
            break;

        case 'getcarabylocation':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            locs_recoveryAllByAnyField($n, $Arry, $_POST["field"], $_POST["val"], $enabled, true);
            break;

        case 'getAllLocations':
            include_once(LIBRARY_DIR . "/loc_ats.php");
            locs_recoveryAllList($n, $Arry, $enabled, true);
            break;

        case 'getRepImgUrl':
            include_once(LIBRARY_DIR . "/pubs.php");
            pubs_recoveryOneByAnyField($n, $Arry, "id_pub", $_POST["id"], true);
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

        case 'getLstValsData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/list_vals.php");
            lv_recoveryOneByAnyField($n, $Arry, "id_lstval", $id);
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

        case 'getImagesByClient':
            include_once(LIBRARY_DIR . "/pubs.php");
            pubs_recoveryAllByAnyField($n, $Arry, "tbl_capubs.id_client", $_POST["cliente"], true);
            break;

        case 'getValsByClient':
            include_once(LIBRARY_DIR . "/list_vals.php");
            lv_recoveryAllByAnyField($n, $Arry, "tbl_calstvals.id_client", $_POST["cliente"], true);
            break;

        case 'getCalAnunData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/cal_anun.php");
            calanun_recoveryOneByAnyField($n, $Arry, false, "WHERE id_calanunt = $id");
            $response["draw"] = 1;
            $response["recordsTotal"] = $n;
            $response["recordsFiltered"] = $n;
            $response["data"] = $Arry;
            echo json_encode($response);
            die();
            break;

        case 'getCalValsData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/cal_vals.php");
            calist_recoveryOneByAnyField($n, $Arry, false, "WHERE id_calinst = $id");
            $response["draw"] = 1;
            $response["recordsTotal"] = $n;
            $response["recordsFiltered"] = $n;
            $response["data"] = $Arry;
            echo json_encode($response);
            die();
            break;

        case 'getCalCapsData':
            $id = $_POST["id"];
            include_once(LIBRARY_DIR . "/cal_caps.php");
            calcaps_recoveryOneByAnyField($n, $Arry, false, "WHERE id_calcapinst = $id");
            $response["draw"] = 1;
            $response["recordsTotal"] = $n;
            $response["recordsFiltered"] = $n;
            $response["data"] = $Arry;
            echo json_encode($response);
            die();
            break;

        case 'getFactura':
            include_once(LIBRARY_DIR . "/clients.php");
            $id = $_POST["id"];
            clients_recoveryOneByAnyField($n, $Arry, "id_client", $id, $enabled);

            $response = [];
            $response["ruc"] = $Arry[2];
            $response["telefono"] = $Arry[7] . " " . $Arry[8];
            $response["direccion"] = $Arry[3];
            $response["pais"] = $Arry[4];
            $response["provincia"] = $Arry[5];

            echo json_encode($response);
            die();

            break;

        case 'getFacturasAll':
            include_once(LIBRARY_DIR . "/sqlExecuter.php");
            $client = $_POST["client"];
            $contrato = $_POST["contrato"];

            //Buscamos las facturas de este cliente

            $sql = "SELECT id_fact FROM tbl_cafacthdrs WHERE id_client = $client AND id_ctto = $contrato AND pagado = 0;";
            executeSQL($n, $Arry, $lastInsertId, $sql);

            echo json_encode($Arry);
            die();
            break;

        case 'getFacturaInfo':
            include_once(LIBRARY_DIR . "/sqlExecuter.php");
            $id = $_POST["id"];

            //Traemos el total de la factura
            $sql = "SELECT total FROM tbl_cafactfoots WHERE id_fact = $id LIMIT 1;";
            executeSQL($n, $Arry, $lastInsertId, $sql);

            $response = [];
            $response["totalFacturado"] = (float) $Arry[0]["total"];

            //Traemos el total abonado
            $sql = "SELECT SUM(monto) AS totalAbonado FROM tbl_cacajarecibos WHERE id_fact = $id AND aprobado = 1;";
            executeSQL($n, $Arry, $lastInsertId, $sql);

            $totalAbonado = $Arry[0]["totalAbonado"];

            $response["totalAbonado"] = $totalAbonado == null ? 0 : (float) $totalAbonado;

            //Traemos el id de la cotización
            $sql = "SELECT id_cot FROM tbl_cafacthdrs WHERE id_fact = $id LIMIT 1;";
            executeSQL($n, $Arry, $lastInsertId, $sql);

            $response["idCot"] = (int) $Arry[0]["id_cot"];

            echo json_encode($response);
            die();
            
            break;

        // Querys KeyUp

        case 'searchProducts':
            $query = $_POST["query"];
            include_once(LIBRARY_DIR . "/productos.php");
            prdcts_recoveryAllByAnyField($n, $Arry, "tbl_caprods.descrip", $query);
            echo json_encode($Arry);
            die();
            break;

        case 'getImpuesto':
            $imp_id = $_POST["imp_id"];
            include_once(LIBRARY_DIR . "/impuestos_consumo.php");
            caimps_recoveryAllByAnyField($n, $Arry, "tbl_caimps.id_imp", $imp_id, $enabled, true, "LIMIT 1;");
            break;

        case 'getUserImpData':
            $usuario = $_POST["usuario"];
            $imp = $_POST["imp"];

            include_once(LIBRARY_DIR . "/impuestos_consumo.php");
            include_once(LIBRARY_DIR . "/adminUser.php");

            caimps_recoveryAllByAnyField($n, $Arry, "tbl_caimps.id_imp", $imp, $enabled, true, "LIMIT 1;");
            RecoveryUserProfileSesion_id($usuario, $UserProfile, $n);

            $response = [];
            $response["usuario"] = $UserProfile[2];
            $response["nombreimp"] = $Arry[3];
            $response["valorporc"] = $Arry[2];
            
            echo json_encode($response);
            die();

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
            $urldoc = uploadFile($_FILES["urldoc"], "images/plans_acad_docs");
            $lstenabled = isset($_POST["enabled"]) ? 1 : 0;
            plans_createRecord($tiempodura, $id_modalidad, $temario, $prerrequisitos, $perfil, $objetivos, $título, $fcreac, $urldoc, $lstenabled);
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
            include_once(LIBRARY_DIR . "/sqlExecuter.php");
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

            //Reviso que el usuario no exista
            $sql = "SELECT * FROM tbl_usrdacs WHERE username='$emailA';";
            executeSQL($n, $Arry, $lastInsertId, $sql);

            if ($n > 0) {
                echo "El usuario ya existe";
            }
            else {
                $sql = "INSERT INTO tbl_cacothdrs (id_client, rs, ruc, addrs, id_pais, id_prov, id_ctrycodefijo, tel, fecha, nroprefact, ppagoCC, cantdias, ver, facturado) VALUES ($id_client, '$rs', '$ruc', '$addrs', '$id_pais', '$id_prov', '$id_ctrycodefijo', '$tel', '$fecha', '$nroprefact', '$ppagoCC', '$cantdias', $ver, $facturado);";
                CreateUserProfile($id_companyA, $id_cargoA, $urlfotoA, $nomA, $apeA, $emailA, $id_ctrycodefijoA, $telA, $extA, $id_ctrycodecelA, $celA, $observA, $sexo);
                echo "true";
            }

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


        case 'uploadCalAnunInfo':
            include_once(LIBRARY_DIR . "/cal_anun.php");
            $id_ctto = isset($_POST["id_cttoPub"]) ? $_POST["id_cttoPub"] : "";
            $id_clientanun = isset($_POST["anunciantePub"]) ? $_POST["anunciantePub"] : "";
            $id_clientesc = isset($_POST["receptorPub"]) ? $_POST["receptorPub"] : "";
            $id_locat = isset($_POST["locationPub"]) ? $_POST["locationPub"] : "";
            $cara = isset($_POST["caraPub"]) ? $_POST["caraPub"] : "";
            $id_pub = isset($_POST["arte-grafico"]) ? $_POST["arte-grafico"] : "";
            $finicio = isset($_POST["finicioPub"]) ? $_POST["finicioPub"] : "";
            $ffin = isset($_POST["ffinPub"]) ? $_POST["ffinPub"] : "";
            $id_usersup = isset($_POST["supervPub"]) ? $_POST["supervPub"] : "";
            $id_userinst = isset($_POST["installerPub"]) ? $_POST["installerPub"] : "";
            $id_uservend = isset($_POST["sellerOub"]) ? $_POST["sellerOub"] : "";
            $estatus = isset($_POST["statusInstallPub"]) ? $_POST["statusInstallPub"] : "";
            calanun_createRecord($id_ctto, $id_clientanun, $id_clientesc, $id_locat, $cara, $id_pub, $finicio, $ffin, $id_usersup, $id_userinst, $id_uservend, $estatus);
            die();
            break;

        case 'uploadCalValsInfo':
            include_once(LIBRARY_DIR . "/cal_vals.php");
            $id_ctto = isset($_POST["id_cttoPub"]) ? $_POST["id_cttoPub"] : "";
            $id_clientanun = isset($_POST["anunciantePub"]) ? $_POST["anunciantePub"] : "";
            $id_clientesc = isset($_POST["receptorPub"]) ? $_POST["receptorPub"] : "";
            $id_locat = isset($_POST["locationPub"]) ? $_POST["locationPub"] : "";
            $cara = isset($_POST["caraPub"]) ? $_POST["caraPub"] : "";
            $id_lstval = isset($_POST["arte-grafico"]) ? $_POST["arte-grafico"] : "";
            $finicio = isset($_POST["finicioPub"]) ? $_POST["finicioPub"] : "";
            $ffin = isset($_POST["ffinPub"]) ? $_POST["ffinPub"] : "";
            $id_usersup = isset($_POST["supervPub"]) ? $_POST["supervPub"] : "";
            $id_userinst = isset($_POST["installerPub"]) ? $_POST["installerPub"] : "";
            $id_uservend = isset($_POST["sellerOub"]) ? $_POST["sellerOub"] : "";
            $estatus = isset($_POST["statusInstallPub"]) ? $_POST["statusInstallPub"] : "";
            calist_createRecord($id_ctto, $id_clientanun, $id_clientesc, $id_locat, $cara, $id_lstval, $finicio, $ffin, $id_usersup, $id_userinst, $id_uservend, $estatus);
            die();
            break;

        case 'uploadCalCapsInfo':
            include_once(LIBRARY_DIR . "/cal_caps.php");
            $id_client = isset($_POST["cliente"]) ? $_POST["cliente"] : "";
            $id_ctto = isset($_POST["id_cttoPub"]) ? $_POST["id_cttoPub"] : "";
            $id_plan = isset($_POST["idplan"]) ? $_POST["idplan"] : "";
            $id_cap = isset($_POST["id_cap"]) ? $_POST["id_cap"] : "";
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $id_prov = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
            $finicio = isset($_POST["finicioPub"]) ? $_POST["finicioPub"] : "";
            $ffin = isset($_POST["ffinPub"]) ? $_POST["ffinPub"] : "";
            $estatus = isset($_POST["statusInstallPub"]) ? $_POST["statusInstallPub"] : "";
            $firmcierredoc = (isset($_FILES["urldoc"]) && !empty($_FILES["urldoc"]["tmp_name"])) ? uploadImage($_FILES["urldoc"], "images/calCaps") : "";
            $id_calif = isset($_POST["Calif"]) ? $_POST["Calif"] : "";
            calcaps_createRecord($id_client, $id_ctto, $id_plan, $id_cap, $id_pais, $id_prov, $finicio, $ffin, $estatus, $firmcierredoc, $id_calif);
            die();
            break;

        case 'uploadCacotHeaders':
            include_once(LIBRARY_DIR . "/sqlExecuter.php");

            $id_client = $_POST["idCliente"];
            $rs = isset($_POST["rs"]) ? $_POST["rs"] : "";
            $ruc = isset($_POST["ruc"]) ? $_POST["ruc"] : "";
            $addrs = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $id_prov = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
            $id_ctrycodefijo = 1;
            $tel = isset($_POST["telefonoCliente"]) ? $_POST["telefonoCliente"] : "";
            $fecha = isset($_POST["FechaFac"]) ? $_POST["FechaFac"] : "";
            $nroprefact = isset($_POST["Prefactura"]) ? $_POST["Prefactura"] : "";
            $ppagoCC = isset($_POST["ppagoCC"]) ? $_POST["ppagoCC"] : 0;
            $cantdias = (isset($_POST["dias"]) & !empty($_POST["dias"])) ? $_POST["dias"] : 0;
            $ver = 0;
            $facturado = 0;
            $allProducts = json_decode($_POST["allProducts"]);
            $allComisiones = json_decode($_POST["allComisiones"]);
            $sumaImpuestoDeLinea = $_POST["sumaImpuestoDeLinea"];
            $total = $_POST["total"];
            $subtotal = $_POST["subtotal"];
            $obs = $_POST["obs"];

            $sql = "INSERT INTO tbl_cacothdrs (id_client, rs, ruc, addrs, id_pais, id_prov, id_ctrycodefijo, tel, fecha, nroprefact, ppagoCC, cantdias, ver, facturado) VALUES ($id_client, '$rs', '$ruc', '$addrs', '$id_pais', '$id_prov', '$id_ctrycodefijo', '$tel', '$fecha', '$nroprefact', '$ppagoCC', '$cantdias', $ver, $facturado);";

            executeSQL($n, $Arry, $lastInsertId, $sql);

            $id_cot = $lastInsertId;

            //Ahora insertamos la lista de productos

            $values = "";

            foreach ($allProducts as $product)
                $values .= "($id_cot, '" . implode("', '", $product) . "'),";
            
            $values = substr($values, 0, -1);

            $sql = "INSERT INTO tbl_cacotdetails (id_cot, id_prod, cod, descrip, cant, tiposp, puvp, id_imp, valorPorc, totaldlinea) VALUES $values;";

            executeSQL($n, $Arry, $lastInsertId, $sql);

            //Ahora insertamos la lista de comisiones

            if (count($allComisiones) > 0) {
                $values = "";
    
                foreach ($allComisiones as $comision)
                    $values .= "($id_cot, '" . implode("', '", $comision) . "', ''),";
    
                $values = substr($values, 0, -1);
    
                $sql = "INSERT INTO tbl_cacotcomis (id_cot, id_user, id_imp, valorPorc, monto, descrip) VALUES $values;";
    
                executeSQL($n, $Arry, $lastInsertId, $sql);
            }

            //Ahora insertamos el footer
            $sql = "INSERT INTO tbl_cacotfoots (id_cot, subtot, biximp, impttot, desctot, total, observ) VALUES ('$id_cot', '$subtotal', '0', '$sumaImpuestoDeLinea', '', '$total', '$obs');";

            executeSQL($n, $Arry, $lastInsertId, $sql);

            echo $id_cot;
            die();

            break;

        case 'uploadCafactHeaders':
            include_once(LIBRARY_DIR . "/sqlExecuter.php");

            $id_client = $_POST["idCliente"];
            $rs = isset($_POST["rs"]) ? $_POST["rs"] : "";
            $ruc = isset($_POST["ruc"]) ? $_POST["ruc"] : "";
            $addrs = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
            $id_pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $id_prov = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
            $id_ctrycodefijo = 1;
            $tel = isset($_POST["telefonoCliente"]) ? $_POST["telefonoCliente"] : "";
            $fecha = isset($_POST["FechaFac"]) ? $_POST["FechaFac"] : "";
            $nroprefact = isset($_POST["Prefactura"]) ? $_POST["Prefactura"] : "";
            $ppagoCC = isset($_POST["ppagoCC"]) ? $_POST["ppagoCC"] : 0;
            $cantdias = (isset($_POST["dias"]) & !empty($_POST["dias"])) ? $_POST["dias"] : 0;
            $id_ctto = isset($_POST["ctto"]) ? $_POST["ctto"] : 0;
            $id_cot = $_POST["id_cot"];
            $pagado = 2;
            $allProducts = json_decode($_POST["allProducts"]);
            $allComisiones = json_decode($_POST["allComisiones"]);
            $sumaImpuestoDeLinea = $_POST["sumaImpuestoDeLinea"];
            $total = $_POST["total"];
            $subtotal = $_POST["subtotal"];
            $obs = $_POST["obs"];

            $sql = "INSERT INTO tbl_cafacthdrs (id_client, rs, ruc, addrs, id_pais, id_prov, id_ctrycodefijo, tel, fecha, ffasoc, ppagoCC, cantdias, id_ctto, id_cot, pagado) VALUES ($id_client, '$rs', '$ruc', '$addrs', '$id_pais', '$id_prov', '$id_ctrycodefijo', '$tel', '$fecha', '$nroprefact', '$ppagoCC', '$cantdias', $id_ctto, $id_cot, $pagado);";

            executeSQL($n, $Arry, $lastInsertId, $sql);

            $id_fact = $lastInsertId;

            //Ahora insertamos la lista de productos

            $values = "";

            foreach ($allProducts as $product)
                $values .= "($id_fact, '" . implode("', '", $product) . "'),";

            $values = substr($values, 0, -1);

            $sql = "INSERT INTO tbl_cafactdetails (id_fact, id_prod, cod, descrip, cant, tiposp, puvp, id_imp, valorPorc, totaldlinea) VALUES $values;";

            executeSQL($n, $Arry, $lastInsertId, $sql);

            //Ahora insertamos la lista de comisiones

            if (count($allComisiones) > 0) {
                $values = "";
    
                foreach ($allComisiones as $comision)
                    $values .= "($id_cot, '" . implode("', '", $comision) . "', '', 0),";
    
                $values = substr($values, 0, -1);
    
                $sql = "INSERT INTO tbl_cafactcomis (id_fact, id_user, id_imp, valorPorc, monto, descrip, pagado) VALUES $values;";
    
                executeSQL($n, $Arry, $lastInsertId, $sql);
            }


            //Ahora insertamos el footer
            $sql = "INSERT INTO tbl_cafactfoots (id_fact, subtot, biximp, impttot, desctot, total, observ) VALUES ('$id_cot', '$subtotal', '0', '$sumaImpuestoDeLinea', '', '$total', '$obs');";

            executeSQL($n, $Arry, $lastInsertId, $sql);

            echo $id_fact;
            die();

            break;

        case 'uploadRecibo':
            include_once(LIBRARY_DIR . "/sqlExecuter.php");

            //Ya viene como array
            $resumenPago = $_POST["resumenPago"];

            //Recorro para establecer la fecha y armar el SQL
            $values = "";

            foreach ($resumenPago as $pago) {
                $pago[4] = date("Y-m-d");
                $values .= "('" . implode("', '", $pago) . "'),";
            }

            $values = substr($values, 0, -1);

            $sql = "INSERT INTO tbl_cacajarecibos (id_fact, id_cot, id_fp, descrip, fecha, txdescrip, monto, aprobado) VALUES $values;";

            executeSQL($n, $Arry, $lastInsertId, $sql);
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
                "titulo" => isset($_POST["titulo"]) ? $_POST["titulo"] : "",
                "urldoc" => (isset($_FILES["urldoc"]) && !empty($_FILES["urldoc"]["tmp_name"])) ? uploadFile($_FILES["urldoc"], "images/plans_acad_docs") : "",
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
            include_once(LIBRARY_DIR . "/sqlExecuter.php");
            $idToUpdate = $_POST["idToUpdate"];
            $emailA = $_POST["email"];
            $id = $_POST["idCliente"];

            $sql = "SELECT * FROM tbl_usrdacs WHERE username='$emailA' AND id_dac <> $id;";
            executeSQL($n, $Arry, $lastInsertId, $sql);

            if ($n > 0) {
                echo "El usuario ya existe";
            }
            else {
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
                
                echo "true";
            }

            die();
            break;

        case 'updateCentOpInfo':
            include_once(LIBRARY_DIR . "/companie.php");
            include_once(LIBRARY_DIR . "/doc_emps.php");
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

            //Subo los documentos
            if (!empty($_FILES)) {
                foreach ($_FILES as $file) {
                    $ruta = uploadFile($file, "images/cent_op");
                    docemps_createRecord($idToUpdate, getPathFileName($ruta), "", $ruta);
                }
            }

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
            include_once(LIBRARY_DIR . "/con_contr_doc.php");
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

            //Subo los documentos
            if (!empty($_FILES)) {
                foreach ($_FILES as $file) {
                    $ruta = uploadFile($file, "images/contratos");
                    concontrdoc_createRecord($idToUpdate, "1", date("Y-m-d"), $_POST["descripcion"], $ruta);
                }
            }

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

        case 'updateCalAnunInfo':
            include_once(LIBRARY_DIR . "/cal_anun.php");
            include_once(LIBRARY_DIR . "/img_install_pubs.php");
            $idToUpdate = $_POST["idToUpdate"];
            calanun_updateRecord([
                "id_ctto" => isset($_POST["id_cttoPub"]) ? $_POST["id_cttoPub"] : "",
                "id_clientanun" => isset($_POST["anunciantePub"]) ? $_POST["anunciantePub"] : "",
                "id_clientesc" => isset($_POST["receptorPub"]) ? $_POST["receptorPub"] : "",
                "id_locat" => isset($_POST["locationPub"]) ? $_POST["locationPub"] : "",
                "cara" => isset($_POST["caraPub"]) ? $_POST["caraPub"] : "",
                "id_pub" => isset($_POST["arte-grafico"]) ? $_POST["arte-grafico"] : "",
                "finicio" => isset($_POST["finicioPub"]) ? $_POST["finicioPub"] : "",
                "ffin" => isset($_POST["ffinPub"]) ? $_POST["ffinPub"] : "",
                "id_usersup" => isset($_POST["supervPub"]) ? $_POST["supervPub"] : "",
                "id_userinst" => isset($_POST["installerPub"]) ? $_POST["installerPub"] : "",
                "id_uservend" => isset($_POST["sellerOub"]) ? $_POST["sellerOub"] : "",
                "estatus" => isset($_POST["statusInstallPub"]) ? $_POST["statusInstallPub"] : ""
            ], $idToUpdate);

            //Subo los documentos
            if (!empty($_FILES)) {
                foreach ($_FILES as $file) {
                    $ruta = uploadFile($file, "images/calAnun");
                    inspubs_createRecord($idToUpdate, $ruta);
                }
            }

            die();
            break;

        case 'updateCalValsInfo':
            include_once(LIBRARY_DIR . "/cal_vals.php");
            include_once(LIBRARY_DIR . "/img_install_vals.php");
            $idToUpdate = $_POST["idToUpdate"];
            calist_updateRecord([
                "id_ctto" => isset($_POST["id_cttoPub"]) ? $_POST["id_cttoPub"] : "",
                "id_clientanun" => isset($_POST["anunciantePub"]) ? $_POST["anunciantePub"] : "",
                "id_clientesc" => isset($_POST["receptorPub"]) ? $_POST["receptorPub"] : "",
                "id_locat" => isset($_POST["locationPub"]) ? $_POST["locationPub"] : "",
                "cara" => isset($_POST["caraPub"]) ? $_POST["caraPub"] : "",
                "id_lstval" => isset($_POST["arte-grafico"]) ? $_POST["arte-grafico"] : "",
                "finicio" => isset($_POST["finicioPub"]) ? $_POST["finicioPub"] : "",
                "ffin" => isset($_POST["ffinPub"]) ? $_POST["ffinPub"] : "",
                "id_usersup" => isset($_POST["supervPub"]) ? $_POST["supervPub"] : "",
                "id_userinst" => isset($_POST["installerPub"]) ? $_POST["installerPub"] : "",
                "id_uservend" => isset($_POST["sellerOub"]) ? $_POST["sellerOub"] : "",
                "estatus" => isset($_POST["statusInstallPub"]) ? $_POST["statusInstallPub"] : ""
            ], $idToUpdate);

            //Subo los documentos
            if (!empty($_FILES)) {
                foreach ($_FILES as $file) {
                    $ruta = uploadFile($file, "images/calVals");
                    insvals_createRecord($idToUpdate, $ruta);
                }
            }

            die();
            break;

        case 'updateCalCapsInfo':
            include_once(LIBRARY_DIR . "/cal_caps.php");
            $idToUpdate = $_POST["idToUpdate"];
            calcaps_updateRecord([
                "id_client" => isset($_POST["cliente"]) ? $_POST["cliente"] : "",
                "id_ctto" => isset($_POST["id_cttoPub"]) ? $_POST["id_cttoPub"] : "",
                "id_plan" => isset($_POST["idplan"]) ? $_POST["idplan"] : "",
                "id_cap" => isset($_POST["id_cap"]) ? $_POST["id_cap"] : "",
                "id_pais" => isset($_POST["pais"]) ? $_POST["pais"] : "",
                "id_prov" => isset($_POST["provincia"]) ? $_POST["provincia"] : "",
                "finicio" => isset($_POST["finicioPub"]) ? $_POST["finicioPub"] : "",
                "ffin" => isset($_POST["ffinPub"]) ? $_POST["ffinPub"] : "",
                "estatus" => isset($_POST["statusInstallPub"]) ? $_POST["statusInstallPub"] : "",
                "firmcierredoc" => (isset($_FILES["urldoc"]) && !empty($_FILES["urldoc"]["tmp_name"])) ? uploadImage($_FILES["urldoc"], "images/calCaps") : "",
                "id_calif" => isset($_POST["Calif"]) ? $_POST["Calif"] : ""
            ], $idToUpdate);
            die();
            break;

        case 'updateFacturaStatus':
            include_once(LIBRARY_DIR . "/sqlExecuter.php");
            $id = $_POST["id"];

            $sql = "UPDATE tbl_cacothdrs SET facturado = 1 WHERE id_cot = $id;";

            executeSQL($n, $Arry, $lastInsertId, $sql);

            break;

        case 'updateFacturaStatus2':
            include_once(LIBRARY_DIR . "/sqlExecuter.php");
            $id = $_POST["id"];

            $sql = "UPDATE tbl_cafacthdrs SET pagado = 0 WHERE id_fact = $id;";

            executeSQL($n, $Arry, $lastInsertId, $sql);

            break;

        // Acciones de los calendarios
        case 'getCalAnuntsActivities':
            include_once(LIBRARY_DIR . "/cal_anun.php");
            $pais = $_POST["pais"];
            $tipoCliente = $_POST["tipoCliente"];
            $estatus = $_POST["estatus"];
            $fecha = $_POST["fecha"];

            //Filtro principal por mes y año (Obtengo las actividades del mes en cuestion)
            $fecha = explode("-", $fecha);
            $where = "WHERE MONTH(finicio) = ".$fecha[1]." AND YEAR(finicio) = ".$fecha[0];

            //Filtro por los filtros opcionales
            if(hasValue($pais)) $where .= " AND clientanun.id_pais = $pais";
            if(hasValue($tipoCliente)) $where .= " AND clientanun.id_tipo = $tipoCliente";
            if(hasValue($estatus)) $where .= " AND tbl_opcalanunts.estatus = $estatus";

            calanun_recoveryAllByAnyField($n, $Arry, 1, $where);
            echo json_encode($Arry);
            die();
            break;

        case 'getCalAnuntsActivitiesByDay':
            include_once(LIBRARY_DIR . "/cal_anun.php");
            $pais = $_POST["pais"];
            $tipoCliente = $_POST["tipoCliente"];
            $estatus = $_POST["estatus"];
            $fecha = $_POST["fecha"];

            //Filtro principal por la fecha exacta (Día incluido)
            $where = "WHERE finicio = \"$fecha\"";

            if(hasValue($pais)) $where .= " AND clientanun.id_pais = $pais";
            if(hasValue($tipoCliente)) $where .= " AND clientanun.id_tipo = $tipoCliente";
            if(hasValue($estatus)) $where .= " AND tbl_opcalanunts.estatus = $estatus";

            calanun_recoveryAllByAnyField($n, $Arry, 1, $where);
            $response["draw"] = 1;
            $response["recordsTotal"] = $n;
            $response["recordsFiltered"] = $n;
            $response["data"] = $Arry;
            echo json_encode($response);
            die();
            break;

        case 'getCalValsActivities':
            include_once(LIBRARY_DIR . "/cal_vals.php");
            $pais = $_POST["pais"];
            $tipoCliente = $_POST["tipoCliente"];
            $estatus = $_POST["estatus"];
            $fecha = $_POST["fecha"];

            //Filtro principal por mes y año (Obtengo las actividades del mes en cuestion)
            $fecha = explode("-", $fecha);
            $where = "WHERE MONTH(finicio) = " . $fecha[1] . " AND YEAR(finicio) = " . $fecha[0];

            //Filtro por los filtros opcionales
            if (hasValue($pais)) $where .= " AND clientanun.id_pais = $pais";
            if (hasValue($tipoCliente)) $where .= " AND clientanun.id_tipo = $tipoCliente";
            if (hasValue($estatus)) $where .= " AND tbl_opcalinsts.estatus = $estatus";

            calist_recoveryAllByAnyField($n, $Arry, 1, $where);
            echo json_encode($Arry);
            die();
            break;

        case 'getCalValsActivitiesByDay':
            include_once(LIBRARY_DIR . "/cal_vals.php");
            $pais = $_POST["pais"];
            $tipoCliente = $_POST["tipoCliente"];
            $estatus = $_POST["estatus"];
            $fecha = $_POST["fecha"];

            //Filtro principal por la fecha exacta (Día incluido)
            $where = "WHERE finicio = \"$fecha\"";

            if (hasValue($pais)) $where .= " AND clientanun.id_pais = $pais";
            if (hasValue($tipoCliente)) $where .= " AND clientanun.id_tipo = $tipoCliente";
            if (hasValue($estatus)) $where .= " AND tbl_opcalinsts.estatus = $estatus";

            calist_recoveryAllByAnyField($n, $Arry, 1, $where);
            $response["draw"] = 1;
            $response["recordsTotal"] = $n;
            $response["recordsFiltered"] = $n;
            $response["data"] = $Arry;
            echo json_encode($response);
            die();
            break;

        case 'getCalCapsActivities':
            include_once(LIBRARY_DIR . "/cal_caps.php");
            $pais = $_POST["pais"];
            $tipoCliente = $_POST["tipoCliente"];
            $estatus = $_POST["estatus"];
            $fecha = $_POST["fecha"];

            //Filtro principal por mes y año (Obtengo las actividades del mes en cuestion)
            $fecha = explode("-", $fecha);
            $where = "WHERE MONTH(finicio) = " . $fecha[1] . " AND YEAR(finicio) = " . $fecha[0];

            //Filtro por los filtros opcionales
            if (hasValue($pais)) $where .= " AND tbl_acadcalcapinsts.id_pais = $pais";
            if (hasValue($tipoCliente)) $where .= " AND tbl_cagenclients.id_tipo = $tipoCliente";
            if (hasValue($estatus)) $where .= " AND tbl_acadcalcapinsts.estatus = $estatus";

            calcaps_recoveryAllByAnyField($n, $Arry, 1, $where);
            echo json_encode($Arry);
            die();
            break;

        case 'getCalCapsActivitiesByDay':
            include_once(LIBRARY_DIR . "/cal_caps.php");
            $pais = $_POST["pais"];
            $tipoCliente = $_POST["tipoCliente"];
            $estatus = $_POST["estatus"];
            $fecha = $_POST["fecha"];

            //Filtro principal por la fecha exacta (Día incluido)
            $where = "WHERE finicio = \"$fecha\"";

            if (hasValue($pais)) $where .= " AND tbl_acadcalcapinsts.id_pais = $pais";
            if (hasValue($tipoCliente)) $where .= " AND tbl_cagenclients.id_tipo = $tipoCliente";
            if (hasValue($estatus)) $where .= " AND tbl_acadcalcapinsts.estatus = $estatus";

            calcaps_recoveryAllByAnyField($n, $Arry, 1, $where);
            $response["draw"] = 1;
            $response["recordsTotal"] = $n;
            $response["recordsFiltered"] = $n;
            $response["data"] = $Arry;
            echo json_encode($response);
            die();
            break;

        //Tablas de búsqueda
        case 'getCotizacionList':
            include_once(LIBRARY_DIR . "/cot_hdrs.php");
            $pais = $_POST["pais"];
            $cliente = $_POST["cliente"];
            $facturado = $_POST["facturado"];
            $fechaInicio = $_POST["fechaInicio"];
            $fechaFin = $_POST["fechaFin"];

            //Construyo el where
            $where = "WHERE ";

            if (!empty($pais)) 
                $where .= "tbl_cacothdrs.id_pais = $pais AND ";

            if (!empty($cliente)) 
                $where .= "tbl_cacothdrs.id_client = $cliente AND ";

            if ($facturado != "" && $facturado != 2)
                $where .= "tbl_cacothdrs.facturado = $facturado AND ";

            if (!empty($fechaInicio) && !empty($fechaFin))
                $where .= "(tbl_cacothdrs.fecha BETWEEN DATE('$fechaInicio') AND DATE('$fechaFin')) AND ";
            else if(!empty($fechaInicio))
                $where .= "tbl_cacothdrs.fecha >= DATE('$fechaInicio') AND ";
            else if (!empty($fechaFin))
                $where .= "tbl_cacothdrs.fecha <= DATE('$fechaFin') AND ";

            //Remuevo el AND final ya que si o si queda un AND al final
            $where = substr($where, 0, -5);
            $where = (strlen($where) > 6) ? $where : "";

            cothdrs_recoveryAllByAnyField($n, $Arry, true, $where);

            $response["draw"] = 1;
            $response["recordsTotal"] = $n;
            $response["recordsFiltered"] = $n;
            $response["data"] = $Arry;

            echo json_encode($response);
            die();
            break;

        case 'getFacturacionList':
            include_once(LIBRARY_DIR . "/fact_hdrs.php");
            $pais = $_POST["pais"];
            $cliente = $_POST["cliente"];
            $pagado = $_POST["pagado"];
            $fechaInicio = $_POST["fechaInicio"];
            $fechaFin = $_POST["fechaFin"];

            //Construyo el where
            $where = "WHERE ";

            if (!empty($pais)) 
                $where .= "tbl_cafacthdrs.id_pais = $pais AND ";

            if (!empty($cliente)) 
                $where .= "tbl_cafacthdrs.id_client = $cliente AND ";

            if ($pagado != "" && $pagado != 2) {
                if ($pagado == 0) $pagado = 2;
                if ($pagado == 1) $pagado = 0;
                $where .= "tbl_cafacthdrs.pagado = $pagado AND ";
            }

            if (!empty($fechaInicio) && !empty($fechaFin))
                $where .= "(tbl_cafacthdrs.fecha BETWEEN DATE('$fechaInicio') AND DATE('$fechaFin')) AND ";
            else if(!empty($fechaInicio))
                $where .= "tbl_cafacthdrs.fecha >= DATE('$fechaInicio') AND ";
            else if (!empty($fechaFin))
                $where .= "tbl_cafacthdrs.fecha <= DATE('$fechaFin') AND ";

            //Remuevo el AND final ya que si o si queda un AND al final
            $where = substr($where, 0, -5);
            $where = (strlen($where) > 6) ? $where : "";

            facthdrs_recoveryAllByAnyField($n, $Arry, true, $where);

            $response["draw"] = 1;
            $response["recordsTotal"] = $n;
            $response["recordsFiltered"] = $n;
            $response["data"] = $Arry;

            echo json_encode($response);
            die();
            break;

        case 'getReciboList':
            include_once(LIBRARY_DIR . "/rec_hdrs.php");
            $pais = $_POST["pais"];
            $cliente = $_POST["cliente"];
            $pagado = $_POST["pagado"];
            $fechaInicio = $_POST["fechaInicio"];
            $fechaFin = $_POST["fechaFin"];

            //Construyo el where
            $where = "WHERE ";

            if (!empty($pais)) 
                $where .= "tbl_cafacthdrs.id_pais = $pais AND ";

            if (!empty($cliente)) 
                $where .= "tbl_cafacthdrs.id_client = $cliente AND ";

            if ($pagado != "" && $pagado != 2)
                $where .= "tbl_cafacthdrs.pagado = $pagado AND ";

            if (!empty($fechaInicio) && !empty($fechaFin))
                $where .= "(tbl_cafacthdrs.fecha BETWEEN DATE('$fechaInicio') AND DATE('$fechaFin')) AND ";
            else if(!empty($fechaInicio))
                $where .= "tbl_cafacthdrs.fecha >= DATE('$fechaInicio') AND ";
            else if (!empty($fechaFin))
                $where .= "tbl_cafacthdrs.fecha <= DATE('$fechaFin') AND ";

            //Remuevo el AND final ya que si o si queda un AND al final
            $where = substr($where, 0, -5);
            $where = (strlen($where) > 6) ? $where : "";

            facthdrs_recoveryAllByAnyField($n, $Arry, true, $where);

            $response["draw"] = 1;
            $response["recordsTotal"] = $n;
            $response["recordsFiltered"] = $n;
            $response["data"] = $Arry;

            echo json_encode($response);
            die();
            break;

        //Otras requests
        case 'getCotizacionById':
            include_once(LIBRARY_DIR . "/sqlExecuter.php");
            $id = $_POST["id"];
            $response = [];

            //Selecciono los headers
            $sql = "SELECT id_client, rs, fecha, ruc, tel, addrs, id_pais, id_prov, nroprefact, ppagoCC, cantdias, id_cot FROM tbl_cacothdrs WHERE id_cot = $id";
            executeSQL($n, $Arry, $lastInsertId, $sql);

            $hdrs = $Arry[0];

            //Selecciono los detalles
            $sql = "SELECT * FROM tbl_cacotdetails WHERE id_cot = $id";
            executeSQL($n, $Arry, $lastInsertId, $sql, MYSQLI_NUM);

            $listaProductos = array();
            $listaProductosAllInfo = array();

            foreach ($Arry as $product) {
                $id_cotdetail = $product["0"];
                unset($product["0"]);
                unset($product["1"]);

                $precio = $product[7] * $product[5];
                $precioConImpuestos = $precio + ($precio * $product[9]) / 100;

                $row = [$product[3], $product[4], $product[5], $product[7], $product[9], $precio, $precioConImpuestos, '<a href="#" id="e-' . $id_cotdetail . '" data-toggle="modal" data-target="#ModalEdit" data-placement="top" title="Ver detalles" class="editData"><i class="far fa-newspaper"></i></a> <a id="d-' . $id_cotdetail . '" data-placement="top" title="Ver detalles" class="deleteArt" style="color: #ec3d3d; cursor: pointer"><i class="fas fa-times"></i></a>'];

                array_push($listaProductos, $row);
                array_push($listaProductosAllInfo, array_values($product));
                
            }

            //Selecciono las comisiones
            $sql = "SELECT
            tbl_cacotcomis.id_user AS idUsuario,
            tbl_usrdacs.username AS username,
            tbl_cacotcomis.id_imp AS idImp,
            tbl_caimps.descrip AS nombreImp,
            tbl_cacotcomis.valorPorc,
            tbl_cacotcomis.monto
            FROM tbl_cacotcomis 
            INNER JOIN tbl_usrdacs
            ON tbl_cacotcomis.id_user = tbl_usrdacs.id_user
            INNER JOIN tbl_caimps
            ON tbl_cacotcomis.id_imp = tbl_caimps.id_imp
            WHERE id_cot = $id";

            executeSQL($n, $Arry, $lastInsertId, $sql, MYSQLI_ASSOC);

            $listaComisiones = array();
            $listaComisionesAllInfo = array();

            foreach ($Arry as $com) {
                $row = [$com["username"], $com["nombreImp"], $com["valorPorc"], $com["monto"]];
                $rowAll = [$com["idUsuario"], $com["idImp"], $com["valorPorc"], $com["monto"]];

                array_push($listaComisiones, $row);
                array_push($listaComisionesAllInfo, $rowAll);
            }

            //Selecciono los footers
            $sql = "SELECT observ, total, subtot FROM tbl_cacotfoots WHERE id_cot = $id";
            executeSQL($n, $Arry, $lastInsertId, $sql);

            $foot = $Arry[0];
            
            //Armo el arreglo

            //$response["datosCliente"]["idCliente"] = $hdrs["id_client"];
            $response["datosCliente"]["FechaFac"] = $hdrs["fecha"];
            $response["datosCliente"]["ClienteDD"] = $hdrs["rs"];
            $response["datosCliente"]["Cliente"] = $hdrs["id_client"];
            $response["datosCliente"]["ruc"] = $hdrs["ruc"];
            $response["datosCliente"]["telefonoCliente"] = $hdrs["tel"];
            $response["datosCliente"]["direccion"] = $hdrs["addrs"];
            $response["datosCliente"]["country"] = $hdrs["id_pais"];
            $response["datosCliente"]["Provincia"] = $hdrs["id_prov"];
            $response["datosCliente"]["cotiza"] = $hdrs["id_cot"];
            $response["condicionesPago"]["Prefactura"] = $hdrs["nroprefact"];
            $response["condicionesPago"]["ppagoCC"] = $hdrs["ppagoCC"];
            $response["condicionesPago"]["dias"] = $hdrs["cantdias"];
            $response["detallesFacturacion"]["listaProductos"] = $listaProductos;
            $response["detallesFacturacion"]["listaProductosAllInfo"] = $listaProductosAllInfo;
            $response["resumenComisiones"]["listaComisiones"] = $listaComisiones;
            $response["resumenComisiones"]["listaComisionesAllInfo"] = $listaComisionesAllInfo;
            $response["resumenImpuestos"]["listaImpuestos"] = [];
            $response["resumenInputs"]["observacion"] = $foot["observ"];
            $response["resumenInputs"]["Subtotal"] = $foot["total"];
            $response["resumenInputs"]["Total"] = $foot["subtot"];

            echo json_encode($response);
            die();
            break;

            case 'facturar':
                include_once(LIBRARY_DIR . "/sqlExecuter.php");
                $id = $_POST["id"];

                $sql = "UPDATE tbl_cafacthdrs SET pagado = 0 WHERE id_fact = $id";
                executeSQL($n, $Arry, $lastInsertId, $sql);
                echo "true";
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



