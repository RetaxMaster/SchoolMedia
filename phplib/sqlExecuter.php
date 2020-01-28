<?php

function executeSQL(&$nDocs,&$Docs, &$lastInsertId, $SQL, $resulttype = MYSQLI_BOTH) {

    $response = SQLQueryAlt($SQL); // Realiza la consulta
    $ResponsePointer = $response["ResponsePointer"];

    $lastInsertId = $response["lastInsertId"];

    if (!is_bool($ResponsePointer)) {
        $Docs = mysqli_fetch_all($ResponsePointer, $resulttype);
        $nDocs = mysqli_num_rows($ResponsePointer);
    }
}

?>