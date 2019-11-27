<?php
/*	
 tbl_genfpubs
	id_tpub
    descrip
*/

// Crea un nuevo Formato Publicitario.
function fp_createRecord($descrip) {
	$SQLStrQuery="CALL sp_p_set_genformatPub_Create($descrip)";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

// Datos de un solo Formato publicitario de acuerdo a su ID 
function fp_recoveryToShowByID(&$nDocs,&$Docs,$id) {
	$SQLStrQuery="CALL sp_p_get_genformatPub_id($id)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los Formatos Publicitarios
function fp_recoveryAllList(&$nDocs,&$Docs) { // true or false
	$SQLStrQuery="CALL sp_p_lst_genformatPub_all()";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los Formatos Publicitarios de acuerdo al descriptivo (like)
function fp_recoveryByDescrip(&$nDocs,&$Docs,$descrip) { // true or false
	$SQLStrQuery="CALL sp_p_lst_genformatPub_descrip($descrip)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// Actualiza el campo Descrip de un Formato Publicitario.
function fp_updateRecord($descrip,$id_fp) {
	$SQLStrQuery="CALL sp_p_set_genformatPub_Update($descrip,$id_fp)";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

?>