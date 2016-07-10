<?php
/**
 * Created by PhpStorm.
 * User: Den
 * Date: 09.07.2016
 * Time: 18:09
 */

namespace Application\Controllers;

use Application\Models\Users as UsersModel;
use Application\Classes\View;


class Users
{
    public function actionAll()
    {
        $view = new View();
        $view->data = UsersModel::findAll();
        $view->display('clanlist');
    }

    public function actionOne($id)
    {
        $view = new View();
        $view->data = UsersModel::findOneByPk($id);
        $view->display('profile');
    }
}