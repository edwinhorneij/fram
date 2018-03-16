<?php

namespace Fram;

/**
 * Class Request
 * @package Fram
 */
class Request
{
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
     * Request constructor.
     */
    public function __construct()
    {
        $this->parseRequest();
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

        $parts = explode('/', trim($base, '/'));

        if (!empty($parts[0])) {
            $this->controllerName = $parts[0];
        }

        if (!empty($parts[1])) {
            $this->actionName = $parts[1];
        }

        if (!empty($query)) {
            parse_str($query, $this->queryParams);
        }
    }

    /**
     * When a Controller has been found, the handleRequest method will be invoked,
     * which is responsible for handling the actual request and - if applicable - returning
     * an appropriate Response. So actually, this method is the main entrypoint for the
     * dispatch loop which delegates requests to controllers.
     *
     * @param string $controllerName
     * @param string $actionName
     * @return mixed
     * @throws RequestException
     * @throws RuntimeException
     */
    public function handleRequest()
    {
        $controllerClassName = implode('', array_map('ucwords', explode('_', $this->getControllerName()))).'Controller';
        $controller = new $controllerClassName($this);

        ob_start();
        $controller->{$this->getActionName()}();
        $content = ob_get_contents();
        ob_end_clean();

        return $content;


//        try {
//            $controller = Loader::getInstance()->getController($controllerName);
//        } catch (LoaderException $e) {
//            throw new RequestException($e->getMessage(), Response::NOT_FOUND);
//        }
//
//        if (method_exists($controller, 'setRequest')) {
//            $controller->setRequest($this);
//        }
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
