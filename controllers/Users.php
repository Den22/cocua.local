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
        $view = new View();
        $valid = new ValidReg();
        $inputs = filter_input_array(INPUT_POST, $valid->arrayFilters);
        foreach ($inputs as $key => $input) {
            if ($input == false) {
                $view->data = $valid->arrayNames[$key];
                $view->display('registration');
                break;
            }
        }
        die;
        $user = new UsersModel();
        $user->data = $_POST;
        unset($user->data['password2']);
        unset($user->data['readRules']);
        unset($user->data['code']);
        $user->data['date'] = date("Y-m-d");
        $user->insert();
        header('Location: /users/one/' . $user->id);
    }
}