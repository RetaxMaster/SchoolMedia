<?php

// SOSEM Desktop V2.0
// Este archivo contiene las variables de configuraci�n del sistema,  
// por ejemplo el prefijo de la base de datos, que tiene utilidad para  
// los servidores con dominios virtuales.
// El nombre de usuario que tiene acceso a la base de datos.
// El password de usuario que tendra acceso a la misma base de datos.
// Este es un archivo de inclusi�n o libreria de inclusi�n.
// *****************************************************************
// ****************************************************************
// ****************************************************************
// Este Archivo debe estar presente en todas las funciones de 
// control de Sosem y no debe estar presente en ning�n archivo de 
// inclusi�n.
// ****************************************************************
// ****************************************************************
// Constantes temporales hasta que se libere la proteccion a la base de datos, en ese momento podemos sustituir estos valores por la inclusion del archivo de configuracion directo del OsCommerce

  define('DB_SERVER', 'localhost'); // eg, localhost - should not be empty for productive servers
  define('DB_SERVER_USERNAME', 'mma_osc1');
  define('DB_SERVER_PASSWORD', '3ejR50hQ');
  define('DB_DATABASE', 'mma_osc1');

  // $Lang = "";

// define("COOKIE_DOMAIN","panama-account.com"); dominio para las cookies NO se pueden usar constantes en accesos a cookies, El sistema jamas guarda las cookies

// define("COOKIE_PATH","/cimma/admin/");ruta donde esta la cookie

define("SITE_NAME","School Media .: Administrativo :.");// ruta donde esta la cookie

// Nombre y ruta del dominio donde se instala el SOSEM V2.0, directorio ra�z de SOSEM, en este caso se refiere a un subdominio
define("DOMAIN_NAME",".");//..

// Nueva constante en la version 2.0 para definir la base donde se instalara el sistema, solo el directorio relativo al dominio, no incluye /
// esta constante sustituye la variable $SystemDir de la version 1.3
define ("BASE_INSTALL_DIR",DOMAIN_NAME . "");

//$ImgSystemDir="http://".$DomainName."/".$SystemDir."/images/"; // Directorio donde se instala el sistema basado en la base domain name
define("IMG_BASE_DIR",BASE_INSTALL_DIR . "/images");

// Directorio donde se encuentran todas las paginas de usuario
define("USR_PAGES",BASE_INSTALL_DIR . "/pages");

// Directorio de mensajes personalizados, aca se encontraran todo los mensajes personalizados, tanto de error como de exitos
define("MSGS",BASE_INSTALL_DIR . "/error_msg");

// Directorio de diccionario, este directorio contendra todos los textos en el sitio que seran defnidos segun el idioma del usuario.
define("DICTIONARY_DIR", BASE_INSTALL_DIR . "/dictionary");

// Directorio donde se encuentra el sistema de recuperacion de clave $PasswdRecov = "http://".$DomainName."/".$SystemDir."/rcvry/".$Lang."/";
define("PASSWD_RECOV",BASE_INSTALL_DIR . "/rcvry");

// $RepeatedDOCS="docsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocsdocs/";
define("REPEATED_DOCS",BASE_INSTALL_DIR . "/docs");

// *********************************************************************************************************
// Los proximos directorios son considerados directorios finales, no hay mas profundidad despues de ellos,
// *********************************************************************************************************

// Todas las imagenes de la galeria de fotos
define("IMG_GALLERY_DIR",IMG_BASE_DIR . "/gallery");

// Todas las imagenes de avatars de usuarios
define("IMG_USERS_DIR",IMG_BASE_DIR . "/users");

// Todas las imagenes realcionadas a los titulos de los cursos
define("IMG_COURSE_DIR",IMG_BASE_DIR . "/course");

// Todas las imagenes realcionadas a los perfiles de los docentes
define("IMG_TEACH_DIR",IMG_BASE_DIR . "/teacher");

// Todas las imagenes realcionadas a los titulos de los documentos y tareas
define("IMG_DOCS_DIR",IMG_BASE_DIR . "/documentos");

// Todas las imagenes realcionadas a cada producto en particular
define("IMG_PRODUCTS_DIR",IMG_BASE_DIR . "/productos");

// Todas las imagenes realcionadas a usos generales, quiza inclusion en descripciones o cursos
define("IMG_GEN_DIR",IMG_BASE_DIR . "/general");

// Directorio aun no definido, se encontraba en la version 1.3 pero no estaba documentado
define("IMG_TRASH_DIR",IMG_BASE_DIR . "/trash");

// Todas las imagenes contenidas en la pagina web general, tanto de usuario como adminitrativa, 
// estas son ls imagenes estaticas del sitio que constutuyen toda l parte grfica del sitio
define("IMG_WEBPAGE_DIR",IMG_BASE_DIR . "/webpage");

// $DocFileDir = "http://".$DomainName."/".$SystemDir."/".$RepeatedDOCS;
define("DOC_FILE_DIR",BASE_INSTALL_DIR . REPEATED_DOCS);

// Todas las imagenes de los banners o Carrusel
define("IMG_CARROUSEL_DIR",IMG_BASE_DIR . "/banner");

// Todas las imagenes de la galer�a de fotos
define("IMG_ADS_DIR",IMG_BASE_DIR . "/publicidad");

// Todos los archivos de inclusion
define("INCLUDES_DIR",BASE_INSTALL_DIR . "/includes");

// Todos los Renders
define("RENDERS_DIR",BASE_INSTALL_DIR . "/renders");

// Donde se instale el foro si existe $ForoDir = "http://".$DomainName."/foro/"; // Directorio donde se encuentra instalado el foro.
define("FORO_DIR", BASE_INSTALL_DIR . "/foro");

// Donde se instale la tienda $eStoreDir = "http://".$DomainName."/customer/"; // Directorio donde se encuentra instalado el foro.
define("E_STORE_DIR",BASE_INSTALL_DIR . "/eStore");

// Donde se instale el directorio de noticias CuteNews $NewsDir = "http://".$DomainName."/".$SystemDir."/onlinenews/CuteNews/"; 
define("NEWS_DIR",BASE_INSTALL_DIR . "/onlinenews");

// Directorio donde se encuentran las hojas de estilo $CSSDir = "http://".$DomainName."/../css/";
define("CSS_DIR",BASE_INSTALL_DIR . "/css");

// Directorio donde se encuentran las hojas de estilo $CSSDir = "http://".$DomainName."/../css/";
define("JS_DIR",BASE_INSTALL_DIR . "/js");

// Directorio administrativo
define("ADMIN_DIR", BASE_INSTALL_DIR . "/admin");

// Directorio de librerias de funciones del sistema
define("LIBRARY_DIR",BASE_INSTALL_DIR . "/phplib");

// Directorio donde se encuentran los paises del mundo en formato de seleccion de lista
define("COUNTRY_DIR", BASE_INSTALL_DIR . "/country");

// Directorio donde se encuentran los estados de cada pais
define("STATE_DIR", BASE_INSTALL_DIR . "/state");

// Prefijo de la base de datos, util solo cuando se aloja en un shared Server debe incluirse hasta el _, ej. esdca_ / $DataBasePrefix = "esdca_";
define("DATABASE_PREFIX","esdca_");

// Usuario con control total de la base de datos $DBTotalAccessUName = "cimmausr";
define("DB_TOTAL_ACCESS_UNAME","uschoolmed");

// Nombre de usuario que tiene acceso a la base de datos para realizar las conexiones, se conforma por el prefijo del 
// servidor virtual+Nombre de usuario que tiene acceso total a la base de datos $DataBaseUser = $DataBasePrefix.$DBTotalAccessUName;
define("DATABASE_USER",DATABASE_PREFIX . DB_TOTAL_ACCESS_UNAME);

// Password del usuario con control total de la base de datos $DataBasePasswd = "2PjR50hQ";
define("DATABASE_PASSWD","Q&e&Y@sv&{6d");

// Nombre de l base de datos de usuarios $DataBaseName = "cimmaV1";
define("DATABASE_NAME","dbschoolmedia");

$DBTable = array ("USUARIO","PASSWORD","GID","DOCUMENTOS","CATEGORIADOC","TIPODOC","GRUPOSEC","BANNEDUSER","LOGGEDUSER","USERLOGG","USERPROFILE"); // Tablas Disponibles en la base de datos

// Numero de la version de CIMMA
define("CIMMA_VERSION","MEDAS EasySoft By Soluciones DTP V1.0");

?>