<?

// ----------------------------------------------------------------
// MEDAS(MEDical Appointment System)y todos las marcas relacionadas son propiedad 
// Intelectual de ESDca Systems, C.A. RIF: J-30883826-8
// ESDca Systems, C.A. Se reserva el derecho de modificar, actualizar,
// mantener, utilizar y proporcionar derechos de uso a su entera 
// discrecion sobre MEDAS. ESDca Systems, C.A. No cede  
// los derechos de autoria y uso de este software sin previa 
// autorizaci�n firmada y sellada como documento legal de concesion.
// ****************************************************************
// ****************************************************************

// Este archivo mantiene todas las funciones necesarias para 
// administrar las p�ginas web del sistema

// ****************************************************************

// xxxxxx Recupera la cabecera de todas las paginas

	function GetWPHeader(&$wpTexts,&$nWPT) {
		$SQLStrQuery="SELECT * FROM WPSHeader";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,10);
	}

// xxxxxx Recupera la cabecera de todas las paginas segun el idioma

	function GetWPHeaderByLang($Lang,&$wpTexts,&$nWPT) {
		$SQLStrQuery="SELECT * FROM WPSHeader WHERE lang='".$Lang."'";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,10);
	}

// xxxxxx Recupera la cabecera de la pagina

	function GetWPHeaderByid($id,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="SELECT * FROM WPSHeader WHERE id_wph=".$id."";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,10);
	}

// xxxxxx Recupera la cabecera de la pagina segun el nombre de la p�gina

	function GetWPHeaderByName($names,$Lang,&$wpTexts,&$nWPT) {
		$SQLStrQuery="SELECT * FROM WPSHeader WHERE wp_name='".$names."' AND lang='".$Lang."'";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,10);
	}

?>