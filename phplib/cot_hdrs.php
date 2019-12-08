<?php
/*	
 tbl_cacothdrs
	id_cot
    id_client
    rs
    ruc
    addrs
    id_pais
    id_prov
    id_ctrycodefijo
    tel
    fecha
    nroprefact
    ppagoCC
    cantdias
    ver
    facturado
*/

// Crea una nueva ubicación
function cothdrs_createRecord($id_client, $rs, $ruc, $addrs, $id_pais, $id_prov, $id_ctrycodefijo, $tel, $fecha, $nroprefact, $ppagoCC, $cantdias, $ver, $facturado)
{
    $SQLStrQuery = "CALL sp_p_set_cacothdrs_Create('$id_client', '$rs', '$ruc', '$addrs', '$id_pais', '$id_prov', '$id_ctrycodefijo', '$tel', '$fecha', '$nroprefact', '$ppagoCC', '$cantdias', '$ver', '$facturado')";
    SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
}

// Actualiza algún campo de la tabla según su id, recibe un arreglo asociativo con los campos a actualizar y también recibe el id de la fila que se va a actualizar
function cothdrs_updateRecord($fields, $id_cot)
{
    if (!empty($fields)) {
        foreach ($fields as $key => $value) {
            if ($value !== "") {
                $SQLStrQuery = "CALL sp_p_set_cacothdrs_Update('$key', '$value', '$id_cot')";
                SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
            }
        }
    } else {
        throw new Exception("Debes enviar al menos un campo");
    }
}

//Recupera todos los registros, opcionalmente puedes especificar si deseas hacer un join para traer los datos crudos o reemplazados
function cothdrs_recoveryAllList(&$nDocs, &$Docs, $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_cacothdrs_all($tinyint)";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 15); // Pertenece a dbmngmtAdmin.php
}

//Recupera todos los registros filtrados por algún campo
function cothdrs_recoveryAllByAnyField(&$nDocs, &$Docs, $field, $value, $join = false, $extraWhere = "")
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_cacothdrs_byAnyField('$field', '$value', $tinyint, '$extraWhere')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 15); // Pertenece a dbmngmtAdmin.php
}

//Recupera un registro filtrados por algún campo
function cothdrs_recoveryOneByAnyField(&$nDocs, &$Docs, $field, $value, $join = false, $extraWhere = "")
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_get_cacothdrs_byAnyField('$field', '$value', $tinyint, '$extraWhere')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    ConvertPointerToArray($ResponsePointer, $Docs, $nDocs, 15); // Pertenece a dbmngmtAdmin.php
}
