<?php
// Se cargan los archivos basicos de inclusion
	include_once(LIBRARY_DIR."/login_out.php");
	include_once(LIBRARY_DIR."/adminUser.php");
	include_once(LIBRARY_DIR."/shared.php");
// Se activan todos los reportes de error
	error_reporting(E_ALL);
// Se recogen todas las variables de Cookies
	$iUID=(isset($_POST["username"])) ? GetIDFromUN($_POST["username"]) : $_COOKIE["UID"];
	$iUSS=(isset($_POST["id_uss"])) ? $_POST["id_uss"] : $_COOKIE["USS"];
	// Valida si el usuario existe Logged, si su id coincide con su id de sesion y 
	// finalmente valida que el tiempo de conexion se encuentre aun activo
	// Puede resultar en tres valores:
	// -1: El usuario no existe registrado en una sesion
	// -2: el tiempo de sesion ya se vencio
	// devuelve el id de usuario, por seguridad se reafirma 
	$Connection=ValidateLoggedUser($iUID,$iUSS);
	switch ($Connection) {
		case -1 :
		case -2 :
			if ($Connection==-1) {	
				$errormsg='No se reconoce su sesi&oacute;n.';
			}else{
				$errormsg='Su sesi&oacute;n ha expirado.<br>Por favor vuelva a ingresar';
			}
			DeleteLoggedCon($iUID);
			//setcookie("UID","",-1,"/schoolMedia/page/","www.esdca.net",0);
			//setcookie("UP","",-1,"/schoolMedia/page/","www.esdca.net",0);
			//setcookie("USS","",-1,"/schoolMedia/page/","www.esdca.net",0);
			//include("./error_msg/errorlogin.php");
			exit;
		default :
			$iUID=$Connection;
			// $NewTime=time()+10800;
			$sUID="UID=$iUID";
			$sUSS="USS=$iUSS";
			RecoveryUserProfile_id($iUID,$UserProfile,$n);
			// $nTime="expires=$NewTime";
			// $sSite="path=www.esdca.net/schoolMedia/page/";
			// header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
			// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
			//setcookie("UID","".$iUID."",$NewTime,"/schoolMedia/admin/","www.esdca.net",0); // 3610
			//setcookie("USS","".$iUSS."","/schoolMedia/admin/","www.esdca.net",0);
			UpdateLoggedCon($iUSS,$_ENV["REMOTE_ADDR"],$_ENV["REQUEST_URI"]);
	}
?>