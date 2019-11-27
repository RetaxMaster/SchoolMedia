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

// xxxxxx Recupera los textos de la pagina
	function GetWPContent(&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="SELECT * FROM WPSContent ORDER BY id_wph, sec";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,9);
	}
	
// xxxxxx Recupera la cabecera de la pagina
	function GetWPContentByid($id,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="SELECT * FROM WPSContent WHERE id_wpc=".$id."";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,9);
	}

// xxxxxx Recupera la cabecera de la pagina by id_wph
	function GetWPContentByid_wph($id,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="SELECT * FROM WPSContent WHERE id_wph=".$id." ORDER BY sec";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,9);
	}

// xxxxxx Recupera los textos de la pagina
	function GetWPContentByLang($Lang,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="SELECT * FROM WPSContent WHERE lang='".$Lang."' ORDER BY id_wph, sec";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,9);
	}

// xxxxxx Recupera los componentes de la pagina segun su idioma y el id de la página
function GetWPContentByid_Lang($id,$Lang,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
	$SQLStrQuery="SELECT * FROM WPSContent WHERE lang='".$Lang."' AND id_wph='".$id."' ORDER BY id_wph, sec";
	SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
	ConvertPointerToArray($rPointer,$wpHeader,$nWP,9);
}

// xxxxxx Recupera los textos de la pagina
	function GetWPContentByText($texto,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="SELECT * FROM WPSContent WHERE textF LIKE '%".$texto."%' ORDER BY id_wph, sec";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,9);
	}

?>