<?php
/*	
 tbl_opimgsinstallvals
	id_imgsinstall
    id_calinst
    urlfoto
*/

// Crea una nueva ubicación
function insvals_createRecord($id_calinst, $urlfoto)
{
	$SQLStrQuery = "CALL sp_p_set_opinsvals_Create('$id_calinst', '$urlfoto')";
	SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
}

// Actualiza algún campo de la tabla según su id, recibe un arreglo asociativo con los campos a actualizar y también recibe el id de la fila que se va a actualizar
function insvals_updateRecord($fields, $id_imgsinstall)
{
	if (!empty($fields)) {
		foreach ($fields as $key => $value) {
			if ($value !== "") {
				$SQLStrQuery = "CALL sp_p_set_opinsvals_Update('$key', '$value', '$id_imgsinstall')";
				SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
			}
		}
	} else {
		throw new Exception("Debes enviar al menos un campo");
	}
}

//Recupera todos los registros, opcionalmente puedes especificar si deseas hacer un join para traer los datos crudos o reemplazados
function insvals_recoveryAllList(&$nDocs, &$Docs, $join = false)
{ // true or false
	$tinyint = (int) $join;
	$SQLStrQuery = "CALL sp_p_lst_opinsvals_all($tinyint)";
	SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 3); // Pertenece a dbmngmtAdmin.php
}

//Recupera todos los registros filtrados por algún campo
function insvals_recoveryAllByAnyField(&$nDocs, &$Docs, $field, $value, $join = false, $extraWhere = "")
{ // true or false
	$tinyint = (int) $join;
	$SQLStrQuery = "CALL sp_p_lst_opinsvals_byAnyField('$field', '$value', $tinyint, '$extraWhere')";
	SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 3); // Pertenece a dbmngmtAdmin.php
}

//Recupera un registro filtrados por algún campo
function insvals_recoveryOneByAnyField(&$nDocs, &$Docs, $field, $value, $join = false, $extraWhere = "")
{ // true or false
	$tinyint = (int) $join;
	$SQLStrQuery = "CALL sp_p_get_opinsvals_byAnyField('$field', '$value', $tinyint, '$extraWhere')";
	SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 3); // Pertenece a dbmngmtAdmin.php
}
