<?php

function executeSQL(&$nDocs,&$Docs, &$lastInsertId, $SQL) {
    $SQLStrQuery = "CALL sp_p_executeSQL(\"$SQL\")";
    
    $response = SQLQueryAlt($SQLStrQuery); // Realiza la consulta
    $ResponsePointer = $response["ResponsePointer"];

    $lastInsertId = $response["lastInsertId"];

    if (!is_bool($ResponsePointer)) {
        $Docs = mysqli_fetch_all($ResponsePointer);
        $nDocs = mysqli_num_rows($ResponsePointer);
    }
}

?>