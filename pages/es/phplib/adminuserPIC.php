<?

// ----------------------------------------------------------------
// Sosem y todos las marcas relacionadas a SOSEM son propiedad 
// Intelectual de ESDca Systems, C.A. RIF: J-30883826-8
// ESDca Systems, C.A. Se reserva el derecho de modificar, actualizar,
// mantener, utilizar y proporcionar derechos de uso a su entera 
// discrecion sobre SOSEM Desktop o SOSEM. ESDca Systems, C.A. No cede  
// los derechos de autoria y uso de este software sin previa 
// autorización firmada y sellada como documento legal de concesion.
// ****************************************************************
// ****************************************************************

// Este archivo mantiene solo la funcion para validar al usuario cuando tiene su ficha activa para la consulta 

// y en un futuro representantes, para el caso que aplique. 

// ****************************************************************

// Verifica si un nombre de usuario existe.

	function VerifyPICExist($UserName,$id_Cita) {
		$SQLStrQuery="SELECT 1 FROM pacientesInfoCita WHERE (UPPER(nombre_paciente) LIKE '%".strtoupper($UserName)."%' AND id_cita='".$id_Cita."' AND Status='A')"; // "SELECT UID FROM Password WHERE (UN='".$UserName."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta
		return $n>0; // Si es mayor a cero es porque encontro al menos una 
			     // coincidencia, y no debe encontrar mas de una ya que 
			     // el nombre de usuario sirve como clave para indexar la 
			     // base de datos.
	}
	
?>