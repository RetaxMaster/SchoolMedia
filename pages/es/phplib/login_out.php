<?php

// ****************************************************************
// Este archivo contiene funciones para mantener un usuario dentro 
// o sacar al usuario del sistema 
// *****************************************************************
// XXXXXX funci�n que introduce un usuario al sistema
	function CreateNewSesion($iUID,$Time,$IpFrom,$NowAt){
		$SQLStrQuery="INSERT INTO LoggedUser (UN,IPFROM,TIMECONNECTED,NOWAT) VALUES ('".$UN."','".$IpFrom."',".$Time.",'".$NowAt."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
	}
// XXXXXX Verifica si el tiempo de conexi�n aun es v�lido en el sistema.
	function Validate($iUID,$iUSS,$LastTime) {
		// identificar que el id de usuario corresponde con el
		// registrado para la sesion de usuario y recuperar la hora de finalizacion de sesion de la DB
		// sp_p_get_LoggedUser_DataSesion_id (IN id_sessionA INT)
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		if (($n>0) && ($LastTime>$Time)) {
			ConvertPointerToArray($ResponsePointer,$iUID,$n,1); // Pertenece a dbmngmt.php
		}else{  // Quiere decir que no encontr� ninguna entrada para el usuario supuesto, 
				// por lo que los valores deben ser nulos
			$iUID=-1;
		}
		return $iUID; // Se estimar� que el usuario tiene 
			// un tiempo estimado de conexion superior al actual, 
			// esto quiere decir que el tiempo valido para estar conectado 
			// no debe haber expirado.
	}
/*  NO TIENEUTILIDAD CON EL NUEVO FORMATO DE VALIDACION
Recupera los datos de conexi�n seg�n el UID
	function RecoveryCon($iUID,&$Con) {
		$SQLStrQuery="SELECT TIMECONNECTED FROM LoggedUser AS LU JOIN Usuario AS U ON LU.UN=U.UN WHERE (U.UID='".$iUID."') LIMIT 1";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		if ($n>0) {
			ConvertPointerToArray($ResponsePointer,$Con,$n,1); // Pertenece a dbmngmt.php
		}else{  // Quiere decir que no encontr� ninguna entrada para el usuario supuesto, 
				// por lo que los valores deben ser nulos
			$Con=0;
		}
	} */
	
// xxxxxx Actualiza una conexi�n
	function UpdateCon($iUSS,$ipFrom,$NowAt) {
		// sp_p_set_LoggedUser_UpdateDataSesion_id
		$SQLStrQuery="UPDATE LoggedUser SET UN='".$UN."',IPFROM='".$IpFrom."',TIMECONNECTED=".$Time.",NOWAT='".$NowAt."' WHERE UN='".$UN."'";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
	}
	
// xxxxxx Elimina una conexi�n: �til cuando un usuario hace logout.
	function DeleteCon($UN) {
		// sp_p_del_LoggedUser_DeleteSesion_id
		$SQLStrQuery="DELETE FROM LoggedUser WHERE (UN='".$UN."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
	}
	
// xxxxxx Recupera el password encriptado de un usuario de la base de datos. 
// Se busca a trav�s del nombre de usuario.
	function RecoveryConPasswd($UN) {
		// sp_p_get_usrdacs_UserHavePass (IN id_userA INT(10))
		$SQLStrQuery="SELECT CRYPTPASS FROM Password AS P JOIN Usuario AS U ON P.UID=U.UID WHERE UN='".$UN."'";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		if ($n>0) {
			ConvertPointerToArray($ResponsePointer,$Con,$n,1); // Pertenece a dbmngmt.php
		}else{
			$Con="N"; // Es necesario que no genere ninguna coincidencia con 
					  // el password de ninguna manera, por eso se encripta con 
					  // valores distintos a los regulares
		}
		return $Con;
	}
?>