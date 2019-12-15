<?php
// op_scheduler_conf WP=20
	include_once("./phplib/dbmngmt.php"); // Se carga la libreria de admin de DB
	include_once(LIBRARY_DIR."/admin_wpHeader.php");
	include_once(LIBRARY_DIR."/admin_wpContent.php");
	include_once(LIBRARY_DIR."/stringmngmt.php");
	include_once(LIBRARY_DIR."/cal_caps.php");
	include_once(LIBRARY_DIR."/valid_conn.php");
	$Lang=$_GET["Lang"]; // Sino hay un idioma prefijado se fija en es.
	$id_wph=$_GET["wph"]; // Sino hay una pagina prefijada se define en 0 (pagina de login)
	if (!isset($Lang)) {$Lang="es";} // Por defecto en español
	if (!isset($id_wph)) {$id_wph=0;}
	// GetWPContentByid_Lang_compKind($id_wph,$Lang,1,$wpContentAttrs,$nWPCA); // Recuperacion de los registros que continenen componentes (1) - util para permisos
	GetWPHeaderByid_Lang($id_wph,$Lang,$wpHeader,$nWPH); // Se recupera el titulo de la pagina y los parametros de cabecera
	// Si la pagina no devolvio resultados o tiene menos de 4 componentes hay un error en los parametros
	// ($nWPCA<4) or puede que hayan tratado de acceder a informacion no permitida, por lo que debe suspenderse de inmediato toda carga
	if (($nWPH<1)) {errorWindow("No se reconoce los textos solicitados"); exit;}
	// Extraccion de Labels
	GetWPContentByid_Lang_compKind($id_wph,$Lang,0,$wpContentLabels,$nWPC); // Recuperacion de los registros que continene labels (0)
	extractColumn($wpContentLabels,4,$wpContentArry_Labels); // extrae solo la columna 4 de los textos de los labels 
	dataToStr("['",$wpContentArry_Labels,"','","']",$wpContentStr_Labels); // se formatea la cadena para enviar a JavaScript
	/* Extraccion de Placeholders y Hints
	GetWPContentByid_Lang_compKind($id_wph,$Lang,2,$wpContentHints,$nWPCH); // Recuperacion de los registros que contienen Placeholders y Hints  (2)
	extractColumn($wpContentHints,4,$wpContentArry_Hints); // extrae solo la columna 4 de los textos de los labels 
	dataToStr("['",$wpContentArry_Hints,"','","']",$wpContentStr_Hints);*/ // se formatea la cadena para enviar a JavaScript
	// Extraccion de Mensajes
	// GetWPContentByid_Lang_compKind($id_wph,$Lang,3,$wpContentMsgs,$nWPCM); // Recuperacion de los registros que contienen Mensajes  (3)
	// extractColumn($wpContentMsgs,4,$wpContentArry_Msgs); // extrae solo la columna 4 de los textos de los labels 
	// dataToStr("['",$wpContentArry_Msgs,"','","']",$wpContentStr_Msgs); // se formatea la cadena para enviar a JavaScript
	// Extraccion de labels de Tablas, las tablas tienen el ID WPH=4
	// GetWPContentByid_Lang_compKind(4,$Lang,0,$wpTableSearchLabelsMsgs,$nWPTSL); // Recuperacion de los registros que contienen Mensajes delos Table Seach Labels
	// extractColumn($wpTableSearchLabelsMsgs,4,$wpTableSearchLabelsArry_Msgs); // extrae solo la columna 4 de los textos de los labels 
	// dataToStr("['",$wpContentArry_Msgs,"','","']",$wpContentStr_Msgs); // se formatea la cadena para enviar a JavaScript
	// pa_recoveryAllListEnabled($nCtry,$CtryLst,3); // Recupero el listado de paises que se encuentran habilitados y disponibles para operar por SchoolMedia
	// pa_dropDownButtonItemTag($nCtry,$CtryLst,$CtryDataArry); // Se construyen los tags HTML para los DropDown
	include_once(USR_PAGES."/scheduler_capacitaciones.php");
