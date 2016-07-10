<?php

namespace Application\Controllers;

use Application\Classes\View;

class Home
{
    public function actionShow()
    {
        $view = new View();
        $view->display('home');
    }
}