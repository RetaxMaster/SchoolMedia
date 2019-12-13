<?php

if (!isset($_GET["path"]) || empty($_GET["path"]))
    header("location: ./main.php?Lang=$Lang&wph=2");

    $path = $_GET["path"];

header("Content-disposition: attachment; filename=$path");
header("Content-type: MIME");
readfile($path);

?>