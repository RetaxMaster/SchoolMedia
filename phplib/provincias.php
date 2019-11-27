<?php
/*	
    id_prov
    id_pais
    cod_iso3
    descrip
    enabled
*/
// Datos de una sola provincia de acuerdo a su ID y se puede filtrar por su estado enabled 
// 3: no importa si esta disponible o no el id buscado
// 0: no debe estar disponible el id buscado
// 1: debe estar disponible el id buscado
function pv_recoveryToShowByID(&$nDocs,&$Docs,$id,$enabled) {
	$SQLStrQuery="CALL sp_p_get_genprovs_id ($id,$enabled)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,5); // Pertenece a dbmngmtAdmin.php
}

// Datos de una provincia de acuerdo a su codigo ISO3
// 3: no importa si esta disponible o no el iso buscado
// 0: no debe estar disponible el iso buscado
// 1: debe estar disponible el iso buscado
function pv_recoveryCodIso3Enabled(&$nDocs,&$Docs,$enabled,$codIso3) { // true or false
	$SQLStrQuery="CALL sp_p_lst_genprovs_iso3($codIso3,$enabled)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,5); // Pertenece a dbmngmtAdmin.php
}

// datos de todas las provincis de acuerdo a su estado Enabled
// 3: no importa si esta disponible o no la provincia, recupera todos
// 0: Solo paises no disponibles
// 1: solo paises disponibles
function pv_recoveryAllListEnabled(&$nDocs,&$Docs,$enabled) { // true or false
	$SQLStrQuery="CALL sp_p_lst_genprovs_all($enabled)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,5); // Pertenece a dbmngmtAdmin.php
}

// Datos de todas las provincia de acuerdo al id del pais al cual pertenecen y se puede filtrar por su estado enabled 
// 3: no importa si esta disponible o no la provincia correspondiente al id del pais buscado
// 0: Recuper solo als provincias que no estan disponibles para el pais seleccionado
// 1: Recupera solo las provincias que estan disponibles para el pais buscado
function pv_recoveryToShowByID_pais(&$nDocs,&$Docs,$id,$enabled) {
	$SQLStrQuery="CALL sp_p_lst_genprovs_id_pais ($id,$enabled)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,5); // Pertenece a dbmngmtAdmin.php
}

// datos para ser desplegados en una tabla de todas las provincias de un pais de acuerdo a su estado Enabled no recupera el campo id_pais
// 3: no importa si esta disponible o no la provincia, recupera todos
// 0: Solo paises no disponibles
// 1: solo paises disponibles
function pv_recoveryAllListEnabled_Lst(&$nDocs,&$Docs,$id,$enabled) { // true or false
	$SQLStrQuery="CALL sp_p_lst_genprovs_id_pais_lst($id,$enabled)";
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