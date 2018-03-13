<?php

define('ROOT_DIR', realpath(__DIR__ . '/../'));
define('APP_DIR', ROOT_DIR . '/app');
define('LIB_DIR', ROOT_DIR . '/lib');

require_once ROOT_DIR . '/config/bootstrap.php';

$request = new Fram\Request();

$controllerName = implode('', array_map('ucwords', explode('_', $request->getController()))).'Controller';
$controller = new $controllerName($request);
$controller->{$request->getAction()}();



//try {
//    $request = new Fram\Request();
////    $request->addRoutes(include ROOT_DIR.'/config/routes.php');
//    $request->dispatch();
//} catch (Exception $e) {
//    $request->handleException($e);
//}
