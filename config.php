<?php

/******************************************************************************************************************
 *
 *	CONFIGURATION SETTINGS FOR APPLICATION
 *	ADAPTED FROM HOE - PHP WITH MySQL
 *	EDIT THESE TO MATCH YOUR ENVIRONMENT
 *
 ******************************************************************************************************************/
 
/******************************************************************************************************************
 *	Set the default timezone to prevent PHP warnings when we use date functions
 *	Taken from HOE - PHP with MySQL
 ******************************************************************************************************************/
date_default_timezone_set('Europe/London');

/******************************************************************************************************************
 *	Database connection details ! important, set after migration
 ******************************************************************************************************************/
define("DB_HOST", "mysqlsrv.dcs.bbk.ac.uk");
define("DB_USERNAME", "jgomes01");
define("DB_PASSWORD", "bbkmysql");
define("DB_SCHEMA", "jgomes01db");

/******************************************************************************************************************
 *	Application name
 ******************************************************************************************************************/
define("APP_NAME", "Jungle");

/******************************************************************************************************************
 *	Application paths
 ******************************************************************************************************************/
// To use within the PHP scripts
define("APP_ROOT", dirname(__FILE__));

define("APP_IMG", APP_ROOT . "/images/app/"); // default app images dir
define("APP_USR", APP_ROOT . "/images/gallery/"); // default user uploaded images dir
define("APP_TMB", APP_ROOT . "/images/gallery/thumbs/"); // default thumbs uploaded images dir
define("APP_VIW", APP_ROOT . "/views/"); // view default dir
define("APP_CLS", APP_ROOT . "/classes/"); // classes default dir
define("APP_LNG", APP_ROOT . "/lang/"); // lang default default dir
define("APP_TPL", APP_ROOT . "/templates/"); // templates default dir

// Image paths to echo on HTML
define("HTML_IMG_ROOT", "http://www.dcs.bbk.ac.uk/~jgomes01/jungle/images/"); // ! important, set after migration

define("HTML_IMG", HTML_IMG_ROOT . "app/");
define("HTML_USR", HTML_IMG_ROOT . "gallery/"); // ! important, must be set to read and write on the web server
define("HTML_TMB", HTML_IMG_ROOT . "thumbs/"); // ! important, must be set to read and write on the web server

/******************************************************************************************************************
 *	Environment
 ******************************************************************************************************************/
define("MAX_TLT", 20); // max size for uploaded image title (number of chars)
define("MAX_DSC", 200); // max size for uploaded image description (number of chars)
define("GLR_WDT", 600); // max width for big gallery image (pixels)
define("GLR_HGT", 600); // max height for big gallery image (pixels)
define("THB_WDT", 150); // max width for thumb gallery image (pixels)
define("THB_HGT", 150); // max height for thumb gallery image (pixels)

/******************************************************************************************************************
 *	Languages - Please refer to readme.txt file before attempting to change the values below
 ******************************************************************************************************************/
define("APP_LANG", "en"); // sets default language
define("APP_LANGSESSION", "1296000"); // 15 days

$language['en'] = 'English';
$language['pt'] = 'Português';

/******************************************************************************************************************
 *	SQL Queries
 ******************************************************************************************************************/
define("SQL_GET_ROW", "SELECT title, fileName, description FROM images WHERE id = ");
define("SQL_GET_IDS", "SELECT id FROM images");
define("SQL_GET_IMGS", "SELECT id, title, fileName, description FROM images");
define("SQL_ADD_IMG", "INSERT INTO images (title, fileName, description) VALUES (");

?>