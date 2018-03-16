<?php

define('ROOT_DIR', realpath(__DIR__ . '/../'));
require_once ROOT_DIR . '/config/bootstrap.php';

try {
    $request = new Fram\Request();
    $content = $request->dispatch();
    require_once APP_DIR.'/views/layouts/application.phtml';

//    $request->addRoutes(include ROOT_DIR.'/config/routes.php');
} catch (Exception $e) {
    echo '<p>'.$e->getMessage().'</p>';
    echo '<pre>'.print_r($e->getTrace(), 1).'</pre>';
    die;
//    echo $e->getFile();
//    echo $e->getLine();
//    echo $e->getMessage();
//    $request->handleException($e);
}
