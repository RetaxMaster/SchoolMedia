<?php
/*	
 tbl_genclasifics
	id_clasific
    descrip
*/

// Crea una nueva Clasificacion de Cliente.
function cc_createRecord($descrip) {
	$SQLStrQuery="CALL sp_p_set_gencCli_Create($descrip)";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

// Datos de un solo Clasificacion de Cliente de acuerdo a su ID 
function cc_recoveryToShowByID(&$nDocs,&$Docs,$id) {
	$SQLStrQuery="CALL sp_p_get_gencCli_id($id)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// datos de todas las Clasificaciones de Clientes
function cc_recoveryAllList(&$nDocs,&$Docs) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gencCli_all()";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// datos de todas las Clasificaciones de Clientes de acuerdo al descriptivo (like)
function cc_recoveryByDescrip(&$nDocs,&$Docs,$descrip) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gencCli_descrip($descrip)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// Actualiza el campo Descrip de una Clasificacion de Cliente.
function cc_updateRecord($descrip,$id_cc) {
	$SQLStrQuery="CALL sp_p_set_gencCli_Update($descrip,$id_cc)";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

?>