<?php

namespace Application\Controllers;

use Application\Classes\View;

class Registration
{
    public function actionShow()
    {
        $view = new View();
        $view->display('registration');
    }
}


