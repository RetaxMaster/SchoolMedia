<?php

//Recupera todos los registros filtrados por algún campo
function rechdrs_recoveryAllByAnyField(&$nDocs, &$Docs, $join = false, $where = "")
{ // true or false
    $tinyint = (int) $join;
    $SQLStrQuery = "CALL sp_p_lst_carechdrs_byAnyField($tinyint, \"$where\")";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    $Docs = mysqli_fetch_all($ResponsePointer);
    $nDocs = mysqli_num_rows($ResponsePointer);
}