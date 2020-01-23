<?php
/*	
 tbl_calstvals
	id_lstval
	id_client
	descrip
	urlimg
*/

// Crea una nueva ubicación
function lv_createRecord($id_client, $descrip, $urlimg)
{
    $SQLStrQuery = "CALL sp_p_set_caLstVals_Create('$id_client', '$descrip', '$urlimg')";
    SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
}

// Actualiza algún campo de la tabla según su id, recibe un arreglo asociativo con los campos a actualizar y también recibe el id de la fila que se va a actualizar
function lv_updateRecord($fields, $id_lstval)
{
    if (!empty($fields)) {
        foreach ($fields as $key => $value) {
            if (true) { // <- If de validación update
            $SQLStrQuery = "CALL sp_p_set_caLstVals_Update('$key', '$value', $id_lstval)";
            SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
            }
        }
    }
    else {
        throw new Exception("Debes enviar al menos un campo");
    }
}

//Recupera todos los registros, opcionalmente puedes especificar si deseas hacer un join para traer los datos crudos o reemplazados
function lv_recoveryAllList(&$nDocs, &$Docs, $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_caLstVals_all($tinyint)";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 4); // Pertenece a dbmngmtAdmin.php
}

//Recupera todos los registros filtrados por algún campo
function lv_recoveryAllByAnyField(&$nDocs, &$Docs, $field, $value, $join = false, $extraWhere = "")
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_caLstVals_byAnyField('$field', '$value', $tinyint, '$extraWhere')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 4); // Pertenece a dbmngmtAdmin.php
}

//Recupera un registro filtrados por algún campo
function lv_recoveryOneByAnyField(&$nDocs, &$Docs, $field, $value, $join = false, $extraWhere = "")
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_get_caLstVals_byAnyField('$field', '$value', $tinyint, '$extraWhere')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 4); // Pertenece a dbmngmtAdmin.php
}