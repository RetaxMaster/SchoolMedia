<?

// ----------------------------------------------------------------
// Sosem y todos las marcas relacionadas a SOSEM son propiedad 
// Intelectual de ESDca Systems, C.A. RIF: J-30883826-8
// ESDca Systems, C.A. Se reserva el derecho de modificar, actualizar,
// mantener, utilizar y proporcionar derechos de uso a su entera 
// discrecion sobre SOSEM Desktop o SOSEM. ESDca Systems, C.A. No cede  
// los derechos de autoria y uso de este software sin previa 
// autorizaci�n firmada y sellada como documento legal de concesion.
// ****************************************************************
// ****************************************************************

// Este archivo mantiene todas las funciones necesarias para 

// administrar los usuarios, incluyendo administradores, estudiantes

// y en un futuro representantes, para el caso que aplique. 

// ****************************************************************

// Genera un numero entero aleatorio que se comprende entre -1000000000 y 1000000000 ya que la funcion cos() tiene su rango entre -1 y 1.

	function GenerateNewPasswd(){
		srand(time());
		return round(cos(time)*rand(0,1000000000),0);
	}
	

// xxxxxx Verifica si ya el usuario se encuentra Con su password creado
	function UserHavePass($UID) {
		$SQLStrQuery="SELECT ACTIVO FROM Password WHERE (UID='".$UID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		return $n>0; 
	}

// xxxxxx Obtiene el ID de Usuario UID a Partir del nombre de Usuario UserName

	function GetIDFromUN($UN) {
		$SQLStrQuery="SELECT UID FROM Usuario WHERE UN='".$UN."'";
		SQLQuery($ResponsePointer,$nUserProfileArray,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$UserProfileArray,$nUserProfileArray,1); // Pertenece a dbmngmt.php
		return $UserProfileArray;
	}

// xxxxxx Obtiene el nombre de Usuario UserName segun el ID de Usuario UID

	function GetUNFromUID($iUID) {
		$SQLStrQuery="SELECT UN FROM Usuario WHERE UID='".$iUID."'";
		SQLQuery($ResponsePointer,$nUserProfileArray,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$UserProfileArray,$nUserProfileArray,1); // Pertenece a dbmngmt.php
		return $UserProfileArray;
	}

// xxxxxx Recuperar los datos de nombre y apellido de un usuario de manera concatenada.

	function RecoveryNameApellido($iUID) {
		$SQLStrQuery="SELECT NOMBRE,APELLIDO FROM Usuario WHERE UID='".$iUID."'";
		SQLQuery($ResponsePointer,$nUserProfileArray,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$UserProfileArray,$nUserProfileArray,2); // Pertenece a dbmngmt.php
		return $UserProfileArray[0]." ".$UserProfileArray[1];
	}

// O---- Verifica si un nombre de usuario existe.

	function VerifyUserExist($UserName) {
		$SQLStrQuery="SELECT UID FROM Usuario WHERE (UN='".$UserName."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		return $n>0; 
	}

// xxxxxx Recupera el eMail Principal de un usuario.

	function RecoveryUserMainMail($UserID) {
		$SQLStrQuery="SELECT MAINMAIL FROM Usuario WHERE (UID='".$UserID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$UserPersonalMail,$n,1); // Pertenece a dbmngmt.php
		return $UserPersonalMail; 
	}

	
// xxxxxx Verifica si el correo personal tiene una entrada coincidente en la base de datos.
	function VerifyEmailMatch($UserName,$email) {
		$SQLStrQuery="SELECT UID FROM Usuario WHERE ((UN='".$UserName."') AND (PERSONALMAIL='".$email."'))"; // Si el email y el usuario coinciden entonces retornara al menos 1 campo
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		return $n>0; // Si es mayor a cero es porque encontro al menos una 
			     // coincidencia, y no debe encontrar mas de una ya que 
			     // el nombre de usuario sirve como clave para indexar la 
			     // base de datos.
	}

// xxxxxx Verifica si el usuario se encuentra suspendido del sistema
	function VerifyUserBloqued($UserName) {
		$SQLStrQuery="SELECT ACTIVO FROM Password AS P Join Usuario AS U ON P.UID=U.UID WHERE U.UN='".$UserName."'"; // "SELECT ACTIVO FROM Password WHERE (UN='".$UserName."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$UserStatus,$n,1); // Pertenece a dbmngmt.php
		if ($n>1){ // Se encontro mas de una coincidencia, debe verificarse la base de datos
//			echo "ERROR!!! Se ha encontrado un error de usuarios duplicados en la base de datos, por favor notificar a los propietarios del sitio. Gracias.";
			return $UserStatus[0]==0;
		}else{
			return $UserStatus==0;
		}
	}
	
// Ingresa un nuevo usuario en la base de datos: Ingresa un usuario nuevo 

// xxxxxx a la base de datos no verifica si el usuario existente.

	function CreateUserProfile($Nombre,$Apellido,$UserUN,$Address,$Empresa,$SectEcon,$Cargo,$WorkCity,$LiveCity,$ProID,$MainPhone,$CelPhone,$MaineMail,$PersonalMail,$Country,$CryptPasswd) {
		$SQLStrQuery="INSERT INTO Usuario (UN,NOMBRE,APELLIDO,TLF,CEL,PROID,CIUDADRES,MAINMAIL,PERSONALMAIL,EMPRESA,SECTID,CARGOID,CIUDADTRAB,PAIS,DIRECCION,GRUPO) VALUES ('".$UserUN."','".$Nombre."','".$Apellido."','".$MainPhone."','".$CelPhone."','".$ProID."','".$LiveCity."','".$MaineMail."','".$PersonalMail."','".$Empresa."','".$SectEcon."','".$Cargo."','".$WorkCity."','".$Country."','".$Address."','0')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta. Ingresa los datos de Perfiles de usuario
		$SQLStrQuery="INSERT INTO Password (UID,CRYPTPASS,ACTIVO) VALUES ('".GetIDFromUN($UserUN)."','".$CryptPasswd."','0')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta. Ingresa los datos de Perfiles de sesion
	}

// O---- Funci�n que se encarga de encryptar el password de un usuario

	function Encrypt($UserPassUnEncrypt) {
		return crypt($UserPassUnEncrypt,"!@");
	}

// xxxxxx Recupera el grupo al que pertenece un usuario segun su UID
	function GrupoUsuario($iUID) {
		$SQLStrQuery="SELECT GRUPO FROM Usuario WHERE (UID='".$iUID."') LIMIT 1"; // En caso de haber mas de una entrada el sistema se limitara al primero que encuentre.
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta en la base de datos globales
		ConvertPointerToArray($ResponsePointer,$UserGroup,$n,1); // Convertir la consulta en un arreglo de datos
		return $UserGroup;
	}
	
// xxxxxx Consulta el perfil de sesion o acceso de un usuario seg�n su ID de usuario

	function RecoveryUserProfileSesion_id($iUID,&$UserSesionProfile) {
		$SQLStrQuery="SELECT * FROM userdacs WHERE (UID='".$iUID."') LIMIT 1"; // En caso de haber mas de una entrada el sistema se limitara al primero que encuentre.
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta en la base de datos globales
		ConvertPointerToArray($ResponsePointer,$UserSesionProfile,$n,8); // Convertir la consulta en un arreglo de datos
	}

	// xxxxxx Consulta el perfil de un usuario seg�n su ID de usuario

	function RecoveryUserProfile_id($iUID,&$UserProfile) {
		$SQLStrQuery="SELECT * FROM userprofile WHERE (UID='".$iUID."') LIMIT 1"; // En caso de haber mas de una entrada el sistema se limitara al primero que encuentre.
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta en la base de datos globales
		ConvertPointerToArray($ResponsePointer,$UserSesionProfile,$n,15); // Convertir la consulta en un arreglo de datos
	}

// xxxxxx Actualizar los datos de sesión o acceso de un usuario, solo nombre de usuario y rol. 

function UpdateUserProfileSesion_id($Empresa,$SectEcon,$Cargo,$iUID,$WorkCity,$LiveCity,$ProID,$MainPhone,$CelPhone,$MaineMail,$PersonalMail,$Country,$Address) {
	$SQLStrQuery="UPDATE Usuario SET TLF='".$MainPhone."',CEL='".$CelPhone."',PROID='".$ProID."',CIUDADRES='".$LiveCity."',MAINMAIL='".$MaineMail."',PERSONALMAIL='".$PersonalMail."',EMPRESA='".$Empresa."',SECTID='".$SectEcon."',CARGOID='".$Cargo."',CIUDADTRAB='".$WorkCity."',PAIS='".$Country."',DIRECCION='".$Address."' WHERE (UID='".$iUID."')";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos globales
}

// xxxxxx Actualizar los datos de sesión o acceso de un usuario, no actualiza enabled ni externo . 

	function UpdateUserProfile_id($Empresa,$SectEcon,$Cargo,$iUID,$WorkCity,$LiveCity,$ProID,$MainPhone,$CelPhone,$MaineMail,$PersonalMail,$Country,$Address) {
		$SQLStrQuery="UPDATE Usuario SET TLF='".$MainPhone."',CEL='".$CelPhone."',PROID='".$ProID."',CIUDADRES='".$LiveCity."',MAINMAIL='".$MaineMail."',PERSONALMAIL='".$PersonalMail."',EMPRESA='".$Empresa."',SECTID='".$SectEcon."',CARGOID='".$Cargo."',CIUDADTRAB='".$WorkCity."',PAIS='".$Country."',DIRECCION='".$Address."' WHERE (UID='".$iUID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos globales
	}

// xxxxxx // Actualizar el passwd de un usuario en sus datos de acceso.

	function UpdateUserPasswd_id($iUID,$UserPasswdCrypt) {
		$SQLStrQuery="UPDATE Password SET CRYPTPASS='".$UserPasswdCrypt."' WHERE (UID='".$iUID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos
	}

// xxxxxx Actualizar el campo enabled de un usuario en su perfil. El trigger dispara el cambio en los datos de acceso

	function UpdateUserEnabled_id($iUID,$UserPasswdCrypt) {
		$SQLStrQuery="UPDATE Password SET CRYPTPASS='".$UserPasswdCrypt."' WHERE (UID='".$iUID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos
	}

// xxxxxx Actualizar Password: Actualiza el campo de password de un usuario. El usuario se indica a trav�s de su UserName

function UpdateUserExterno_id($iUID,$UserPasswdCrypt) {
	$SQLStrQuery="UPDATE Password SET CRYPTPASS='".$UserPasswdCrypt."' WHERE (UID='".$iUID."')";
	SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos
}


?>