<?php

function executeSQL(&$nDocs,&$Docs, $SQL) {
    $SQLStrQuery = "CALL sp_p_executeSQL('$SQL')";
    SQLQuery($ResponsePointer, $nDocs, $SQLStrQuery, true); // Realiza la consulta
    $Docs = mysqli_fetch_all($ResponsePointer);
    $nDocs = mysqli_num_rows($ResponsePointer);
}

?>