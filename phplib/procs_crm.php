<?php                       
/*	ESTO ES UN EJEMPLO, PUEDEN TENER MAS O MENOS FUNCIONES
    tbl_crmprocs
        id_proc
        id_tipo
        descrip
*/
// Datos de un solo proceso del crm de acuerdo a su ID 
function pcrm_recoveryToShowByID(&$nDocs,&$Docs,$id,$ctryCod) {
	$SQLStrQuery="CALL sp_p_get_genpcrm_id ($id,$ctryCod)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}

// Datos de un proceso de crm de acuerdo a su pais.
// Si $ctryCod es 1 recupera los resultados con id del codigo del tipo de cliente
// si es 0 recupera los resultados con los nombres en texto de los tipos de clientes
function pcrm_recoveryBy_paisID(&$nDocs,&$Docs,$id,$ctryCod) { // true or false
	$SQLStrQuery="CALL sp_p_lst_genpcrm_id_tipoCli($id,$ctryCod)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los codigo telefonico de paises
function pcrm_recoveryAllList(&$nDocs,&$Docs,$ctryCod) { // true or false
	$SQLStrQuery="CALL sp_p_lst_genpcrm_all($ctryCod)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}


?>