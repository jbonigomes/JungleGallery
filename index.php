<?php

/******************************************************************************************************************
 *
 * INDEX SCRIPT
 * This script provides the application only entry point
 * It requires most external needed files
 * Instantiates the nescessary objects
 * And finally echoes the output
 *
 ******************************************************************************************************************/

// require the config file
require_once(dirname(__FILE__) . '/config.php');

// start session
session_set_cookie_params(APP_LANGSESSION);
session_start();

// require classes
require_once(APP_CLS . 'dbHandler.class.php');
require_once(APP_CLS . 'langHandler.class.php');
require_once(APP_CLS . 'masterHandler.class.php');
require_once(APP_CLS . 'tools.class.php');

// instanciate classes
$db_obj = new dbHander(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_SCHEMA);
$lang_obj = new langHandler(APP_LANG);
$mst_obj = new masterHandler(APP_VIW);
$tools_obj = new tools(APP_USR);

// open connection to db
$db_obj->dbConnect();

// require the views
require_once(APP_VIW . 'controller.php');
require_once(APP_VIW . 'language.php');
require_once($mst_obj->getView());
require_once(APP_VIW . 'master.php');

// close connection to db
$db_obj->dbDisconnect();

// display output
echo $output;

?>