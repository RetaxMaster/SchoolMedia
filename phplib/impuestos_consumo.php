<?php
/*	
    tbl_caimps
    Alias: tbl_0040
        id_imp => 
        id_pais =>
        valorPorc =>
        descrip =>
        enabled =>
*/

// Crea un nuevo impuesto por pais
function caimps_createRecord($id_imp, $id_pais, $valorPorc, $descrip, $enabled)
{
    $SQLStrQuery = "CALL sp_p_set_caimps_Create('$id_imp', '$id_pais', '$valorPorc', '$descrip', '$enabled')";
    SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
}

// Actualiza algún campo de la tabla según su id, recibe un arreglo asociativo con los campos a actualizar y también recibe el id de la fila que se va a actualizar
function caimps_updateRecord($fields, $id_imp)
{
    if (!empty($fields)) {
        foreach ($fields as $key => $value) {
            if ($value !== "") {
            $SQLStrQuery = "CALL sp_p_set_cimps_Update('$key', '$value', $id_imp)";
            SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
        }
        }
    } else {
        throw new Exception("Debes enviar al menos un campo");
    }
}

//Recupera todos los registros, opcionalmente puedes especificar si deseas hacer un join para traer los datos crudos o reemplazados
function caimps_recoveryAllList(&$nDocs, &$Docs, $enabled, $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_caimps_all($enabled, $tinyint)";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 5); // Pertenece a dbmngmtAdmin.php
}

//Recupera todos los registros filtrados por algún campo
function caimps_recoveryAllByAnyField(&$nDocs, &$Docs, $field, $value, $enabled, $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_caimps_byAnyField('$field', '$value', $enabled, $tinyint)";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 5); // Pertenece a dbmngmtAdmin.php
}

//Recupera un registro filtrados por algún campo
function caimps_recoveryOneByAnyField(&$nDocs, &$Docs, $field, $value, $enabled, $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_get_cimps_byAnyField('$field', '$value', $enabled, $tinyint)";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 5); // Pertenece a dbmngmtAdmin.php
}
