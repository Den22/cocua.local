<?php

namespace Application\Controllers;

use Application\Classes\View;

class Authorization
{
    public function actionShow()
    {
        $view = new View();
        $view->display('authorization');
    }
}