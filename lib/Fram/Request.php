<?php

namespace Fram;

/**
 * Class Request
 * @package Fram
 */
class Request
{
    /**
     * @var array
     */
    private $parts = array();

    /**
     * @var string
     */
    private $controllerName = DEFAULT_CONTROLLER;

    /**
     * @var string
     */
    private $actionName = DEFAULT_ACTION;

    /**
     * @var array
     */
    private $queryParams = array();

    /**
     * @var object
     */
    private $controller;

//    /**
//     * Request constructor.
//     */
//    public function __construct()
//    {
//        $this->parseRequest();
//    }

    /**
     * @return array
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * @return string
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return string
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * Dispatch
     */
    public function dispatch()
    {
        $this->parseRequest();
        $this->loadController();
        $response = $this->handleRequest();

        return $response;

//        $this->setResponse($response);
//
//        $renderer = new Renderer();
//        $renderer->render($this);
    }

    /**
     * Parse request URI. Get the controller, action, and query string params.
     */
    private function parseRequest()
    {
        if (strpos($_SERVER['REQUEST_URI'], '?') !== false) {
            list($base, $query) = explode('?', $_SERVER['REQUEST_URI']);
        } else {
            $base = $_SERVER['REQUEST_URI'];
        }

        $this->parts = explode('/', trim($base, '/'));

        if (!empty($this->parts[0])) {
            $this->controllerName = $this->parts[0];
        }

        if (!empty($this->parts[1])) {
            $this->actionName = $this->parts[1];
        }

        if (!empty($query)) {
            parse_str($query, $this->queryParams);
        }
    }

    /**
     * Attempt to instantiate the controller identified in the request URI
     */
    private function loadController()
    {
        $controllerClassName = implode('', array_map('ucwords', explode('_', $this->getControllerName()))).'Controller';

        try {
            $this->controller = new $controllerClassName($this);
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    /**
     * Handle the actual request and return an appropriate Response
     * @return string
     */
    public function handleRequest()
    {
        ob_start();
        $this->controller->{$this->getActionName()}();
        $content = ob_get_contents();
        ob_end_clean();

        return $content;

//
//        $controllerResponse = null;
//        if (method_exists($controller, 'init')) {
//            $controllerResponse = $controller->init($this);
//        }
//
//        if (! isset($controllerResponse)) {
//            if (! method_exists($controller, $actionName . 'Action')) {
//                $m = sprintf('Method "%s" not found', $actionName);
//                throw new RequestException($m, Response::NOT_FOUND);
//            }
//            $controllerResponse = $controller->{$actionName . 'Action'}($this);
//        }
//
//        $this->setController($controllerName);
//        $this->setAction($actionName);
//
//        if ($controllerResponse instanceof View) {
//            $this->setContentType('html');
//            $response = new Response();
//            $response->setView($controllerResponse);
//            return $response;
//        } else if ($controllerResponse instanceof Response) {
//            return $controllerResponse;
//        } else {
//            $m = sprintf('Method "%s::%sAction()" contains an invalid return type', $controllerName, $actionName);
//            throw new RuntimeException($m);
//        }
    }
}
