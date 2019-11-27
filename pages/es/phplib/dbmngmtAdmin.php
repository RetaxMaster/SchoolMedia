<?php

// ****************************************************************

// Este archivo controla las consultas de una base de datos,  
// tomando en principio el valor de la base de datos como un parámetro 
// POST enviado por flash. Esto permitirá ampliar el software a multiples 
// asignaturas sin modificar el código Flash.
// Este es un archivo de inclusión o libreria de inclusión
// *****************************************************************

// ****************************************************************
// ****************************************************************
// Este Archivo debe estar presente en todas las funciones de 
// control de Sosem y no debe estar presente en ningún archivo de 
// inclusión.
// ****************************************************************
// ****************************************************************
// La función include_once() incluye y evalua el fichero especificado 
// durante la ejecución del script. Se comporta de manera similar a 
// include(), con la única diferencia que si el código ha sido ya 
// incluido, no se volverá a incluir.
// Información tomada de http://www.php.net/manual/es/function.include-once.php

include_once("../phplib/sosemV20config.php"); // Incluye vaiables de configuración, 

									// como nombre de usuario para el acceso a 

									// las bases de datos, password para el 

									// mismo y Prefijo...

// ************************************************************
// Funcion de consulta general a bases de datos no globales.
// ************************************************************
	function SQLQuery(&$ResponsePointer,&$nQueryRec,$QueryStr,$Retorna){
	// Uso de variables Globales tomado de http://www.webestilo.com/php/php02.phtml
	//global $DataBasePrefix; // Se toma del archivo de inclusión sosemV10config.php
	//global $DataBaseUser; // Nombre de usuario que tiene acceso a la base de datos
	//global $DataBasePasswd; // Password para el usuario
	//global $DataBaseName;  // Nombre de la Base de datos para el sitio web
		//$ConLink=mysql_connect("localhost",$DataBaseUser,$DataBasePasswd);
 		$ConLink=mysqli_connect("localhost",DATABASE_USER,DATABASE_PASSWD,DATABASE_PREFIX.DATABASE_NAME);// mysql_connect("localhost",$DataBaseUser,$DataBasePasswd);
		/* comprueba la conexión */
		if (mysqli_connect_errno()) {
			printf("Error de conexion a la base de datos: %s\n", mysqli_connect_error());
			exit();
		}
		//$ResponsePointer=mysql_db_query($DataBasePrefix.$DataBaseName,$QueryStr,$ConLink) or die ('Parámetros enviados: Prefijo=> '.$DataBasePrefix.'; Nombre de Base de datos=> '.$DataBaseName.'; Usuario de Base de datos=> '.$DataBaseUser.'; Consulta=> '.$QueryStr.'; Errorde MySQL=> '.mysql_error());
// Puede ser que se provoque un error con las consultas que no retornan respuesta como el Update o Insert
		/*echo $QueryStr;
		exit;*/
		$ResponsePointer=mysqli_query($ConLink,$QueryStr) or die(mysqli_error());
		// echo $QueryStr;
		if ($Retorna && !is_bool($ResponsePointer)) {
			$nQueryRec=mysqli_num_rows($ResponsePointer);
		}
		mysqli_close($ConLink);
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
		}else{
			$ArraySchema="";
		}
	}


// Función para la base de datos Global, esta base de datos contiene solo los datos 
// para administradores del sistema, no se busca mezclar los usuarios con los 
// administradores.
	function SQLGlobalQuery(&$ResponsePointer,&$nQueryRec,$QueryStr,$Retorna) {
	// Uso de variables Globales tomado de http://www.webestilo.com/php/php02.phtml
	//global $DataBasePrefix; // Se toma del archivo de inclusión sosemV10config.php
	//global $DataBaseUser; // Nombre de usuario que tiene acceso a la base de datos
	//global $DataBasePasswd; // Password para el usuario de las bases de datos
	//global $GlobalDB; 
		//$ConLink=mysql_connect("localhost",$DataBaseUser,$DataBasePasswd);
 		$ConLink=mysqli_connect("localhost",DATABASE_USER,DATABASE_PASSWD,DATABASE_PREFIX.GLOBAL_DB);// mysql_connect("localhost",$DataBaseUser,$DataBasePasswd);
		/* comprueba la conexión */
		// echo DATABASE_USER.' : '.DATABASE_PASSWD.' : '.DATABASE_PREFIX.GLOBAL_DB.' : '.$QueryStr;
		// exit;
		if (mysqli_connect_errno()) {
			printf("Error de conexion a la base de datos: %s\n", mysqli_connect_error());
			exit();
		}
		$ResponsePointer=mysqli_query($ConLink,$QueryStr);
		//$ResponsePointer=mysql_db_query($DataBasePrefix.$GlobalDB,$QueryStr,$ConLink) or die ("Parámetros enviados: Prefijo=> $DataBasePrefix; Nombre de Base de datos=> $GlobalDB; Usuario de Base de datos=> $DataBaseUser; Consulta=> $QueryStr; Errorde MySQL=> ".mysql_error());
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
		$ResponsePointer=mysql_db_query(DB_DATABASE,$QueryStr,$ConLink) or die ('Parámetros enviados: Nombre de Base de datos=> '.DB_DATABASE.'; Usuario de Base de datos=> '.DB_SERVER_USERNAME.'; Consulta=> '.$QueryStr.'; Errorde MySQL=> '.mysql_error());
		mysql_close($ConLink);
// Puede ser que se provoque un error con las consultas que no retornan respuesta como el Update o Insert
		if ($Retorna) {
			$nQueryRec=mysql_num_rows($ResponsePointer);
		}*/
	}
	
// Funcion que Inserta un nuevo cliente en la tienda OsCommerce, debe tomar el valor de mysql_insert_id()

	function SQLOsCommerceInsertAndGetLastID($QueryStr,$ResponsePointer,$nQueryRec,&$Retorna) {
		/*$ConLink=mysql_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD);
		$ResponsePointer=mysql_db_query(DB_DATABASE,$QueryStr,$ConLink) or die ('Parámetros enviados: Nombre de Base de datos=> '.DB_DATABASE.'; Usuario de Base de datos=> '.DB_SERVER_USERNAME.'; Consulta=> '.$QueryStr.'; Errorde MySQL=> '.mysql_error());
		$Retorna=mysql_insert_id();
		mysql_close($ConLink);*/
// Puede ser que se provoque un error con las consultas que no retornan respuesta como el Update o Insert
	}
	
// Funcion de consulta al foro.
	function SQLPhpBB($QueryStr,&$PhpBBResponsePointer,&$nQueryRec,$Retorna) {
		/*$ConLink=mysql_connect(DB_SERVER_PHPBB,DB_SERVER_USERNAME_PHPBB,DB_SERVER_PASSWORD_PHPBB);
		$PhpBBResponsePointer=mysql_db_query(DB_DATABASE_PHPBB,$QueryStr,$ConLink) or die ('Parámetros enviados: Nombre de Base de datos=> '.DB_DATABASE_PHPBB.'; Usuario de Base de datos=> '.DB_SERVER_USERNAME_PHPBB.'; Consulta=> '.$QueryStr.'; Errorde MySQL=> '.mysql_error());
		mysql_close($ConLink);
// Puede ser que se provoque un error con las consultas que no retornan respuesta como el Update o Insert
		if ($Retorna) {
			$nQueryRec=mysql_num_rows($PhpBBResponsePointer);
		}*/
	}
	
// Funcion de consulta al PHPList.
	function SQLPhpList($QueryStr,&$PhpLISTResponsePointer,&$nQueryRec,$Retorna) {
		/*$ConLink=mysql_connect(DB_SERVER_PHPLIST,DB_SERVER_USERNAME_PHPLIST,DB_SERVER_PASSWORD_PHPLIST);
		$PhpLISTResponsePointer=mysql_db_query(DB_DATABASE_PHPLIST,$QueryStr,$ConLink) or die ('Parámetros enviados: Nombre de Base de datos=> '.DB_DATABASE_PHPLIST.'; Usuario de Base de datos=> '.DB_SERVER_USERNAME_PHPLIST.'; Consulta=> '.$QueryStr.'; Errorde MySQL=> '.mysql_error());
		mysql_close($ConLink);
// Puede ser que se provoque un error con las consultas que no retornan respuesta como el Update o Insert
		if ($Retorna) {
			$nQueryRec=mysql_num_rows($PhpLISTResponsePointer);
		}*/
	}

?>