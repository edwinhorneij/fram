<?php

ini_set('display_errors', true);

define('DS', DIRECTORY_SEPARATOR);

define('URL_ROOT', DS);
define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
//define('APP_DIR', DOC_ROOT.DS.'app');
//define('LIB_DIR', DOC_ROOT.DS.'lib');

require_once LIB_DIR . '/Fram/Loader.php';
Fram\Loader::register();

// Required files
//require_once LIB_DIR . '/Fram/Exceptions.php';
//require_once LIB_DIR . '/Fram/Loader.php';
//require_once LIB_DIR . '/Fram/Model.php';
//require_once LIB_DIR . '/Fram/Router.php';

// Include path
//set_include_path(ROOT_DIR . '/library' . PATH_SEPARATOR . APP_DIR . '/models');

//Fram\Loader::register();
