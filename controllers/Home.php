<?php

namespace Application\Controllers;

use Application\Classes\View;
use Application\Classes\Cookie;

class Home
{
    public function actionShow()
    {
        $cookie = Cookie::get('hashtag');
        $view = new View();
        $view->data['cookie'] = $cookie;
        $view->display('home');
    }
}