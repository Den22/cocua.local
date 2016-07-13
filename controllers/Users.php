<?php

namespace Application\Controllers;

use Application\Models\Users as UsersModel;
use Application\Classes\View;
use Application\Classes\ValidReg;

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

    public function actionAddUser()
    {
        $valid = new ValidReg();
        $view = new View();
        $inputs = filter_input_array(INPUT_POST, $valid->arrayFilters);
        if ($valid->checkAll($inputs) || $valid->checkMatchPass($inputs) || $valid->checkExistHashtag($inputs) || $valid->checkCode($inputs)) {
            $view->data = array_merge($valid->disparity, $inputs);
            $view->display('registration');
            die;
        }
        $user = new UsersModel();
        unset($inputs['code'], $inputs['password2'], $inputs['readRules']);
        $user->data = $inputs;
        $user->data['date'] = date("Y-m-d");
        $user->insert();
        header('Location: /users/one/' . $user->id);
    }
}