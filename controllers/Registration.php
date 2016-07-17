<?php

namespace Application\Controllers;

use Application\Classes\View;
use Application\Classes\Cookie;

class Registration
{
    public function actionShow()
    {
        $cookie = Cookie::get('hashtag');
        if (!empty($cookie)) {
            header('Location: /');
        }
        $view = new View();
        $view->display('registration');
    }
}


