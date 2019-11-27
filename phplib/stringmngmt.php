<?php

// ****************************************************************
// Este archivo controla en l�nea general cadenas de caracteres, 
// es decir realiza operaciones entre cadenas de cracateres, 
// como corte de cadena, concatenacion, etc.
// ****************************************************************

// ****************************************************************
// ****************************************************************
// Este Archivo debe estar presente en todas las funciones de 
// control de Sosem y no debe estar presente en ning�n archivo de 
// inclusi�n.
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

// Esta funcioon toma un arreglo de datos unidimensional con el caracter de inicio, el spearador 
// y el componente de fin y construye una cadena basada en el patron
	function dataToStr($startChar,$dataArry,$sepTemplate,$endChar,&$dataStr) {
		$dataStr='';
		$nArry=count($dataArry);
		$i=0;
		foreach($dataArry AS $dataA) {
			if ($i==0) {
				$dataStr .=$startChar.$dataA.$sepTemplate;
			}elseif ($i<$nArry-1) {
				$dataStr .=$dataA.$sepTemplate;
			}else{
				$dataStr .=$dataA.$endChar;
			}
			$i++;
		}
	}

?>