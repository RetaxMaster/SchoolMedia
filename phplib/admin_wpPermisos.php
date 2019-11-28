<?php

// Este archivo mantiene todas las funciones necesarias para 
// administrar los permisos de las páginas web del sistema

// ****************************************************************
// valores de los permisos:
// 0 o null: Sin permisos
// 1: solo lectura de datos
// 2: lectura y escritura

// xxxxxx Recupera toda la tabla de permisos para todos los roles
	function GetWPPermisos_rol(&$wpPermisos,&$nWP) { // id, wp_Name, get1, get2, get3, lang
		$SQLStrQuery="CALL GetWPPermisos_rol()"; // "SELECT * FROM WPSPermisos";
		SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpPermisos,$nWP,5);
	}

// xxxxxx Recupera todos los permisos individuales de la tabla de usuarios, ningún usuario en particular
function GetWPPermisos_user(&$wpPermisos,&$nWP) { // id, wp_Name, get1, get2, get3, lang
	$SQLStrQuery="CALL GetWPPermisos_user()";
	SQLQuery($rPointer,$nWP,$SQLStrQuery,true);
	ConvertPointerToArray($rPointer,$wpPermisos,$nWP,5);
}

// xxxxxx Recupera los permisos de los diversos roles asociados a un id de página
	function GetWPPermisosByid_rol($id,&$wpTexts,&$nWPT) {
		$SQLStrQuery="CALL GetWPPermisosByid_rol($id)"; // "SELECT * FROM WPSPermisos WHERE id_wpp=".$id."";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,5);
	}
	
// xxxxxx Recupera los permisos individuales de todos los usuarios para un id de página
function GetWPPermisosByid_user($id,&$wpTexts,&$nWPT) {
	$SQLStrQuery="CALL GetWPPermisosByid_user($id)";
	SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
	ConvertPointerToArray($rPointer,$wpTexts,$nWPT,5);
}

// xxxxxx Recupera los permisos individuales de un usuario para una página en perticular
	function GetWPPermisosByid_WPH_UID($id_wph,$uid,&$wpTexts,&$nWPT) {
		$SQLStrQuery="CALL GetWPPermisosByid_wph_uid_user($id_wph,$uid)"; // "SELECT * FROM WPSPermisos WHERE id_wph=".$id_wph." AND id_usuario=".$uid."";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,5);
	}
	
// xxxxxx Recupera los permisos by uid solo por usuario
	function GetWPPermisosByUid($id,&$wpTexts,&$nWPT) {
		$SQLStrQuery="CALL GetWPPermisosByUid_user($id)"; // "SELECT * FROM WPSPermisos WHERE uid=".$id."";
		SQLQuery($rPointer,$nWPT,$SQLStrQuery,true);
		ConvertPointerToArray($rPointer,$wpTexts,$nWPT,5);
	}

?>