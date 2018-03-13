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
    private $controller = 'test';

    /**
     * @var string
     */
    private $action = 'index';

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
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return $this->queryParams;
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

        if (isset($parts[0])) {
            $this->controller = $parts[0];
        }

        if (isset($parts[1])) {
            $this->action = $parts[1];
        }

        if (!empty($query)) {
            parse_str($query, $this->queryParams);
        }
    }
}

//class Request
//{
//    public function addRoutes($routes)
//    {
//
//    }
//
//    public function dispatch()
//    {
//        die('Hi!');
//    }
//}

