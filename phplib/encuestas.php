<?php
/*	
 tbl_acadencs
	id_enc
    id_calcapinst
    htmltext
    brid
    estatus
    id_calif
    tokenseg
*/

// Crea una nueva ubicación
function enc_createRecord($id_calcapinst, $htmltext, $brid, $estatus, $id_calif, $tokenseg)
{
    $SQLStrQuery = "CALL sp_p_set_openc_Create('$id_calcapinst', '$htmltext', '$brid', '$estatus', '$id_calif', '$tokenseg')";
    SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
}

// Actualiza algún campo de la tabla según su id, recibe un arreglo asociativo con los campos a actualizar y también recibe el id de la fila que se va a actualizar
function enc_updateRecord($fields, $id_enc)
{
    if (!empty($fields)) {
        foreach ($fields as $key => $value) {
            if ($value !== "") {
                $SQLStrQuery = "CALL sp_p_set_openc_Update('$key', '$value', '$id_enc')";
                SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
            }
        }
    } else {
        throw new Exception("Debes enviar al menos un campo");
    }
}

//Recupera todos los registros, opcionalmente puedes especificar si deseas hacer un join para traer los datos crudos o reemplazados
function enc_recoveryAllList(&$nDocs, &$Docs, $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_openc_all($tinyint)";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 7); // Pertenece a dbmngmtAdmin.php
}

//Recupera todos los registros filtrados por algún campo
function enc_recoveryAllByAnyField(&$nDocs, &$Docs, $field, $value, $extraWhere = "", $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_openc_byAnyField('$field', '$value', $tinyint, '$extraWhere')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 7); // Pertenece a dbmngmtAdmin.php
}

//Recupera un registro filtrados por algún campo
function enc_recoveryOneByAnyField(&$nDocs, &$Docs, $field, $value, $extraWhere = "", $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_get_openc_byAnyField('$field', '$value', $tinyint, '$extraWhere')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 7); // Pertenece a dbmngmtAdmin.php
}
