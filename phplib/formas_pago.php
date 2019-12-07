<?php
/*	
 tbl_cafps
	id_fp
    id_pais
    descrip
    enabled
*/

// Crea una nueva ubicación
function fps_createRecord($id_pais, $descrip, $enabled)
{
    $SQLStrQuery = "CALL sp_p_set_cafps_Create('$id_pais', '$descrip', '$enabled')";
    SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
}

// Actualiza algún campo de la tabla según su id, recibe un arreglo asociativo con los campos a actualizar y también recibe el id de la fila que se va a actualizar
function fps_updateRecord($fields, $id_fp)
{
    if (!empty($fields)) {
        foreach ($fields as $key => $value) {
            if ($value !== "") {
            $SQLStrQuery = "CALL sp_p_set_cafps_Update('$key', '$value', $id_fp)";
            SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
            }
        }
    }
    else {
        throw new Exception("Debes enviar al menos un campo");
    }
}

//Recupera todos los registros, opcionalmente puedes especificar si deseas hacer un join para traer los datos crudos o reemplazados
function fps_recoveryAllList(&$nDocs, &$Docs, $enabled, $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_cafps_all($enabled, $tinyint)";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 4); // Pertenece a dbmngmtAdmin.php
}

//Recupera todos los registros filtrados por algún campo
function fps_recoveryAllByAnyField(&$nDocs, &$Docs, $field, $value, $enabled, $extraWhere = "", $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_cafps_byAnyField('$field', '$value', $enabled, $tinyint, '$extraWhere')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 4); // Pertenece a dbmngmtAdmin.php
}

//Recupera un registro filtrados por algún campo
function fps_recoveryOneByAnyField(&$nDocs, &$Docs, $field, $value, $enabled, $extraWhere = "", $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_get_cafps_byAnyField('$field', '$value', $enabled, $tinyint, '$extraWhere')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 4); // Pertenece a dbmngmtAdmin.php
}