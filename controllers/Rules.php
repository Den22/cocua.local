<?php

namespace Application\Controllers;

use Application\Classes\Cookie;
use Application\Classes\View;



class Rules
{
    public function actionShow()
    {
        $view = new View();
        $cookie = Cookie::get('hashtag');
        $view->data['cookie'] = $cookie;
        $view->display('rules');
    }
}