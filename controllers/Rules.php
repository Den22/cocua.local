<?php

namespace Application\Controllers;

use Application\Classes\Cookie;
use Application\Classes\View;


class Rules
{
    public function actionShow()
    {
        $cookie = Cookie::get('hashtag');
        $view = new View();
        $view->data['cookie'] = $cookie;
        $view->display('rules');
    }
}