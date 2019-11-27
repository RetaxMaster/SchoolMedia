<?php
	error_reporting(E_ALL);
	$iUID=(isset($_COOKIE["UID"])) ? $_COOKIE["UID"] : -1;
	$iUIDEP=(isset($_COOKIE["UP"])) ? $_COOKIE["UP"] : '?';
	$LimitTime=time();
	include_once("../phplib/dbmngmtAdmin.php");
	include_once(".".LIBRARY_DIR."/login_outAdmin.php");
	include_once(".".LIBRARY_DIR."/adminuserAdmin.php");
	include_once(".".LIBRARY_DIR."/shared.php");

	RecoveryCon($iUID,$Connection);
	if (count($Connection)>1) {
		$Connection=$Connection[0];
	}
	if (!Validate($Connection,$LimitTime)) {
		$errormsg='Su sesi&oacute;n ha expirado.<br>Por favor vuelva a ingresar';
//		setcookie("UID","",-1,"/iemm/cimma/admin/","www.solucionesdtp.com",0);
//		setcookie("Time","",-1,"/iemm/cimma/admin/","www.solucionesdtp.com",0);
//		setcookie(UID,"",-1,"/foro/","www.morillomiguens.com",0);
//		setcookie(Time,"",-1,"/foro/","www.morillomiguens.com",0);
		include("./error_msg/errorlogin.php");
		DeleteCon(GetUNFromUID($iUID));
		exit;
	}
	$NewTime=time()+10800;
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
	setcookie("UID","".$iUID."",time()+316000,"/demo/medas/admin/","www.solucionesdtp.com",0); // 3610
	setcookie("UP","".$iUIDEP."",time()+31600,"/demo/medas/admin/","www.solucionesdtp.com",0);
//	setcookie(UID,"".$iUID."",time()+10810,"/foro/","www.morillomiguens.com",0); // 3610
//	setcookie(UP,"".$iUIDEP."",time()+10810,"/foro/","www.morillomiguens.com",0);
	UpdateCon(GetUNFromUID($iUID),$NewTime,$_ENV["REMOTE_ADDR"],$_ENV["REQUEST_URI"]);
?>