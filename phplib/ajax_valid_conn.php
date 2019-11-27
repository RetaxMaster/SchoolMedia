<?php
// Se cargan los archivos basicos de inclusion
	include_once(LIBRARY_DIR."/login_out.php");
	include_once(LIBRARY_DIR."/adminUser.php");
	include_once(LIBRARY_DIR."/stringmngmt.php");
	include_once(LIBRARY_DIR."/shared.php");
// Se activan todos los reportes de error
	error_reporting(E_ALL);
// Se recogen todas las variables enviadas por GET
	$iUID=(isset($_GET["UID"])) ? $_GET["UID"] : -1;
    $iUSS=(isset($_GET["USS"])) ? $_GET["USS"] : -1;
    $Lang=(isset($_GET["Lang"])) ? $_GET["Lang"] : -1;
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
			exit;
		default : // El usuario se encuentra logged
            UpdateLoggedCon($iUSS,$_ENV["REMOTE_ADDR"],$_ENV["REQUEST_URI"]);
	}
?>