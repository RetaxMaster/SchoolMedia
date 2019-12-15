<?php
/*	
 tbl_acadcalcapinsts
	id_calcapinst
    id_client
    id_ctto
    id_plan
    id_cap
    id_pais
    id_prov
    finicio
    ffin
    estatus
    firmcierredoc
    id_calif
*/

// Crea una nueva ubicación
function calcaps_createRecord($id_client, $id_ctto, $id_plan, $id_cap, $id_pais, $id_prov, $finicio, $ffin, $estatus, $firmcierredoc, $id_calif)
{
    $SQLStrQuery = "CALL sp_p_set_acadcalcaps_Create('$id_client', '$id_ctto', '$id_plan', '$id_cap', '$id_pais', '$id_prov', '$finicio', '$ffin', '$estatus', '$firmcierredoc', '$id_calif')";
    SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
}

// Actualiza algún campo de la tabla según su id, recibe un arreglo asociativo con los campos a actualizar y también recibe el id de la fila que se va a actualizar
function calcaps_updateRecord($fields, $id_calcapinst)
{
    if (!empty($fields)) {
        foreach ($fields as $key => $value) {
            if ($value !== "") {
                $SQLStrQuery = "CALL sp_p_set_acadcalcaps_Update('$key', '$value', '$id_calcapinst')";
                SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
            }
        }
    } else {
        throw new Exception("Debes enviar al menos un campo");
    }
}

//Recupera todos los registros, opcionalmente puedes especificar si deseas hacer un join para traer los datos crudos o reemplazados
function calcaps_recoveryAllList(&$nDocs, &$Docs, $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_acadcalcaps_all($tinyint)";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    $Docs = mysqli_fetch_all($ResponsePointer);
    $nDocs = mysqli_num_rows($ResponsePointer);
}

//Recupera todos los registros filtrados por algún campo
function calcaps_recoveryAllByAnyField(&$nDocs, &$Docs, $join = false, $where = "")
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_acadcalcaps_byAnyField($tinyint, '$where')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    $Docs = mysqli_fetch_all($ResponsePointer);
    $nDocs = mysqli_num_rows($ResponsePointer);
}

//Recupera un registro filtrados por algún campo
function calcaps_recoveryOneByAnyField(&$nDocs, &$Docs, $join = false, $where = "")
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_get_acadcalcaps_byAnyField($tinyint, '$where')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    $Docs = mysqli_fetch_all($ResponsePointer);
    $nDocs = mysqli_num_rows($ResponsePointer);
}
