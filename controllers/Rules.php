<?php

namespace Application\Controllers;

use Application\Classes\View;

class Rules
{
    public function actionShow()
    {
        $view = new View();
        $view->display('rules');
    }
}