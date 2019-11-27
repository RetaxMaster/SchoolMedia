<?php

// ****************************************************************
// Este archivo contiene funciones para mantener un usuario dentro 
// o sacar al usuario del sistema *SP de tipo LoggedUser
// *****************************************************************
// XXXXXX funcion que introduce un usuario al sistema / Crea una nueva conexion y se genera una nueva sesion
	function CreateNewLoggedSesion($iUID,$timeNext,$IpFrom,$NowAt,&$USS){
		$SQLStrQuery="CALL sp_p_set_LoggedUser_CreateNewSesion($iUID,'$IpFrom',$timeNext,'$NowAt')"; // "INSERT INTO LoggedUser (UN,IPFROM,TIMECONNECTED,NOWAT) VALUES ('".$UN."','".$IpFrom."',".$Time.",'".$NowAt."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$USS,$n,1);
	}

// XXXXXX Verifica si el tiempo de conexion aun es valido en el sistema.
// Si retorna -1 significa que no se encontro coincidencia en la DB
// Si retorna -2 significa que la sesion expiro
// En cualquier otro caso la sesion se encuentra activa y existente por lo que devuelve el id de usuario igual
// al parametro de entrada
	function ValidateLoggedUser($iUID,$iUSS) {
		// identificar que el id de usuario corresponde con el
		// registrado para la sesion de usuario y recuperar la hora de finalizacion de sesion de la DB
		$SQLStrQuery="CALL sp_p_get_LoggedUser_DataSesion_id($iUSS,$iUID)";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		if ($n>0) {
			ConvertPointerToArray($ResponsePointer,$LoggedSessionArray,$n,6); // Pertenece a dbmngmt.php
			if ($LoggedSessionArray[4]>time()) { // Indica que el tiempo actual es menor a la hora de finalizacion de sesion
				$iUID=$LoggedSessionArray[1];
			}else{ // Sesion expirada
				$iUID=-2;
			}
		}else{  // Quiere decir que no encontro ninguna entrada para el usuario supuesto, 
				// por lo que los valores deben ser nulos
			$iUID=-1;
		}
		return $iUID; // Se estimara que el usuario tiene 
			// un tiempo estimado de conexion superior al actual, 
			// esto quiere decir que el tiempo valido para estar conectado 
			// no debe haber expirado.
	}
	
// xxxxxx Actualiza una conexion
	function UpdateLoggedCon($iUSS,$ipFrom,$NowAt) {
		$SQLStrQuery="Call sp_p_set_LoggedUser_UpdateDataSesion_id($iUSS,'$ipFrom','$NowAt')"; // "UPDATE LoggedUser SET UN='".$UN."',IPFROM='".$IpFrom."',TIMECONNECTED=".$Time.",NOWAT='".$NowAt."' WHERE UN='".$UN."'";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
	}
	
// xxxxxx Elimina una conexion: util cuando un usuario hace logout.
// Elimina cualquier sesion existente nueva o pasada de un usuario,
// Se utiliza para crear nuevas conexiones limpias y para cerrar todo 
// tipo de sesion al finalizar, inclusive por temas de seguridad y sesiones duplicadas. 
	function DeleteLoggedCon($iUID) {
		// sp_p_del_LoggedUser_DeleteSesion_id
		$SQLStrQuery="CALL sp_p_del_LoggedUser_DeleteSesion_id($iUID)"; // "DELETE FROM LoggedUser WHERE (UN='".$UN."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
	}
	
// xxxxxx Recupera el password encriptado de un usuario de la base de datos. 
// Se busca a travs del nombre de usuario.
	function ValidateLoggedPasswd($iUID, $UserPassUnEncrypt) {
		$SQLStrQuery="CALL sp_p_get_usrdacs_UserHavePass($iUID)"; // "SELECT CRYPTPASS FROM Password AS P JOIN Usuario AS U ON P.UID=U.UID WHERE UN='".$UN."'";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		if ($n>0) {
			$CryptedPasswd=Encrypt($UserPassUnEncrypt);
			ConvertPointerToArray($ResponsePointer,$cryptedPasswdDB,$n,1); // Pertenece a dbmngmt.php
			return $cryptedPasswdDB==$CryptedPasswd;
		}else{
			return false; // Es necesario que no genere ninguna coincidencia con 
					  // el password de ninguna manera, por eso se encripta con 
					  // valores distintos a los regulares
		}
	}
?>