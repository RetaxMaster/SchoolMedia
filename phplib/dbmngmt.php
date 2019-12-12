<?php

// ****************************************************************
// Este archivo controla las consultas de una base de datos.
// Este es un archivo de inclusion o libreria de inclusion
// *****************************************************************

// ****************************************************************
// ****************************************************************
// Este Archivo debe estar presente solamente en el archivo de validacion 
// general de conexion valid_conn.php
// ****************************************************************

include_once("./phplib/sosemV20config.php"); // Incluye vaiables de configuracion, 
									// Archivo general de configuracion de capa baja del sistema...

	function SQLQuery(&$ResponsePointer,&$nQueryRec,$QueryStr,$Retorna){
	// Uso de variables Globales tomado de http://www.webestilo.com/php/php02.phtml
	//global DATABASE_PREFIX; // Se toma del archivo de inclusion sosemV20config.php
	//global DATABASE_USER; // Nombre de usuario que tiene acceso a la base de datos
	//global DATABASE_PASSWD; // Password para el usuario
	//global DATABASE_NAME;  // Nombre de la Base de datos para el aplicativo
	// A nivel seguridad la DB solo tiene acceso a traves de localhost
 		$ConLink=mysqli_connect("localhost",DATABASE_USER,DATABASE_PASSWD,DATABASE_PREFIX.DATABASE_NAME);// mysql_connect("localhost",$DataBaseUser,$DataBasePasswd);
		 mysqli_set_charset($ConLink,'utf8'); // define uso utf8 de los dtaos recuperados de la DB
		 /* comprueba la conexion */
		if (mysqli_connect_errno()) {
			printf("Error de conexion a la base de datos: %s\n", mysqli_connect_error());
			exit();
		}
		$ResponsePointer = mysqli_query($ConLink,$QueryStr) or  die("Query error: ".mysqli_error($ConLink));
		if ($Retorna && !is_bool($ResponsePointer)) {
			$nQueryRec=mysqli_num_rows($ResponsePointer);
		}
		mysqli_close($ConLink);
	}

	// Convierte un Pointer de una consulta en una estructura de arreglos de cualquier dimension o un escalar en su defecto

	function ConvertPointerToArray($ResponsePointer,&$ArraySchema,$nArray,$nCol) {
		if ((is_bool($ResponsePointer) === false) && isset($ResponsePointer)){
			if ($nArray>1){
				for ($i=0;$i<$nArray;$i++){
					$Row=mysqli_fetch_row($ResponsePointer);
					if ($nCol>1) {
						for ($j=0;$j<$nCol;$j++) {
							$ArraySchema[$i][$j]=$Row[$j];
						}
					}else{
						$ArraySchema[$i]=$Row[0];
					}
				}
			}else{
				if ($nCol>1) {
	// En todo caso se considera que hay al menos un campo que guardar, 
	// ya que una consulta sin campos de resultados no tiene sentido y debe 
	// retornar un error en la consulta MySQL
					$Row=mysqli_fetch_row($ResponsePointer);
					for ($i=0;$i<$nCol;$i++){
						$ArraySchema[$i]=$Row[$i];
					}
				}else{
					$Row=mysqli_fetch_row($ResponsePointer);
					$ArraySchema=$Row[0];
				}
			}
		}else{
			$ArraySchema="";
		}
	}

	if (!function_exists('mysqli_fetch_all')) {
		function mysqli_fetch_all(mysqli_result $result)
		{
			$data = [];
			while ($row = $result->fetch_array())
				$data[] = $row;
			return $data;
		}
	}

	// Extrae una sola columna de una matriz bidimensional, devuelve siempre un vector unidimensional
	function extractColumn($matrixData,$columnPos,&$vectorDataResponse){
		$vectorDataResponse=null; // se realiza una limpieza de la variable
		switch (count($matrixData)) {
			case 0: // sino tiene datos se responde con nulo en el formato de vector
				$vectorDataResponse[0]=null;
				break;
			case 1: // si tiene un solo grupo de registros se extrae la columna
				$vectorDataResponse[0]=$matrixData[$columnPos];
				break;
			default: // si tiene mas de un grupo de registros se extrae uno por uno
				$i=0;
				foreach($matrixData AS $columnTarget){
					$vectorDataResponse[$i]=$columnTarget[$columnPos];
					$i++;
				}
		}
	}

	/* Funcion especial para recuperacion de tipo puede no ser usada en este proyecto
	function ConvertPointerToArrayTipo($ResponsePointer,&$ArraySchema,$nArray,$nCol) {
		if ((is_bool($ResponsePointer) === false) && isset($ResponsePointer)){
			if ($nCol>1) {
				if ($nArray>1){
					for ($i=0;$i<$nCol;$i++) {
						$Row=mysqli_fetch_row($ResponsePointer);
						for ($j=0;$j<$nArray;$j++) {
								$ArraySchema[$j][$i]=$Row[$j];
						}
					}
				}else{
					if ($nArray==1){
						$Row=mysqli_fetch_row($ResponsePointer);
						for ($i=0;$i<$nCol;$i++) {
							$ArraySchema[$i]=$Row[$i];
						}
					}else{
						$ArraySchema="";
					}
				}
			}else{
				if ($nCol==1) {
					if ($nArray>1){
						$Row=mysqli_fetch_row($ResponsePointer);
						for ($i=0;$i<$nArray;$i++) {
							$ArraySchema[$i]=$Row[$i];
						}
					}else{
						if ($nArray==1){
							$Row=mysqli_fetch_row($ResponsePointer);
							$ArraySchema=$Row[0];
						}else{
							$ArraySchema="";
						}
					}
				}else{
					$ArraySchema="";
				}
			}
					
		}				
	} */

?>