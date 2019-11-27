<?php
/*	
 tbl_gencalifs
	id_calif
    descrip
*/

// Crea una nueva Calificacion de Cliente.
function cal_createRecord($descrip) {
	$SQLStrQuery="CALL sp_p_set_gencalif_Create($descrip)";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

// Datos de una sola Calificacion de Cliente de acuerdo a su ID 
function cal_recoveryToShowByID(&$nDocs,&$Docs,$id) {
	$SQLStrQuery="CALL sp_p_get_gencalif_id($id)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// datos de todas las Calificaciones de Clientes
function cal_recoveryAllList(&$nDocs,&$Docs) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gencalif_all()";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// datos de todas las Calificaciones de Clientes de acuerdo al descriptivo (like)
function cal_recoveryByDescrip(&$nDocs,&$Docs,$descrip) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gencalif_descrip($descrip)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// Actualiza el campo Descrip de una Calificacion de Cliente.
function cal_updateRecord($descrip,$id_cc) {
	$SQLStrQuery="CALL sp_p_set_gencalif_Update($descrip,$id_cc)";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

?>