<?php
// Este archivo mantiene todas las funciones necesarias para 
// administrar los componentes de las páginas web del sistema

// ****************************************************************

// xxxxxx Recupera los textos de la pagina
	function GetWPContent(&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="CALL GetWPContent()";// "SELECT * FROM WPSContent ORDER BY id_wph, sec";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,6);
	}
	
// xxxxxx Recupera solo el componente indicado por el id
	function GetWPContentByid($id,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="CALL GetWPContentByid($id)";// "SELECT * FROM WPSContent WHERE id_wpc=".$id."";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,6);
	}

// xxxxxx Recupera los componentes de la pagina segun su idioma y el id de la página
function GetWPContentByid_Lang($id,$Lang,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
	$SQLStrQuery="CALL GetWPContentByid_Lang($id,'$Lang')";// "SELECT * FROM WPSContent WHERE id_wpc=".$id."";
	SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
	ConvertPointerToArray($rPointer,$wpHeader,$nWP,6);
}

// xxxxxx Recupera los componentes de la pagina segun su idioma, el id de la página y el tipo de componente
// (util en renderizado de titulos de carga de cada pagina)
function GetWPContentByid_Lang_compKind($id,$Lang,$compKind,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
	$SQLStrQuery="CALL GetWPContentByid_Lang_compKind($id,'$Lang',$compKind)";// "SELECT * FROM WPSContent WHERE id_wpc=".$id."";
	SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
	ConvertPointerToArray($rPointer,$wpHeader,$nWP,6);
}

// xxxxxx Recupera el contenido de la pagina by id_wph
	function GetWPContentByid_wph($id,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="CALL GetWPContentByid_wph($id)"; //"SELECT * FROM WPSContent WHERE id_wph=".$id." ORDER BY sec";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,6);
	}

// xxxxxx Recupera los textos de la pagina
	function GetWPContentByLang($Lang,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="CALL GetWPContentByLang('$Lang')"; // "SELECT * FROM WPSContent WHERE lang='".$Lang."' ORDER BY id_wph, sec";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,6);
	}

// xxxxxx Recupera los textos de la pagina
	function GetWPContentByText($texto,&$wpHeader,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="CALL GetWPContentByText('$texto')"; // "SELECT * FROM WPSContent WHERE textF LIKE '%".$texto."%' ORDER BY id_wph, sec";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpHeader,$nWP,6);
	}

?>