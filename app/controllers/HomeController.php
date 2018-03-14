<?php

/**
 * Class HomeController
 */
class HomeController extends Fram\Controller
{
    /**
     * Index
     * /test[/index]
     */
    public function index() {
//        $user = User::create(array('first_name' => 'Edwin', 'last_name' => 'Horneij'));
        $this->vars['users'] = User::all();
        $this->render();
    }
}
