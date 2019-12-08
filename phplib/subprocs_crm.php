<?php
/*	
 tbl_crmsubprocs
	id_subproc
    id_proc
	id_tipo
	descrip
*/

// Crea una nueva ubicación
function subprocs_createRecord($id_proc, $id_tipo, $descrip)
{
	$SQLStrQuery = "CALL sp_p_set_crmsubprocs_Create('$id_proc', $id_tipo', '$descrip')";
	SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
}

// Actualiza algún campo de la tabla según su id, recibe un arreglo asociativo con los campos a actualizar y también recibe el id de la fila que se va a actualizar
function subprocs_updateRecord($fields, $id_subproc)
{
	if (!empty($fields)) {
		foreach ($fields as $key => $value) {
			if ($value !== "") {
				$SQLStrQuery = "CALL sp_p_set_crmsubprocs_Update('$key', '$value', '$id_subproc')";
				SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
			}
		}
	} else {
		throw new Exception("Debes enviar al menos un campo");
	}
}

//Recupera todos los registros, opcionalmente puedes especificar si deseas hacer un join para traer los datos crudos o reemplazados
function subprocs_recoveryAllList(&$nDocs, &$Docs, $join = false)
{ // true or false
	$tinyint = (int) $join;
	$SQLStrQuery = "CALL sp_p_lst_crmsubprocs_all($tinyint)";
	SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 4); // Pertenece a dbmngmtAdmin.php
}

//Recupera todos los registros filtrados por algún campo
function subprocs_recoveryAllByAnyField(&$nDocs, &$Docs, $field, $value, $join = false, $extraWhere = "")
{ // true or false
	$tinyint = (int) $join;
	$SQLStrQuery = "CALL sp_p_lst_crmsubprocs_byAnyField('$field', '$value', $tinyint, '$extraWhere')";
	SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 4); // Pertenece a dbmngmtAdmin.php
}

//Recupera un registro filtrados por algún campo
function subprocs_recoveryOneByAnyField(&$nDocs, &$Docs, $field, $value, $join = false, $extraWhere = "")
{ // true or false
	$tinyint = (int) $join;
	$SQLStrQuery = "CALL sp_p_get_crmsubprocs_byAnyField('$field', '$value', $tinyint, '$extraWhere')";
	SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
	ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 4); // Pertenece a dbmngmtAdmin.php
}
