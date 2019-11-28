<?php

// Este archivo mantiene todas las funciones necesarias para 
// administrar las cabeceras de las paginas web del sistema

// ****************************************************************

// xxxxxx Recupera la cabecera de todas las paginas

	function GetWPHeader(&$wpTexts,&$nWPT) {
		$SQLStrQuery="CALL GetWPHeader()"; // "SELECT * FROM WPSHeader";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,7);
	}

// xxxxxx Recupera la cabecera de todas las paginas segun el idioma

	function GetWPHeaderByLang($Lang,&$wpTexts,&$nWPT) {
		$SQLStrQuery="CALL GetWPHeaderByLang('$Lang')"; // "SELECT * FROM WPSHeader WHERE lang='".$Lang."'";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,7);
	}

// xxxxxx Recupera la cabecera de la pagina de acuerdo a su id de pagina sin iportar el idioma

	function GetWPHeaderByid($id,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="CALL GetWPHeaderByid($id)"; // "SELECT * FROM WPSHeader WHERE id_wph=".$id."";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,7);
	}

// xxxxxx Recupera la cabecera de la pagina de acuerdo a su id de pagina e idioma

function GetWPHeaderByid_Lang($id,$Lang,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
	$SQLStrQuery="CALL GetWPHeaderByid_Lang($id,'$Lang')"; // "SELECT * FROM WPSHeader WHERE id_wph=".$id."";
	SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
	ConvertPointerToArray($rPointer,$wpHeader,$nWP,7);
}

// xxxxxx Recupera la cabecera de la pagina segun el nombre de la p�gina

	function GetWPHeaderByName($names,&$wpTexts,&$nWPT) {
		$SQLStrQuery="CALL GetWPHeaderByName('$names')"; // "SELECT * FROM WPSHeader WHERE wp_name='".$names."' AND lang='".$Lang."'";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,7);
	}

?>