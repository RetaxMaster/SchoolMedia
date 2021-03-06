<?php
/*	
 tbl_opcalinsts
	id_calinst
    id_ctto
    id_clientanun
    id_clientesc
    id_locat
    cara
    id_lstval
    finicio
    ffin
    id_usersup
    id_userinst
    id_uservend
    estatus
*/

// Crea una nueva ubicación
function calist_createRecord($id_ctto, $id_clientanun, $id_clientesc, $id_locat, $cara, $id_lstval, $finicio, $ffin, $id_usersup, $id_userinst, $id_uservend, $estatus)
{
    $SQLStrQuery = "CALL sp_p_set_opcalist_Create('$id_ctto', '$id_clientanun', '$id_clientesc', '$id_locat', '$cara', '$id_lstval', '$finicio', '$ffin', '$id_usersup', '$id_userinst', '$id_uservend', '$estatus')";
    SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
}

// Actualiza algún campo de la tabla según su id, recibe un arreglo asociativo con los campos a actualizar y también recibe el id de la fila que se va a actualizar
function calist_updateRecord($fields, $id_calinst)
{
    if (!empty($fields)) {
        foreach ($fields as $key => $value) {
            if (true) { // <- If de validación update
                $SQLStrQuery = "CALL sp_p_set_opcalist_Update('$key', '$value', '$id_calinst')";
                SQLQuery($ResponsePointer, $n, $SQLStrQuery, false); // Realiza la consulta
            }
        }
    } else {
        throw new Exception("Debes enviar al menos un campo");
    }
}

//Recupera todos los registros, opcionalmente puedes especificar si deseas hacer un join para traer los datos crudos o reemplazados
function calist_recoveryAllList(&$nDocs, &$Docs, $join = false)
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_opcalist_all($tinyint)";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    $Docs = mysqli_fetch_all($ResponsePointer);
    $nDocs = mysqli_num_rows($ResponsePointer);
}

//Recupera todos los registros filtrados por algún campo
function calist_recoveryAllByAnyField(&$nDocs, &$Docs, $join = false, $where = "")
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_opcalist_byAnyField($tinyint, '$where')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    $Docs = mysqli_fetch_all($ResponsePointer);
    $nDocs = mysqli_num_rows($ResponsePointer);
}

//Recupera un registro filtrados por algún campo
function calist_recoveryOneByAnyField(&$nDocs, &$Docs, $join = false, $where = "")
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_get_opcalist_byAnyField($tinyint, '$where')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    $Docs = mysqli_fetch_all($ResponsePointer);
    $nDocs = mysqli_num_rows($ResponsePointer);
}
