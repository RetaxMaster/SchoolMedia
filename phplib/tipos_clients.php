<?php
/*	
 tbl_gentipos
	id_tipo
    descrip
*/

// Crea un nuevo Tipo de Cliente.
function tc_createRecord($descrip) {
	$SQLStrQuery="CALL sp_p_set_gentCli_Create($descrip)";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

// Datos de un solo Tipo de Cliente de acuerdo a su ID 
function tc_recoveryToShowByID(&$nDocs,&$Docs,$id) {
	$SQLStrQuery="CALL sp_p_get_gentCli_id($id)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los Tipos de Clientes
function tc_recoveryAllList(&$nDocs,&$Docs) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gentCli_all()";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los Tipod e Clientes de acuerdo al descriptivo (like)
function tc_recoveryByDescrip(&$nDocs,&$Docs,$descrip) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gentCli_descrip($descrip)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// Actualiza el campo Descrip de un Tipo de Cliente.
function tc_updateRecord($descrip,$id_tc) {
	$SQLStrQuery="CALL sp_p_set_gentCli_Update($descrip,$id_tc)";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

?>