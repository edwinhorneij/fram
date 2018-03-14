<?php

ini_set('display_errors', true);

define('DS', DIRECTORY_SEPARATOR);

define('APP_DIR', ROOT_DIR.DS.'app');
define('LIB_DIR', ROOT_DIR.DS.'lib');
define('URL_ROOT', DS);

define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ACTION', 'index');

require_once LIB_DIR . '/Fram/Loader.php';
Fram\Loader::register();

require_once 'php-activerecord.php';

// Required files
//require_once LIB_DIR . '/Fram/Exceptions.php';
//require_once LIB_DIR . '/Fram/Loader.php';
//require_once LIB_DIR . '/Fram/Model.php';
//require_once LIB_DIR . '/Fram/Router.php';

// Include path
//set_include_path(ROOT_DIR . '/library' . PATH_SEPARATOR . APP_DIR . '/models');

//Fram\Loader::register();
