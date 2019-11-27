<?php
/*	
 tbl_gencargos
	id_cargo
	id_dptoemp
    descrip
*/
// Datos de un solo Cargos Laborales de acuerdo a su ID 
function crgo_recoveryToShowByID(&$nDocs,&$Docs,$id) {
	$SQLStrQuery="CALL sp_p_get_gencrgo_id ($id)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}

// Datos de un solo Cargos Laborales de acuerdo al id del departamento al cual pertenece 
function crgo_recoveryToShowByID_Dpto(&$nDocs,&$Docs,$id) {
	$SQLStrQuery="CALL sp_p_get_gencrgo_id_dpto ($id)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los Cargos Laborales
function crgo_recoveryAllList(&$nDocs,&$Docs) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gencrgo_all()";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los Cargos laborales, incluidos los nombres de los departamentos empresariales para ser desplegados en una tabla
function crgo_recoveryAllList4tbl(&$nDocs,&$Docs) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gencrgo_all4tbl()";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los Cargos Laborales de acuerdo al descriptivo (like)
function crgo_recoveryByDescrip(&$nDocs,&$Docs,$descrip) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gencrgo_descrip($descrip)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,3); // Pertenece a dbmngmtAdmin.php
}

// Actualiza el campo Descrip y id de dpto de acuerdo a su id de Cargo Laboral.
function crgo_updateRecord($descrip,$id_dptoemp,$id) {
	$SQLStrQuery="CALL sp_p_set_gencrgo_Update($descrip,$id_dptoemp,$id)";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

?>