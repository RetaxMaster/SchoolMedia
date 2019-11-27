<?php
/*	
	id_pais
	cod_iso2
	descrip
	enabled
*/
// Datos de un solo pais de acuerdo a su ID y se puede filtrar por su estado enabled 
// 3: no importa si esta disponible o no el id buscado
// 0: no debe estar disponible el id buscado
// 1: debe estar disponible el id buscado
function pa_recoveryToShowByID(&$nDocs,&$Docs,$id,$enabled) {
	/* 3: SELECT * FROM tbl_genpaises	WHERE id_pais=id_paisIN	ORDER BY descrip;
    1,0: SELECT * FROM tbl_genpaises WHERE (id_pais=id_paisIN) AND (enabled=enabledIN) ORDER BY descrip; */
	$SQLStrQuery="CALL sp_p_get_genpaises_id ($id,$enabled)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,4); // Pertenece a dbmngmtAdmin.php
}

// Datos de un pais de acuerdo a su codigo ISO2
// 3: no importa si esta disponible o no el iso buscado
// 0: no debe estar disponible el iso buscado
// 1: debe estar disponible el iso buscado
function pa_recoveryCodIso2Enabled(&$nDocs,&$Docs,$enabled,$codIso2) { // true or false
	/* 3: SELECT * FROM tbl_genpaises WHERE cod_iso2 LIKE UPPER(iso2IN) ORDER BY descrip;
	1,0: SELECT * FROM tbl_genpaises WHERE (cod_iso2 LIKE UPPER(iso2IN)) AND (enabled=enabledIN) ORDER BY descrip; */
	$SQLStrQuery="CALL sp_p_lst_genpaises_iso2($codIso2,$enabled)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,4); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los paises de acuerdo a su estado Enabled
// 3: no importa si esta disponible o no el pais, recupera todos
// 0: Solo paises no disponibles
// 1: solo paises disponibles
function pa_recoveryAllListEnabled(&$nDocs,&$Docs,$enabled) { // true or false
	/* 3: SELECT * FROM tbl_genpaises ORDER BY descrip;
    1,0: SELECT * FROM tbl_genpaises WHERE enabled=enabledIN ORDER BY descrip; */
	$SQLStrQuery="CALL sp_p_lst_genpaises_all($enabled)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,4); // Pertenece a dbmngmtAdmin.php
}

// Formatear Paises para ser usado en listas desplegables como botones
function pa_dropDownButtonItemTag($nCtry,$CtryLst,&$CtryDataArry) {
	$CtryDataArry=[];
	if ($nCtry==1){
		array_push($CtryDataArry,'<button id="'.$CtryLst[1].'" value="'.$CtryLst[0].'" class="dropdown-item" type="button">'.$CtryLst[2].'</button>');	
	} else {
		foreach($CtryLst as $element) {
			array_push($CtryDataArry,'<button id="'.$element[1].'" value="'.$element[0].'" class="dropdown-item" type="button">'.$element[2].'</button>');	
		}
	}
}

// Actualiza el campo enabled, estado de disponibilidad del pais de acuerdo a su id.
function pa_updateRecord($enabled,$id) {
	$SQLStrQuery="CALL sp_p_set_genpaises_UpdateEnabledState($enabled,$id)"; // UPDATE tbl_genpaises SET enabled=enabledA WHERE id_pais=id_paisA;
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

//////////////////// Sin uso actualmente

function pa_recoveryAllByID(&$nDocs,&$Docs,$id) {
		$SQLStrQuery="SELECT * FROM pais WHERE idPais='".$id."'";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,7); // Pertenece a dbmngmtAdmin.php
	}

	function pa_recoveryAllList(&$nDocs,&$Docs) {
		$SQLStrQuery="SELECT * FROM pais";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,7); // Pertenece a dbmngmtAdmin.php
	}

	function pa_recoveryToShowEnabledByID(&$nDocs,&$Docs,$id) {
		$SQLStrQuery="SELECT idPais, descripcion, enabled FROM pais  WHERE idPais='".$id."' AND enabled=".$enabled."";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
	}
	

?>