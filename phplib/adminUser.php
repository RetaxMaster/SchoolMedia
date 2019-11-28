<?php

// Este archivo mantiene todas las funciones necesarias para 
// administrar los usuarios, incluyendo administradores, estudiantes
// y en un futuro representantes, para el caso que aplique. 

// ****************************************************************

// Genera un numero entero aleatorio que se comprende entre -1000000000 y 1000000000 ya que la funcion cos()
// tiene su rango entre -1 y 1.

	function GenerateNewPasswd(){
		srand(time());
		return round(cos(time())*rand(0,1000000000000000000),0);
	}
	

// xxxxxx Recupera el Password encriptado que se encuentre en la DB, y responde true solo si el campo passwd tiene valor
	function UserHavePass($UID) {
		$SQLStrQuery="sp_p_get_usrdacs_UserHavePass($UID)"; // "SELECT ACTIVO FROM Password WHERE (UID='".$UID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$HavePasswd,$n,1); // Pertenece a dbmngmt.php
		if ($n>0) {
			return (!is_null($HavePasswd) or ltrim($HavePasswd)=="");
		}else{
			return false;
		}
	}

// xxxxxx Obtiene el ID de Usuario UID a Partir del nombre de Usuario UserName

	function GetIDFromUN($UN) {
		$SQLStrQuery="CALL sp_p_get_usrdacs_GetIDFromUN('$UN')"; // "SELECT UID FROM Usuario WHERE UN='".$UN."'";
		SQLQuery($ResponsePointer,$nUserProfileArray,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$UserProfileArray,$nUserProfileArray,1); // Pertenece a dbmngmt.php
		return $UserProfileArray;
	}

// xxxxxx Obtiene el nombre de Usuario UserName segun el ID de Usuario UID

	function GetUNFromUID($iUID) {
		$SQLStrQuery="CALL sp_p_get_usrdacs_GetUNFromUID($iUID)"; // "SELECT UN FROM Usuario WHERE UID='".$iUID."'";
		SQLQuery($ResponsePointer,$nUserProfileArray,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$UserProfileArray,$nUserProfileArray,1); // Pertenece a dbmngmt.php
		return $UserProfileArray;
	}

// xxxxxx Recuperar los datos de nombre y apellido de un usuario de manera concatenada.

	function RecoveryNameApellido($iUID) {
		$SQLStrQuery="CALL sp_p_get_usrprofs_RecoveryNameApellido($iUID)"; // "SELECT NOMBRE,APELLIDO FROM Usuario WHERE UID='".$iUID."'";
		SQLQuery($ResponsePointer,$nUserProfileArray,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$UserProfileArray,$nUserProfileArray,2); // Pertenece a dbmngmt.php
		return $UserProfileArray[0]." ".$UserProfileArray[1];
	}

/* / O---- Verifica si un nombre de usuario existe.

	function VerifyUserExist($UserName) {
		$SQLStrQuery="SELECT UID FROM Usuario WHERE (UN='".$UserName."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		return $n>0; 
	} */

// xxxxxx Recupera el eMail Principal de un usuario.

	function RecoveryUserMainMail($UserID) {
		$SQLStrQuery="CALL sp_p_get_usrprofs_RecoveryUserMainMail($UserID)"; //SELECT eMAIL FROM Usuario WHERE (UID='".$UserID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$UserPersonalMail,$n,1); // Pertenece a dbmngmt.php
		return $UserPersonalMail; 
	}

	
// xxxxxx Verifica si el correo personal tiene una entrada coincidente en la base de datos.
	function VerifyEmailMatch($UserName,$email) {
		$SQLStrQuery="CALL sp_p_get_usrprofs_VerifyEmailMatch('$UserName','$email')"; // "SELECT UID FROM Usuario WHERE ((UN='".$UserName."') AND (PERSONALMAIL='".$email."'))"; // Si el email y el usuario coinciden entonces retornara al menos 1 campo
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		return $n>0; // Si es mayor a cero es porque encontro al menos una 
			     // coincidencia, y no debe encontrar mas de una ya que 
			     // el nombre de usuario sirve como clave para indexar la 
			     // base de datos.
	}

// xxxxxx Verifica si el usuario se encuentra suspendido del sistema
	function VerifyUserBloqued($iUID) {
		$SQLStrQuery="CALL sp_p_get_usrprofs_VerifyUserBloqued($iUID)"; // "SELECT ACTIVO FROM Password AS P Join Usuario AS U ON P.UID=U.UID WHERE U.UN='".$UserName."'"; // "SELECT ACTIVO FROM Password WHERE (UN='".$UserName."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$UserStatus,$n,1); // Pertenece a dbmngmt.php
		if ($n>1){ // Se encontro mas de una coincidencia, debe verificarse la base de datos
//			echo "ERROR!!! Se ha encontrado un error de usuarios duplicados en la base de datos, por favor notificar a los propietarios del sitio. Gracias.";
			return $n; // $UserStatus[0]==0;
		}else{
			return $UserStatus; // Devuelve el estado de enabled
		}
	}
	
// Ingresa un nuevo usuario en la base de datos: Ingresa un usuario nuevo 
// xxxxxx a la base de datos no verifica si el usuario existente.

	function CreateUserProfile($id_companyA,$id_cargoA,$urlfotoA,$nomA,$apeA,$emailA,$id_ctrycodefijoA,$telA,$extA,$id_ctrycodecelA,$celA,$observA,$sexo) {
		$SQLStrQuery="CALL sp_p_set_usrprofs_CreateUserProfile(
			$id_companyA,
			$id_cargoA,
			'$urlfotoA',
			'$nomA',
			'$apeA',
			'$emailA',
			$id_ctrycodefijoA,
			'$telA',
			'$extA',
			$id_ctrycodecelA,
			'$celA',
			'$observA',
			'$sexo')"; // "INSERT INTO Usuario (UN,NOMBRE,APELLIDO,TLF,CEL,PROID,CIUDADRES,MAINMAIL,PERSONALMAIL,EMPRESA,SECTID,CARGOID,CIUDADTRAB,PAIS,DIRECCION,GRUPO) VALUES ('".$UserUN."','".$Nombre."','".$Apellido."','".$MainPhone."','".$CelPhone."','".$ProID."','".$LiveCity."','".$MaineMail."','".$PersonalMail."','".$Empresa."','".$SectEcon."','".$Cargo."','".$WorkCity."','".$Country."','".$Address."','0')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta. Ingresa los datos de Perfiles de usuario
		// y Se dispara el Trigger After Update que inserta la entrada en la tabla de tbl_usrdacs
		// El passwd quedda en nulo, debe generarse de manera automatica uno y enviarse por correo con el flujo como si 
		// se tratara de una recuperacion de passwd
		/*$SQLStrQuery="INSERT INTO Password (UID,CRYPTPASS,ACTIVO) VALUES ('".GetIDFromUN($UserUN)."','".$CryptPasswd."','0')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta. Ingresa los datos de Perfiles de sesion
		*/
	}

// O---- Funci�n que se encarga de encryptar el password de un usuario

	function Encrypt($UserPassUnEncrypt) {
		return crypt($UserPassUnEncrypt,"!@");
	}

// xxxxxx Recupera el ID del grupo o rol al cual pertenece el usuario de acuerdo a id_user
	function GrupoUsuario($iUID) {
		$SQLStrQuery="CALL sp_p_get_usrdacs_GrupoUsuario($iUID)"; // "SELECT GRUPO FROM Usuario WHERE (UID='".$iUID."') LIMIT 1"; // En caso de haber mas de una entrada el sistema se limitara al primero que encuentre.
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta en la base de datos globales
		ConvertPointerToArray($ResponsePointer,$UserGroup,$n,1); // Convertir la consulta en un arreglo de datos
		return $UserGroup;
	}
	
// xxxxxx Recupera los datos de sesión de usuario de acuerdo a su id de usuario

	function RecoveryUserProfileSesion_id($iUID,&$UserSesionProfile,&$n) {
		$SQLStrQuery="CALL sp_p_get_usrprofs_RecoveryUserProfileSesion_id($iUID)"; // "SELECT * FROM userdacs WHERE (UID='".$iUID."') LIMIT 1"; // En caso de haber mas de una entrada el sistema se limitara al primero que encuentre.
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta en la base de datos globales
		ConvertPointerToArray($ResponsePointer,$UserSesionProfile,$n,8); // Convertir la consulta en un arreglo de datos
	}

	// xxxxxx Recupera los datos de un usuario de acuerdo a su id de usuario en tbl_usrprofs

	function RecoveryUserProfile_id($iUID,&$UserProfile,&$n) {
		$SQLStrQuery="CALL sp_p_get_usrprofs_RecoveryUserProfile_id($iUID)"; // "SELECT * FROM userprofile WHERE (UID='".$iUID."') LIMIT 1"; // En caso de haber mas de una entrada el sistema se limitara al primero que encuentre.
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta en la base de datos globales
		ConvertPointerToArray($ResponsePointer,$UserProfile,$n,16); // Convertir la consulta en un arreglo de datos
	}

// xxxxxx Actualizar los datos de sesión o acceso de un usuario tbl_userdacs, solo nombre de usuario y rol. 

function UpdateUserProfileSesion_id($iUID,$id_rol,$UserName) {
	$SQLStrQuery="CALL sp_p_set_usrdacs_UpdateUserProfileSesion_id('$UserName',$id_rol,$iUID)"; // "UPDATE Usuario SET TLF='".$MainPhone."',CEL='".$CelPhone."',PROID='".$ProID."',CIUDADRES='".$LiveCity."',MAINMAIL='".$MaineMail."',PERSONALMAIL='".$PersonalMail."',EMPRESA='".$Empresa."',SECTID='".$SectEcon."',CARGOID='".$Cargo."',CIUDADTRAB='".$WorkCity."',PAIS='".$Country."',DIRECCION='".$Address."' WHERE (UID='".$iUID."')";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos globales
}

// xxxxxx Actualizar los datos de sesión o acceso de un usuario, no actualiza enabled ni externo . 

	function UpdateUserProfile_id($id_companyA,$id_cargoA,$urlfotoA,$nomA,$apeA,$emailA,$id_ctrycodefijoA,$telA,$extA,$id_ctrycodecelA,$celA,$observA,$id_userA,$sexo) {
		$SQLStrQuery="CALL sp_p_set_usrprofs_UpdateUserProfile_id(
			$id_companyA,
			$id_cargoA,
			'$urlfotoA',
			'$nomA',
			'$apeA',
			'$emailA',
			$id_ctrycodefijoA,
			'$telA',
			'$extA',
			$id_ctrycodecelA,
			'$celA',
			'$observA',
			$id_userA,
			'$sexo')"; //"UPDATE Usuario SET TLF='".$MainPhone."',CEL='".$CelPhone."',PROID='".$ProID."',CIUDADRES='".$LiveCity."',MAINMAIL='".$MaineMail."',PERSONALMAIL='".$PersonalMail."',EMPRESA='".$Empresa."',SECTID='".$SectEcon."',CARGOID='".$Cargo."',CIUDADTRAB='".$WorkCity."',PAIS='".$Country."',DIRECCION='".$Address."' WHERE (UID='".$iUID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos globales
	}

// xxxxxx // Actualizar el passwd de un usuario en sus datos de acceso.

	function UpdateUserPasswd_id($iUID,$UserPasswdCrypt) {
		$SQLStrQuery="CALL sp_p_set_usrdacs_UpdateUserPasswd_id('$UserPasswdCrypt',$iUID)"; // "UPDATE Password SET CRYPTPASS='".$UserPasswdCrypt."' WHERE (UID='".$iUID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos
	}

// xxxxxx Actualizar el campo enabled de un usuario en su perfil. El trigger dispara el cambio en los datos de acceso

	function UpdateUserEnabled_id($iUID,$UserEnabled) {
		$SQLStrQuery="CALL sp_p_set_usrprofs_UpdateUserEnabled_id($UserEnabled,$iUID)";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos
	}

// xxxxxx Actualiza el campo externo del perfil de un usuario de acuerdo a su id, el trigger dispara el cambio de la tbl_usrdacs.

function UpdateUserExterno_id($iUID,$UserExterno) {
	$SQLStrQuery="CALL sp_p_set_usrprofs_UpdateUserExterno_id($UserExterno,$iUID)";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos
}


?>