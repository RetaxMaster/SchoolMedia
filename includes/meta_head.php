<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?php echo $Lang; ?>">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- meta name="viewport" content="width=device-width, initial-scale=1" !-->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <title><?php echo $wpHeader[1] . ' .:. ' . SITE_NAME; ?></title>

    <!-- Mobile Specific Metas
	================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
	================================================== -->
    <!-- Bootstrap CSS < ?php echo CSS_DIR; ?>/dataTables.bootstrap4.min.css-->
    <link rel="stylesheet" href="<?php echo CSS_DIR; ?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS_DIR; ?>/twitter_bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <!-- Font Awesome CSS < ?php echo CSS_DIR; ?>/fontawesome_releases_v5.0.6_all.css-->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="<?php echo CSS_DIR; ?>/estilos.css">
    <link rel="stylesheet" href="<?php echo CSS_DIR; ?>/@medias.css">
    <link rel="stylesheet" href="<?php echo CSS_DIR; ?>/estilos_menu.css">