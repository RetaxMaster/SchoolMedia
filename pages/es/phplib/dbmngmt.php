<?php

// ****************************************************************

// Este archivo controla las consultas de una base de datos,  
// tomando en principio el valor de la base de datos como un par�metro 
// POST enviado por flash. Esto permitir� ampliar el software a multiples 
// asignaturas sin modificar el c�digo Flash.
// Este es un archivo de inclusi�n o libreria de inclusi�n
// *****************************************************************

// ****************************************************************
// ****************************************************************
// Este Archivo debe estar presente en todas las funciones de 
// control de Sosem y no debe estar presente en ning�n archivo de 
// inclusi�n.
// ****************************************************************

// ****************************************************************

// La funci�n include_once() incluye y evalua el fichero especificado 

// durante la ejecuci�n del script. Se comporta de manera similar a 

// include(), con la �nica diferencia que si el c�digo ha sido ya 

// incluido, no se volver� a incluir.

// Informaci�n tomada de http://www.php.net/manual/es/function.include-once.php

include_once("./phplib/sosemV20config.php"); // Incluye vaiables de configuraci�n, 

									// como nombre de usuario para el acceso a 

									// las bases de datos, password para el 

									// mismo y Prefijo...


// include_once("".$eStoreDir."includes/configure.php"); Hata que se desbloquee el directorio de tienda, en ese momento se puede quitar el comentario a esta linea

	function SQLQuery(&$ResponsePointer,&$nQueryRec,$QueryStr,$Retorna){
	// Uso de variables Globales tomado de http://www.webestilo.com/php/php02.phtml
	//global DATABASE_PREFIX; // Se toma del archivo de inclusi�n sosemV10config.php
	//global DATABASE_USER; // Nombre de usuario que tiene acceso a la base de datos
	//global DATABASE_PASSWD; // Password para el usuario
	//global DATABASE_NAME;  // Nombre de la Base de datos para el sitio web
 		$ConLink=mysqli_connect("localhost",DATABASE_USER,DATABASE_PASSWD,DATABASE_PREFIX.DATABASE_NAME);// mysql_connect("localhost",$DataBaseUser,$DataBasePasswd);
		/* comprueba la conexi�n */
		if (mysqli_connect_errno()) {
			printf("Error de conexion a la base de datos: %s\n", mysqli_connect_error());
			exit();
		}
		//$ResponsePointer=mysql_db_query($DataBasePrefix.$DataBaseName,$QueryStr,$ConLink) or die ('Par�metros enviados: Prefijo=> '.$DataBasePrefix.'; Nombre de Base de datos=> '.$DataBaseName.'; Usuario de Base de datos=> '.$DataBaseUser.'; Consulta=> '.$QueryStr.'; Errorde MySQL=> '.mysql_error());
// Puede ser que se provoque un error con las consultas que no retornan respuesta como el Update o Insert
		$ResponsePointer = mysqli_query($ConLink,$QueryStr) or  die("Query error: ".mysqli_error($ConLink));
		if ($Retorna && !is_bool($ResponsePointer)) {
			$nQueryRec=mysqli_num_rows($ResponsePointer);
		}
		mysqli_close($ConLink);
	}


// Funcion especial para recuperacion de tipo
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
	}

// Convierte un Pointer de una consulta en una estructura de arreglos

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
	//retornar un error en la consulta MySQL
					$Row=mysqli_fetch_row($ResponsePointer);
					for ($i=0;$i<$nCol;$i++){
						$ArraySchema[$i]=$Row[$i];
					}
				}else{
					$Row=mysqli_fetch_row($ResponsePointer);
					$ArraySchema=$Row[0];
				}
			}
                        // $ArraySchema=mysqli_fetch_array($ResponsePointer);
		}else{
			$ArraySchema="";
		}
	}


// Funci�n para la base de datos Global, esta base de datos contendra

// los datos globales que no dependen de la asignatura, lo que permitir�

// tener independencia entre multiples asignaturas y una sola base de

// datos de usuarios y fondos de pantalla, tendra vital importancia en

// la version 2.0 de Sosem, que tendr� uso comercial.

	function SQLGlobalQuery(&$ResponsePointer,&$nQueryRec,$QueryStr,$Retorna) {
	// Uso de variables Globales tomado de http://www.webestilo.com/php/php02.phtml
	//global $DataBasePrefix; // Se toma del archivo de inclusi�n sosemV10config.php
	//global $DataBaseUser; // Nombre de usuario que tiene acceso a la base de datos
	//global $DataBasePasswd; // Password para el usuario de las bases de datos
	//global $GlobalDB; 
		$ConLink=mysqli_connect("localhost",DATABASE_USER,DATABASE_PASSWD,DATABASE_PREFIX.GLOBAL_DB); //$ConLink=mysql_connect("localhost",$DataBaseUser,$DataBasePasswd);
		if (mysqli_connect_errno()) {
			printf("Error de conexion a la base de datos: %s\n", mysqli_connect_error());
			exit();
		}
		$ResponsePointer=mysqli_query($ConLink,$QueryStr);//$ResponsePointer=mysql_db_query($DataBasePrefix.$GlobalDB,$QueryStr,$ConLink) or die ("Par�metros enviados: Prefijo=> $DataBasePrefix; Nombre de Base de datos=> SosemDB; Usuario de Base de datos=> $DataBaseUser; Consulta=> $QueryStr; Errorde MySQL=> ".mysql_error());
// Puede ser que se provoque un error con las consultas que no retornan respuesta como el Update o Insert
		if ($Retorna) {
			$nQueryRec=mysqli_num_rows($ResponsePointer);
		}
		mysqli_close($ConLink);
	}
	
	// Tentativamente todas las funciones siguientes han sido comentadas para poder compatibilizar el modulo de prueba de iemm
// Funcion que recupera solo los productos especiales de la tienda OsCommerce, se tomara un producto al azar para ser mostrado en CIMMA

	function SQLOsCommerce($QueryStr,&$ResponsePointer,&$nQueryRec,$Retorna) {
		/*$ConLink=mysql_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD);
		$ResponsePointer=mysql_db_query(DB_DATABASE,$QueryStr,$ConLink) or die ('Par�metros enviados: Nombre de Base de datos=> '.DB_DATABASE.'; Usuario de Base de datos=> '.DB_SERVER_USERNAME.'; Consulta=> '.$QueryStr.'; Errorde MySQL=> '.mysql_error());
		mysql_close($ConLink);
// Puede ser que se provoque un error con las consultas que no retornan respuesta como el Update o Insert
		if ($Retorna) {
			$nQueryRec=mysql_num_rows($ResponsePointer);
		}*/
	}
	
// Funcion de consulta al PHPList.
	function SQLPhpList($QueryStr,&$PhpBBResponsePointer,&$nQueryRec,$Retorna) {
		/*$ConLink=mysql_connect(DB_SERVER_PHPLIST,DB_SERVER_USERNAME_PHPLIST,DB_SERVER_PASSWORD_PHPLIST);
		$PhpLISTResponsePointer=mysql_db_query(DB_DATABASE_PHPLIST,$QueryStr,$ConLink) or die ('Par�metros enviados: Nombre de Base de datos=> '.DB_DATABASE_PHPLIST.'; Usuario de Base de datos=> '.DB_SERVER_USERNAME_PHPLIST.'; Consulta=> '.$QueryStr.'; Errorde MySQL=> '.mysql_error());
		mysql_close($ConLink);
// Puede ser que se provoque un error con las consultas que no retornan respuesta como el Update o Insert
		if ($Retorna) {
			$nQueryRec=mysql_num_rows($PhpLISTResponsePointer);
		}*/
	}

?>