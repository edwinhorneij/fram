<?php

ini_set('display_errors', true);

define('DS', DIRECTORY_SEPARATOR);

define('APP_DIR', ROOT_DIR.DS.'app');
define('LIB_DIR', ROOT_DIR.DS.'lib');
define('URL_ROOT', DS);

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
