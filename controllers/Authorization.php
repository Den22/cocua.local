<?php

namespace Application\Controllers;

use Application\Classes\Cookie;
use Application\Classes\View;

class Authorization
{
    public function actionShow()
    {
        $cookie = Cookie::get('hashtag');
        if (!empty($cookie)) {
            header('Location: /');
        }
        $view = new View();
        $view->display('authorization');
    }
}