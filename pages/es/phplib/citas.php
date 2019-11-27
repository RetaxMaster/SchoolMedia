<?php
/*	
citas(
	id_cita,
	id_pacientes,
	nombre_paciente,
	id_tipo_est,
	descripcion_est,
	id_equipo,
	nombre_equipo,
	id_ubic,
	serial_number,
	nro_activo,
	nombre_ubic,
	id_doc_tipo,
	descripcion_tipo,
	id_asegurador,
	descripcion_asegurador,
	idReferido,
	descripcion_referido,
	dCita,
	mCita,
	aCita,
	hhiCita,
	mmiCita,
	hhfCita,
	mmfCita,
	hhCita, -- Hora y min, si es nulo es por orden de llegada.
	mmCita, -- Fomato de 24 horas.
	statusCita-- A=abierta; C=Cerrada (asistido); R=Cancelada sin proxima fecha pero puede recuperarse; X=Cancelada, irrecuperable; T=Transferida a otra fecha u hora
	id_Cita_Transferida,
	confirmado, -- N=no ha sido confirmada; S=Se Confirmó
	costo_estudio,
	costo_estudio_cobrado,
	usuario_Crea,
	fecha_Crea,
	usuario_Modif,
	fecha_Modif	datetime
*/

	function cit_createRecord($data) {
		$SQLStrQuery="INSERT INTO citas (
						id_pacientes,
						nombre_paciente,
						id_tipo_est,
						descripcion_est,
						id_equipo,
						nombre_equipo,
						id_ubic,
						serial_number,
						nro_activo,
						nombre_ubic,
						id_doc_tipo,
						descripcion_tipo,
						id_asegurador,
						descripcion_asegurador,
						idReferido,
						descripcion_referido,
						dCita,
						mCita,
						aCita,
						hhiCita,
						mmiCita,
						hhfCita,
						mmfCita,
						statusCita,
						id_Cita_Transferida,
						confirmado,
						costo_estudio,
						costo_estudio_cobrado,
						usuario_Crea,
						fecha_Crea,
						allday
					) VALUES (
						'".$data[0]."',
						'".$data[1]."',
						'".$data[2]."',
						'".$data[3]."',
						'".$data[4]."',
						'".$data[5]."',
						'".$data[6]."',
						'".$data[7]."',
						'".$data[8]."',
						'".$data[9]."',
						'".$data[10]."',
						'".$data[11]."',
						'".$data[12]."',
						'".$data[13]."',
						'".$data[14]."',
						'".$data[15]."',
						'".$data[16]."',
						'".$data[17]."',
						'".$data[18]."',
						'".$data[19]."',
						'".$data[20]."',
						'".$data[21]."',
						'".$data[22]."',
						'".$data[23]."',
						'".$data[24]."',
						'".$data[25]."',
						'".$data[26]."',
						'".$data[27]."',
						'".$data[28]."',
						'".$data[29]."',
						'".$data[30]."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
	}

	function changeStatus($id,$status,$usuario) {
		$SQLStrQuery="UPDATE citas SET
			statusCita='".$status."',
			usuario_Modif='".$usuario."',
			fecha_Modif='".date('d/m/Y h:i a e',time())."'
			WHERE id_cita='".$id."'";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
	}
	
	function cancelStatus($id,$status,$usuario,$comentario) {
		$SQLStrQuery="UPDATE citas SET
			statusCita='".$status."',
			comentario='".$comentario."',
			usuario_Modif='".$usuario."',
			fecha_Modif='".date('d/m/Y h:i a e',time())."'
			WHERE id_cita='".$id."'";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
	}
	
	function searchTransferDate($idCita,&$fechaCita,&$horaCita) {
		$SQLStrQuery="SELECT dCita,mCita,aCita,hhiCita,mmiCita FROM citas WHERE id_Cita_Transferida='".$idCita."'";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,5); // Pertenece a dbmngmtAdmin.php
		$fechaCita=$Docs[0].'/'.$Docs[1].'/'.$Docs[2];
		$horaCita=$Docs[3].':'.$Docs[4];
	}
		

	function updateAmount($id,$amount,$usuario) {
		$SQLStrQuery="UPDATE citas SET
			costo_estudio='".$amount[1]."',
			costo_estudio_cobrado='".$amount[2]."',
			usuario_Modif='".$usuario."',
			fecha_Modif='".date('d/m/Y h:i a e',time())."'
			WHERE id_cita='".$id."'";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta
	}

	function cit_recoveryAllHistorialCitasByPacID(&$nDocs,&$Docs,$id) {
		$SQLStrQuery="SELECT * FROM citas WHERE id_pacientes='".$id."'";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,35); // Pertenece a dbmngmtAdmin.php
	}
	
	function cit_recoveryAllByID(&$nDocs,&$Docs,$id) {
		$SQLStrQuery="SELECT * FROM citas WHERE id_cita='".$id."'";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,35); // Pertenece a dbmngmtAdmin.php
	}

/*	function cit_recoveryAllList(&$nDocs,&$Docs) {
		$SQLStrQuery="SELECT * FROM citas";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,31); // Pertenece a dbmngmtAdmin.php
	}*/

// A=abierta; C=Cerrada (asistido); R=Cancelada sin proxima fecha pero puede recuperarse; X=Cancelada, irrecuperable; T=Transferida a otra fecha u hora
	function cit_recoveryAllList(&$nDocs,&$Docs,$estado,$tipoEstudio_id,$ubicacion_id,$fechaInicio,$fechaFin) { // fechaInicio null y fechaFini null, todas las fechas. fechaInicio not null fecchaFin null, todo a partir d ela fecha de inicio
		$SQLStrQuery="SELECT * FROM citas";
		$flag=false;
		if (isset($estado)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" statusCita IN ".$estado."";
		}
 		if (isset($tipoEstudio_id)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" id_tipo_est='".$tipoEstudio_id."'";
		}
		if (isset($ubicacion_id)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" id_ubic='".$ubicacion_id."'";
		}
		if (isset($fechaInicio)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" CONCAT(aCita,mCita,dCita)>='".$fechaInicio."'";
		}
		if (isset($fechaFin)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" CONCAT(aCita,mCita,dCita)<='".$fechaFin."'";
		}
		$SQLStrQuery .=" ORDER BY aCita DESC, mCita DESC, dCita DESC, hhiCita ASC, mmiCita ASC";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,35); // Pertenece a dbmngmtAdmin.php
	}

// A=abierta; C=Cerrada (asistido); R=Cancelada sin proxima fecha pero puede recuperarse; X=Cancelada, irrecuperable; T=Transferida a otra fecha u hora. Referido por asegurador
	function cit_recoveryRep_estudioEst(&$nDocs,&$Docs,$estado,$tipoEstudio_id,$ubicacion_id,$referidoPor,$asegurador,$fechaInicio,$fechaFin) { // fechaInicio null y fechaFini null, todas las fechas. fechaInicio not null fecchaFin null, todo a partir d ela fecha de inicio
		$SQLStrQuery="SELECT * FROM citas";
		$flag=false;
		if ($estado!="('')") { //isset($estado)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" statusCita IN ".$estado."";
		}
 		if (isset($tipoEstudio_id) && ($tipoEstudio_id!="")){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" id_tipo_est='".$tipoEstudio_id."'";
		}
		if (isset($ubicacion_id) && ($ubicacion_id!="")){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" id_ubic='".$ubicacion_id."'";
		}
		if (isset($referidoPor) && ($referidoPor!="")){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" idReferido='".$referidoPor."'";
		}
		if (isset($asegurador) && ($asegurador!="")){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" id_asegurador='".$asegurador."'";
		}
		if (isset($fechaInicio) && ($fechaInicio!="")){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" CONCAT(aCita,'-',mCita,'-',dCita)>='".$fechaInicio."'";
		}
		if (isset($fechaFin) && ($fechaFin!="")){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" CONCAT(aCita,'-',mCita,'-',dCita)<='".$fechaFin."'";
		}
		$SQLStrQuery .=" ORDER BY aCita DESC, mCita DESC, dCita DESC, hhiCita ASC, mmiCita ASC";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,35); // Pertenece a dbmngmtAdmin.php
	}


// A=abierta; C=Cerrada (asistido); R=Cancelada sin proxima fecha pero puede recuperarse; X=Cancelada, irrecuperable; T=Transferida a otra fecha u hora
	function cit_recoveryAllListByExactDayHH(&$nDocs,&$Docs,$estado,$tipoEstudio_id,$ubicacion_id,$dia,$mes,$anno,$HH) { // fechaInicio null y fechaFini null, todas las fechas. fechaInicio not null fecchaFin null, todo a partir d ela fecha de inicio
		$SQLStrQuery="SELECT * FROM citas";
		$flag=false;
		if (isset($estado)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" statusCita IN (".$estado.")";
		}
 		if (isset($tipoEstudio_id)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" id_tipo_est='".$tipoEstudio_id."'";
		}
		if (isset($ubicacion_id)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" id_ubic='".$ubicacion_id."'";
		}
		if (isset($dia)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" aCita='".$anno."' AND mCita='".$mes."' AND dCita='".$dia."'";
		}
		if (isset($HH)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" hhiCita='".$HH."'";
		}
		/*if (isset($statusCita)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" statusCita='".$statusCita."'";
		}*/
		$SQLStrQuery .=" ORDER BY aCita DESC, mCita DESC, dCita DESC, hhiCita ASC, mmiCita ASC ";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,35); // Pertenece a dbmngmtAdmin.php
	}

// A=abierta; C=Cerrada (asistido); R=Cancelada sin proxima fecha pero puede recuperarse; X=Cancelada, irrecuperable; T=Transferida a otra fecha u hora
	function cit_recoveryAllListByExactDay(&$nDocs,&$Docs,$estado,$tipoEstudio_id,$ubicacion_id,$dia,$mes,$anno,$statusCita) { // fechaInicio null y fechaFini null, todas las fechas. fechaInicio not null fecchaFin null, todo a partir d ela fecha de inicio
		$SQLStrQuery="SELECT * FROM citas";
		$flag=false;
		if (isset($estado)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" statusCita IN (".$estado.")";
		}
 		if (isset($tipoEstudio_id)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" id_tipo_est='".$tipoEstudio_id."'";
		}
		if (isset($ubicacion_id)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" id_ubic='".$ubicacion_id."'";
		}
		if (isset($dia)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" aCita='".$anno."' AND mCita='".$mes."' AND dCita='".$dia."'";
		}
		if (isset($statusCita)){
			if (!$flag) {
				$SQLStrQuery .=" WHERE";
				$flag=true;
			}else{
				$SQLStrQuery .=" AND";
			}
			$SQLStrQuery .=" statusCita='".$statusCita."'";
		}
		$SQLStrQuery .=" ORDER BY aCita DESC, mCita DESC, dCita DESC, hhiCita ASC, mmiCita ASC";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,35); // Pertenece a dbmngmtAdmin.php
	}

	function cit_recoveryToShowEnabledByID(&$nDocs,&$Docs,$id,$enabled) {
		$SQLStrQuery="SELECT id_pacientes, nombre+'. Tlf: '+tlf+'. eMail: '+email+'.',	ci, idReferido, idAsegurador, sexo, enabled FROM citas WHERE id_cita='".$id."' AND enabled=".$enabled."";
		SQLQuery($ResponsePointer,$nDocs,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Docs,$nDocs,7); // Pertenece a dbmngmtAdmin.php
	}
		
	function cit_updateRecord($ubicacion,$id) {
		$SQLStrQuery="UPDATE citas SET
			id_pacientes='".$ubicacion[0]."',
			nombre_paciente='".$ubicacion[1]."',
			id_tipo_est='".$ubicacion[2]."',
			descripcion_est='".$ubicacion[3]."',
			id_equipo='".$ubicacion[4]."',
			nombre_equipo='".$ubicacion[5]."',
			id_ubic='".$ubicacion[6]."',
			serial_number='".$ubicacion[7]."',
			nro_activo='".$ubicacion[8]."',
			nombre_ubic='".$ubicacion[9]."',
			id_doc_tipo='".$ubicacion[10]."',
			descripcion_tipo='".$ubicacion[11]."',
			id_asegurador='".$ubicacion[12]."',
			descripcion_asegurador='".$ubicacion[13]."',
			idReferido='".$ubicacion[14]."',
			descripcion_referido='".$ubicacion[15]."',
			dCita='".$ubicacion[16]."',
			mCita='".$ubicacion[17]."',
			aCita='".$ubicacion[18]."',
			hhiCita='".$ubicacion[19]."',
			mmiCita='".$ubicacion[20]."',
			hhfCita='".$ubicacion[21]."',
			mmfCita='".$ubicacion[22]."',
			
			id_Cita_Transferida='".$ubicacion[24]."',
			
			costo_estudio='".$ubicacion[26]."',
			costo_estudio_cobrado='".$ubicacion[27]."',
			usuario_Modif='".$ubicacion[28]."',
			fecha_Modif='".$ubicacion[29]."',
			allday='".$ubicacion[30]."' WHERE id_cita='".$id."'";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // statusCita='".$ubicacion[23]."', Realiza la consulta confirmado='".$ubicacion[25]."',
	}
	
	function queryBusy($fecha,$ubicacion,$horaIni,&$horaFin) {
		$condicion=" (CONCAT(aCita,'-',mCita,'-',dCita)='".$fecha."') AND (
		((CONCAT(hhiCita,':',mmiCita)<'".$horaIni."') AND ('".$horaIni."'<CONCAT(hhfCita,':',mmfCita))) OR
		((CONCAT(hhiCita,':',mmiCita)<'".$horaFin."') AND ('".$horaFin."'<CONCAT(hhfCita,':',mmfCita))) OR
		((CONCAT(hhiCita,':',mmiCita)>='".$horaIni."') AND ('".$horaFin."'>=CONCAT(hhfCita,':',mmfCita))))";// ,'F'
		$SQLStrQuery="SELECT nombre_paciente FROM citas WHERE nombre_ubic='".$ubicacion."' AND statusCita IN ('A','C','L') AND ".$condicion." AND allDay=0";
		SQLQuery($ResponsePointer,$nResp,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Respon,$nResp,1); // Pertenece a dbmngmtAdmin.php
		return $nResp>0;
		//echo $nResp; //$Respon;
	}

?>