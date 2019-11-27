<?php

// ****************************************************************

// Este archivo controla en línea general cadenas de caracteres, 

// es decir realiza operaciones entre cadenas de cracateres, 

// como corte de cadena, concatenacion, etc.

// ****************************************************************



// ****************************************************************

// ****************************************************************

// Este Archivo debe estar presente en todas las funciones de 

// control de Sosem y no debe estar presente en ningún archivo de 

// inclusión.

// ****************************************************************

// ****************************************************************



// Esta funcion fue tomada de la direccion http://www.totallyphp.co.uk/code/shorten_a_text_string.htm

// y ligeramente modificada para adaptarla a la rutina necesaria del programa.

	function StringTrunc($OriginalStr,$n) { // Change to the number of characters you want to display
		if (strlen($OriginalStr)>$n) {
			$OriginalStr = $OriginalStr." ";        
			$OriginalStr = substr($OriginalStr,0,$n-4);        
			// $OriginalStr = substr($OriginalStr,0,strrpos($OriginalStr,' '));        
			$OriginalStr = $OriginalStr." ...";        
		}
		return $OriginalStr;
	}

?>