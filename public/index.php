<?php

define('ROOT_DIR', realpath(__DIR__ . '/../'));
require_once ROOT_DIR . '/config/bootstrap.php';

$request = new Fram\Request();

$controllerName = implode('', array_map('ucwords', explode('_', $request->getController()))).'Controller';
$controller = new $controllerName($request);

ob_start();
$controller->{$request->getAction()}();
$content = ob_get_contents();
ob_end_clean();

require_once APP_DIR.'/views/layouts/application.phtml';

//try {
//    $request = new Fram\Request();
////    $request->addRoutes(include ROOT_DIR.'/config/routes.php');
//    $request->dispatch();
//} catch (Exception $e) {
//    $request->handleException($e);
//}
