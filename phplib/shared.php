<?php

// ****************************************************************
// Este archivo contiene funciones para compartir datos entre 
// libreras independientes, mezcla datos y genera resultados 
// mezclados.
// Tambien contiene las funciones que no son especificas de una libreria 
// en particular, pero que son de utilidad para el sistema.
// *****************************************************************

// *********** Funcion crypt y Decrypt por tercero ***************
/* Funcion de pseudo encryptado util para transmitir la data pseudoencryptada 
desde el formulario.
Seguridad para efectos de transferencia de contrasena, aun cuando se trabaje con SSL

Description : A function with a very simple but powerful xor method to encrypt 
              and/or decrypt a string with an unknown key. Implicitly the key is 
              defined by the string itself in a character by character way. 
              There are 4 items to compose the unknown key for the character 
              in the algorithm 
              1.- The ascii code of every character of the string itself 
              2.- The position in the string of the character to encrypt 
              3.- The length of the string that include the character 
              4.- Any special formula added by the programmer to the algorithm 
                  to calculate the key to use 
*/ 
function ENCRYPT_DECRYPT($Str_Message) { 
//Function : encrypt/decrypt a string message v.1.0  without a known key 
//Author   : Aitor Solozabal Merino (spain) 
//Email    : aitor-3@euskalnet.net 
//Date     : 01-04-2005 
$Str_Message=base64_decode($Str_Message);	
$Len_Str_Message=STRLEN($Str_Message); 
    $Str_Encrypted_Message=""; 
	for ($Position = 0;$Position<$Len_Str_Message;$Position++){ 
        // long code of the function to explain the algoritm 
        //this function can be tailored by the programmer modifyng the formula 
        //to calculate the key to use for every character in the string. 
        $Key_To_Use = (($Len_Str_Message+$Position)+1); // (+5 or *3 or ^2) 
        //after that we need a module division because cant be greater than 255 
       // $Key_To_Use = $KeyWord;
		$Key_To_Use = (255+$Key_To_Use) % 255; 
        $Byte_To_Be_Encrypted = substr($Str_Message, $Position, 1); 
        $Ascii_Num_Byte_To_Encrypt = ord($Byte_To_Be_Encrypted); 
        $Xored_Byte = $Ascii_Num_Byte_To_Encrypt ^ $Key_To_Use;  //xor operation 
        $Encrypted_Byte = chr($Xored_Byte); 
        $Str_Encrypted_Message .= $Encrypted_Byte; 
        
        //short code of  the function once explained 
        //$str_encrypted_message .= chr((ord(substr($str_message, $position, 1))) ^ ((255+(($len_str_message+$position)+1)) % 255)); 
    } 
	return $Str_Encrypted_Message;
} //end function 

// errorWindow("no se reconoce la acci&oacute;n solicitada");
	function errorWindow($MSG1) {
		$MSG2='';
		include(USR_PAGES."/general_msg.php");
	}

// Se da formato JSon a los datos para entrega de Arreglo de datos de Tablas en general
function JSonformatedData($nCtry,$CtryLst,&$JSonDataObj) {
	$JSonDataObj=null;
	$JSonDataObjLine=null;
	switch ($nCtry) {
		case 0:
			// En caso que no existan datos que recuperar se devuelve vacio 
			$JSonDataObj='{
				"draw": 0,
				"recordsTotal": '.$nCtry.',
				"recordsFiltered": '.$nCtry.',
				"data": []
			}';
			break;
		case 1:  // La siguiente es la estructura requerida por DataTable-ReactBootstrap para Ajax
			$JSonDataObj1='{
				"draw": 1,
				"recordsTotal": '.$nCtry.',
				"recordsFiltered": '.$nCtry.',
				"data": [';
				dataToStr('["',$CtryLst,'","','"]',$JSonDataObj);
			$JSonDataObj =$JSonDataObj1.$JSonDataObj.']}';
			break;
		default :
			$i=0;
			$JSonDataObj='{
				"draw": 1,
				"recordsTotal": '.$nCtry.',
				"recordsFiltered": '.$nCtry.',
				"data": [';
			foreach($CtryLst as $element) {
				dataToStr('["',$element,'","','"]',$JSonDataObjLine);
				if ($i==0) {
					$JSonDataObj .= $JSonDataObjLine;
				}else{
					$JSonDataObj .=','.$JSonDataObjLine;
				}
				$i++;
				$JSonDataObjLine=null;
			}
			$JSonDataObj .=']}'; 
	}
}
	//////////////////////////////////////////
	/////////////////////////////////////////////
	/////////////////////////////////////////////////
// Funciones sobre la marquesina
	function printMarquesina() {
		$SQLStrQuery="SELECT * FROM Marquesina LIMIT 1";
		SQLQuery($ResponsePointer,$nMarque,$SQLStrQuery,true); // Realiza la consulta
		ConvertPointerToArray($ResponsePointer,$Marque,$nMarque,1); // Pertenece a dbmngmtAdmin.php
		return $Marque;
	}
	
// Funcion de Actualizacion de la Marquesina
	function UpdateMarquesina($Marque) {
		$SQLStrQuery="UPDATE Marquesina SET MARQUE='".$Marque."'";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos CategoriaDoc
	}

// Verifica si un ID se encuentra en un array de IDs

	function NotDocIDinResumID($ResumID,$DocID,$Count) {
		$Distinct=false;
		for ($i=0;$i<$Count;$i++) {
			$Distinct=$ResumID[$i]!=$DocID;
		}
		return $Distinct;
	}

// Recupera los usuarios sin Aprobacion  

	function RecoveryInactiveUser(&$UserProfile,&$nUser) {
		$SQLStrQuery="SELECT * FROM  Password AS PASS JOIN Usuario AS U ON PASS.UID=U.UID WHERE (PASS.REGISTRADO='0')";
		SQLQuery($ResponsePointer,$nUser,$SQLStrQuery,true); // Realiza la consulta en la base de datos globales
		ConvertPointerToArray($ResponsePointer,$UserProfile,$nUser,20); // Convertir la consulta en un arreglo de datos
	}
// Recupera los usuarios sin Aprobacion  

	function RecoveryToReactivateUser(&$UserProfile,&$nUser) {
		$SQLStrQuery="SELECT * FROM  Password AS PASS JOIN Usuario AS U ON PASS.UID=U.UID WHERE (PASS.ACTIVO='0' AND PASS.REGISTRADO='1')";
		SQLQuery($ResponsePointer,$nUser,$SQLStrQuery,true); // Realiza la consulta en la base de datos globales
		ConvertPointerToArray($ResponsePointer,$UserProfile,$nUser,20); // Convertir la consulta en un arreglo de datos
	}

// Recupera los usuarios sin Aprobacion  

	function RecoveryUserProfileByID(&$UserProfile,&$nUser,$iUID) {
		$SQLStrQuery="SELECT * FROM  Usuario WHERE (UID='".$iUID."')";
		SQLQuery($ResponsePointer,$nUser,$SQLStrQuery,true); // Realiza la consulta en la base de datos globales
		ConvertPointerToArray($ResponsePointer,$UserProfile,$nUser,17); // Convertir la consulta en un arreglo de datos
	}

// Recupera el password de un usuario
	function RecoverySharedPasswordByID($iUID) {
		$SQLStrQuery="SELECT CRYPTPASS FROM  Password WHERE (UID='".$iUID."')";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,true); // Realiza la consulta en la base de datos globales
		ConvertPointerToArray($ResponsePointer,$Pass,$n,1); // Convertir la consulta en un arreglo de datos
		return $Pass;
	}
		
// Marca la cuenta como ya registrada y aprobada para ingresar a CIMMA
	function ActivateCIMMAAcount($iUID){
		$SQLStrQuery="UPDATE Password SET REGISTRADO='1' WHERE UID='".$iUID."'";
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos globales
	}

// Activa o Bloquea al usuario para hacer logon en CIMMA
	function EnableCIMMALogin($iUID,$Enable){
		if ($Enable) {
			$SQLStrQuery="UPDATE Password SET ACTIVO='1' WHERE UID='".$iUID."'";
		}else{
			$SQLStrQuery="UPDATE Password SET ACTIVO='0' WHERE UID='".$iUID."'";
		}
		SQLQuery($ResponsePointer,$n,$SQLStrQuery,false); // Realiza la consulta en la base de datos globales
	}

// Esta funcion Recupera los datos de documentos, solo 1 documento de cada categoria, es decir, cualquier documento del ultimo dia de una sola categoria.
// Mosca esta funcion solo es llamada desde adminDoc.php function RecoveryShowDocArrayByCat
	function SQLQeury(&$r,&$os_rebate,&$discount_offer_time,$msg=""){ // $os_rebate se ha colocado este tipo de nombre de variable para despistar su uso,
															// esta corresponde al arreglo de documentos y la consulta se limitar� a 10 categorias solamente
															// $discount_offer_time corresponde a la cantidad de registros recuperados es un contador nDocs.
		$confirm_order="_reb";
		$offers = "os";
		$SQLStrQeury="SQLStrQurey";
		$offertime = "ate";
		$ResponsePointer="r";
		$e_card=$offers."".$confirm_order."".$offertime;
		$SQLStrQurey="SELECT DISTINCT CATID,* FROM Documentos WHERE ((ENABDOC=1) AND (INTID='0')) ORDER BY ANNOPUB DESC,MESPUB DESC,DIAPUB DESC ,TITULO RAND() LIMIT 10"; // esta es la consulta real ver solo esta linea de consulta
		$SQLStrQuery="SELECT * FROM Documentos WHERE (ENABDOC='1') AND INTID='0' ORDER BY ANNOPUB DESC,MESPUB DESC,TITULO"; // Esta linea no tiene utilidad.
		SQLQuery($$ResponsePointer,$discount_offer_time,$$SQLStrQeury,true); // Realiza la consulta
	}
		
// Funcion que elimina las filas coincidentes segun la columna Cero

	function CleanUniqueRecords(&$rArray) {
		$n=count($rArray);
		$LastN=$n;
		$i=0;
		while ($i<$n-1) {
			$k=$i+1;
			while ($k<$n) {
				if ($rArray[$i][0]==$rArray[$k][0]) {
					for ($j=$k;$j<$n-1;$j++) {
						for ($h=0;$h<count($rArray[$j]);$h++) {
							$rArray[$j][$h]=$rArray[$j+1][$h];
						}
					}
				$n --;			
				}else{
					$k++;
				}
			}
			$i++;
		}
		for ($i=$n;$i<$LastN;$i++) {
			$DummyVar=array_pop($rArray);
		}
	}
	
	function mimeTypes($file) {
        if (!is_file($file) || !is_readable($file)) return false;
        $types = array();
        $fp = fopen($file,"r");
        while (false != ($line = fgets($fp,4096))) {
            if (!preg_match("/^\s*(?!#)\s*(\S+)\s+(?=\S)(.+)/",$line,$match)) continue;
            $tmp = preg_split("/\s/",trim($match[2]));
            foreach($tmp as $type) $types[strtolower($type)] = $match[1];
        }
        fclose ($fp);
        
        return $types;
	}

	//Genera un string aleatorio, recibe la longitud del string que se desea -- RetaxMaster
	function random_string($lenght) {
		$string_base = "ABCDEFGHIJLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$random_string = "";
		$string_base_lenght = strlen($string_base);

		for ($i=0; $i < $lenght ; $i++) {
		$random = mt_rand(0, $string_base_lenght-1);
		$random_string .= substr($string_base, $random, 1);
		}

		return $random_string;
	}

	//Devuelve la extensión de la imagen, recibe el nombre o el path, realmente da igual ya que hace un explode del "." y toma el último valor
    function getImageExtension($imageOrPath) {
        $extension = explode(".", $imageOrPath);
        return array_pop($extension);
    }
	
	//Sube una imagen en la ruta indicada
	function uploadImage($image, $route) {
		//Si no está vacía la imagen...
		if (!empty($image)) {

			//Recolecto los datos de la imagen subida
            $tmp_name = $image["tmp_name"];
			$type = $image["type"];
            $name = $image["name"];
			$newName = random_string(10) . "." . getImageExtension($name);
			$dir = "$route/$newName";

			//Verifico que sea una imagen
			$supported_files = ["image/jpeg", "image/png", "image/gif"];
			if (in_array($type, $supported_files)) {
				//Si logró subirse con éxito, retorno la URL
				if (move_uploaded_file($tmp_name, $dir)) {
					return $dir;
				}
				else {
					die("Ocurrió un error moviendo la imagen al directorio de imagenes");
				}
			}
			else {
				die("El archivo subido no es una imagen");
			}
		}
		else {
			die("No se ha proporcionado ninguna imagen.");
		}
	}

	//Determina si tiene un valor
	function hasValue($value) {
		return (isset($value) && !empty($value) && $value > 0);
	}

	//Valida si se puede añadir cierto capacitador en cierto lugar
	function validateMatCap($fields) {

		include_once(LIBRARY_DIR . "/disp_cap.php"); // Disponibilidad de capacitadores
		include_once(LIBRARY_DIR . "/disponibilidad.php"); // Disponibilidad de planes
		$capacitador = $fields["id_cap"];
		$plan = $fields["idplan"];
		$pais = $fields["pais"];
		$provincia = $fields["provincia"];

		//Primero valido la disponibilidad del capacitador en ese país, busco los registros que coincidan con el capacitador y el país, si me trae mas de 1 registro es porque si puede ese capacitador en ese país
		dispcap_recoveryAllByAnyField($n, $Arry, "tbl_acaddispcappais.id_cap", $capacitador, 1, 1, "AND tbl_acaddispcappais.id_pais = $pais");

		if ($n > 0) {
			
			//Ahora valido la disponibilidad del capacitador en esa provincia
			dispcap_recoveryAllByAnyField($n, $Arry, "tbl_acaddispcappais.id_cap", $capacitador, 1, 1, "AND tbl_acaddispcappais.id_prov = $provincia");

			if ($n > 0) {

				//Ahora valido la disponibilidad del plan académico en el país
				disp_recoveryAllByAnyField($n, $Arry, "tbl_acaddispas.id_plan", $plan, 1, 1, "AND tbl_acaddispas.id_pais = $pais");

				if ($n > 0) {
					
					//Ahora valido la disponibilidad del plan académico en la provincia
					disp_recoveryAllByAnyField($n, $Arry, "tbl_acaddispas.id_plan", $plan, 1, 1, "AND tbl_acaddispas.id_prov = $provincia");

					if ($n > 0) {

						//Todo correcto
						$response["status"] = true;

					}
					else {
						$response["status"] = false;
						$response["message"] = "Este plan no está disponible en esta provincia.";
					}

				}
				else {
					$response["status"] = false;
					$response["message"] = "Este plan no está disponible en este país.";
				}

			}
			else {
				$response["status"] = false;
				$response["message"] = "Este capacitador no está disponible en esta provincia.";
			}

		}
		else {
			$response["status"] = false;
			$response["message"] = "Este capacitador no está disponible en este país.";
		}
		
		return $response;
	}
	
?>