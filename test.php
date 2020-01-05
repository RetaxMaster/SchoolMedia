<?php

/* include_once("./phplib/dbmngmt.php"); // Se carga la libreria de admin de DB
include_once(LIBRARY_DIR . "/clients.php");
clients_recoveryAllByAnyField($n, $Arry, "tbl_cagenclients.id_pais", "89", $enabled, true);
echo "<pre>";
var_dump($Arry);
echo "</pre>";
die(); */

$variable = isset($_GET["asd"]) ? $_GET["asd"] : "Nothing";

echo "<pre>";
var_dump($variable);
echo "</pre>";
die();

?>