<?php

// ****************************************************************
// Este archivo contiene funciones para mantener un usuario dentro 
// o sacar al usuario del sistema 
// *****************************************************************
// xxxxxx funci�n que introduce una marca de LOG
	function LH_SetLog($iUID,$Time,$IpFrom,$NowAt){
		$SQLStrQuery="INSERT INTO LogHistory (UID,IPFROM,TIMECONNECTED,VISITEDURL) VALUES ('".$iUID."','".$IpFrom."','".$Time."','".$NowAt."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
	}

// O ---- Recupera los datos de conexi�n seg�n el UID
	function LH_RecoveryLastVisitedByUID($iUID,&$Con) {
		$SQLStrQuery="SELECT VISITEDURL FROM LogHistory WHERE (UID='".$iUID."') ORDER BY TIMECONNECTED DESC LIMIT 2";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$ConArray,$n,1); // Pertenece a dbmngmt.php
		if ($n>1) {
			$Finded=false;
			$FirstURL=strpos($ConArray[0],"mCat.php");
			$SecondURL=strpos($ConArray[1],"mCat.php");
			if ($FirstURL) {
				$Con=$ConArray[0];
				$Finded=true;
			}else{
				if ($SecondURL) {
					$Con=$ConArray[1];
					$Finded=true;
				}
			}
			if (!$Finded) {
				$Con=$ConArray[0];
			}
		}else{
			$Con=$ConArray;
		}
	}

// O ---- Recupera los datos de Log seg�n el UID
	function LH_RecoveryFullHistoryLogByUID($iUID,&$Con,&$n) {
		$SQLStrQuery="SELECT * FROM LogHistory WHERE (UID='".$iUID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Con,$n,4); // Pertenece a dbmngmt.php
	}
?>