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
            require APP_DIR.'/views/'.$this->request->getController().'/'.$file.'.phtml';
        } else {
            require APP_DIR.'/views/'.$this->request->getController().'/'.$this->request->getAction().'.phtml';
        }
    }
}
