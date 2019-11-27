<?php
/*	
    tbl_genctrycodes
        id_ctrycode
        id_pais
        descrip
*/
// Datos de un solo codigo telefonico de pais de acuerdo a su ID 
function citlf_recoveryToShowByID(&$nDocs,&$Docs,$id_ctrycode,$ctryCod) {
	$SQLStrQuery="CALL sp_p_get_gencitlf_id ($id_ctrycode,$ctryCod)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}

// Datos de un codigo telefonico de pais de acuerdo a su pais.
// Si $ctryCod es 1 recupera los resultados con id del codigo de pais
// si es 0 recupera los resultados con los nombres en texto de los paises
function citlf_recoveryBy_paisID(&$nDocs,&$Docs,$id_pais,$ctryCod) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gencitlf_id_pais($id_pais,$ctryCod)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los codigo telefonico de paises
function citlf_recoveryAllList(&$nDocs,&$Docs,$ctryCod) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gencitlf_all($ctryCod)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}


?>