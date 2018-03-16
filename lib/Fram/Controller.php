<?php

namespace Fram;

/**
 * Class Controller
 * @package Fram
 */
class Controller
{
    /**
     * @var object
     */
    private $request;

    /**
     * @var array
     */
    protected $vars = array();

    /**
     * Controller constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @param null $file
     */
    protected function render($file = null)
    {
        if ($file) {
            require APP_DIR.'/views/'.$this->request->getControllerName().'/'.$file.'.phtml';
        } else {
            require APP_DIR.'/views/'.$this->request->getControllerName().'/'.$this->request->getActionName().'.phtml';
        }
    }
}
