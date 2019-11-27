<?php
/*	
    id_dptoemp
    descrip
*/
// Datos de un solo departamento empresarial de acuerdo a su ID 
function dpto_recoveryToShowByID(&$nDocs,&$Docs,$id) {
	$SQLStrQuery="CALL sp_p_get_gendptoemp_id ($id)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los departamentos
function dpto_recoveryAllList(&$nDocs,&$Docs) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gendptoemp_all()";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// datos de todos los departamentos
function dpto_recoveryByDescrip(&$nDocs,&$Docs,$descrip) { // true or false
	$SQLStrQuery="CALL sp_p_lst_gendptoemp_descrip($descrip)";
	SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,2); // Pertenece a dbmngmtAdmin.php
}

// Actualiza el campo enabled, estado de disponibilidad del pais de acuerdo a su id.
function dpto_updateRecord($descrip,$id) {
	$SQLStrQuery="CALL sp_p_set_dptos_Update($descrip,$id)"; // UPDATE tbl_genpaises SET enabled=enabledA WHERE id_pais=id_paisA;
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
}

?>