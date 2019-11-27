<?

// ----------------------------------------------------------------
// MEDAS(MEDical Appointment System)y todos las marcas relacionadas son propiedad 
// Intelectual de ESDca Systems, C.A. RIF: J-30883826-8
// ESDca Systems, C.A. Se reserva el derecho de modificar, actualizar,
// mantener, utilizar y proporcionar derechos de uso a su entera 
// discrecion sobre MEDAS. ESDca Systems, C.A. No cede  
// los derechos de autoria y uso de este software sin previa 
// autorización firmada y sellada como documento legal de concesion.
// ****************************************************************
// ****************************************************************

// Este archivo mantiene todas las funciones necesarias para 
// administrar las páginas web del sistema

// ****************************************************************
// valores de los permisos:
// 0 o null: Sin permisos
// 1: solo lectura de datos
// 2: lectura y escritura

// xxxxxx Recupera los permisos
	function GetWPPermisos(&$wpPermisos,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="SELECT * FROM WPSPermisos";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpPermisos,$nWP,8);
	}

// xxxxxx Recupera los permisos by idWPP
	function GetWPPermisosByid($id,&$wpTexts,&$nWPT) {
		$SQLStrQuery="SELECT * FROM WPSPermisos WHERE id_wpp=".$id."";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,8);
	}
	
// xxxxxx Recupera los permisos by idWPP solo por usuario
	function GetWPPermisosByid_WPP_UID($id_wph,$uid,$Lang,&$wpTexts,&$nWPT) {
		$SQLStrQuery="SELECT * FROM WPSPermisos WHERE id_wph=".$id_wph." AND id_usuario=".$uid."";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,8);
	}
	
// xxxxxx Recupera los permisos by uid solo por usuario
	function GetWPPermisosByUid($id,&$wpTexts,&$nWPT) {
		$SQLStrQuery="SELECT * FROM WPSPermisos WHERE uid=".$id."";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,8);
	}
	
// ***** Recupera los permisos by Lang (no operativo)
	function GetWPPermisosByLang($Lang,&$wpTexts,&$nWPT) {
		$SQLStrQuery="SELECT * FROM WPSPermisos WHERE Lang='".$Lang."'";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,8);
	}
?>